<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fleet
*/

class Fleet extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Fleet_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function saveFleet() {
        $error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');

        $FleetName              = $this->input->post('fleet_name');
        $RegistrationNumber     = $this->input->post('registration_number');
        $DriverName             = $this->input->post('driver_name');
        $FleetType              = $this->input->post('vehicle_type');
        $VehicleQuantity        = $this->input->post('vehicle_quantity');

        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FleetName == "") {
            $msg = "Please enter vehicle name";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $fleet_data = array();
            $fleet_data['UserProfileId']        = $UserProfileId;
            $fleet_data['FleetName']            = $FleetName;
            $fleet_data['RegistrationNumber']   = $RegistrationNumber;
            $fleet_data['DriverName']           = $DriverName;
            $fleet_data['FleetType']            = $FleetType;
            $fleet_data['VehicleQuantity']      = $VehicleQuantity;
            $fleet_data['FleetStatus']          = 1;
            $fleet_data['AddedOn']              = date('Y-m-d H:i:s');
            $fleet_data['UpdatedOn']            = date('Y-m-d H:i:s');


            $FleetId = $this->Fleet_Model->saveMyFleet($fleet_data);

            if($FleetId > 0) {

                $this->Fleet_Model->saveFleetImage($FleetId, $UserProfileId, $_FILES['file']);

                $fleet_detail = $this->Fleet_Model->getFleetDetail($FleetId, $UserProfileId);

                $this->db->query("COMMIT");
                $msg = "Fleet saved successfully";
            } else {
                $this->db->query("ROLLBACK");
                $msg = "Fleet not saved. Error occured";
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
                           "result"         => $fleet_detail,
                           "message"        => $msg,
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

            $vehicles = $this->Fleet_Model->getAllVehicle($UserProfileId);
            if(count($vehicles) > 0) {
                $msg = "Vehicles fetched successfully";
            } else {
                $msg = "No vehicle added by you";
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
                           "result"     => $vehicles,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }



    public function getFleetDetail() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $FleetId     = $this->input->post('fleet_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FleetId == "") {
            $msg = "Please select fleet";
            $error_occured = true;
        } else {

            $fleet_detail = $this->Fleet_Model->getFleetDetail($FleetId, $UserProfileId);
            
            if(count($fleet_detail) > 0) {
                $msg = "Fleet fetched successfully";
            } else {
                $msg = "Fleet not found";
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
                           "result"     => $fleet_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllFleet() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $fleets = $this->Fleet_Model->getMyAllFleet($UserProfileId);
            if(count($fleets) > 0) {
                $msg = "Fleet fetched successfully";
            } else {
                $msg = "No fleet added by you";
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
                           "result"     => $fleets,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

