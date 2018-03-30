<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       

    }
    
    
    public function plan() {
        $data = array();
        $this->load->view('plan/plan',$data);
    }

    public function searchCity() {
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        if($this->session->userdata('UserId') > 0) {
            $_POST['search_text'] = $this->input->post('search_text');
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
            $json = post_curl(API_CALL_PATH.'plan/searchCity', $this->input->post(), $this->curl);

            echo $json->result;
            
        } else {
            return false;
        }
    }


    public function createplan() {
        $data = array();

        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'plan/getAllNonDefaultUserType', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['UserType'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'plan/getAllVehicle', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Vehicle'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'plan/getAllFund', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Fund'] = $json_decode;
        }

        $this->load->view('plan/createplan',$data);
    }

    
}
