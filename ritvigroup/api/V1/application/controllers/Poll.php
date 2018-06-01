<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Poll Management
*/

class Poll extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Poll_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function saveMyPoll() {
		$error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollQuestion       = $this->input->post('poll_question');
        $PollPrivacy        = $this->input->post('privacy'); // 1 = Public, 0 = Private
        $ValidFromDate      = $this->input->post('valid_from_date');
        $ValidEndDate       = $this->input->post('valid_end_date');

        $PollLocation       = $this->input->post('location');

        $poll_answer = $this->input->post('poll_answer'); // Should be multiple answers in array


        $PollUniqueId = $this->Poll_Model->generatePollUniqueId();


        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($PollQuestion == "") {
			$msg = "Please enter your poll question";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'PollUniqueId'      => $PollUniqueId,
                                'PollQuestion'      => $PollQuestion,
                                'PollPrivacy'       => $PollPrivacy,
                                'PollLocation'      => $PollLocation,
                                'ValidFromDate'     => date('Y-m-d', strtotime($ValidFromDate)),
                                'ValidEndDate'      => date('Y-m-d', strtotime($ValidEndDate)),
                                'PollStatus'        => 1,
                                'AddedBy'           => $UserProfileId,
                                'UpdatedBy'         => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );

			$PollId = $this->Poll_Model->saveMyPoll($insertData);

            if($PollId > 0) {

                
                $this->Poll_Model->saveMyPollImage($PollId, $_FILES['question']);

                $this->Poll_Model->saveMyPollAnswer($PollId, $UserProfileId, $poll_answer, $_FILES['file']);
                
                $this->db->query("COMMIT");

                $poll_detail = $this->Poll_Model->getPollDetail($PollId, $UserProfileId);

                $msg = "Poll created successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Poll not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "result"       => $poll_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function deleteMyPoll() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollId             = $this->input->post('poll_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll to delete";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'PollStatus'        => -1,
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'AddedBy'   => $UserProfileId,
                                'PollId'    => $PollId,
                                );
            $poll_delete = $this->Poll_Model->updateMyPoll($whereData, $updateData);

