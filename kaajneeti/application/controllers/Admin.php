<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        if(($this->session->userdata('AdminId')) > 0)
        {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login',$data);
    }
    

    public function login(){
        $data = array();

        if(($this->session->userdata('AdminId')) > 0)
        {
            redirect('admin/dashboard');
        }

        if($this->input->method(TRUE) == "POST") {

            $_POST['login_type'] = 2;

            $json = post_curl(API_CALL_PATH.'adminlogin/loginUsernamePassword', $this->input->post(), $this->curl);

            $json_decode = json_decode($json);

            
            if($json_decode->status == "success") {

                $AdminId = $json_decode->result->AdminId;
                $UserName = $json_decode->result->UserName;

                $UserProfilePic = ($json_decode->result->ProfilePhotoPath != '') ? $json_decode->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                
                if($AdminId > 0) {
                    $this->session->set_userdata('AdminId', $AdminId);
                    $this->session->set_userdata('UserId', $AdminId);
                    $this->session->set_userdata('UserProfileId', 0);
                    $this->session->set_userdata('Name', $UserName);
                    $this->session->set_userdata('UserProfilePic', $UserProfilePic);
                }
            } else {
                
            }
            header('Content-type: application/json');
            echo $json;
            return false;
        }
        $this->load->view('admin/login',$data);
    }

     
      
    public function logout()
	{
		$this->session->set_userdata(array(
			'AdminId' => '',
		));
            
        $this->session->unset_userdata('AdminId');
		$this->session->sess_destroy();
		redirect('admin/login');
	}



    public function home() {

        if(($this->session->userdata('AdminId')) > 0) { 
        } else {
            redirect('admin/login');
        }

        $data = array();

        $_POST['user_id'] = $this->session->userdata('AdminId');

        $json_encode = post_curl(API_CALL_PATH.'admin/getAllHomePageData', $this->input->post(), $this->curl);
        
        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        
        $this->load->view('admin/home',$data);
    }

    
    public function dashboard() {

        if(($this->session->userdata('AdminId')) > 0) { 
        } else {
            redirect('admin/login');
        }
        

        $data = array();
        $this->load->view('admin/dashboard',$data);
    }



    public function systemuser() {

        $data = array();

        if(($this->session->userdata('AdminId')) > 0) { 
        } else {
            redirect('admin/login');
        }

        $_POST['admin_id'] = $this->session->userdata('AdminId');
        
        $json_encode = post_curl(API_CALL_PATH.'userprofile/getAllSystemUser', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SystemUser'] = $json_decode;
        }


        $this->load->view('admin/systemuser',$data);
    }
    

    public function profile() {
        $data = array();

        if(($this->session->userdata('AdminId')) > 0) {
        } else {
        }
        $this->load->view('admin/profile',$data);
    }

    
    public function setting() {
        $data = array();
        $this->load->view('admin/setting',$data);
    }

}
