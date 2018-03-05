<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            $this->load->model('Dashboard_Model');
            $this->load->model('Category_Model');
            $this->load->model('Subcategory_Model');
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            $this->load->library('encrypt');
        }


        public function index()
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['slider'] = $this->Dashboard_Model->get_slider();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $data['latest_product'] = $this->Dashboard_Model->latest_product();
            $data['popular_product'] = $this->Dashboard_Model->popular_product();
            $data['feature_product'] = $this->Dashboard_Model->feature_product();
            $this->load->view('dash',$data);
        }
	
        public function mobile_shop()
        {
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('mobile_shop',$data);
        }
	
	public function cart()
	{
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('cart',$data);
        }
        
        public function product_detail($product)
	{
            $data['products'] = $this->dashboard_model->get_all();
            $data['products_detail'] = $this->dashboard_model->products_detail($product);
            $this->load->view('product_detail',$data);  
        }
        public function shipping()
	{
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('shipping',$data);  
        }
        public function term()
	{
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('term',$data);  
        }
        public function faqs()
	{
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('faqs',$data);  
        }
        
}
