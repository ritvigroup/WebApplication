<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Leader
*/

class Leader extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Event_Model');
        $this->load->model('Information_Model');
        $this->load->model('Poll_Model');
        $this->load->model('Post_Model');
        $this->load->model('Suggestion_Model');
        $this->load->model('Leader_Model');
        $this->load->model('Feeling_Model');
        $this->load->model('Politicalparty_Model');
        $this->load->model('Suggestion_Model');
        $this->load->model('Document_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getAllHomePageData() {
        $error_occured = false;

        $UserId             = $this->input->post('user_id');
        $UserProfileId      = $this->input->post('user_profile_id');

       
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
        
            $result = array();
            $sql = "
            
            SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `StartDate` <= '".date('Y-m-d H:i:s')."' AND `EndDate` >= '".date('Y-m-d H:i:s')."' AND `EventStatus` = '1' AND `AddedBy` = '".$UserProfileId."'

            UNION 

            SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' AND `AddedBy` = '".$UserProfileId."'
            UNION 

            SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `UserProfileId` = '".$UserProfileId."'

            ORDER BY DateAdded DESC LIMIT 0,50
            
            ";
            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {

                    if($val['DataType'] == "Post") {
                        $Data[] = array(
                                        'feedtype' => 'post',
                                        'postdata' => $this->Post_Model->getPostDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Event") {
                        $Data[] = array(
                                        'feedtype' => 'event',
                                        'eventdata' => $this->Event_Model->getEventDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Poll") {
                        $Data[] = array(
                                        'feedtype' => 'poll',
                                        'polldata' => $this->Poll_Model->getPollDetail($val['Id']),
                                        );
                    } else {
                        $Data = array();
                    }
                    $result = $Data;
                }
                $msg = "Home data found";
            } else {
                $msg = "No post found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $result,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveMyDocumentFolder() {
        $error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $DocumentFolderName     = $this->input->post('folder_name');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentFolderName == "") {
            $msg = "Please enter folder name";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $folder_res = $this->Document_Model->getDocumentFolderExist($DocumentFolderName, $UserProfileId);
            if($folder_res['DocumentFolderId'] > 0) { 
                $this->db->query("ROLLBACK");
                $msg = "Folder already exist. Error occured";
                $error_occured = true;
            } else {

                $insertData = array(
                                    'DocumentFolderName'        => $DocumentFolderName,
                                    'DocumentFolderDescription' => $DocumentFolderDescription,
                                    'DocumentFolderStatus'      => 1,
                                    'AddedBy'                   => $UserProfileId,
                                    'UpdatedBy'                 => $UserProfileId,
                                    'AddedOn'                   => date('Y-m-d H:i:s'),
                                    'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                );

                $DocumentFolderId = $this->Document_Model->saveMyDocumentFolder($insertData);

                if($DocumentFolderId > 0) {
                    $this->db->query("COMMIT");
                    $folder_detail = $this->Document_Model->getDocumentFolderDetail($DocumentFolderId, $UserProfileId);
                    $msg = "Folder created successfully";
                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Folder not saved. Error occured";
                    $error_occured = true;
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "result"       => $folder_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getDocumentFolderDetail() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $DocumentFolderId   = $this->input->post('folder_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentFolderId == "") {
            $msg = "Please select folder";
            $error_occured = true;
        } else {

            $folder_detail = $this->Document_Model->getDocumentFolderDetail($DocumentFolderId, $UserProfileId);
            
            if(count($folder_detail) > 0) {
                $msg = "Document folder fetched successfully";
            } else {
                $msg = "Document folder not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "result"   => $folder_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllDocumentFolder() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $folders = $this->Document_Model->getMyAllDocumentFolder($UserProfileId);
            if(count($folders) > 0) {
                $msg = "Document folder fetched successfully";
            } else {
                $msg = "No document folder added by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $folders,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveMyDocument() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $DocumentFolderId   = $this->input->post('folder_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentFolderId == '') {
            $msg = "Please enter folder name";
            $error_occured = true;
        } else {

            $DocumentFolderId = ($DocumentFolderId > 0) ? $DocumentFolderId : 0;
            $doc_detail = $this->Document_Model->saveDocument($DocumentFolderId, $UserProfileId, $_FILES['file']);
            $msg = "Files saved successfully";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "result"       => $folder_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getDocumentDetail() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $DocumentId     = $this->input->post('doc_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentId == "") {
            $msg = "Please select folder";
            $error_occured = true;
        } else {

            $doc_detail = $this->Document_Model->getDocumentDetail($DocumentId, $UserProfileId);
            
            if(count($doc_detail) > 0) {
                $msg = "Document fetched successfully";
            } else {
                $msg = "Document not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $doc_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllDocument() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $docs = $this->Document_Model->getMyAllDocument($UserProfileId);
            if(count($docs) > 0) {
                $msg = "Document fetched successfully";
            } else {
                $msg = "No document added by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $docs,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

