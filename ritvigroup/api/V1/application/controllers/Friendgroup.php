<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Friendgroup
*/

class Friendgroup extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Friendgroup_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }

    // Save Friend Group
    public function saveFriendgroup() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendGroupName    = $this->input->post('group_name');
        $group_member       = $this->input->post('group_member');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendGroupName == "") {
            $msg = "Please enter group name";
            $error_occured = true;
        } else if(count($group_member) < 1) {
            $msg = "Please select group member";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'FriendGroupName'       => $FriendGroupName,
                                'FriendGroupStatus'     => 1,
                                'AddedBy'               => $UserProfileId,
                                'UpdatedBy'             => $UserProfileId,
                                'AddedOn'               => date('Y-m-d H:i:s'),
                                'UpdatedOn'             => date('Y-m-d H:i:s'),
                                );

            $FriendGroupId = $this->Friendgroup_Model->saveFriendgroup($insertData);

            if($FriendGroupId > 0) { 
                $FriendGroupMember = $this->Friendgroup_Model->saveFriendgroupMember($FriendGroupId, $UserProfileId, $group_member);
                $FriendGroupImage = $this->Friendgroup_Model->saveFriendgroupImage($FriendGroupId, $UserProfileId, $_FILES['file']);

                $this->db->query("COMMIT");
                
                $friend_group_detail = $this->Friendgroup_Model->getFriendgroupDetail($FriendGroupId, $UserProfileId);
                $msg = "Group created successfully";
            } else {
                $this->db->query("ROLLBACK");
                $msg = "Group not saved. Error occured";
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
                           "result"     => $friend_group_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Exit From Friend Group
    public function exitMeFromFriendgroup() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendGroupId      = $this->input->post('group_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendGroupId == '') {
            $msg = "Please select group";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $exist_member = $this->Friendgroup_Model->validateMemberInFriendgroup($FriendGroupId, $UserProfileId, $UserProfileId);

            if($exist_member == true) { 

                $delete_member = $this->Friendgroup_Model->deleteMemberFromFriendgroup($FriendGroupId, $UserProfileId, $UserProfileId);

                if($delete_member == true) {
                    $this->db->query("COMMIT");
                    
                    $friend_group_detail = $this->Friendgroup_Model->getFriendgroupDetail($FriendGroupId, $UserProfileId);

                    $msg = "Exist group successfully";
                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Group memeber does not exist. Error occured";
                    $error_occured = true;
                }
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
                           "result"     => $friend_group_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Delete Member From Friend Group
    public function deleteMemberFromFriendgroup() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendGroupId      = $this->input->post('group_id');
        $member_id          = $this->input->post('member_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendGroupId == '') {
            $msg = "Please select group";
            $error_occured = true;
        } else if($member_id == '') {
            $msg = "Please select member";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $exist_member = $this->Friendgroup_Model->validateMemberInFriendgroup($FriendGroupId, $UserProfileId, $member_id);

            if($exist_member == true) { 

                $delete_member = $this->Friendgroup_Model->deleteMemberFromFriendgroup($FriendGroupId, $UserProfileId, $member_id);

                if($delete_member == true) {
                    $this->db->query("COMMIT");
                    
                    $friend_group_detail = $this->Friendgroup_Model->getFriendgroupDetail($FriendGroupId, $UserProfileId);

                    $msg = "Group memeber deleted successfully";
                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Group memeber does not exist. Error occured";
                    $error_occured = true;
                }
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
                           "result"     => $friend_group_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Friend Group
    public function updateFriendGroup() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendGroupId      = $this->input->post('group_id');
        $FriendGroupName    = $this->input->post('group_name');
        $group_member       = $this->input->post('group_member');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendGroupId == "") {
            $msg = "Please select group to update";
            $error_occured = true;
        } else if($FriendGroupName == "") {
            $msg = "Please enter group name";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'FriendGroupName'       => $FriendGroupName,
                                'UpdatedBy'             => $UserProfileId,
                                'UpdatedOn'             => date('Y-m-d H:i:s'),
                                );

            $FriendGroupId = $this->Friendgroup_Model->updateFriendGroup($FriendGroupId, $UserProfileId, $updateData);

            if($FriendGroupId > 0) { 
                $FriendGroupMember = $this->Friendgroup_Model->saveFriendgroupMember($FriendGroupId, $UserProfileId, $group_member);
                $FriendGroupImage = $this->Friendgroup_Model->saveFriendgroupImage($FriendGroupId, $UserProfileId, $_FILES['file']);

                $this->db->query("COMMIT");
                
                $friend_group_detail = $this->Friendgroup_Model->getFriendgroupDetail($FriendGroupId, $UserProfileId);
                $msg = "Group updated successfully";
            } else {
                $this->db->query("ROLLBACK");
                $msg = "Group not saved. Error occured";
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
                           "result"     => $friend_group_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Friend Group Detail
    public function getFriendgroupDetail() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $FriendGroupId      = $this->input->post('group_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendGroupId == "") {
            $msg = "Please select group";
            $error_occured = true;
        } else {

            $group_detail = $this->Friendgroup_Model->getFriendgroupDetail($FriendGroupId, $UserProfileId);
            
            if(count($group_detail) > 0) {
                $msg = "Group fetched successfully";
            } else {
                $msg = "Group not found";
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
                           "result"     => $group_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Friend Group
    public function getMyAllFriendgroup() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $groups = $this->Friendgroup_Model->getMyAllFriendgroup($UserProfileId);
            if(count($groups) > 0) {
                $msg = "Groups fetched successfully";
            } else {
                $msg = "No group added by you";
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
                           "result"     => $groups,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

