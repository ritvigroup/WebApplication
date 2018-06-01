<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Poll_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->pollTbl                  = 'Poll';
        $this->pollAnswerTbl            = 'PollAnswer';
        $this->PollLikeTbl              = 'PollLike';
        $this->pollParticipationTbl     = 'PollParticipation';
        $this->PollCommentTbl           = 'PollComment';
    }


    public function generatePollUniqueId() {
        $PollUniqueId = "P".time().mt_rand();
        $this->db->select('PollUniqueId');
        $this->db->from($this->pollTbl);
        $this->db->where('PollUniqueId', $PollUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generatePollUniqueId();
        }
        return $PollUniqueId;
    }


    public function saveMyPoll($insertData) {
        $this->db->insert($this->pollTbl, $insertData);

        $poll_id = $this->db->insert_id();

        return $poll_id;
    }

    public function updateMyPoll($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->pollTbl, $updateData);

        return $this->db->affected_rows();
    }


    public function likePoll($UserProfileId, $PollId) {
        $res = $this->db->select('*')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLikeId'] > 0) {
            $PollLike   = (($res[0]['PollLike'] > 0) ? 0 : 1);
            $PollUnlike = (($res[0]['PollUnlike'] > 0) ? 0 : 1);
            $updateData = array(
                                'PollLike'      => $PollLike,
                                'PollUnlike'    => $PollUnlike,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PollLike'      => 1,
                                'PollUnlike'    => 0,
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PollLikeTbl, $insertData);
        }
        return $this->getTotalLike($PollId);
    }

    public function unlikePoll($UserProfileId, $PollId) {
        $res = $this->db->select('*')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLikeId'] > 0) {
            $updateData = array(
                                'PollLike'      => 0,
                                'PollUnlike'    => 1,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PollLike'      => 0,
                                'PollUnlike'    => 1,
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PollLikeTbl, $insertData);
        }
        return $this->getTotalUnLike($PollId);
    }

    public function getMeLike($UserProfileId, $PollId) {
        $res = $this->db->select('PollLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalLike($PollId) {
        $res = $this->db->select('COUNT(PollLikeId) AS TotalLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'PollLike' => 1))->get()->row_array();
        return (($res['TotalLike'] > 0) ? $res['TotalLike'] : 0);
    }

    public function getMeUnLike($UserProfileId, $PollId) {
        $res = $this->db->select('PollUnlike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollUnlike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalUnLike($PollId) {
        $res = $this->db->select('COUNT(PollLikeId) AS TotalUnLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'PollUnlike' => 1))->get()->row_array();
        return (($res['TotalUnLike'] > 0) ? $res['TotalUnLike'] : 0);
    }

    public function saveMyPollImage($PollId, $poll_image) {

        $upload_file_name = $poll_image['name'];
        
        if($upload_file_name != '') {

            $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

            $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-'.mt_rand().'.'.end(explode('.', $upload_file_name));

            if($AttachmentTypeId == 1) {
                $path = POLL_IMAGE_DIR;
            } else if($AttachmentTypeId == 2) {
                $path = POLL_VIDEO_DIR;
            } else if($AttachmentTypeId == 4) {
                $path = POLL_AUDIO_DIR;
            } else {
                $path = POLL_DOC_DIR;
            }
            $path = $path.$AttachmentFile;
            $source = $poll_image['tmp_name'];

            $upload_result = uploadFileOnServer($source, $path);

            $updateData = array(
                                'PollImage'   => $AttachmentFile,
                                'UpdatedOn'   => date('Y-m-d H:i:s'),
                                );
            $this->db->where('PollId', $PollId);
            $this->db->update($this->pollTbl, $updateData);
        }
    }


    public function saveMyPollAnswer($PollId, $UserProfileId, $poll_answer, $poll_answer_image) {
        $i = 0;
        foreach($poll_answer AS $answer) {
            $insertData = array(
                                'PollId'             => $PollId,
                                'PollAnswer'         => $answer,
                                'PollAnswerStatus'   => 1,
                                'AddedBy'            => $UserProfileId,
                                'UpdatedBy'          => $UserProfileId,
                                'AddedOn'            => date('Y-m-d H:i:s'),
                                'UpdatedOn'          => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->pollAnswerTbl, $insertData);

            $PollAnswerId = $this->db->insert_id();

            $upload_file_name = $poll_answer_image['name'][$i];
        
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-ANSWER-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = POLL_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = POLL_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = POLL_AUDIO_DIR;
                } else {
                    $path = POLL_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $poll_answer_image['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $updateData = array(
                                    'PollAnswerImage'   => $AttachmentFile,
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                    );
                $this->db->where('PollAnswerId', $PollAnswerId);
                $this->db->update($this->pollAnswerTbl, $updateData);
            }
            $i++;
        }
        return true;
    }


    public function getAttachmentTypeId($file_name) {
        $photo_file_array = array('jpg', 'jpeg', 'bmp', 'png');
        $doc_file_array = array('doc', 'docx', 'xls', 'pdf', 'txt');
        $video_file_array = array('mp4', 'dat', '3gp');
        $audio_file_array = array('mp3', 'wav');

        $file_extension = strtolower(end(explode('.', $file_name)));

        $AttachmentTypeId = $this->validateAttachmentExtension($extension);
        if(@in_array($file_extension, $photo_file_array)) {
            $AttachmentTypeId = 1;
        } else if(@in_array($file_extension, $video_file_array)) {
            $AttachmentTypeId = 2;
        } else if(@in_array($file_extension, $audio_file_array)) {
            $AttachmentTypeId = 4;
        } else {
            $AttachmentTypeId = 3;
        }
        return $AttachmentTypeId;
    }


    public function validateAttachmentExtension($extension) {
        $query = $this->db->query("SELECT AttachmentTypeId FROM ".$this->attachmentTypeTbl." 
                                                        WHERE 
                                                            `TypeExtensions` LIKE '%".$extension."%'");

        $res_u = $query->row_array();
        if($res_u['AttachmentTypeId'] > 0) {
            return $res_u['AttachmentTypeId'];
        } else {
            return 0;
        }
    }



    public function participatePollWithAnswer($insertData) {
        $this->db->insert($this->pollParticipationTbl, $insertData);

        $PollParticipationId = $this->db->insert_id();

        return $PollParticipationId;
    }


    public function getMyAllPoll($UserProfileId, $FriendProfileId) {
        $polls = array();

        if($FriendProfileId > 0) {

            if($UserProfileId != $FriendProfileId) {
                $query = $this->db->query("SELECT PollId FROM $this->pollTbl WHERE `AddedBy` = '".$FriendProfileId."' AND `PollPrivacy` = '1' AND `PollStatus` != -1 ORDER BY AddedOn DESC");
            } else {
                $query = $this->db->query("SELECT PollId FROM $this->pollTbl WHERE `AddedBy` = '".$FriendProfileId."' AND `PollStatus` != -1 ORDER BY AddedOn DESC");
            }

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $polls[] = array(
                                'feedtype' => 'poll',
                                'polldata' => $this->getPollDetail($result['PollId'], $UserProfileId),
                                );
            }
        }
        return $polls;
    }


    public function getPollDetailByUniqueId($PollUniqueId, $UserProfileId) {
        $poll_detail = array();
        if(isset($PollUniqueId) && $PollUniqueId != '') {
            $query = $this->db->query("SELECT * FROM $this->pollTbl WHERE PollUniqueId = '".$PollUniqueId."'");

            $res = $query->row_array();

            if($res['PollId'] > 0) {
                $poll_detail = $this->returnPollDetail($res, $UserProfileId);
            } 
        } else {
            $poll_detail = array();
        }
        return $poll_detail;
    }


    
    public function getPollDetail($PollId, $UserProfileId) {
        $poll_detail = array();
        if(isset($PollId) && $PollId > 0) {

            $query = $this->db->query("SELECT * FROM $this->pollTbl WHERE PollId = '".$PollId."'");

            $res = $query->row_array();

            if($res['PollId'] > 0) {
                $poll_detail = $this->returnPollDetail($res, $UserProfileId);
            } 
        } else {
            $poll_detail = array();
        }
        return $poll_detail;
    }

    
    public function returnPollDetail($res, $UserProfileId) {
        $PollId             = $res['PollId'];
        $PollUniqueId       = $res['PollUniqueId'];
        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        
        $PollQuestion       = $res['PollQuestion'];
        $ValidFromDate      = (($res['ValidFromDate'] != NULL) ? $res['ValidFromDate'] : "");
        $ValidEndDate       = (($res['ValidEndDate'] != NULL) ? $res['ValidEndDate'] : "");
        $PollLocation       = (($res['PollLocation'] != NULL) ? $res['PollLocation'] : "");
        $PollPrivacy        = $res['PollPrivacy'];
        $PollStatus         = $res['PollStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PollProfile        = $this->User_Model->getUserProfileInformation($AddedBy);
        //$PollAnswer         = $this->getPollAnswer($PollId);
        
        $PollTotalParticipation = $this->getPollTotalParticipation($PollId);
        $PollAnswerWithTotalParticipation = $this->getPollAnswerWithTotalParticipation($PollId, $UserProfileId);

        $validate_poll_already = $this->validateUserProfileAlreadyPolled($PollId, $UserProfileId);

        $TotalLikes     = $this->getTotalLike($PollId);
        $TotalUnLikes   = $this->getTotalUnLike($PollId);
        $MeLike         = $this->getMeLike($UserProfileId, $PollId);
        $MeUnLike       = $this->getMeUnLike($UserProfileId, $PollId);
        $TotalComment   = $this->getAllPollComment($PollId, $UserProfileId, 1);

        $user_data_array = array(
                                "PollId"                    => $PollId,
                                "PollUniqueId"              => $PollUniqueId,
                                "PollQuestion"              => $PollQuestion,
                                "ValidFromDate"             => $ValidFromDate,
                                "ValidEndDate"              => $ValidEndDate,
                                "PollLocation"              => $PollLocation,
                                "PollPrivacy"               => $PollPrivacy,
                                "PollStatus"                => $PollStatus,
                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "PollProfile"               => $PollProfile,
                                'PollImage'                 => (($res['PollImage'] != '') ? POLL_IMAGE_URL.$res['PollImage'] : ''),
                                //"PollAnswer"                => $PollAnswer,
                                "PollTotalParticipation"    => $PollTotalParticipation,
                                "PollAnswerWithTotalParticipation"    => $PollAnswerWithTotalParticipation,
                                
                                "TotalLikes"                => $TotalLikes,
                                "TotalUnLikes"              => $TotalUnLikes,
                                "MeLike"                    => $MeLike,
                                "MeUnLike"                  => $MeUnLike,
                                "TotalComment"              => $TotalComment,

                                "MeParticipated"            => $validate_poll_already,
                                );
        return $user_data_array;
    }



    public function getPollAnswer($PollId) {
        
        $PollAnswer = array();

        $query = $this->db->query("SELECT * FROM ".$this->pollAnswerTbl." WHERE `PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollAnswer[] = array(
                                    'PollId'            => $result['PollId'],
                                    'PollAnswer'        => $result['PollAnswer'],
                                    'PollAnswerStatus'  => $result['PollAnswerStatus'],
                                );
        }

        return $PollAnswer;
    }


    public function getPollAnswerWithTotalParticipation($PollId, $UserProfileId) {
        
        $PollAnswer = array();

        $query = $this->db->query("SELECT * FROM ".$this->pollAnswerTbl." WHERE `PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollAnswer[] = array(
                                    'PollAnswerId'      => $result['PollAnswerId'],
                                    'PollId'            => $result['PollId'],
                                    'PollAnswer'        => $result['PollAnswer'],
                                    'PollAnswerImage'   => (($result['PollAnswerImage'] != '') ? POLL_IMAGE_URL.$result['PollAnswerImage'] : ''),
                                    'PollAnswerStatus'  => $result['PollAnswerStatus'],
                                    'TotalAnswerdMe'    => $this->getPollAnswerTotalParticipation($result['PollAnswerId']),
                                    'MeAnsweredYesNo'   => $this->meAnsweredOnPollAnswer($result['PollAnswerId'], $UserProfileId),
                                );
        }

        return $PollAnswer;
    }


    public function meAnsweredOnPollAnswer($PollAnswerId, $UserProfileId) {
        $this->db->select('PollParticipationId');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollAnswerId', $PollAnswerId);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        //$result = $query->row_array();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function getPollTotalParticipation($PollId) {
        $this->db->select('COUNT(PollParticipationId) AS total_participation');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollId', $PollId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return (($result['total_participation'] > 0) ? $result['total_participation'] : 0);
        } else {
            return 0;
        }
    }


    public function getPollAnswerTotalParticipation($PollAnswerId) {
        $this->db->select('COUNT(PollParticipationId) AS total_participation');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollAnswerId', $PollAnswerId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return (($result['total_participation'] > 0) ? $result['total_participation'] : 0);
        } else {
            return 0;
        }
    }
    

    public function validateUserProfileAlreadyPolled($PollId, $UserProfileId) {
        $this->db->select('PollParticipationId');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollId', $PollId);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function savePollComment($insertData) {
        $this->db->insert($this->PollCommentTbl, $insertData);

        $PollCommentId = $this->db->insert_id();

        return $PollCommentId;
    }

    public function getAllPollComment($PollId, $UserProfileId, $total_list = 0) {
        $comments = array();
        $query = $this->db->query("SELECT PollCommentId FROM ".$this->PollCommentTbl." WHERE `PollId` = '".$PollId."' AND `CommentStatus` = '1' ORDER BY CommentOn DESC");
        $res = $query->result_array();

        if($total_list > 0) {
            return $query->num_rows();
        }
        if($query->num_rows() > 0) {
            foreach($res AS $comment) {
                if($comment['PollCommentId'] > 0) {
                    $comments[] = $this->getPollCommentDetail($PollId, $comment['PollCommentId'], $UserProfileId);
                }
            }
        }
        return $comments;
    }

    public function getPollCommentDetail($PollId, $CommentId, $UserProfileId) {
        $comment_detail = array();
        $query = $this->db->query("SELECT * FROM ".$this->PollCommentTbl." WHERE `PollId` = '".$PollId."' AND `PollCommentId` = '".$CommentId."'");
        $res = $query->row_array();
        if($res['PollCommentId'] > 0) {
            $comment_detail = $this->returnPollCommentDetail($res, $UserProfileId);
        }
        return $comment_detail;
    }

    public function returnPollCommentDetail($res, $UserProfileId) {
        $PollCommentId      = $res['PollCommentId'];
        $PollId             = $res['PollId'];
        $AddedBy            = $res['UserProfileId'];
        $CommentText        = (($res['CommentText'] != NULL) ? $res['CommentText'] : "");
        $CommentPhoto       = (($res['CommentPhoto'] != NULL) ? $res['CommentPhoto'] : "");
        $ParentId           = $res['ParentId'];
        $CommentStatus      = $res['CommentStatus'];

        $CommentOn          = return_time_ago($res['CommentOn']);

        $CommentProfile        = $this->User_Model->getUserProfileInformation($AddedBy);

        $data_array = array(
                                "PollCommentId"     => $PollCommentId,
                                "PollId"            => $PollId,
                                "AddedBy"           => $AddedBy,
                                "CommentText"       => $CommentText,
                                "CommentPhoto"      => $CommentPhoto,
                                "ParentId"          => $ParentId,
                                "CommentStatus"     => $CommentStatus,
                                "CommentOn"         => $CommentOn,
                                "CommentOnTime"     => $res['CommentOn'],
                                "CommentProfile"    => $CommentProfile,
                                );
        return $data_array;
    }

    public function deletePollComment($UserProfileId, $PollCommentId) {
        $res = $this->db->select('*')->from($this->PollCommentTbl)->where(array('PollCommentId'=> $PollCommentId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollCommentId'] > 0) {
            $updateData = array(
                                'CommentStatus' => -1,
                                );
            $whereData = array(
                                'PollCommentId'        => $PollCommentId,
                                'UserProfileId'        => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollCommentTbl, $updateData);
            return 1;
        } else {
            return 0;
        }
    }
    

}