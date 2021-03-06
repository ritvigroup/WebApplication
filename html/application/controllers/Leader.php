<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       

    }
    
    public function index()
    {
        if(($this->session->userdata('UserId')) > 0)
        {
            redirect('leader/dashboard');
        }
        $this->load->view('leader/login',$data);
    }
    
    public function verify()
	{
        $email = $this->input->post('email');
        $password= $this->input->post('password');
        $data['res'] = $this->login_model->verify($email,$password);
        if(!empty($data['res']))
        {
            $this->session->set_userdata('userid',$data['res']['customer_id']);
            $this->session->set_userdata('firstname',$data['res']['first_name']);
            $this->session->set_userdata('lastname',$data['res']['last_name']);
            $this->session->set_userdata('email',$data['res']['email']);
            redirect(base_url());
        }
        else
        {
            $this->session->set_flashdata('error','Invalid EmailID OR Password. Please Try Again.');
            redirect('leader/login');
        }
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

            $json = post_curl(API_CALL_PATH.'userlogin/loginUsernamePassword', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            if($json_decode->status == "success") {

                $UserId = $json_decode->result->UserId;
                $UserName = $json_decode->result->UserName;
                $UserName = $json_decode->result->UserName;
                $UserProfilePic = ($json_decode->result->ProfilePhotoPath != '') ? $json_decode->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                
                if($UserId > 0) {
                    $CitizenProfileId   = $json_decode->result->UserProfileCitizen->UserProfileId;
                    $LeaderProfileId    = $json_decode->result->UserProfileLeader->UserProfileId;

                    $this->session->set_userdata('UserId', $UserId);
                    $this->session->set_userdata('UserName', $UserName);
                    $this->session->set_userdata('UserProfilePic', $UserProfilePic);
                    $this->session->set_userdata('CitizenProfileId', $CitizenProfileId);
                    $this->session->set_userdata('LeaderProfileId', $LeaderProfileId);


                    
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
                    $CitizenProfileId   = $json_decode->result->UserProfileCitizen->UserProfileId;
                    $LeaderProfileId    = $json_decode->result->UserProfileLeader->UserProfileId;

                    $this->session->set_userdata('UserId', $UserId);
                    $this->session->set_userdata('CitizenProfileId', $CitizenProfileId);
                    $this->session->set_userdata('LeaderProfileId', $LeaderProfileId);


                    
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
        
      
    public function logout()
	{
		$this->session->set_userdata(array(
			'UserId'		=> '',
		));
            
		$this->session->unset_userdata('UserId');
		$this->session->sess_destroy();
		redirect('leader/login');
	}

	public function fblogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('UserId');
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
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

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
    

    public function profile() {
        $data = array();

        if(($this->session->userdata('UserId')) > 0) {
        } else {
        }
        $this->load->view('leader/profile',$data);
    }

    public function team() {
        $data = array();
        $this->load->view('leader/team',$data);
    }

    public function newleader() {
        $data = array();
        $this->load->view('leader/newleader',$data);
    }

    public function citizen() {
        $data = array();
        $this->load->view('leader/citizen',$data);
    }

    public function chat() {
        $data = array();
        $this->load->view('leader/chat',$data);
    }

    public function call() {
        $data = array();
        $this->load->view('leader/call',$data);
    }


    public function complaint() {
        $data = array();
        $this->load->view('leader/complaint',$data);
    }

    public function email() {
        $data = array();
        $this->load->view('leader/email',$data);
    }

    public function sms() {
        $data = array();
        $this->load->view('leader/sms',$data);
    }


    public function notification() {
        $data = array();
        $this->load->view('leader/notification',$data);
    }


    public function livestreaming() {
        $data = array();
        $this->load->view('leader/livestreaming',$data);
    }

    public function event() {
        $data = array();
        $this->load->view('leader/event',$data);
    }


    public function issue() {
        $data = array();
        $this->load->view('leader/issue',$data);
    }


    public function poll() {
        $data = array();
        $this->load->view('leader/poll',$data);
    }


    public function social() {
        $data = array();
        $this->load->view('leader/social',$data);
    }


    public function voter_report() {
        $data = array();
        $this->load->view('leader/voter_report',$data);
    }


    public function team_report() {
        $data = array();
        $this->load->view('leader/team_report',$data);
    }

    public function geography_report() {
        $data = array();
        $this->load->view('leader/geography_report',$data);
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
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
            $json = post_curl(API_CALL_PATH.'userprofile/searchLeaderProfiles', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);
            
            if($option == true) {
                $options = '';
                $UserProfileLeader = $json_decode->result->UserProfileLeader;
                foreach($UserProfileLeader AS $LeaderProfile) {
                    $options .= '<option value="'.$LeaderProfile->UserProfileLeader->UserProfileId.'">'.$LeaderProfile->UserProfileLeader->FirstName. ' '.$LeaderProfile->UserProfileLeader->LastName .'</option>';
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
