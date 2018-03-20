<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Complaint Management
*/

class Complaint extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Complaint_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function postMyComplaint() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $ComplaintSubject       = $this->input->post('complaint_subject');
        $ComplaintDescription   = $this->input->post('complaint_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');

        $complaint_member = $this->input->post('complaint_member'); // Should be multiple in array


        $ComplaintUniqueId = $this->Complaint_Model->generateComplaintUniqueId();
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($ComplaintSubject == "") {
			$msg = "Please enter some text to subject";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'ComplaintUniqueId'         => $ComplaintUniqueId,
                                'ComplaintSubject'          => $ComplaintSubject,
                                'ComplaintDescription'      => $ComplaintDescription,
                                'ApplicantName'             => $ApplicantName,
                                'ApplicantFatherName'       => $ApplicantFatherName,
                                'ApplicantMobile'           => $ApplicantMobile,
                                'ComplaintStatus'           => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
			$ComplaintId = $this->Complaint_Model->saveMyComplaint($insertData);

            if($ComplaintId > 0) {
                
                $this->Complaint_Model->saveMyComplaintMembers($ComplaintId, $UserProfileId, $complaint_member);
                
                $this->Complaint_Model->saveMyComplaintAttachment($ComplaintId, $UserProfileId, $_FILES['file']);

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId);

                $msg = "Complaint added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Complaint not saved. Error occured";
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
                           "complaint_detail"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    
    public function getComplaintDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $ComplaintId          = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId);
            $msg = "Complaint fetched successfully";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "complaint_detail"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllComplaint() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getMyAllComplaint($UserProfileId);
            if(count($complaints) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "No complaint added by you";
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
                           "complaints"   => $complaints,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getAllComplaintWhereMyselfAssociated() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getAllComplaintWhereMyselfAssociated($UserProfileId);
            if(count($complaints) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "No complaint added by you";
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
                           "complaints"   => $complaints,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

