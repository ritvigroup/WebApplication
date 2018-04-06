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


    public function postMySuggestion() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $SuggestionSubject      = $this->input->post('suggestion_subject');
        $SuggestionDescription  = $this->input->post('suggestion_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');
        $ApplicantEmail         = $this->input->post('applicant_email');

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
                                'SuggestionUniqueId'         => $SuggestionUniqueId,
                                'SuggestionSubject'          => $SuggestionSubject,
                                'SuggestionDescription'      => $SuggestionDescription,
                                'ApplicantName'             => $ApplicantName,
                                'ApplicantFatherName'       => $ApplicantFatherName,
                                'ApplicantMobile'           => $ApplicantMobile,
                                'ApplicantEmail'           => $ApplicantEmail,
                                'SuggestionStatus'           => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
			$SuggestionId = $this->Suggestion_Model->saveMySuggestion($insertData);

            if($SuggestionId > 0) {
                
                $this->Suggestion_Model->assignSuggestionToLeaderSubLeader($SuggestionId, $UserProfileId, $AssignedTo);
                
                $this->Suggestion_Model->saveMySuggestionAttachment($SuggestionId, $UserProfileId, $_FILES['file']);

                $suggestion_detail = $this->Suggestion_Model->getSuggestionDetail($SuggestionId);

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
    
    
    public function getSuggestionDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $SuggestionId          = $this->input->post('suggestion_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SuggestionId == "") {
            $msg = "Please select suggestion";
            $error_occured = true;
        } else {

            $suggestion_detail = $this->Suggestion_Model->getSuggestionDetail($SuggestionId);

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

}

