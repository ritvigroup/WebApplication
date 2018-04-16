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

            $json_decode = post_curl_with_files(API_CALL_PATH.'document/saveMyDocumentFolder', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocumentFolder', $this->input->post(), $this->curl);

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
            $json_decode = post_curl_with_files(API_CALL_PATH.'document/saveMyDocument', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['DocumentFolder'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocument', $this->input->post(), $this->curl);


        $json_decode = json_decode($json_encode);

        if(count($json_decode->result) > 0) {
            $data['Document'] = $json_decode;
        }

        $this->load->view('organize/documents', $data);
    }


    public function fleet() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

            $post_data = array(
                                'user_profile_id' => $this->input->post('user_profile_id'),
                                'vehicle_id' => explode(',', $this->input->post('vehicle_id')),
                                'vehicle_quantity' => explode(',', $this->input->post('vehicle_quantity')),
                                );

            $json_decode = post_curl(API_CALL_PATH.'fleet/saveFleet', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'fleet/getAllVehicle', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Vehicle'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'fleet/getMyAllFleet', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Fleet'] = $json_decode;
        }

        $this->load->view('organize/fleet', $data);
    }


    public function newTeam() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        
        $this->load->view('organize/newTeam',$data);
    }


    public function team() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
           
        if($this->input->method(TRUE) == "POST" && $this->input->post('save_user') == 'Y') {

            $post_data = array(
                                'user_profile_id'   => $this->input->post('user_profile_id'),
                                'friend_profile'    => $this->input->post('friend_profile'),
                                'first_name'        => $this->input->post('first_name'),
                                'last_name'         => $this->input->post('last_name'),
                                'email'             => $this->input->post('email'),
                                );

            if($_FILES['file']['name'] != '') {

                //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                $post_data = array_merge($post_data, array('photo' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
            }

            $json_decode = post_curl_with_files(API_CALL_PATH.'userregister/saveUserProfile', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        
        $json_encode = post_curl(API_CALL_PATH.'leader/getMyAllCreatedTeam', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['MyTeam'] = $json_decode;
        }

        $this->load->view('organize/team', $data);
    }

}
