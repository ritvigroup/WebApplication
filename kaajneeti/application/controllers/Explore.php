<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

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


    public function explore() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $this->session->set_userdata('explore_start', 0);

        $_POST['start'] = $this->session->userdata('explore_start');
        $json_encode = post_curl(API_CALL_PATH.'leader/getAllHomePageData', $this->input->post(), $this->curl);

        
        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_encode);
        // echo '</pre>';

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('explore/explore',$data);
    }


    public function explorefeed() {

        if (!$this->input->is_ajax_request()) {
            exit();
        }

        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->session->set_userdata('explore_start', ($this->session->userdata('explore_start') + 10));
        

        $_POST['start'] = (($this->session->userdata('explore_start') > 0) ? $this->session->userdata('explore_start') : 0);
        $json_encode = post_curl(API_CALL_PATH.'leader/getAllHomePageData', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        $this->load->view('explore/explorefeed', $data);
    }


    public function likePost() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['post_id'] = $this->input->post('post_id');
        $json_encode = post_curl(API_CALL_PATH.'post/likePost', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function unlikePost() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['post_id'] = $this->input->post('post_id');
        $json_encode = post_curl(API_CALL_PATH.'post/unlikePost', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function likePoll() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_id'] = $this->input->post('poll_id');
        $json_encode = post_curl(API_CALL_PATH.'poll/likePoll', $this->input->post(), $this->curl);

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_encode);
        // die;
        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function unlikePoll() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_id'] = $this->input->post('poll_id');
        $json_encode = post_curl(API_CALL_PATH.'poll/unlikePoll', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function likeEvent() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['event_id'] = $this->input->post('event_id');
        $json_encode = post_curl(API_CALL_PATH.'event/likeEvent', $this->input->post(), $this->curl);

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_encode);
        // die;
        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function unlikeEvent() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['event_id'] = $this->input->post('event_id');
        $json_encode = post_curl(API_CALL_PATH.'event/unlikeEvent', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function likeComplaint() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['complaint_id'] = $this->input->post('complaint_id');
        $json_encode = post_curl(API_CALL_PATH.'complaint/likeComplaint', $this->input->post(), $this->curl);

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_encode);
        // die;
        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function unlikeComplaint() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['complaint_id'] = $this->input->post('complaint_id');
        $json_encode = post_curl(API_CALL_PATH.'complaint/unlikeComplaint', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        echo $json_decode->result;
    }


    public function commentPoll() {

        if (!$this->input->is_ajax_request()) {
            exit();
        }


        $data = array();

        if($this->input->post('save_poll') == 'Y') {
            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');          

            $_POST['poll_id'] = $this->input->post('poll_id');
            $_POST['poll_id'] = $this->input->post('enter_your_comment');
            $json_encode = post_curl(API_CALL_PATH.'leader/getAllHomePageData', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;
            }
        }

        $this->load->view('explore/comment', $data);
    }

}
