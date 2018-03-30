<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

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
    
    
    public function plan() {
        $data = array();
        $this->load->view('plan/plan',$data);
    }

    
}
