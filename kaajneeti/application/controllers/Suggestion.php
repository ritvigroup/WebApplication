<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Controller {

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

    public function suggestionHistoryForm() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('suggestion/suggestionHistoryForm',$data);
    }


    public function suggestionViewDetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['suggestion_unique_id'] = $this->uri->segment(3);
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionDetailByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);

        $_POST['suggestion_id'] = $json_decode->result->SuggestionId;

        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SuggestionDetail'] = $json_decode;
        }
        
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionHistory', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SuggestionHistory'] = $json_decode;
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        
        $this->load->view('suggestion/suggestionViewDetail',$data);
    }  
    

    public function suggestion() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getMyAllSuggestion', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('suggestion/suggestion',$data);
    }


    public function suggestionReceived() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getAllAssignedSuggestionToMe', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('suggestion/suggestionReceived',$data);
    }


    public function newsuggestion() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

            $json_decode = post_curl(API_CALL_PATH.'suggestion/postMySuggestion', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $this->load->view('suggestion/new',$data);
    }

    public function suggestionTimeline() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $_POST['suggestion_unique_id'] = $this->uri->segment(3);
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionDetailByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);

        $_POST['suggestion_id'] = $json_decode->result->SuggestionId;

        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SuggestionDetail'] = $json_decode;
        }
        
        $json_encode = post_curl(API_CALL_PATH.'suggestion/getSuggestionHistory', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SuggestionHistory'] = $json_decode;
        }

        // Save Suggestion History
        if($this->input->post('title') != '') {

            $post_data = $this->input->post();


            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }
            $json_decode = post_curl_with_files(API_CALL_PATH.'suggestion/saveSuggestionHistory', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $this->load->view('suggestion/suggestionTimeline',$data);
    }

}
