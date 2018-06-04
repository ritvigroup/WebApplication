<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Document
*/

class Document extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Document_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function saveMyDocumentFolder() {
        $error_occured = false;

        $UserProfileId              = $this->input->post('user_profile_id');
        $DocumentFolderName         = $this->input->post('folder_name');
        $DocumentFolderDescription  = $this->input->post('folder_description');
        $ParentDocumentFolderId     = (($this->input->post('parent_folder_id') > 0) ? $this->input->post('parent_folder_id') : 0);
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentFolderName == "") {
            $msg = "Please enter folder name";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $folder_res = $this->Document_Model->getDocumentFolderExist($DocumentFolderName, $UserProfileId, $ParentDocumentFolderId);
            if($folder_res['DocumentFolderId'] > 0) { 
                $this->db->query("ROLLBACK");
                $msg = "Folder already exist. Error occured";
                $error_occured = true;
            } else {

                $insertData = array(
                                    'DocumentFolderName'        => $DocumentFolderName,
                                    'DocumentFolderDescription' => $DocumentFolderDescription,
                                    'ParentDocumentFolderId'    => $ParentDocumentFolderId,
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
                           "status"         => 'success',
                           "result"         => $folder_detail,
                           "message"        => $msg,
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

    public function getFolders() {
        $folders = $this->Document_Model->getFolders();

        echo '<pre>';
        print_r($folders);
        die;
    }

    public function getMyAllDocumentFolder() {
        $error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $ParentDocumentFolderId = $this->input->post('parent_folder_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $folders = $this->Document_Model->getMyAllDocumentFolder($UserProfileId, $ParentDocumentFolderId);
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
            if(is_array($DocumentName)) {
                $msg = "Foler not saved";
                $error_occured = true;
            } else {
                $this->Document_Model->saveDocument($DocumentFolderId, $UserProfileId, $DocumentName, $_FILES['file']);
                $msg = "Files saved successfully";
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function deleteFolder() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $DocumentFolderId   = $this->input->post('folder_id');

        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentFolderId == "") {
            $msg = "Please select your folder";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'DocumentFolderStatus'  => -1,
                                'UpdatedOn'             => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'DocumentFolderId'  => $DocumentFolderId,
                                'AddedBy'           => $UserProfileId,
                                );
            $doc_delete = $this->Document_Model->updateMyFolder($whereData, $updateData);
            $folder_doc_delete = $this->Document_Model->deleteMyFolderAndDocuments($DocumentFolderId, $UserProfileId);

            if($doc_delete == true) {
                
                $this->db->query("COMMIT");

                $msg = "Folder and its documents deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Folder not deleted. Not authorised to delete this folder.";
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
                           "status"         => 'success',
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function deleteDocument() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $DocumentId     = $this->input->post('document_id');

        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($DocumentId == "" || count($DocumentId) == 0) {
            $msg = "Please select your document";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'DocumentStatus'    => -1,
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'DocumentId'        => $DocumentId,
                                'AddedBy'           => $UserProfileId,
                                );
            $doc_delete = $this->Document_Model->updateMyDocument($whereData, $updateData);

            if($doc_delete == true) {
                
                $this->db->query("COMMIT");

                $msg = "Document deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Document not deleted. Not authorised to delete this document.";
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
                           "status"         => 'success',
                           "message"        => $msg,
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
        $ParentDocumentFolderId = $this->input->post('parent_folder_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $docs = $this->Document_Model->getMyAllDocument($UserProfileId, $ParentDocumentFolderId);
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

