<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Systemconfig
*/

class Systemconfig extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getAllSystemConfig() {
        $error_occured = false;
       
        $result = array();
        $sql = "SELECT * FROM `SystemConfig`";
        $query = $this->db->query($sql);
        $res = $query->result_array();

        if(count($res) > 0) {
            foreach($res AS $key => $val) {
            
                $result[] = array(
                                'SystemConfigName' => $val['SystemConfigName'],
                                'SystemConfigValue' => $val['SystemConfigValue'],
                                );
            }
            $msg = "System configuration found";
        }
            
        $array = array(
                       "status"     => 'success',
                       "result"     => $result,
                       "message"    => $msg,
                       );

        displayJsonEncode($array);
    }
}

