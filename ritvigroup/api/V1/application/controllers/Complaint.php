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
        $this->load->model('Notification_Model');

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
        $department             = ($this->input->post('department') > 0) ? $this->input->post('department') : 0;

        $address                = $this->input->post('address');
        $place                  = $this->input->post('place');
        $latitude               = $this->input->post('latitude');
        $longitude              = $this->input->post('longitude');
        
        $ComplaintPrivacy       = ($this->input->post('privacy') != '') ? $this->input->post('privacy') : 1; // 1 = Public, 0 = Private
        $schedule_date          = $this->input->post('schedule_date');

        $ComplaintStatus = 1;
        if($schedule_date != '') {
            $ScheduleOn = date('Y-m-d 00:00:00', strtotime($schedule_date));
            if(strtotime($ScheduleOn) != strtotime(date('Y-m-d 00:00:00'))) {
                //$ComplaintStatus = 0;
            }
        } else {
            $ScheduleOn = date('Y-m-d H:i:s');
        }

        $AssignedTo             = $this->input->post('assign_to_profile_id'); // Assign to Favourite Leader/Sub-Leader

        $complaint_member = $this->input->post('complaint_member'); // Should be multiple in array

        $LocationArray      = $this->input->post('location_detail'); // Location Array Detail


        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($ComplaintSubject == "") {
			$msg = "Please enter some text to subject";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $ComplaintUniqueId = $this->Complaint_Model->generateComplaintUniqueId();

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

                $this->Complaint_Model->saveMyComplaintLocation($ComplaintId, $UserProfileId, $LocationArray);

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

                // Notification Start
                $insertData = array(
                                    'NotificationFeedId'    => $ComplaintId,
                                    'NotificationStatus'    => 1,
                                    'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                    );
                $notification_id = $this->Notification_Model->saveNotification($insertData);

                // Nofification to user
                $insertData = array(
                                    'NotificationId'            => $notification_id,
                                    'NotificationFrom'          => $UserProfileId,
                                    'NotificationTo'            => $AssignedTo,
                                    'NotificationType'          => 'complaint-generated',
                                    'NotificationDescription'   => 'Assigned to you ',
                                    'NotificationSentYesNo'     => 0,
                                    'NotificationReceivedYesNo' => 0,
                                    'NotificationFromToStatus'  => 1,
                                    );

                $this->Notification_Model->saveNotificationFromTo($insertData);

                // Notification Tagged
                foreach($complaint_member AS $member_user_profile_id) {
                    $insertData = array(
                                        'NotificationId'            => $notification_id,
                                        'NotificationFrom'          => $UserProfileId,
                                        'NotificationTo'            => $member_user_profile_id,
                                        'NotificationType'          => 'complaint-tagged',
                                        'NotificationDescription'   => 'Tagged you in a complaint ',
                                        'NotificationSentYesNo'     => 0,
                                        'NotificationReceivedYesNo' => 0,
                                        'NotificationFromToStatus'  => 1,
                                        );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }

                // Notification User Friends and Followers
                $user_friend_followers = $this->User_Model->getMyFriendFollowerList($UserProfileId);

                foreach($user_friend_followers AS $user_friend_follower) {

                    $insertData = array(
                                    'NotificationId'            => $notification_id,
                                    'NotificationFrom'          => $UserProfileId,
                                    'NotificationTo'            => $user_friend_follower['UserProfileId'],
                                    'NotificationType'          => 'complaint-generated',
                                    'NotificationDescription'   => 'Generated a complaint ',
                                    'NotificationSentYesNo'     => 0,
                                    'NotificationReceivedYesNo' => 0,
                                    'NotificationFromToStatus'  => 1,
                                    );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }
                // Notification End

                $msg = "Complaint generated successfully";

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


    // Update My Complaint
    public function updateMyComplaint() {
        $error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $ComplaintId            = $this->input->post('complaint_id');
        $ComplaintTypeId        = $this->input->post('complaint_type_id');
        $ComplaintSubject       = $this->input->post('complaint_subject');
        $ComplaintDescription   = $this->input->post('complaint_description');
        $ApplicantName          = $this->input->post('applicant_name');
        $ApplicantFatherName    = $this->input->post('applicant_father_name');
        $ApplicantMobile        = $this->input->post('applicant_mobile');
        $department             = ($this->input->post('department') > 0) ? $this->input->post('department') : 0;

        $address                = $this->input->post('address');
        $place                  = $this->input->post('place');
        $latitude               = $this->input->post('latitude');
        $longitude              = $this->input->post('longitude');

        $delete_image       = $this->input->post('delete_image');
        $LocationArray      = $this->input->post('location_detail'); // Location Array Detail
        
        // 1 = Public, 0 = Private
        $ComplaintPrivacy       = ($this->input->post('privacy') != '') ? $this->input->post('privacy') : 1; 
        $schedule_date          = $this->input->post('schedule_date');
        $ComplaintStatus        = $this->input->post('status');

        
        $ScheduleOn = date('Y-m-d 00:00:00', strtotime($schedule_date));

        // Assign to Favourite Leader/Sub-Leader
        $AssignedTo             = $this->input->post('assign_to_profile_id'); 

        $complaint_member = $this->input->post('complaint_member'); // Should be multiple in array


        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else if($ComplaintSubject == "") {
            $msg = "Please enter some text to subject";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $my_complaint = $this->Complaint_Model->validateComplaintAddedByMe($ComplaintId, $UserProfileId);

            if($my_complaint == true) {

                $updateData = array(
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
                                    'UpdatedBy'                 => $UserProfileId,
                                    'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                );

                $whereData = array(
                                    'ComplaintId' => $ComplaintId,
                                    'AddedBy' => $UserProfileId,
                                    );
                $update_complaint = $this->Complaint_Model->updateMyComplaint($whereData, $updateData);

                if($ComplaintId > 0) {
                    
                    $this->Complaint_Model->removeMyComplaintLocation($ComplaintId, $UserProfileId);
                    $this->Complaint_Model->removeMyComplaintAttachment($ComplaintId, $delete_image);
                    $this->Complaint_Model->saveMyComplaintLocation($ComplaintId, $UserProfileId, $LocationArray);

                    $this->Complaint_Model->deleteMyComplaintMembers($ComplaintId, $UserProfileId);

                    $this->Complaint_Model->assignComplaintToLeaderSubLeader($ComplaintId, $UserProfileId, $AssignedTo);

                    $this->Complaint_Model->saveMyComplaintMembers($ComplaintId, $UserProfileId, $complaint_member);
                    
                    $this->Complaint_Model->saveMyComplaintAttachment($ComplaintId, $UserProfileId, $_FILES['file']);

                    $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                    $this->db->query("COMMIT");

                    $msg = "Complaint updated successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Complaint not updated. Error occured";
                    $error_occured = true;
                }
            } else {
                $this->db->query("ROLLBACK");
                $msg = "This complaint is not posted by you. You are not authorised to update this complaint";
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


    // Delete Complaint
    public function deleteMyComplaint() {
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

            $updateData = array(
                                'ComplaintStatus'   => -1,
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'AddedBy'   		=> $UserProfileId,
                                'ComplaintId'    	=> $ComplaintId,
                                );
			$complaint_delete = $this->Complaint_Model->updateMyComplaint($whereData, $updateData);

            if($complaint_delete == true) {

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Complaint deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Complaint not delete. Not authorised to delete this complaint";
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
                           "result"   		=> $complaint_detail,
                           "message"        => $msg,
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

                // Notification Start
                $insertData = array(
                                    'NotificationFeedId'    => $ComplaintId,
                                    'NotificationStatus'    => 1,
                                    'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                    );
                $notification_id = $this->Notification_Model->saveNotification($insertData);

                // Nofification to user
                $insertData = array(
                                    'NotificationId'            => $notification_id,
                                    'NotificationFrom'          => $UserProfileId,
                                    'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                    'NotificationType'          => 'complaint-invitation-accepted',
                                    'NotificationDescription'   => 'Complaint tagged invitation accepted ',
                                    'NotificationSentYesNo'     => 0,
                                    'NotificationReceivedYesNo' => 0,
                                    'NotificationFromToStatus'  => 1,
                                    );

                $this->Notification_Model->saveNotificationFromTo($insertData);
                // Notification End


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

                // Notification Start
                $insertData = array(
                                    'NotificationFeedId'    => $ComplaintId,
                                    'NotificationStatus'    => 1,
                                    'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                    );
                $notification_id = $this->Notification_Model->saveNotification($insertData);

                // Nofification to user
                $insertData = array(
                                    'NotificationId'            => $notification_id,
                                    'NotificationFrom'          => $UserProfileId,
                                    'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                    'NotificationType'          => 'complaint-invitation-rejected',
                                    'NotificationDescription'   => 'Complaint tagged invitation rejected ',
                                    'NotificationSentYesNo'     => 0,
                                    'NotificationReceivedYesNo' => 0,
                                    'NotificationFromToStatus'  => 1,
                                    );

                $this->Notification_Model->saveNotificationFromTo($insertData);
                // Notification End

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
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getMyAllComplaint($UserProfileId, $FriendProfileId);
            //$associated_complaints = $this->Complaint_Model->getAllComplaintWhereMyselfAssociated($UserProfileId);

            //$complaints = array_merge($complaints, $associated_complaints);

            

            if(count($complaints) > 0) {

                $complaint = array();

                foreach($complaints AS $complaint_arr) {
                    $complaint[] = array(
                                        'feedtype' => 'complaint',
                                        'complaintdata' => $complaint_arr,
                                        );
                }
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
                           "result"     => $complaint,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My All Complaint
    public function getMyAllComplaintAndWhereITagged() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getMyAllComplaintAndWhereITagged($UserProfileId, $FriendProfileId);

            if(count($complaints) > 0) {

                $complaint = array();

                foreach($complaints AS $complaint_arr) {
                    $complaint[] = array(
                                        'feedtype' => 'complaint',
                                        'complaintdata' => $complaint_arr,
                                        );
                }
                $msg = "Complaint fetched successfully";
            } else {
                $msg = "No complaint found";
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
                           "result"     => $complaint,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // get All Complaint Where Myself Associated
    public function getAllComplaintWhereMyselfAssociated() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $complaints = $this->Complaint_Model->getAllComplaintWhereMyselfAssociated($UserProfileId, $FriendProfileId);
            if(count($complaints) > 0) {

                $complaint = array();

                foreach($complaints AS $complaint_arr) {
                    $complaint[] = array(
                                        'feedtype' => 'complaint',
                                        'complaintdata' => $complaint_arr,
                                        );
                }
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
                           "status"     => 'success',
                           "result"     => $complaint,
                           "message"    => $msg,
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


    // Accept / Reject Complaint From Leader
    public function saveAcceptRejectComplaintFromLeader() {
        $error_occured = false;

        $UserProfileId     = $this->input->post('user_profile_id');
        $ComplaintId       = $this->input->post('complaint_id');   
        $current_status    = $this->input->post('current_status'); // 3 = Declined, 2 = Accepted


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please enter complaint id";
            $error_occured = true;
        } else if($current_status == "") {
            $msg = "Please select accept or reject complaint";
            $error_occured = true;
        } else {

            if($current_status == 2) {
                $complaint_status = $this->Complaint_Model->getComplaintStatusDetail($current_status);

                if($complaint_status['StatusName'] != '') {
                    $HistoryTitle = $complaint_status['StatusName'];
                    $HistoryDescription = $complaint_status['StatusName']. ' your complaint';

                    $notification_type = "complaint-accepted";
                } else {
                    $HistoryTitle = 'Declined';
                    $HistoryDescription = $HistoryTitle. ' your complaint';

                    $notification_type = "complaint-declined";
                }
            } else {
                $HistoryTitle = 'Declined';
                $HistoryDescription = $HistoryTitle. ' your complaint';

                $notification_type = "complaint-declined";
            }

            $this->db->query("BEGIN");

            $insertData = array(
                                'ComplaintId'               => $ComplaintId,
                                'ParentComplaintHistoryId'  => 0,
                                'HistoryTitle'              => $HistoryTitle,
                                'HistoryDescription'        => $HistoryDescription,
                                'HistoryStatus'             => 1,
                                'AddedBy'                   => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                            );
            $ComplaintHistoryId = $this->Complaint_Model->saveMyComplaintHistory($insertData);

            if($ComplaintHistoryId > 0) {

                $this->Complaint_Model->updateComplaint($UserProfileId, $ComplaintId, $current_status);

                $complaint_history_detail = $this->Complaint_Model->getComplaintHistoryDetail($ComplaintHistoryId, $UserProfileId);
                
                $this->db->query("COMMIT");


                // For Notification Start
                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $insertData = array(
                                    'NotificationFeedId'    => $ComplaintId,
                                    'NotificationStatus'    => 1,
                                    'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                    );
                $notification_id = $this->Notification_Model->saveNotification($insertData);

                // Nofification to user generated complaint
                $insertData = array(
                                    'NotificationId'            => $notification_id,
                                    'NotificationFrom'          => $UserProfileId,
                                    'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                    'NotificationType'          => $notification_type,
                                    'NotificationDescription'   => $HistoryDescription,
                                    'NotificationSentYesNo'     => 0,
                                    'NotificationReceivedYesNo' => 0,
                                    'NotificationFromToStatus'  => 1,
                                    );

                $this->Notification_Model->saveNotificationFromTo($insertData);

                // Notification Tagged
                foreach($complaint_detail['ComplaintMember'] AS $member_user_profile_id) {
                    $insertData = array(
                                        'NotificationId'            => $notification_id,
                                        'NotificationFrom'          => $UserProfileId,
                                        'NotificationTo'            => $member_user_profile_id,
                                        'NotificationType'          => $notification_type,
                                        'NotificationDescription'   => $HistoryDescription,
                                        'NotificationSentYesNo'     => 0,
                                        'NotificationReceivedYesNo' => 0,
                                        'NotificationFromToStatus'  => 1,
                                        );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }

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
        /*} else if($HistoryTitle == "") {
            $msg = "Please enter title";
            $error_occured = true;*/
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

                // Notification Start
                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);
                if($complaint_detail['ComplaintProfile']['UserProfileId'] != $UserProfileId) {

                    $insertData = array(
                                        'NotificationFeedId'    => $ComplaintId,
                                        'NotificationStatus'    => 1,
                                        'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                        );
                    $notification_id = $this->Notification_Model->saveNotification($insertData);

                    if($current_status == 3) {
                        $notification_type = "complaint-rejected";
                        $notification_description = "Rejected your complaint ";
                    } else {
                        $notification_type = "complaint-status-updated";
                        $notification_description = "Complaint status updated ";
                    }

                    // Nofification to user
                    $insertData = array(
                                        'NotificationId'            => $notification_id,
                                        'NotificationFrom'          => $UserProfileId,
                                        'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                        'NotificationType'          => $notification_type,
                                        'NotificationDescription'   => $notification_description,
                                        'NotificationSentYesNo'     => 0,
                                        'NotificationReceivedYesNo' => 0,
                                        'NotificationFromToStatus'  => 1,
                                        );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }
                // Notification End

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


    // Copy Complaint To Some Other Leader
    public function copyMyComplaint() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $OldComplaintId     = $this->input->post('complaint_id');
        $AssignedTo         = $this->input->post('assign_to_profile_id'); // Assign to Favourite Leader/Sub-Leader
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($OldComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else if($AssignedTo == "") {
            $msg = "Please select a leader to assign this complaint";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $ComplaintUniqueId = $this->Complaint_Model->generateComplaintUniqueId();

            $complaint_detail = $this->Complaint_Model->getComplaintDetail($OldComplaintId, $UserProfileId);

            $insertData = array(
                                'ComplaintUniqueId'         => $ComplaintUniqueId,
                                'ComplaintTypeId'           => $complaint_detail['ComplaintTypeId'],
                                'ComplaintSubject'          => $complaint_detail['ComplaintSubject'],
                                'ComplaintDescription'      => $complaint_detail['ComplaintDescription'],
                                'ApplicantName'             => $complaint_detail['ApplicantName'],
                                'ApplicantFatherName'       => $complaint_detail['ApplicantFatherName'],
                                'ApplicantMobile'           => $complaint_detail['ApplicantMobile'],
                                'ComplaintStatus'           => $complaint_detail['ComplaintStatus'],
                                'ComplaintDepartment'       => $complaint_detail['department'],
                                
                                'ComplaintPrivacy'          => $complaint_detail['ComplaintPrivacy'],

                                'ComplaintPlace'            => $complaint_detail['place'],
                                'ComplaintAddress'          => $complaint_detail['address'],
                                'ComplaintLatitude'         => $complaint_detail['latitude'],
                                'ComplaintLongitude'        => $complaint_detail['longitude'],
                                
                                'ScheduleOn'                => date('Y-m-d H:i:s'),
                                'AddedBy'                   => $UserProfileId,
                                'UpdatedBy'                 => $UserProfileId,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                                'UpdatedOn'                 => date('Y-m-d H:i:s'),
                            );
            $ComplaintId = $this->Complaint_Model->saveMyComplaint($insertData);

            if($ComplaintId > 0) {
                
                $this->Complaint_Model->assignComplaintToLeaderSubLeader($ComplaintId, $UserProfileId, $AssignedTo);
                
                $this->Complaint_Model->copyMyComplaintMembers($OldComplaintId, $ComplaintId, $UserProfileId);
                
                $this->Complaint_Model->copyMyComplaintAttachment($OldComplaintId, $ComplaintId, $UserProfileId);

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Complaint copied successfully";

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
                           "status"         => 'success',
                           "result"         => $complaint_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Like Complaint
    public function likeComplaint() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintId             = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint to like";
            $error_occured = true;
        } else {

            $complaint_like = $this->Complaint_Model->likeComplaint($UserProfileId, $ComplaintId);

            if($complaint_like > 0) {
                $msg = "Complaint liked successfully";

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                // Notification Start
                if($complaint_detail['ComplaintProfile']['UserProfileId'] != $UserProfileId) {
                    $insertData = array(
                                        'NotificationFeedId'    => $ComplaintId,
                                        'NotificationStatus'    => 1,
                                        'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                        );
                    $notification_id = $this->Notification_Model->saveNotification($insertData);

                    $insertData = array(
                                        'NotificationId'            => $notification_id,
                                        'NotificationFrom'          => $UserProfileId,
                                        'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                        'NotificationType'          => 'complaint-liked',
                                        'NotificationDescription'   => 'liked your complaint',
                                        'NotificationSentYesNo'     => 0,
                                        'NotificationReceivedYesNo' => 0,
                                        'NotificationFromToStatus'  => 1,
                                        );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }
                // Notification End

            } else {
                $msg = "Complaint not like. Not authorised to like this complaint.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                            "result"         => $complaint_like,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $complaint_like,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Dislike Complaint
    public function unlikeComplaint() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintId             = $this->input->post('complaint_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint to like";
            $error_occured = true;
        } else {

            $complaint_unlike = $this->Complaint_Model->unlikeComplaint($UserProfileId, $ComplaintId);

            if($complaint_unlike > 0) {
                $msg = "Complaint unliked successfully";
            } else {
                $msg = "Complaint not unlike. Not authorised to unlike this complaint.";
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
                           "result"         => $complaint_unlike,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Save Complaint Comment
    public function saveComplaintComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintId             = $this->input->post('complaint_id');
        $CommentText        = $this->input->post('your_comment');


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else if($CommentText == "") {
            $msg = "Please enter your comment";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'ComplaintId'        => $ComplaintId,
                                'UserProfileId' => $UserProfileId,
                                'CommentText'   => $CommentText,
                                'CommentPhoto'  => '',
                                'ParentId'      => '0',
                                'CommentStatus' => '1',
                                'CommentOn'     => date('Y-m-d H:i:s'),
                            );

            $CommentId = $this->Complaint_Model->saveComplaintComment($insertData);

            if($CommentId > 0) {

                
                //$this->Complaint_Model->saveComplaintCommentImage($ComplaintId, $_FILES['commment_file']);
               
                $this->db->query("COMMIT");

                $comment_detail = $this->Complaint_Model->getComplaintCommentDetail($ComplaintId, $CommentId, $UserProfileId);

                $complaint_detail = $this->Complaint_Model->getComplaintDetail($ComplaintId, $UserProfileId);

                // Notification Start
                if($complaint_detail['ComplaintProfile']['UserProfileId'] != $UserProfileId) {
                    $insertData = array(
                                        'NotificationFeedId'    => $ComplaintId,
                                        'NotificationStatus'    => 1,
                                        'NotificationAddedOn'   => date('Y-m-d H:i:s'),
                                        );
                    $notification_id = $this->Notification_Model->saveNotification($insertData);

                    $insertData = array(
                                        'NotificationId'            => $notification_id,
                                        'NotificationFrom'          => $UserProfileId,
                                        'NotificationTo'            => $complaint_detail['ComplaintProfile']['UserProfileId'],
                                        'NotificationType'          => 'complaint-commented',
                                        'NotificationDescription'   => 'commented on your complaint',
                                        'NotificationSentYesNo'     => 0,
                                        'NotificationReceivedYesNo' => 0,
                                        'NotificationFromToStatus'  => 1,
                                        );

                    $this->Notification_Model->saveNotificationFromTo($insertData);
                }
                // Notification End

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

    // Get All Complaint Comments
    public function getAllComplaintComment() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $ComplaintId         = $this->input->post('complaint_id');
        $Start          = $this->input->post('start');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintId == "") {
            $msg = "Please select complaint";
            $error_occured = true;
        } else {

            $comments = $this->Complaint_Model->getAllComplaintComment($ComplaintId, $UserProfileId, $total_list = 0);
            if(count($comments) > 0) {
                $msg = "Complaint comments fetched successfully";
            } else {
                $msg = "No complaint comment found";
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

    // Delete comment on complaint
    public function deleteComplaintComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $ComplaintCommentId      = $this->input->post('comment_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ComplaintCommentId == "") {
            $msg = "Please select complaint comment to delete";
            $error_occured = true;
        } else {

            $complaint_comment_delete = $this->Complaint_Model->deleteComplaintComment($UserProfileId, $ComplaintCommentId);

            if($complaint_comment_delete > 0) {
                $msg = "Complaint comment deleted successfully";
            } else {
                $msg = "Complaint comment not able to delete. Not authorised to delete this complaint comment.";
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
                           "result"         => $complaint_comment_delete,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

