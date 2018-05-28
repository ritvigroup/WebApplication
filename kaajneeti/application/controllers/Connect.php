<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connect extends CI_Controller {

    public $CI = NULL;

    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        
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
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/sendUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function getNotificationFromUserProfileOnOff() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/getNotificationFromUserProfileOnOff', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function undoUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/undoUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function cancelUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/cancelUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function followUnfollowUserProfile() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/followUnfollowUserProfile', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }
    

    public function connect() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllConnections', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/connect',$data);
    }


    public function leader() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllLeaderConnections', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/leader',$data);
    }


    public function citizen() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllCitizenConnections', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/citizen',$data);
    }


    public function other() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllOtherConnections', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/other',$data);
    }


    public function incoming() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriendRequest', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/incoming',$data);
    }


    public function outgoing() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllRequestToFriends', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/outgoing',$data);
    }


    public function follower() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFollowers', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/follower',$data);
    }


    public function following() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFollowings', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/following',$data);
    }


    public function getNotificationFromGroupOnOff() {
        $_POST['user_id']           = $this->session->userdata('UserId');
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $_POST['group_id']          = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'friendgroup/getNotificationFromGroupOnOff', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }

    public function exitMeFromFriendgroup() {
        $_POST['user_id']           = $this->session->userdata('UserId');
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $_POST['group_id']          = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'friendgroup/exitMeFromFriendgroup', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function group() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->method(TRUE) == "POST" && $this->input->post('save_group') == 'Y') {

            $member = $this->input->post('member_id');
            $member .= ','.$_POST['user_profile_id'];
            $member_exp = explode(',', $member);
            $post_data = array(
                                'user_profile_id'           => $this->input->post('user_profile_id'),
                                'group_name'                => $this->input->post('group_name'),
                                'group_description'         => $this->input->post('group_description'),
                                'group_member'              => $member,
                                );

            if($_FILES['file']['name'] != '') {

                //$post_data = array_merge($post_data, array('file' => '@'.($_FILES['file']['tmp_name']).''));
                $post_data = array_merge($post_data, array('file' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
            }

            $json_decode = post_curl_with_files(API_CALL_PATH.'friendgroup/saveFriendgroup', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        

        $data = array();
        $json_encode = post_curl(API_CALL_PATH.'friendgroup/getMyAllFriendgroup', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        $data['Connections'] = $json_decode;
           


        $_POST['friend_user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Profile'] = $json_decode;
        }
        
        $this->load->view('connect/group',$data);
    }


    public function search() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

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

        $json_encode = post_curl(API_CALL_PATH.'userprofile/searchUserProfilesForConnect', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Connections'] = $json_decode;
        }

        // echo '<pre>';
        // print_r($json_decode);
        // echo '</pre>';

        $this->load->view('connect/search',$data);
    }


    public function searchUserProfiles() {
        $data = array();
      
        $error = false;
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

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
            $json_encode = post_curl(API_CALL_PATH.'userprofile/searchUserProfilesForConnect', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data['Connections'] = $json_decode;
            }

            $this->load->view('connect/search_result',$data);
        } else {
            echo '';
        }
    }

}
