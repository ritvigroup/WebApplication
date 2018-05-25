<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');


        $this->device_token 	= $_POST['device_token'] 	= gethostname();
        $this->location_lant 	= $_POST['location_lant'] 	= getRealIpAddr();
        $this->location_long 	= $_POST['location_long'] 	= getRealIpAddr();
        $this->device_name 		= $_POST['device_name'] 	= getBrowser();
        $this->device_os 		= $_POST['device_os'] 		= getOS();
       

    }
    
    public function index() {
        if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }
        $this->load->view('leader/login',$data);
    }
    

    public function fblogin() {
    	if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            // Insert or update user data
            $userID = $this->user->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

        $data = array();
        $this->load->view('leader/login',$data);
    }


    public function login(){
        $data = array();

        if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->method(TRUE) == "POST") {

            $_POST['login_type'] = 2;

            $json = post_curl(API_CALL_PATH.'userlogin/loginUsernamePassword', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            
            if($json_decode->status == "success") {

                $UserId = $json_decode->result->UserId;
                $UserProfileId = $json_decode->result->UserProfileId;
                $FirstName = $json_decode->result->FirstName;
                $LastName = $json_decode->result->LastName;

                $Name = $FirstName.' '.$LastName;
                $UserProfilePic = ($json_decode->result->ProfilePhotoPath != '') ? $json_decode->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                
                if($UserProfileId > 0) {
                    $this->session->set_userdata('UserId', $UserId);
                    $this->session->set_userdata('Name', $Name);
                    $this->session->set_userdata('UserProfilePic', $UserProfilePic);
                    $this->session->set_userdata('UserProfileId', $UserProfileId);
                }
            } else {
                
            }
            header('Content-type: application/json');
            echo $json;
            return false;
        }
        $this->load->view('leader/login',$data);
    }


    public function register() {
    	if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->method(TRUE) == "POST") {

            $json = post_curl(API_CALL_PATH.'userregister/registerFromWebsite', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            if($json_decode->status == "success") {

                $UserId = $json_decode->result->UserId;
                
                if($UserId > 0) {
                    $UserProfileId   = $json_decode->result->UserProfileCitizen->UserProfileId;

                    $this->session->set_userdata('UserId', $UserId);
                    $this->session->set_userdata('UserProfileId', $UserProfileId);
                   
                }
            } else {
                
            }
            header('Content-type: application/json');
            echo $json;
            return false;
        }
        $data = array();
        $this->load->view('leader/register',$data);
    }


    public function forgot(){
        if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->method(TRUE) == "POST") {

            $json = post_curl(API_CALL_PATH.'forgot/forgotPassword', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            if($json_decode->status == "success") {

            } else {
                
            }
            echo $json_decode;
            return false;
        }
        $data = array();
        $this->load->view('leader/forgot',$data);
    }


    public function resetpassword(){
        if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }


        if($this->input->method(TRUE) == "POST") {

            $json = post_curl(API_CALL_PATH.'forgot/updatePassword', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            if($json_decode->status == "success") {

            } else {
                
            }
            header('Content-type: application/json');
            echo $json;
            return false;
        }

        
        $data = array();
        $data['reset_password'] = $this->uri->segment(3);
        $this->load->view('leader/resetpassword',$data);
    }
        
      
    public function logout() {
		$this->session->set_userdata(array(
			'UserId'		=> '',
		));
            
        $this->session->unset_userdata('UserId');
		$this->session->unset_userdata('UserProfileId');
		$this->session->sess_destroy();
		redirect('leader/login');
	}


	public function fblogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('UserId');
        $this->session->unset_userdata('UserProfileId');
        $this->session->sess_destroy();
        // Redirect to login page
        redirect('leader/login');
    }


    public function home() {

        if(($this->session->userdata('UserId')) > 0) { 
        } else {
            redirect('leader/login');
        }

        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $json_encode = post_curl(API_CALL_PATH.'leader/getAllHomePageData', $this->input->post(), $this->curl);
        
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        
        $this->load->view('leader/home',$data);
    }

    
    public function dashboard() {

        if(($this->session->userdata('UserId')) > 0) { 
        } else {
            redirect('leader/login');
        }
        

        $data = array();
        $this->load->view('leader/dashboard',$data);
    }


    public function setting() {
        $data = array();
        $this->load->view('leader/setting',$data);
    }


    public function switch_profile() {
        $data = array();
        $this->load->view('leader/switch_profile',$data);
    }


    public function searchLeaderProfiles($option = true) {

        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        if($this->session->userdata('UserId') > 0) {
            $_POST['user_id'] = $this->session->userdata('UserId');
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            $json = post_curl(API_CALL_PATH.'userprofile/searchLeaderProfiles', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            
            if($option == true) {
                $options = '';
                $UserProfileLeader = $json_decode->result->UserProfileLeader;
                foreach($UserProfileLeader AS $LeaderProfile) {
                    $options .= '<option value="'.$LeaderProfile->UserProfileId.'">'.$LeaderProfile->FirstName. ' '.$LeaderProfile->LastName .'</option>';
                }
                echo $options;
            } else {
                echo $json;
            }
            
        } else {
            return false;
        }
    }
}
