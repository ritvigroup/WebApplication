<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Plan Management
*/

class Plan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Plan_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getAllNonDefaultUserType() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $user_type_detail = $this->Plan_Model->getAllNonDefaultUserType();

            if(count($user_type_detail) > 0) {
                $msg = "User type fetched successfully";
            } else {
                $msg = "User type not found";
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
                           "status"        => 'success',
                           "result"        => $user_type_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getAllVehicle() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $vehicle_detail = $this->Plan_Model->getAllVehicle();

            if(count($vehicle_detail) > 0) {
                $msg = "Vehicle fetched successfully";
            } else {
                $msg = "Vehicle not found";
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
                           "status"        => 'success',
                           "result"        => $vehicle_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getAllFund() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $fund_detail = $this->Plan_Model->getAllFund();

            if(count($fund_detail) > 0) {
                $msg = "Fund fetched successfully";
            } else {
                $msg = "Fund not found";
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
                           "status"        => 'success',
                           "result"        => $fund_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function searchCity() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $search_text    = $this->input->post('search_text');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($search_text == "") {
            $msg = "Please type to search";
            $error_occured = true;
        } else {

            $city_detail = $this->Plan_Model->searchCity($search_text, $UserProfileId);

            if(count($city_detail) > 0) {
                $msg = "City fetched successfully";
            } else {
                $msg = "City not found";
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
                           "status"        => 'success',
                           "result"        => $city_detail,
                           "message"       => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    

}

