<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Information Management
*/

class Information extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Information_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function postMyInformation() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $InformationSubject     = $this->input->post('information_subject');
        $InformationDescription = $this->input->post('information_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');

        $InformationUniqueId = $this->Information_Model->generateInformationUniqueId();
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($InformationSubject == "") {
			$msg = "Please enter some text to subject";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'InformationUniqueId'       => $InformationUniqueId,
                                'InformationSubject'        => $InformationSubject,
                                'InformationDescription'    => $InformationDescription,
                                'ApplicantName'             => $ApplicantName,
                                'ApplicantFatherName'       => $ApplicantFatherName,
                                'ApplicantMobile'           => $ApplicantMobile,
                                'InformationStatus'         => 1,
                                'AddedBy'                   => $UserProfileId,
                                'UpdatedBy'                 => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
			$InformationId = $this->Information_Model->saveMyInformation($insertData);

            if($InformationId > 0) {
                
                $this->Information_Model->saveMyInformationAttachment($InformationId, $UserProfileId, $_FILES['file']);

                $information_detail = $this->Information_Model->getInformationDetail($InformationId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Information added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Information not saved. Error occured";
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
                           "result"         => $information_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    
    public function getInformationDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $InformationId   = $this->input->post('information_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($InformationId == "") {
            $msg = "Please select information";
            $error_occured = true;
        } else {

            $information_detail = $this->Information_Model->getInformationDetail($InformationId);

            if(count($information_detail) > 0) {
                $msg = "Information fetched successfully";
            } else {
                $msg = "Information not found";
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
                           "result"         => $information_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllInformation() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $informations = $this->Information_Model->getMyAllInformation($UserProfileId);
            if(count($informations) > 0) {
                $msg = "Information fetched successfully";
            } else {
                $msg = "No information added by you";
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
                           "result"         => $informations,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

