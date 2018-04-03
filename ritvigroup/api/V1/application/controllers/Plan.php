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


    public function getAllStateCity() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $city_detail = $this->Plan_Model->getAllStateCity();

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



    public function searchCityByCityId() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $state_id_city_id    = $this->input->post('state_id_city_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($state_id_city_id == "") {
            $msg = "Please select city";
            $error_occured = true;
        } else {

            $city_detail = $this->Plan_Model->searchCityByCityId($state_id_city_id, $UserProfileId);

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


    public function saveMyLeaderPlan() {
        $error_occured = false;

        $UserProfileId                      = $this->input->post('user_profile_id');
        $UserTypeId                         = $this->input->post('user_type');
        $state_id_city_id                   = $this->input->post('state_id_city_id');
        $exp_state_id_city_id               = @explode('_', $state_id_city_id);
        $target_total_population            = $this->input->post('target_total_population');
        $target_male_population             = $this->input->post('target_male_population');
        $target_female_population           = $this->input->post('target_female_population');
        $target_above_18_30_population      = $this->input->post('target_above_18_30_population');
        $target_above_31_50_population      = $this->input->post('target_above_31_50_population');
        $target_above_51_60_population      = $this->input->post('target_above_51_60_population');
        $target_above_60_population         = $this->input->post('target_above_60_population');
        $target_total_area                  = $this->input->post('target_total_area');
        $male_team_size                     = $this->input->post('male_team_size');
        $female_team_size                   = $this->input->post('female_team_size');
        $total_event                        = $this->input->post('total_event');
        $total_vehicle                      = $this->input->post('total_vehicle');
        $total_budget                       = $this->input->post('total_budget');

        $funds = $this->input->post('funds'); // Should be multiple funds type


        $PlanUniqueId = $this->Plan_Model->generatePlanUniqueId();
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($UserTypeId == "") {
            $msg = "Please select what you want to be";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'PlanUniqueId'      => $PlanUniqueId,
                                'UserProfileId'     => $UserProfileId,
                                'UserTypeId'        => $UserTypeId,
                                'StateId'           => $exp_state_id_city_id[0],
                                'CityId'            => $exp_state_id_city_id[1],                                
                                'TotalTeamMale'     => $male_team_size,
                                'TotalTeamFemale'   => $female_team_size,
                                'TotalBudget'       => $total_budget,
                                'TotalEvent'        => $total_event,
                                'TotalVehicle'      => $total_vehicle,
                                'PlanStatus'        => 1,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );

            $PlanId = $this->Plan_Model->saveMyLeaderPlan($insertData);

            if($PlanId > 0) {
                
                $insertData = array(
                                'PlanId'                => $PlanId,
                                'TotalPopulation'       => $target_total_population,
                                'MalePopulation'        => $target_male_population,
                                'FemalePopulation'      => $target_female_population,
                                'Above18_30Population'  => $target_above_18_30_population,                                
                                'Above31_50Population'  => $target_above_31_50_population,
                                'Above51_60Population'  => $target_above_51_60_population,
                                'Above60Population'     => $target_above_60_population,
                                'TotalArea'             => $target_total_area,
                            );

                $this->Plan_Model->savePlanTargetPopulation($insertData);
                
                $this->Plan_Model->savePlanFund($PlanId, $funds);
                
                $this->db->query("COMMIT");

                $plan_detail = $this->Plan_Model->getPlanDetail($PlanId, $UserProfileId);

                $msg = "Plan added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Plan not saved. Error occured";
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
                           "result"       => $plan_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getPlanDetail($PlanId, $UserProfileId) {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $PlanId          = $this->input->post('plan_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PlanId == "") {
            $msg = "Please select plan";
            $error_occured = true;
        } else {

            $plan_detail = $this->Plan_Model->getPlanDetail($PlanId, $UserProfileId);
            
            if(count($plan_detail) > 0) {
                $msg = "Plan fetched successfully";
            } else {
                $msg = "Plan not found";
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
                           "result"   => $plan_detail,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }



    public function getMyAllPlan() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $plans = $this->Plan_Model->getMyAllPlan($UserProfileId);
            if(count($plans) > 0) {
                $msg = "Plan fetched successfully";
            } else {
                $msg = "No plan added by you";
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
                           "result"     => $plans,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    

}

