<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        /*//load model
        $this->load->model('dashboard_model');
        $this->load->model('Category_Model');
        $this->load->model('Subcategory_Model');
        $this->load->model('Product_Model',"product_model");
        $this->load->model('Login_Model',"login_model");
        $this->load->library('cart');
        $this->load->helper('url');  
        $this->load->helper('form');  
        $this->load->library('session');
        $this->load->database();
        $this->load->library('encrypt');*/

        $this->load->library('facebook');
       

    }
    
    public function index()
    {
        if(($this->session->userdata('leader_id')) > 0)
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

        if(($this->session->userdata('leader_id')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            echo '<pre>';
            print_r($userProfile);
            echo '</pre>';

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

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutUrl'] = "rajesh1";$this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

        if($this->input->post('request_action') != '') {

            $this->curl->create(API_CALL_PATH.'leader-login.php');
            $this->curl->option('buffersize', 10);
            //$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

            $this->curl->option('returntransfer', 1);
            $this->curl->option('followlocation', 1);
            $this->curl->option('HEADER', false);
            $this->curl->option('connecttimeout', 600);

            if($this->input->post('request_action') == "LOGIN_WITH_MPIN") {
	            $post_data = array(
	                                'request_action' => $this->input->post('request_action'),
	                                'mobile' => $this->input->post('mobile'),
	                                'mpin' => $this->input->post('mpin'),
	                                );
	        } else  if($this->input->post('request_action') == "LOGIN_WITH_USERNAME_PASSWORD") {
	            $post_data = array(
	                                'request_action' => $this->input->post('request_action'),
	                                'username' => $this->input->post('username'),
	                                'password' => $this->input->post('password'),
	                                );
	        }

            $this->curl->option('postfields', $post_data);
            $data = $this->curl->execute();

            $json_decode = json_decode($data);

            header('Content-type: application/json');

            if($json_decode->status == "success") {

                $leader_id = $json_decode->user_detail->user_profile->leader_id;
                if($leader_id > 0) {
                    $this->session->set_userdata('leader_id', $leader_id);
                    
                }
            }

            echo $data;
            return false;
        }
        $this->load->view('leader/login',$data);
    }

    public function register(){
    	if(($this->session->userdata('leader_id')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->post('request_action') != '') {

            $this->curl->create(API_CALL_PATH.'leader-register.php');
            $this->curl->option('buffersize', 10);
            //$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

            $this->curl->option('returntransfer', 1);
            $this->curl->option('followlocation', 1);
            $this->curl->option('HEADER', false);
            $this->curl->option('connecttimeout', 600);
            $post_data = array(
                                'request_action' 	=> $this->input->post('request_action'),
                                'username' 			=> $this->input->post('username'),
                                'mobile' 			=> $this->input->post('mobile'),
                                'email' 			=> $this->input->post('email'),
                                'password' 			=> $this->input->post('password'),
                                'passwordConfirm' 	=> $this->input->post('passwordConfirm'),
                                'firstname' 		=> $this->input->post('firstname'),
                                'lastname' 			=> $this->input->post('lastname'),
                                'gender' 			=> $this->input->post('gender'),
                                );

            $this->curl->option('postfields', $post_data);
            $data = $this->curl->execute();

            $json_decode = json_decode($data);

            header('Content-type: application/json');

            if($json_decode->status == "success") {

                $leader_id = $json_decode->user_detail->user_profile->leader_id;
                if($leader_id > 0) {
                    $this->session->set_userdata('leader_id', $leader_id);
                    
                }
            }

            echo $data;
            return false;
        }
        $data = array();
        $this->load->view('leader/register',$data);
    }

    public function forgot(){
        if(($this->session->userdata('leader_id')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->post('request_action') != '') {

            $this->curl->create(API_CALL_PATH.'leader-forgot.php');
            $this->curl->option('buffersize', 10);
            //$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

            $this->curl->option('returntransfer', 1);
            $this->curl->option('followlocation', 1);
            $this->curl->option('HEADER', false);
            $this->curl->option('connecttimeout', 600);
            $post_data = array(
                                'request_action'    => $this->input->post('request_action'),
                                'username'          => $this->input->post('username'),
                                );

            $this->curl->option('postfields', $post_data);
            $data = $this->curl->execute();

            $json_decode = json_decode($data);

            header('Content-type: application/json');

            if($json_decode->status == "success") {

                /*$leader_id = $json_decode->user_detail->user_profile->leader_id;
                if($leader_id > 0) {
                    $this->session->set_userdata('leader_id', $leader_id);
                    
                }*/
            }

            echo $data;
            return false;
        }
        $data = array();
        $this->load->view('leader/forgot',$data);
    }


    public function resetpassword(){
        if(($this->session->userdata('leader_id')) > 0)
        {
            redirect('leader/dashboard');
        }

        if($this->input->post('request_action') != '') {

            $this->curl->create(API_CALL_PATH.'leader-forgot.php');
            $this->curl->option('buffersize', 10);
            //$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

            $this->curl->option('returntransfer', 1);
            $this->curl->option('followlocation', 1);
            $this->curl->option('HEADER', false);
            $this->curl->option('connecttimeout', 600);
            $post_data = array(
                                'request_action'    => $this->input->post('request_action'),
                                'resetpassword'     => $this->input->post('resetpassword'),
                                'newpassword'       => $this->input->post('newpassword'),
                                'confirmpassword'   => $this->input->post('confirmpassword'),
                                );

            $this->curl->option('postfields', $post_data);
            $data = $this->curl->execute();

            $json_decode = json_decode($data);

            header('Content-type: application/json');

            if($json_decode->status == "success") {

                /*$leader_id = $json_decode->user_detail->user_profile->leader_id;
                if($leader_id > 0) {
                    $this->session->set_userdata('leader_id', $leader_id);
                    
                }*/
            }

            echo $data;
            return false;
        }
        $data = array();
        $data['reset_password'] = $this->uri->segment(3);
        $this->load->view('leader/resetpassword',$data);
    }
        
      
    public function logout()
	{
		$this->session->set_userdata(array(
			'leader_id'		=> '',
		));
            
		$this->session->unset_userdata('leader_id');
		$this->session->sess_destroy();
		redirect('leader/login');
	}

	public function fblogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('leader_id');
        $this->session->sess_destroy();
        // Redirect to login page
        redirect('leader/login');
    }

    public function dashboard() {
        $data = array();
        $this->load->view('leader/dashboard',$data);
    }
    

    public function profile() {
        $data = array();
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
}
