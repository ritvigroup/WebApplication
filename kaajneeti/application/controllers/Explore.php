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
            $data['Explore'] = $json_decode;
        }

        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['MyProfile'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriendRequest', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
        
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
            $data['Explore'] = $json_decode;
            $this->load->view('explore/explorefeed', $data);
        } else {
            echo "";
        }
        
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
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');          

        $_POST['poll_id'] = $this->input->post('poll_id');

        if($this->input->post('save_comment') == 'Y') {
            
            $_POST['your_comment'] = $this->input->post('your_comment');

            $json_encode = post_curl_with_files(API_CALL_PATH.'poll/savePollComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        } else if($this->input->post('delete_comment') == 'Y') {
            
            $_POST['comment_id'] = $this->input->post('comment_id');

            $json_encode = post_curl_with_files(API_CALL_PATH.'poll/deletePollComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        }

        
        $json_encode = post_curl(API_CALL_PATH.'poll/getAllPollComment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['result'] = $json_decode->result;
        }
        $data['poll_id'] = $this->input->post('poll_id');

        $this->load->view('explore/commentPoll', $data);
    }

    public function commentPost() {

        if (!$this->input->is_ajax_request()) {
            exit();
        }


        $data = array();
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');          

        $_POST['post_id'] = $this->input->post('post_id');

        if($this->input->post('save_comment') == 'Y') {
            
            $_POST['your_comment'] = $this->input->post('your_comment');

            $json_encode = post_curl_with_files(API_CALL_PATH.'post/savePostComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        } else if($this->input->post('delete_comment') == 'Y') {
            
            $_POST['comment_id'] = $this->input->post('comment_id');

            $json_encode = post_curl_with_files(API_CALL_PATH.'post/deletePostComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        }

        
        $json_encode = post_curl(API_CALL_PATH.'post/getAllPostComment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['result'] = $json_decode->result;
        }
        $data['post_id'] = $this->input->post('post_id');

        $this->load->view('explore/commentPost', $data);
    }

    public function commentEvent() {

        if (!$this->input->is_ajax_request()) {
            exit();
        }


        $data = array();
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');          

        $_POST['event_id'] = $this->input->post('event_id');

        if($this->input->post('save_comment') == 'Y') {
            
            $_POST['your_comment'] = $this->input->post('your_comment');

            $json_encode = post_curl_with_files(API_CALL_PATH.'event/saveEventComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        } else if($this->input->post('delete_comment') == 'Y') {
            
            $_POST['comment_id'] = $this->input->post('comment_id');

            $json_encode = post_curl_with_files(API_CALL_PATH.'event/deleteEventComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        }

        
        $json_encode = post_curl(API_CALL_PATH.'event/getAllEventComment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['result'] = $json_decode->result;
        }
        $data['event_id'] = $this->input->post('event_id');

        $this->load->view('explore/commentEvent', $data);
    }

    public function commentComplaint() {

        if (!$this->input->is_ajax_request()) {
            exit();
        }


        $data = array();
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');          

        $_POST['complaint_id'] = $this->input->post('complaint_id');

        if($this->input->post('save_comment') == 'Y') {
            
            $_POST['your_comment'] = $this->input->post('your_comment');

            $json_encode = post_curl_with_files(API_CALL_PATH.'complaint/saveComplaintComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        } else if($this->input->post('delete_comment') == 'Y') {
            
            $_POST['comment_id'] = $this->input->post('comment_id');

            $json_encode = post_curl_with_files(API_CALL_PATH.'complaint/deleteComplaintComment', $this->input->post(), $this->curl);

            header('Content-type: application/json');
            echo $json_encode;
            die;
        }

        
        $json_encode = post_curl(API_CALL_PATH.'complaint/getAllComplaintComment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['result'] = $json_decode->result;
        }
        $data['complaint_id'] = $this->input->post('complaint_id');

        $this->load->view('explore/commentPoll', $data);
    }


    public function participatePollWithAnswer() {
        $data = array();

        if (!$this->input->is_ajax_request()) {
            exit();
        }

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_id'] = $this->input->post('poll_id');
        $_POST['answer_id'] = $this->input->post('poll_answer_id');
        $json_encode = post_curl(API_CALL_PATH.'poll/participatePollWithAnswer', $this->input->post(), $this->curl);

        
        header('Content-type: application/json');
        echo $json_encode;
        die;
    }


    public function saveMyEventInterest() {
        $data = array();

        if (!$this->input->is_ajax_request()) {
            exit();
        }

        if($this->input->post('participate') == 'Y') {
            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            $_POST['event_id'] = $this->input->post('event_id');
            $_POST['interest_type'] = $this->input->post('interest_type');
            $json_encode = post_curl(API_CALL_PATH.'event/saveMyEventInterest', $this->input->post(), $this->curl);

            
            header('Content-type: application/json');
            echo $json_encode;
            die;
        }
    }

}
