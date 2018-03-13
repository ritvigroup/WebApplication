<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User dashboard Management
*/

class Userdashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function userCitizenDashboard() {
		$error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
			$msg = "Please enter user";
			$error_occured = true;
		} else {
            $user_dashboard = $this->User_Model->getUserCitizenDashboard($UserId);
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "user_dashboard"	=> $user_dashboard,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }        
}
