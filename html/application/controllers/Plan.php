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
       
        if(($this->session->userdata('UserId')) > 0) {
            
        } else {
            redirect('leader/login');
        }

    }

    public function createPlanYourGoal() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        
        $this->load->view('plan/createPlanYourGoal',$data);
    }
    
    
    public function plan() {
        $data = array();
        
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'plan/getMyAllPlan', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        $this->load->view('plan/plan',$data);
    }

    public function searchCity() {
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        if($this->session->userdata('UserId') > 0) {
            $_POST['state_id_city_id'] = $this->input->post('state_id_city_id');
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
            $json = post_curl(API_CALL_PATH.'plan/searchCity', $this->input->post(), $this->curl);

            echo $json->result;
            
        } else {
            return false;
        }
    }

    public function searchCityByCityId() {
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        if($this->session->userdata('UserId') > 0) {
            $_POST['state_id_city_id'] = $this->input->post('state_id_city_id');
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
            $json = post_curl(API_CALL_PATH.'plan/searchCityByCityId', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);

            echo json_encode($json_decode->result);
            exit();

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
            $data['UserType'] = $json_decode->result;
        }

        $json_encode = post_curl(API_CALL_PATH.'plan/getAllVehicle', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Vehicle'] = $json_decode->result;
        }

        $json_encode = post_curl(API_CALL_PATH.'plan/getAllFund', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Fund'] = $json_decode->result;
        }


        $json_encode = post_curl(API_CALL_PATH.'plan/getAllStateCity', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['City'] = $json_decode->result;
        }


        if($this->input->post('user_type') > 0) {
            $post_data = $this->input->post();
            $funds = array();
            if($post_data['funds'] != '') {
                $exp_funds = explode(',', $post_data['funds']);
                for($i = 0; $i < count($exp_funds); $i++) {
                    if($exp_funds[$i] > 0) {
                        $post_data = array_merge($post_data, array('funds['.$i.']' => $exp_funds[$i]));
                    }
                }
            }

            $json_decode = post_curl_with_files(API_CALL_PATH.'plan/saveMyLeaderPlan', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }

        $data['plan_title'] = $this->input->post('plan_title');

        $this->load->view('plan/createplan',$data);
    }


    public function newplan() {
        $data = array();
        $this->load->view('plan/newplan',$data);
    }


    public function nextScreen() {
        $data = array();
        $data['next_screen'] = $this->input->post('next_screen');
        $this->load->view('plan/nextScreen',$data);
    }

    
}
