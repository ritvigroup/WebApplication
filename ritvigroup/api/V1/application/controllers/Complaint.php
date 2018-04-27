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

    // Get All Department
    public function getAllDepartment() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $department = $this->Complaint_Model->getAllDepartment();
            if(count($department) > 0) {
                $msg = "Department fetched successfully";
            } else {
                $msg = "No department found";
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
                           "result"     => $department,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get all Complaint Types
    public function getAllComplaintType() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $complaint_type = $this->Complaint_Model->getAllComplaintType();
            if(count($complaint_type) > 0) {
                $msg = "Complaint type fetched successfully";
            } else {
                $msg = "No complaint type found";
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
                           "result"     => $complaint_type,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Save Complaint
    public function postMyComplaint() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $ComplaintTypeId        = $this->input->post('complaint_type_id');
        $ComplaintSubject       = $this->input->post('complaint_subject');
        $ComplaintDescription   = $this->input->post('complaint_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');
        $department             = $this->input->post('department');

        $address                = $this->input->post('address');
        $place                  = $this->input->post('place');
        $latitude               = $this->input->post('latitude');
        $longitude              = $this->input->post('longitude');
        
        $ComplaintPrivacy       = $this->input->post('privacy'); // 1 = Public, 0 = Private
        $schedule_date          = $this->input->post('schedule_date');

        $ComplaintStatus = 1;
        if($schedule_date != '') {
            $ScheduleOn = date('Y-m-d 00:00:00', strtotime($schedule_date));
            if(strtotime($ScheduleOn) != strtotime(date('Y-m-d 00:00:00'))) {
                $ComplaintStatus = 0;
            }
        } else {
            $ScheduleOn = date('Y-m-d H:i:s');
        }

        $AssignedTo             = $this->input->post('assign_to_profile_id'); // Assign to Favourite Leader/Sub-Leader

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
                                'ComplaintTypeId'           => $ComplaintTypeId,
                                'ComplaintSubject'          => $ComplaintSubject,
                                'ComplaintDescription'      => $ComplaintDescription,
                                'ApplicantName'             => $ApplicantName,
                                'ApplicantFatherName'       => $ApplicantFatherName,
                                'ApplicantMobile'           => $ApplicantMobile,
                                'ComplaintStatus'           => $ComplaintStatus,
                                'ComplaintDepartment'       => $department,
                                
                                'ComplaintPrivacy'          => $ComplaintPrivacy,

                                'ComplaintPlace'            => $place,
                                'ComplaintAddress'          => $address,
                                'ComplaintLatitude'         => $latitude,
                                'ComplaintLongitude'        => $longitude,
                                
                                'ScheduleOn'                => $ScheduleOn,
                                'AddedBy'                   => $UserProfileId,
                                'UpdatedBy'                 => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
			$ComplaintId = $this->Complaint_Model->saveMyComplaint($insertData);

            if($ComplaintId > 0) {
                
                $this->Complaint_Model->assignComplaintToLeaderSubLeader($ComplaintId, $UserProfileId, $AssignedTo);

                $this->Complaint_Model->saveMyComplaintMembers($ComplaintId, $UserProfileId, $complaint_member);
                
                $this->Complaint_Model->saveMyComplaintAttachment($ComplaintId, $UserProfileId, $_FILES['file']);

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

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
                           "result"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Complaint Invitation
    public function updateComplaintInvitations() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintId        = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $InvitationAccept = $this->Complaint_Model->updateComplaintInvitations($UserProfileId, $ComplaintId);

            if($InvitationAccept == true) {
                
                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Complaint invitation accepted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Error occured";
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
                           "result"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Reject Complaint Invitation
    public function rejectComplaintInvitations() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintId        = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $InvitationAccept = $this->Complaint_Model->rejectComplaintInvitations($UserProfileId, $ComplaintId);

            if($InvitationAccept == true) {
                
                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Complaint invitation rejected successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Error occured";
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
                           "status"   => 'success',
                           "result"   => $complaint_detail,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    // Get Complaint Detail By Unique Id
    public function getComplaintDetailByUniqueId() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintUniqueId  = $this->input->post('complaint_unique_id');


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintUniqueId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $complaint_detail = $this->Complaint_Model->getComplaintDetailByUniqueId($ComplaintUniqueId, $UserProfileId);

            if(count($complaint_detail) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "Complaint not found";
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
                           "result"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Complaint Detail
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

            $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

            if(count($complaint_detail) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "Complaint not found";
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
                           "result"   => $complaint_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Complaint
    public function getMyAllComplaint() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getMyAllComplaint($UserProfileId);
            //$associated_complaints = $this->Complaint_Model->getAllComplaintWhereMyselfAssociated($UserProfileId);

            //$complaints = array_merge($complaints, $associated_complaints);
            if(count($complaints) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "No complaint added by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $complaints,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // get All Complaint Where Myself Associated
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
                           "result"   => $complaints,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get All Assiged Complaint To Me [LEADER]
    public function getAllAssignedComplaintToMe() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getAllAssignedComplaintToMe($UserProfileId);
            if(count($complaints) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "No complaint assigned to you";
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
                           "result"     => $complaints,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Save COmplaint History
    public function saveComplaintHistory() {
        $error_occured = false;

        $UserProfileId              = $this->input->post('user_profile_id');
        $ComplaintId                = $this->input->post('complaint_id');
        $ParentComplaintHistoryId   = $this->input->post('history_id');
        $HistoryTitle               = $this->input->post('title');
        $HistoryDescription         = $this->input->post('description');
        
        $current_status             = $this->input->post('current_status');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please enter complaint id";
            $error_occured = true;
        } else if($HistoryTitle == "") {
            $msg = "Please enter title";
            $error_occured = true;
        } else if($HistoryDescription == "") {
            $msg = "Please enter description";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $ParentComplaintHistoryId = ($ParentComplaintHistoryId > 0) ? $ParentComplaintHistoryId : 0;

            $insertData = array(
                                'ComplaintId'               => $ComplaintId,
                                'ParentComplaintHistoryId'  => $ParentComplaintHistoryId,
                                'HistoryTitle'              => $HistoryTitle,
                                'HistoryDescription'        => $HistoryDescription,
                                'HistoryStatus'             => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                            );
            $ComplaintHistoryId = $this->Complaint_Model->saveMyComplaintHistory($insertData);

            if($ComplaintHistoryId > 0) {

                $this->Complaint_Model->saveMyComplaintHistoryAttachment($ComplaintHistoryId, $UserProfileId, $_FILES['file']);

                $this->Complaint_Model->updateComplaint($UserProfileId, $ComplaintId, $current_status);

                $complaint_history_detail = $this->Complaint_Model->getComplaintHistoryDetail($ComplaintHistoryId, $UserProfileId);
                
                $this->db->query("COMMIT");

                $msg = "Complaint history saved successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Complaint history not saved. Error occured";
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
                           "result"     => $complaint_history_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Complaint History
    public function getComplaintHistory() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $ComplaintId     = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $complaint_history_detail = $this->Complaint_Model->getComplaintHistory($ComplaintId, $UserProfileId);

            if(count($complaint_history_detail) > 0) {
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "Complaint not found";
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
                           "result"     => $complaint_history_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

