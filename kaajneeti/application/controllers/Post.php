<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

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
    

    public function post() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'post/getMyAllPost', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('post/post',$data);
    }


    public function newpost() {
        $data = array();
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');


            $post_data = $this->input->post();
            $post_tag = array();
            if($post_data['post_tag'] != '') {
                $exp_post_tag = explode(',', $post_data['post_tag']);
                for($i = 0; $i < count($exp_post_tag); $i++) {
                    if($exp_post_tag[$i] > 0) {
                        $post_data = array_merge($post_data, array('post_tag['.$i.']' => $exp_post_tag[$i]));
                    }
                }
            }

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }
            $json_decode = post_curl_with_files(API_CALL_PATH.'post/postMyStatus', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $this->load->view('post/new',$data);
    }


    public function postdetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['post_id'] = $this->input->post('post_id');
        $json_encode = post_curl(API_CALL_PATH.'post/getPostDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('post/postdetail',$data);
    }

}
