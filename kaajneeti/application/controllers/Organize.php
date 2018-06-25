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
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

            $post_data = $this->input->post();

            $json_decode = post_curl_with_files(API_CALL_PATH.'document/saveMyDocumentFolder', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }

        $this->load->view('organize/documentfolder', $data);
    }

    public function document() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

            $_POST['folder_id'] = $this->input->post('parent_folder_id');
            $post_data = $this->input->post();

            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }

            /*if($_FILES['file']['name'] != '') {

                //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                $post_data = array_merge($post_data, array('file' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
            }*/


            $json_decode = post_curl_with_files(API_CALL_PATH.'document/saveMyDocument', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }

        $ParentDocumentFolderId = (($this->uri->segment(3) > 0) ? $this->uri->segment(3) : 0);
        $folder_path = '';
        if($ParentDocumentFolderId > 0) {
            $folder_path = '/'.$ParentDocumentFolderId;
        }

        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $data['parent_folder_id'] = $_POST['parent_folder_id']  = $ParentDocumentFolderId;
        $_POST['folder_id']         = $ParentDocumentFolderId;
        

        $json_encode = post_curl(API_CALL_PATH.'document/getDocumentFolderDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['ParentFolder'] = $json_decode;
        }

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

        $this->load->view('organize/document', $data);
    }

    public function newDocument() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $parent_folder_id = $this->input->post('parent_folder_id');
        
        if($parent_folder_id > 0) {
            $_POST['parent_folder_id'] = $parent_folder_id;
        } else {
            $parent_folder_id = $_POST['parent_folder_id'] = 0;
        }

        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['DocumentFolder'] = $json_decode;
        }
        
        $data['parent_folder_id'] = $parent_folder_id;

        $this->load->view('organize/newDocument',$data);
    }

    public function deleteDocument() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_id']                   = $this->session->userdata('UserId');
        $_POST['user_profile_id']           = $this->session->userdata('UserProfileId');
        $_POST['document_id']               = $this->uri->segment(3);

        $json_encode = post_curl(API_CALL_PATH.'document/deleteDocument', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

    public function newFolder() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $parent_folder_id = $this->input->post('parent_folder_id');
        
        if($parent_folder_id > 0) {
            $_POST['parent_folder_id'] = $parent_folder_id;
        } else {
            $parent_folder_id = $_POST['parent_folder_id'] = 0;
        }

        if($this->input->post('folder_name') != '') {
            $json_encode = post_curl(API_CALL_PATH.'document/saveMyDocumentFolder', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_encode;

            return false;
        }

        $json_encode = post_curl(API_CALL_PATH.'document/getMyAllDocumentFolder', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['DocumentFolder'] = $json_decode;
        }

        $data['parent_folder_id'] = $parent_folder_id;

        
        $this->load->view('organize/newFolder',$data);
    }

    public function deleteFolder() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_id']                   = $this->session->userdata('UserId');
        $_POST['user_profile_id']           = $this->session->userdata('UserProfileId');
        $_POST['folder_id']                 = $this->uri->segment(3);

        $json_encode = post_curl(API_CALL_PATH.'document/deleteFolder', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

    public function fleet() {
        $data = array();

           
        if($this->input->method(TRUE) == "POST") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

            $post_data = array(
                                'user_profile_id'       => $this->input->post('user_profile_id'),
                                'fleet_name'            => $this->input->post('fleet_name'),
                                'registration_number'   => $this->input->post('registration_number'),
                                'driver_name'           => $this->input->post('driver_name'),
                                'vehicle_type'          => $this->input->post('vehicle_type'),
                                'vehicle_quantity'      => $this->input->post('vehicle_quantity'),
                                );


            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                if($_FILES['file']['name'][$i] != '') {

                    $post_data = array_merge($post_data, array('file['.$i.']' => getCurlValue($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i])));
                }
            }

            $json_decode = post_curl_with_files(API_CALL_PATH.'fleet/saveFleet', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

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
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $json_encode = post_curl(API_CALL_PATH.'complaint/getAllDepartment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Department'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'role/getMyAllUserRoleWithDefault', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['UserRole'] = $json_decode;
        }
        
        $this->load->view('organize/newTeam',$data);
    }

    public function newRole() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->post('role_name') != '') {
            $json_encode = post_curl(API_CALL_PATH.'role/saveMyUserRole', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_encode;

            return false;
        }

        
        $this->load->view('organize/newRole',$data);
    }

    public function newFleet() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        
        $this->load->view('organize/newFleet',$data);
    }

    public function deleteFleet() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_id']           = $this->session->userdata('UserId');
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $_POST['fleet_id']          = $this->uri->segment(3);

        $json_encode = post_curl(API_CALL_PATH.'fleet/deleteFleet', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }


    public function showUserDetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('friend_user_profile_id');

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformation', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['UserProfile'] = $json_decode;
        }

        
        $this->load->view('organize/showUserDetail',$data);
    }

    public function editTeam() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $_POST['unique_profile_id']         = $this->uri->segment(3);
        $_POST['friend_user_profile_id']    = $this->uri->segment(4);

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getUserprofileFriendsprofileInformationUniqueIdCheck', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['SubLeaderDetail'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'complaint/getAllDepartment', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Department'] = $json_decode;
        }

        $json_encode = post_curl(API_CALL_PATH.'role/getMyAllUserRoleWithDefault', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['UserRole'] = $json_decode;
        }
        
        $this->load->view('organize/editTeam',$data);
    }

    public function deleteTeam() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_id']                   = $this->session->userdata('UserId');
        $_POST['user_profile_id']           = $this->session->userdata('UserProfileId');
        $_POST['unique_profile_id']         = $this->uri->segment(3);
        $_POST['friend_user_profile_id']    = $this->uri->segment(4);

        $json_encode = post_curl(API_CALL_PATH.'userprofile/deleteProfile', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

    public function team() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
           
        if($this->input->method(TRUE) == "POST" && $this->input->post('save_user') == 'Y') {

            // $friend_profile = $this->input->post('friend_profile');
            // if($friend_profile > 0) {

            // } else {
            //     $friend_profile = $this->input->post('user_profile_id');
            // }
            $friend_profile = $this->input->post('user_profile_id');

            $post_data = array(
                                'user_profile_id'   => $this->input->post('user_profile_id'),
                                'friend_profile'    => $friend_profile,
                                'first_name'        => $this->input->post('first_name'),
                                'last_name'         => $this->input->post('last_name'),
                                'email'             => $this->input->post('email'),
                                'department'        => $this->input->post('department'),
                                'user_name'         => $this->input->post('user_name'),
                                'password'          => $this->input->post('password'),
                                'role'              => $this->input->post('role'),
                                );

            if($_FILES['file']['name'] != '') {

                //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                $post_data = array_merge($post_data, array('photo' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
            }

            $json_decode = post_curl_with_files(API_CALL_PATH.'userregister/saveUserProfile', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        } else if($this->input->method(TRUE) == "POST" && $this->input->post('update_user') == 'Y') {

            $post_data = array(
                                'user_profile_id'           => $this->input->post('user_profile_id'),
                                'friend_user_profile_id'    => $this->input->post('friend_user_profile_id'),
                                'first_name'                => $this->input->post('first_name'),
                                'last_name'                 => $this->input->post('last_name'),
                                'email'                     => $this->input->post('email'),
                                'department'                => $this->input->post('department'),
                                'status'                    => $this->input->post('status'),
                                'user_name'                 => $this->input->post('user_name'),
                                'password'                  => $this->input->post('password'),
                                'role'                      => $this->input->post('role'),
                                );

            if($_FILES['file']['name'] != '') {

                //$post_data = array_merge($post_data, array('file['.$i.']' => '@'.($_FILES['file']['tmp_name'][$i]).''));
                $post_data = array_merge($post_data, array('photo' => getCurlValue($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name'])));
            }



            $json_decode = post_curl_with_files(API_CALL_PATH.'userregister/updateUserProfile', $post_data, $this->curl);


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

    public function newGroup() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllConnections', $this->input->post(), $this->curl);
        $json_decode = json_decode($json_encode);

        $data['Connections'] = $json_decode;

        
        $this->load->view('organize/newGroup',$data);
    }

    public function group() {
        $data = array();

        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        
        $json_encode = post_curl(API_CALL_PATH.'friendgroup/getMyAllFriendgroup', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['MyGroup'] = $json_decode;
        }

        $this->load->view('organize/group', $data);
    }

    public function deleteGroup() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_id']           = $this->session->userdata('UserId');
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $_POST['group_id']          = $this->uri->segment(3);

        $json_encode = post_curl(API_CALL_PATH.'friendgroup/deleteMyGroup', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

    public function event() {
        $data = array();
      
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['friend_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->method(TRUE) == "POST" && $_POST['save_event'] == "Y") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');


            $post_data = $this->input->post();
            $attendee = array();
            if($post_data['event_attendee'] != '') {
                $exp_attendee = explode(',', $post_data['event_attendee']);
                for($i = 0; $i < count($exp_attendee); $i++) {
                    if($exp_attendee[$i] > 0) {
                        $post_data = array_merge($post_data, array('event_attendee['.$i.']' => $exp_attendee[$i]));
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
            // echo '</pre>';
            // die;
            $json_decode = post_curl_with_files(API_CALL_PATH.'event/saveMyEvent', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
        $json_encode = post_curl(API_CALL_PATH.'event/getMyAllEvent', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Event'] = $json_decode;
        }
        
        $this->load->view('organize/event',$data);
    }

    public function newevent() {
        $data = array();

           
        
        $this->load->view('organize/newEvent',$data);
    }

    public function eventdetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['event_id'] = $this->input->post('event_id');
        $json_encode = post_curl(API_CALL_PATH.'event/getEventDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('organize/eventDetail',$data);
    }


    public function poll() {
        $data = array();
      
        $_POST['user_profile_id']   = $this->session->userdata('UserProfileId');
        $_POST['friend_profile_id'] = $this->session->userdata('UserProfileId');

        if($this->input->method(TRUE) == "POST" && $this->input->post('save_poll') == "Y") {
            $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');



            $json_decode = post_curl(API_CALL_PATH.'poll/saveMyPoll', $this->input->post(), $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }

        $json_encode = post_curl(API_CALL_PATH.'poll/getMyAllPoll', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Poll'] = $json_decode;
        }
        
        $this->load->view('organize/poll',$data);
    }


    public function pollDetail() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_id'] = $this->input->post('poll_id');

        $json_encode = post_curl(API_CALL_PATH.'poll/getPollDetail', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('organize/pollDetail',$data);
    }


    public function newpoll() {
        $data = array();

        $this->load->view('organize/newPoll',$data);
    }


    public function post() {
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

            // echo '<pre>';
            // print_r($_POST);
            // print_r($_FILES);
            // print_r($post_data);
            // die;
            $json_decode = post_curl_with_files(API_CALL_PATH.'post/postMyStatus', $post_data, $this->curl);

            header('Content-type: application/json');

            echo $json_decode;

            return false;
        }
    }

    public function deleteMyPostStatus() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['post_id'] = $this->input->post('post_id');

        $json_encode = post_curl(API_CALL_PATH.'post/deleteMyPostStatus', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

    public function deleteMyPoll() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['poll_id'] = $this->input->post('poll_id');

        $json_encode = post_curl(API_CALL_PATH.'poll/deleteMyPoll', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }


    public function deleteMyEvent() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['event_id'] = $this->input->post('event_id');

        $json_encode = post_curl(API_CALL_PATH.'event/deleteMyEvent', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }


    public function confirmRequestComplaint() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['complaint_id'] = $this->input->post('complaint_id');
        $_POST['current_status'] = 2;

        $json_encode = post_curl(API_CALL_PATH.'complaint/saveAcceptRejectComplaintFromLeader', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }


    public function cancelRequestComplaint() {
        $data = array();
      
        if (!$this->input->is_ajax_request()) {
           exit('Error');
        }
        $_POST['user_profile_id'] = $this->session->userdata('UserProfileId');
        $_POST['complaint_id'] = $this->input->post('complaint_id');
        $_POST['current_status'] = 3;

        $json_encode = post_curl(API_CALL_PATH.'complaint/saveAcceptRejectComplaintFromLeader', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;

        return false;
    }

}
