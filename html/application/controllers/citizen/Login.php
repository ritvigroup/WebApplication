<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        if(!empty($this->session->userdata('userid')))
        {
                redirect(base_url());
        }
        $this->load->view('login',$data);
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
                redirect('login');
            }
        }
        
      
        public function logout()
	{
		$this->session->set_userdata(array(
			'userid'		=> '',
			'firstname'      => '',
			'lastname'      => '',
			'email'      => '',
			'wishlist_total'      => '',
			'product_id'      => '',
			'product_price'      => '',
			'cart_total'      => '',
			'checkout_id'      => ''
		));
            
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('lastname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('wishlist_total');
		$this->session->unset_userdata('product_id');
		$this->session->unset_userdata('product_price');
		$this->session->unset_userdata('cart_total');
		$this->session->unset_userdata('checkout_id');
		$this->session->sess_destroy();
		redirect('login');
	}
}
