<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       
        if($this->session->userdata('UserId') > 0 || $this->session->userdata('AdminId') > 0) {
            
        } else {
            redirect('leader/login');
        }

    }


    public function userdetail() {

        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        
        checkAdminLoggedInAndRedirectLogin();

        $data = array();
        
        if($this->uri->segment(3) != '') {
            
            $_POST['user_unique_id'] = $this->uri->segment(3);
            $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserFullInformationByUniqueId', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;


                $this->load->view('profile/userdetail',$data);


            } else {
                $this->load->view('profile/notfound',$data);
            }

            
        } else {
            $this->load->view('profile/notfound',$data);
        }
    }

    
    public function subprofile() {
        $data = array();
        
        if($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            
            $_POST['unique_profile_id'] = $this->uri->segment(3);
            $_POST['friend_user_profile_id']   = $this->uri->segment(4);
            $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformationUniqueIdCheck', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;
            }

            $this->load->view('profile/subprofile',$data);
        }
    }

    public function profile() {
        $data = array();
        
        if($this->uri->segment(3) != '') {

            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            
            $_POST['unique_profile_id'] = $this->uri->segment(3);
            $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserAllProfileInformationByUniqueProfileId', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;
            }

            $this->load->view('profile/friendprofile',$data);
        } else {
            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');


            if($this->input->method(TRUE) == "POST" && $this->input->post('first_name') != '') {

                $post_data = $this->input->post();

                if($_FILES['file']['name'] != '') {
                    $post_data = array_merge($post_data, array('photo' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
                }

                $json = post_curl_with_files(API_CALL_PATH.'userprofile/updateLeaderProfileSetting', $post_data, $this->curl);

                $json_decode = json_decode($json);
                if($json_decode->status == "success") {

                    $UserProfilePic = ($json_decode->result->ProfilePhotoPath != '') ? $json_decode->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                    
                    if($json_decode->result->ProfilePhotoPath != '') {

                        $this->session->set_userdata('UserProfilePic', $UserProfilePic);
                    }
                }

                header('Content-type: application/json');

                echo $json;

                return false;
            } else if($this->input->method(TRUE) == "POST" && $this->input->post('update_password') == 'Y') {

                $post_data = $this->input->post();

                $json_decode = post_curl_with_files(API_CALL_PATH.'userprofile/updateLeaderPassword', $post_data, $this->curl);

                header('Content-type: application/json');

                echo $json_decode;

                return false;
            } else if($this->input->method(TRUE) == "POST" && $this->input->post('update_contact') == 'Y') {

                $post_data = $this->input->post();

                $json_decode = post_curl_with_files(API_CALL_PATH.'userprofile/updateLeaderContact', $post_data, $this->curl);

                header('Content-type: application/json');

                echo $json_decode;

                return false;
            }

            $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserAllProfileInformation', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;
            }

            /*$json_encode = post_curl(API_CALL_PATH.'leader/getAllHomePageData', $this->input->post(), $this->curl);

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode;
            }*/

            $this->load->view('profile/profile',$data);
        }
    }

    
    public function searchCity() {
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        if($this->session->userdata('UserId') > 0) {
            $_POST['state_id_city_id'] = $this->input->post('state_id_city_id');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
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
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
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

        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
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

        $this->load->view('plan/createplan',$data);
    }

    
}
