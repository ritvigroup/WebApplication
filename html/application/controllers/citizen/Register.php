<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
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
            $this->load->library('encrypt');
            if(!empty($this->session->userdata('userid')))
            {
                    redirect(base_url());
            }
        }
        public function index()
        {
            
           if(!empty($_POST))
            {
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('firstname', 'FirstName', 'trim|required|alpha');
                $this->form_validation->set_rules('lastname', 'LastName', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_customers.email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
               
                if ($this->form_validation->run() == FALSE)
                {
                    $data['category_list'] = $this->Category_Model->get_list();
                    $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                    $this->load->view('register',$data);
                }
                else
                {
                    $insert_id = $this->login_model->add();
                    $this->session->set_flashdata('error','User Registered Successfully');
                    redirect('login');
                }
            }
            else
            {
                $data['category_list'] = $this->Category_Model->get_list();
                $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
                $this->load->view('register',$data);
            }
        }
}
