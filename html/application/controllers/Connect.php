<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connect extends CI_Controller {

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


    public function sendUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/sendUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function undoUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/undoUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function cancelUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/cancelUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }
    

    public function myfriends() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriends', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/myfriends',$data);
    }


    public function invitation() {
        $data = array();
        
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriendRequest', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/invitation',$data);
    }


    public function requestsent() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllRequestToFriends', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/requestsent',$data);
    }

}
