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
       

    }
    
    public function index()
    {
        if(($this->session->userdata('leader_id')) > 0)
        {
            redirect(base_url());
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

    public function login(){

        if(($this->session->userdata('leader_id')) > 0)
        {
            redirect(base_url());
        }

        if($this->input->post('request_action') != '') {

            $this->curl->create(API_CALL_PATH.'leader-login.php');
            $this->curl->option('buffersize', 10);
            //$this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

            $this->curl->option('returntransfer', 1);
            $this->curl->option('followlocation', 1);
            $this->curl->option('HEADER', false);
            $this->curl->option('connecttimeout', 600);
            $post_data = array(
                                'request_action' => $this->input->post('request_action'),
                                'mobile' => $this->input->post('mobile'),
                                'mpin' => $this->input->post('mpin'),
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
        $this->load->view('leader/login',$data);
    }

    public function register(){
        $data = array();
        $this->load->view('leader/register',$data);
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
