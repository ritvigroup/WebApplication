<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organize extends CI_Controller {

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

    }


    public function organize() {
        $data = array();
      
        
        
        $this->load->view('organize/organize',$data);
    }


    public function documentfolder() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

            $post_data = $this->input->post();

            $json_decode = post_curl_with_files(API_CALL_PATH.'leader/saveMyDocumentFolder', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'leader/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        $this->load->view('organize/documentfolder', $data);
    }


    public function documents() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');


            $post_data = $this->input->post();

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }
            $json_decode = post_curl_with_files(API_CALL_PATH.'leader/saveMyDocument', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'leader/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['DocumentFolder'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'leader/getMyAllDocument', $this->input->post(), $this->curl);


        $json_decode = json_decode($json_encode);

        if(count($json_decode->result) > 0) {
            $data['Document'] = $json_decode;
        }

        $this->load->view('organize/documents', $data);
    }

}
