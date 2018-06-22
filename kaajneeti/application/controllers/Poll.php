<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poll extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
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
    

    public function poll() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'poll/getMyAllPoll', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('poll/poll',$data);
    }


    public function pollDetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_unique_id'] = $this->input->post('poll_unique_id');

        $json_encode = post_curl(API_CALL_PATH.'poll/getPollDetailByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('poll/polldetail',$data);
    }


    public function newpoll() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

            $json_decode = post_curl(API_CALL_PATH.'poll/saveMyPoll', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $this->load->view('poll/new',$data);
    }

}
