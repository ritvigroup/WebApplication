<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

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

        $this->complaint_links = '
            <li><a href="'.base_url().'complaint/complaintReceived">Complaint Received</a>&nbsp;&nbsp;</li>
            <li><a href="'.base_url().'complaint/mycomplaint">My Complaint</a>&nbsp;&nbsp;</li>
            <li><a href="'.base_url().'complaint/newcomplaint">New Complaint</a>&nbsp;&nbsp;</li>
        ';

    }  
    
    public function complaintHistoryForm() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('complaint/complaintHistoryForm',$data);
    }


    public function complaintViewDetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['complaint_unique_id'] = $this->uri->segment(3);
        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintDetailByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);

        $_POST['complaint_id'] = $json_decode->result->ComplaintId;

        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ComplaintDetail'] = $json_decode;
        }
        
        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintHistory', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ComplaintHistory'] = $json_decode;
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        
        $this->load->view('complaint/complaintViewDetail',$data);
    }



    public function mycomplaint() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'complaint/getMyAllComplaint', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        $this->load->view('complaint/mycomplaint',$data);
    }


    public function complaintReceived() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'complaint/getAllAssignedComplaintToMe', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        // echo '<pre>';
        // print_r($_POST);
        // print_r($json_decode);
        // echo '</pre>';

        $this->load->view('complaint/complaintReceived',$data);
    }


    public function newcomplaint() {
        $data = array();

        $_POST['user_id']           = $this->session->userdata('UserId');
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');

        if($this->input->method(TRUE) == "POST") {
            
            $post_data = $this->input->post();
            $attendee = array();
            if($post_data['complaint_member'] != '') {
                $exp_attendee = explode(',', $post_data['complaint_member']);
                for($i = 0; $i < count($exp_attendee); $i++) {
                    if($exp_attendee[$i] > 0) {
                        $post_data = array_merge($post_data, array('complaint_member['.$i.']' => $exp_attendee[$i]));
                    }
                }
            }

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }

            // echo '<pre>';
            // print_r($_POST);
            // print_r($_FILES);
            // echo '</pre>';
            // die;
            $json_decode = post_curl_with_files(API_CALL_PATH.'complaint/postMyComplaint', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }

        $json_encode = post_curl(API_CALL_PATH.'complaint/getAllComplaintType', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ComplaintType'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getMyAllFavouriteLeader', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['FavouriteLeader'] = $json_decode;
        }


        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriends', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['MyFriend'] = $json_decode;
        }

        $this->load->view('complaint/newcomplaint',$data);
    }


    public function complaintTimeline() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $_POST['complaint_unique_id'] = $this->uri->segment(3);
        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintDetailByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);

        $_POST['complaint_id'] = $json_decode->result->ComplaintId;

        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ComplaintDetail'] = $json_decode;
        }
        
        $json_encode = post_curl(API_CALL_PATH.'complaint/getComplaintHistory', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ComplaintHistory'] = $json_decode;
        }

        // Save Complaint History
        if($this->input->post('title') != '') {

            $post_data = $this->input->post();


            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }
            $json_decode = post_curl_with_files(API_CALL_PATH.'complaint/saveComplaintHistory', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }

        echo '<pre>';
        print_r($data);
        echo '</pre>';
        
        $this->load->view('complaint/complaintTimeline', $data);
    }


    public function newc() {
        $data = array();
        $this->load->view('complaint/new',$data);
    }

}
