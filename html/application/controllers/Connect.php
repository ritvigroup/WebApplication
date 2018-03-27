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


    public function search() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getAllPoliticalParty', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['PoliticalParty'] = $json_decode->result;
        }

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getAllGender', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Gender'] = $json_decode->result;
        }

        $this->load->view('connect/search',$data);
    }


    public function search_result() {
        $data = array();
      
        $error = false;
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $search_text = $this->input->post('search_text');
        $gender = $this->input->post('gender');
        $political_party = $this->input->post('political_party');
        if($search_text != '' && $gender != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'gender'            => $gender,
                                    'political_party'   => $political_party,
                                    );
        } else if($search_text != '' && $gender != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'gender'            => $gender,
                                    );
        } else if($search_text != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'political_party'   => $political_party,
                                    );
        } else if($gender != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'gender'            => $gender,
                                    'political_party'   => $political_party,
                                    );
        } else if($search_text != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    );
        } else if($gender != '') {
            $_POST['search'] = array(
                                    'gender'            => $gender,
                                    );
        } else if($political_party != '') {
            $_POST['search'] = array(
                                    'political_party'   => $political_party,
                                    );
        } else {
            $error = true;
        }

        if($error == false) {
            $json_encode = post_curl(API_CALL_PATH.'userprofile/searchLeaderProfiles', $this->input->post(), $this->curl);

            // echo '<pre>';
            // print_r($json_encode);
            // echo '</pre>';

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode->result;
            }
            $this->load->view('connect/search_result',$data);
        } else {
            echo '';
        }
    }

}
