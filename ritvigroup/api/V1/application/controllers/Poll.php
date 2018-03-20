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
        $PollPrivacy        = $this->input->post('poll_privacy');
        $ValidFromDate      = $this->input->post('valid_from_date');
        $ValidEndDate       = $this->input->post('valid_end_date');

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
                                'ValidFromDate'     => $ValidFromDate,
                                'ValidEndDate'      => $ValidEndDate,
                                'PollStatus'        => 1,
                                'AddedBy'           => $UserProfileId,
                                'UpdatedBy'         => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
			$PollId = $this->Poll_Model->saveMyPoll($insertData);

            if($PollId > 0) {

                $this->db->query("COMMIT");
                
                $this->Poll_Model->saveMyPollAnswer($PollId, $UserProfileId, $poll_answer);
                
                $poll_detail = $this->Poll_Model->getPollDetail($PollId);

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
                           "poll_detail"       => $poll_detail,
                           "message"            => $msg,
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

            $poll_detail = $this->Poll_Model->getPollDetail($PollId);

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
                           "status"             => 'success',
                           "poll_detail"        => $poll_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllPoll() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $polls = $this->Poll_Model->getMyAllPoll($UserProfileId);
            if(count($polls) > 0) {
                $msg = "Poll fetched successfully";
            } else {
                $msg = "No poll added by you";
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
                           "polls"     => $polls,
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

                    $this->db->query("COMMIT");
                    
                    $poll_detail = $this->Poll_Model->getPollDetail($PollId);


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
                           "status"             => 'success',
                           "poll_detail"       => $poll_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

