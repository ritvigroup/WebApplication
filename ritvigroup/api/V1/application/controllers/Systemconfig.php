<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Systemconfig
*/

class Systemconfig extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('Systemconfig_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getAllSystemConfig() {
        $error_occured = false;
       
        
        $result = $this->Systemconfig_Model->getSystemConfiguration();

        if(count($result) > 0) {
            $msg = "System configuration found";
        } else {
            $msg = "No configuation set.";
            $error_occured = true;
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $result,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

