<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Controller {

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
    

    public function suggestion() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getMyAllSuggestion', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('suggestion/suggestion',$data);
    }


    public function newsuggestion() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

            $json_decode = post_curl(API_CALL_PATH.'suggestion/postMySuggestion', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $this->load->view('suggestion/new',$data);
    }

}