            if($poll_delete == true) {
                
                $poll_detail = $this->Poll_Model->getPollDetail($PollId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Poll deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Poll not deleted. Not authorised to delete this poll.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $poll_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    
    public function getPollDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $PollId          = $this->input->post('poll_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll";
            $error_occured = true;
        } else {

            $poll_detail = $this->Poll_Model->getPollDetail($PollId, $UserProfileId);

            if(count($poll_detail) > 0) {
                $msg = "Poll fetched successfully";
            } else {
                $msg = "Poll not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"        => 'success',
                           "result"        => $poll_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getPollDetailByUniqueId() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $PollUniqueId    = $this->input->post('poll_unique_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollUniqueId == "") {
            $msg = "Please select poll";
            $error_occured = true;
        } else {

            $poll_detail = $this->Poll_Model->getPollDetailByUniqueId($PollUniqueId, $UserProfileId);

            if(count($poll_detail) > 0) {
                $msg = "Poll fetched successfully";
            } else {
                $msg = "Poll not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"        => 'success',
                           "result"        => $poll_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllPoll() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $polls = $this->Poll_Model->getMyAllPoll($UserProfileId, $FriendProfileId);
            if(count($polls) > 0) {
                $msg = "Poll fetched successfully";
            } else {
                $msg = "No poll found for you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $polls,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function participatePollWithAnswer() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollId             = $this->input->post('poll_id');
        $PollAnswerId       = $this->input->post('answer_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollAnswerId == "") {
            $msg = "Please select your answer to participate in poll";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $poll_detail = $this->Poll_Model->getPollDetail($PollId, $UserProfileId);

            $validate_poll_already = $this->Poll_Model->validateUserProfileAlreadyPolled($PollId, $UserProfileId);

            if($validate_poll_already > 0) { 
                $this->db->query("ROLLBACK");
                $msg = "You had already participated in this poll.";
                $error_occured = true;
            } else {

                $insertData = array(
                                    'PollId'            => $PollId,
                                    'PollAnswerId'      => $PollAnswerId,
                                    'PollParticipationDescription'       => '',
                                    'AddedBy'           => $UserProfileId,
                                    'UpdatedBy'         => $UserProfileId,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );
                $PollParticipationId = $this->Poll_Model->participatePollWithAnswer($insertData);

                if($PollParticipationId > 0) {

                    // Added Points by Poll
                    if($poll_detail['AddedBy'] != $UserProfileId) {
                        $insertPointData = array(
                                                'PointByName'           => 'Poll',
                                                'PointById'             => $PollId,
                                                'TransactionId'         => time().mt_rand().rand(),
                                                'PaymentBy'             => $UserProfileId,
                                                'PaymentTo'             => $UserProfileId,
                                                'TransactionDate'       => date('Y-m-d H:i:s'),
                                                'AddedOn'               => date('Y-m-d H:i:s'),
                                                'TransactionPoint'      => 200,
                                                'TransactionChargePoint' => 0,
                                                'DebitOrCredit'         => 1,
                                                'TransactionStatus'     => 1,
                                                'TransactionComment'    => 'Participated in Poll: '.$poll_detail['PollUniqueId'].', Name: '.$poll_detail['PollQuestion'],
                                                );

                        $this->db->insert('PointTransactionLog', $insertPointData);
                    }

                    $this->db->query("COMMIT");
                    

                    $poll_detail = $this->Poll_Model->getPollDetail($PollId, $UserProfileId);

                    $msg = "Poll answer submitted successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Poll answer not participated. Error occured";
                    $error_occured = true;
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"       => 'success',
                           "result"       => $poll_detail,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function likePoll() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollId             = $this->input->post('poll_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll to like";
            $error_occured = true;
        } else {

            $poll_like = $this->Poll_Model->likePoll($UserProfileId, $PollId);

            if($poll_like > 0) {
                $msg = "Poll liked successfully";
            } else {
                $msg = "Poll not like. Not authorised to like this poll.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                            "result"       => $poll_like,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $poll_like,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function unlikePoll() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollId             = $this->input->post('poll_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll to like";
            $error_occured = true;
        } else {

            $poll_unlike = $this->Poll_Model->unlikePoll($UserProfileId, $PollId);

            if($poll_unlike > 0) {
                $msg = "Poll unliked successfully";
            } else {
                $msg = "Poll not unlike. Not authorised to unlike this poll.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $poll_unlike,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function savePollComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollId             = $this->input->post('poll_id');
        $CommentText        = $this->input->post('your_comment');


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll";
            $error_occured = true;
        } else if($CommentText == "") {
            $msg = "Please enter your comment";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                'CommentText'   => $CommentText,
                                'CommentPhoto'  => '',
                                'ParentId'      => '0',
                                'CommentStatus' => '1',
                                'CommentOn'     => date('Y-m-d H:i:s'),
                            );

            $CommentId = $this->Poll_Model->savePollComment($insertData);

            if($CommentId > 0) {

                
                //$this->Poll_Model->savePollCommentImage($PollId, $_FILES['commment_file']);
               
                $this->db->query("COMMIT");

                $comment_detail = $this->Poll_Model->getPollCommentDetail($PollId, $CommentId, $UserProfileId);

                $msg = "Comment added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Comment not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $comment_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function getAllPollComment() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $PollId         = $this->input->post('poll_id');
        $Start          = $this->input->post('start');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollId == "") {
            $msg = "Please select poll";
            $error_occured = true;
        } else {

            $comments = $this->Poll_Model->getAllPollComment($PollId, $UserProfileId, $total_list = 0);
            if(count($comments) > 0) {
                $msg = "Poll comments fetched successfully";
            } else {
                $msg = "No poll comment found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $comments,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function deletePollComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PollCommentId      = $this->input->post('comment_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PollCommentId == "") {
            $msg = "Please select poll comment to delete";
            $error_occured = true;
        } else {

            $poll_comment_delete = $this->Poll_Model->deletePollComment($UserProfileId, $PollCommentId);

            if($poll_comment_delete > 0) {
                $msg = "Poll comment deleted successfully";
            } else {
                $msg = "Poll comment not able to delete. Not authorised to delete this poll comment.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $poll_comment_delete,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

