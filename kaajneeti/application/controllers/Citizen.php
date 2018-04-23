<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citizen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       
        if(($this->session->userdata('UserId')) > 0) {
            
        } else {
            redirect('leader/login');
        }
    }
    
    public function searchAllUserProfiles() {

        
        $json_decode = post_curl(API_CALL_PATH.'userprofile/searchAllUserProfiles', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_decode);

        return $json_decode;
    }


    public function searchCitizenProfiles($option = true) {

        if($this->session->userdata('UserId') > 0) {
            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
            $json = post_curl(API_CALL_PATH.'userprofile/searchCitizenProfiles', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            
            if($option == true) {
                $options = '';
                $UserProfileCitizen = $json_decode->result->UserProfileCitizen;
                foreach($UserProfileCitizen AS $CitizenProfile) {
                    $options .= '<option value="'.$CitizenProfile->UserProfileCitizen->UserProfileId.'">'.$CitizenProfile->UserProfileCitizen->FirstName. ' '.$CitizenProfile->UserProfileCitizen->LastName .'</option>';
                }
                echo $options;
            } else {
                echo $json;
            }
            
        } else {
            return false;
        }
    }
}
