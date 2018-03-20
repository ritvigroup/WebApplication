<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Poll_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->pollTbl                  = 'Poll';
        $this->pollAnswerTbl            = 'PollAnswer';
        $this->pollParticipationTbl     = 'PollParticipation';
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


    public function saveMyPollAnswer($PollId, $UserProfileId, $poll_answer) {
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
        }
        return true;
    }


    public function participatePollWithAnswer($insertData) {
        $this->db->insert($this->pollParticipationTbl, $insertData);

        $PollParticipationId = $this->db->insert_id();

        return $PollParticipationId;
    }


    public function getMyAllPoll($UserProfileId) {
        $polls = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT PollId FROM $this->pollTbl WHERE `AddedBy` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $polls[] = $this->getPollDetail($result['PollId']);
            }
        } else {
            $polls = array();
        }
        return $polls;
    }


    
    public function getPollDetail($PollId) {
        $poll_detail = array();
        if(isset($PollId) && $PollId > 0) {

            $query = $this->db->query("SELECT * FROM $this->pollTbl WHERE PollId = '".$PollId."'");

            $res = $query->row_array();

            if($res['PollId'] > 0) {
                $poll_detail = $this->returnPollDetail($res);
            } 
        } else {
            $poll_detail = array();
        }
        return $poll_detail;
    }

    
    public function returnPollDetail($res) {
        $PollId             = $res['PollId'];
        $PollUniqueId       = $res['PollUniqueId'];
        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        
        $PollQuestion       = $res['PollQuestion'];
        $ValidFromDate      = (($res['ValidFromDate'] != NULL) ? $res['ValidFromDate'] : "");
        $ValidEndDate       = (($res['ValidEndDate'] != NULL) ? $res['ValidEndDate'] : "");
        $PollPrivacy        = $res['PollPrivacy'];
        $PollStatus         = $res['PollStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PollProfile        = $this->User_Model->getUserProfileWithUserInformation($AddedBy);
        //$PollAnswer         = $this->getPollAnswer($PollId);
        
        $PollTotalParticipation = $this->getPollTotalParticipation($PollId);
        $PollAnswerWithTotalParticipation = $this->getPollAnswerWithTotalParticipation($PollId);

        $user_data_array = array(
                                "PollId"                    => $PollId,
                                "PollUniqueId"              => $PollUniqueId,
                                "PollQuestion"              => $PollQuestion,
                                "ValidFromDate"             => $ValidFromDate,
                                "ValidEndDate"              => $ValidEndDate,
                                "PollPrivacy"               => $PollPrivacy,
                                "PollStatus"                => $PollStatus,
                                "AddedOn"                   => $AddedOn,
                                "UpdatedOn"                 => $UpdatedOn,
                                "PollProfile"               => $PollProfile,
                                //"PollAnswer"                => $PollAnswer,
                                "PollTotalParticipation"    => $PollTotalParticipation,
                                "PollAnswerWithTotalParticipation"    => $PollAnswerWithTotalParticipation,
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


    public function getPollAnswerWithTotalParticipation($PollId) {
        
        $PollAnswer = array();

        $query = $this->db->query("SELECT * FROM ".$this->pollAnswerTbl." WHERE `PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollAnswer[] = array(
                                    'PollAnswerId'      => $result['PollAnswerId'],
                                    'PollId'            => $result['PollId'],
                                    'PollAnswer'        => $result['PollAnswer'],
                                    'PollAnswerStatus'  => $result['PollAnswerStatus'],
                                    'TotalAnswerdMe'    => $this->getPollAnswerTotalParticipation($result['PollAnswerId']),
                                );
        }

        return $PollAnswer;
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

    

}