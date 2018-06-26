<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Influence extends CI_Controller {

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


    public function emailCompose() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $this->load->view('influence/emailCompose',$data);
    }


    public function importEmailCsv() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importEmailCsv',$data);
    }

        public function importEmailTxt() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importEmailTxt',$data);
    }

    
    public function importEmailExcel() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importEmailExcel',$data);
    }



    public function smsCompose() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/smsCompose',$data);
    }

    
    public function importSmsCsv() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importSmsCsv',$data);
    }

    
    public function importSmsTxt() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importSmsTxt',$data);
    }

    
    public function importSmsExcel() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/importSmsExcel',$data);
    }



    public function socialCompose() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $this->load->view('influence/socialCompose',$data);
    }


    public function viewEmail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['email_unique_id'] = $this->input->post('email_unique_id');

        $json_encode = post_curl(API_CALL_PATH.'influence/getEmailSentByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('influence/viewEmail',$data);
    }



    public function viewSms() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['sms_unique_id'] = $this->input->post('sms_unique_id');

        $json_encode = post_curl(API_CALL_PATH.'influence/getSmsSentByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('influence/viewSms',$data);
    }


    public function viewSocial() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['social_unique_id'] = $this->input->post('social_unique_id');

        $json_encode = post_curl(API_CALL_PATH.'influence/getSocialSentByUniqueId', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('influence/viewSocial',$data);
    }


    
    public function email() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->post('save_email') == "Y") {
            $post_data = $this->input->post();

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }


            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveEmailSent', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }

        if($this->input->post('email_csv') == "Y") {

            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            $post_data = $this->input->post();
            $csv_file = $_FILES['csv_file']['tmp_name'];

            $handle = fopen($csv_file, "r");
            if ($csv_file == NULL) {
                echo 'No file selected';
            } else {
                $i = 0;
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                {
                    $post_data['email_ids'] .= $filesop[0].';';
                    $i++;
                }

                for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    if($_FILES['file']['name'][$i] != '') {

                        //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                        $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                    }
                }
            }

            $post_data['email_type'] = 'By CSV File';

            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveEmailSentCSV', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }

        if($this->input->post('email_txt') == "Y") {

            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            $post_data = $this->input->post();
            $txt_file = $_FILES['txt_file']['tmp_name'];

            $txt_file    = file_get_contents($txt_file);
            $rows        = explode("\n", $txt_file);

            foreach($rows AS $key => $row_email)
            {
                $post_data['email_ids'] .= $row_email.';';
                $i++;
            }

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }

            $post_data['email_type'] = 'By Text File';

            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveEmailSentTXT', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }

        if($this->input->post('email_xls') == "Y") {

            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
            $post_data = $this->input->post();
            $xls_file = $_FILES['xls_file']['tmp_name'];

            $txt_file    = file_get_contents($txt_file);
            $rows        = explode("\n", $txt_file);

            foreach($rows AS $key => $row_email)
            {
                $post_data['email_ids'] .= $row_email.';';
                $i++;
            }

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }

            $post_data['email_type'] = 'By Excel File';

            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveEmailSentXLS', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }


        $json_encode = post_curl(API_CALL_PATH.'influence/getMySentEmail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['EmailSent'] = $json_decode->result;
        }
        
        $this->load->view('influence/email',$data);
    }

    
    public function sms() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->post('save_sms') == "Y") {
            $post_data = $this->input->post();

            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveSmsSent', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }


        $json_encode = post_curl(API_CALL_PATH.'influence/getMySentSms', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SmsSent'] = $json_decode->result;
        }
        
        $this->load->view('influence/sms',$data);
    }


    public function social() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');


        if($this->input->post('save_social') == "Y") {
            $post_data = $this->input->post();

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }


            $json_decode = post_curl_with_files(API_CALL_PATH.'influence/saveSocialSent', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;
            exit();
        }


        $json_encode = post_curl(API_CALL_PATH.'influence/getMySentSocial', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SocialSent'] = $json_decode->result;
        }
        
        $this->load->view('influence/social',$data);
    }

}
