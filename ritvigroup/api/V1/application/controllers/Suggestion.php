<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Suggestion Management
*/

class Suggestion extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Suggestion_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }

    // Save my suggestion
    public function postMySuggestion() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $SuggestionSubject      = $this->input->post('suggestion_subject');
        $SuggestionDescription  = $this->input->post('suggestion_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');
        $ApplicantEmail         = $this->input->post('applicant_email');

        $ApplicantAddress       = $this->input->post('address');
        $ApplicantPlace         = $this->input->post('place');
        $SuggestionLatitude     = $this->input->post('latitude');
        $SuggestionLongitude    = $this->input->post('longitude');

        $AssignedTo             = $this->input->post('assign_to_profile_id'); // Assign to Favourite Leader/Sub-Leader

        $SuggestionUniqueId = $this->Suggestion_Model->generateSuggestionUniqueId();
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($SuggestionSubject == "") {
			$msg = "Please enter some text to subject";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'SuggestionUniqueId'        => $SuggestionUniqueId,
                                'SuggestionSubject'         => $SuggestionSubject,
                                'SuggestionDescription'     => $SuggestionDescription,
                                'ApplicantName'             => $ApplicantName,
                                'ApplicantFatherName'       => $ApplicantFatherName,
                                'ApplicantMobile'           => $ApplicantMobile,
                                'ApplicantEmail'            => $ApplicantEmail,
                                'ApplicantAddress'          => $ApplicantAddress,
                                'ApplicantPlace'            => $ApplicantPlace,
                                'SuggestionLatitude'        => $SuggestionLatitude,
                                'SuggestionLongitude'       => $SuggestionLongitude,
                                'SuggestionStatus'          => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
			$SuggestionId = $this->Suggestion_Model->saveMySuggestion($insertData);

            if($SuggestionId > 0) {
                
                $this->Suggestion_Model->assignSuggestionToLeaderSubLeader($SuggestionId, $UserProfileId, $AssignedTo);
                
                $this->Suggestion_Model->saveMySuggestionAttachment($SuggestionId, $UserProfileId, $_FILES['file']);

                $suggestion_detail = $this->Suggestion_Model->getSuggestionDetail($SuggestionId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Suggestion added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Suggestion not saved. Error occured";
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
                           "result"   => $suggestion_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    // Get Suggestion Detail
    public function getSuggestionDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $SuggestionId    = $this->input->post('suggestion_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SuggestionId == "") {
            $msg = "Please select suggestion";
            $error_occured = true;
        } else {

            $suggestion_detail = $this->Suggestion_Model->getSuggestionDetail($SuggestionId, $UserProfileId);

            if(count($suggestion_detail) > 0) {
                $msg = "Suggestion fetched successfully";
            } else {
                $msg = "Suggestion not found";
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
                           "result"   => $suggestion_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get my all suggestion
    public function getMyAllSuggestion() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $suggestions = $this->Suggestion_Model->getMyAllSuggestion($UserProfileId);
            if(count($suggestions) > 0) {
                $msg = "Suggestion fetched successfully";
            } else {
                $msg = "No suggestion added by you";
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
                           "status"       => 'success',
                           "result"   => $suggestions,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get all assigned suggestion to me
    public function getAllAssignedSuggestionToMe() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $suggestions = $this->Suggestion_Model->getAllAssignedSuggestionToMe($UserProfileId);
            if(count($suggestions) > 0) {
                $msg = "Suggestion fetched successfully";
            } else {
                $msg = "No suggestion added by you";
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
                           "status"       => 'success',
                           "result"   => $suggestions,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Suggestion Detail By Unique Id
    public function getSuggestionDetailByUniqueId() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $SuggestionUniqueId  = $this->input->post('suggestion_unique_id');


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SuggestionUniqueId == "") {
            $msg = "Please select suggestion";
            $error_occured = true;
        } else {

            $suggestion_detail = $this->Suggestion_Model->getSuggestionDetailByUniqueId($SuggestionUniqueId, $UserProfileId);

            if(count($suggestion_detail) > 0) {
                $msg = "Suggestion fetched successfully";
            } else {
                $msg = "Suggestion not found";
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
                           "result"   => $suggestion_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Save Suggestion History
    public function saveSuggestionHistory() {
        $error_occured = false;

        $UserProfileId              = $this->input->post('user_profile_id');
        $SuggestionId                = $this->input->post('suggestion_id');
        $ParentSuggestionHistoryId   = $this->input->post('history_id');
        $HistoryTitle               = $this->input->post('title');
        $HistoryDescription         = $this->input->post('description');
                
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SuggestionId == "") {
            $msg = "Please enter suggestion id";
            $error_occured = true;
        } else if($HistoryTitle == "") {
            $msg = "Please enter title";
            $error_occured = true;
        } else if($HistoryDescription == "") {
            $msg = "Please enter description";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $ParentSuggestionHistoryId = ($ParentSuggestionHistoryId > 0) ? $ParentSuggestionHistoryId : 0;

            $insertData = array(
                                'SuggestionId'               => $SuggestionId,
                                'ParentSuggestionHistoryId'  => $ParentSuggestionHistoryId,
                                'HistoryTitle'              => $HistoryTitle,
                                'HistoryDescription'        => $HistoryDescription,
                                'HistoryStatus'             => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                            );
            $SuggestionHistoryId = $this->Suggestion_Model->saveMySuggestionHistory($insertData);

            if($SuggestionHistoryId > 0) {

                $this->Suggestion_Model->saveMySuggestionHistoryAttachment($SuggestionHistoryId, $UserProfileId, $_FILES['file']);

                $suggestion_history_detail = $this->Suggestion_Model->getSuggestionHistoryDetail($SuggestionHistoryId, $UserProfileId);
                
                $this->db->query("COMMIT");

                $msg = "Suggestion history saved successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Suggestion history not saved. Error occured";
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
                           "result"     => $suggestion_history_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Suggestion History
    public function getSuggestionHistory() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $SuggestionId     = $this->input->post('suggestion_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SuggestionId == "") {
            $msg = "Please select suggestion";
            $error_occured = true;
        } else {

            $suggestion_history_detail = $this->Suggestion_Model->getSuggestionHistory($SuggestionId, $UserProfileId);

            if(count($suggestion_history_detail) > 0) {
                $msg = "Suggestion fetched successfully";
            } else {
                $msg = "Suggestion not found";
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
                           "result"     => $suggestion_history_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }



}

