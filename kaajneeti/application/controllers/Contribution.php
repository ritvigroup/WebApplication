<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contribution extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       
        if(($this->session->userdata('UserId')) > 0) {
            
        } else {
            redirect('leader/login');
        }

        $this->payment_links = '
        <li><a href="'.base_url().'contribution/contribution">&nbsp;Contribution</a>&nbsp;</li>
        <li><a href="'.base_url().'contribution/contributionSent">&nbsp;Sent</a>&nbsp;</li>
        <li><a href="'.base_url().'contribution/contributionReceived">&nbsp;Received</a>&nbsp;</li>';

    }  
    

    public function report() {
        $data = array();

        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'payment/getMyTotalWalletAmount', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('report/report',$data);
    }


    public function contribution() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'payment/getMyAllPaymentTransactionLog', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_decode);
        // echo '</pre>';

        $this->load->view('contribution/contribution',$data);
    }


    public function contributionSent() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'payment/getMyAllPaymentDebitTransactionLog', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_decode);
        // echo '</pre>';

        $this->load->view('contribution/contributionSent',$data);
    }


    public function contributionReceived() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'payment/getMyAllPaymentCreditTransactionLog', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_decode);
        // echo '</pre>';

        $this->load->view('contribution/contributionReceived',$data);
    }
}
