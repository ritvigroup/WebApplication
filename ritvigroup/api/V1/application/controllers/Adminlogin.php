<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User login Management
*/

class Adminlogin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


	public function loginUsernamePassword() {
		$error_occured = false;
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $login_type     = $this->input->post('login_type');
        
        if($username == "") {
            $msg = "Please enter your username";
            $error_occured = true;
        } else if($password == "") {
            $msg = "Please enter your password";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->verifyAdminUsernamePassword($username, $password);

            if($res_u['UserStatus'] == '1') {
                
                $AdminId = $res_u['AdminId'];

                $updateData = array(
                    'LoginStatus' => 1,
                );
                
                $this->User_Model->updateAdminLoginStatus($AdminId, $updateData);

                $admin_profile = $this->User_Model->getAdminInformation($AdminId);

                $msg = "Admin logged in successfully";
            } else {
                $msg = "Error: Either username or password incorrect";
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
                           "result"	        => $admin_profile,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
        
}
