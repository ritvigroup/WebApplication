<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Role Management
*/

class Role extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Role_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }

    
    public function getMyAllUserRole() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $role = $this->Role_Model->getMyAllUserRole($UserProfileId);
            if(count($role) > 0) {
                $msg = "Role fetched successfully";
            } else {
                $msg = "No role found";
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
                           "result"     => $role,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllUserRoleWithDefault() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $role = $this->Role_Model->getMyAllUserRoleWithDefault($UserProfileId);
            if(count($role) > 0) {
                $msg = "Role fetched successfully";
            } else {
                $msg = "No role found";
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
                           "result"     => $role,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveMyUserRole() {
		$error_occured = false;

        $UserProfileId        = $this->input->post('user_profile_id');
        $role_name            = $this->input->post('role_name');
        $role_description     = $this->input->post('role_description');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($role_name == "") {
            $msg = "Please enter user role";
            $error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $role_exist = $this->Role_Model->getUserRoleExistForUser($role_name, $UserProfileId);

            if($role_exist == true) {
                $this->db->query("ROLLBACK");
                $msg = "Role already exist. Please choose another role";
                $error_occured = true;
            } else {

                $insertData = array(
                                    'RoleName'          => $role_name,
                                    'RoleDescription'   => $role_description,
                                    'AddedBy'           => $UserProfileId,
                                    'UpdatedBy'         => $UserProfileId,
                                    'RoleStatus'        => 1,
                                    'IsDefault'         => 0,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );
    			$UserRoleId = $this->Role_Model->saveUserRole($insertData);

                if($UserRoleId > 0) {
                    
                    $role_detail = $this->Role_Model->getUserRoleDetail($UserRoleId);

                    $this->db->query("COMMIT");

                    $msg = "Role saved successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Role not saved. Error occured";
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
                           "result"     => $role_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

