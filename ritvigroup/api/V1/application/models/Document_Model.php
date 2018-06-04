<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Document_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';

        $this->DocumentFolderTbl    = 'DocumentFolder';
        $this->DocumentTbl          = 'Document';
    }



    public function saveMyDocumentFolder($insertData) {
        $this->db->insert($this->DocumentFolderTbl, $insertData);

        $folder_id = $this->db->insert_id();

        return $folder_id;
    }


    public function updateMyFolder($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->DocumentFolderTbl, $updateData);

        return $this->db->affected_rows();
    }

    public function deleteMyFolderAndDocuments($DocumentFolderId, $UserProfileId) {
        $this->db->select('*');
        $this->db->from($this->DocumentFolderTbl);
        $this->db->where('DocumentFolderId', $DocumentFolderId);
    }


    public function saveDocument($DocumentFolderId, $UserProfileId, $DocumentName, $doc_attachment) {
        $j = 0;

        if(basename($doc_attachment['name'][0]) != '') {
            for($i = 0; $i < count($doc_attachment['name']); $i++) {

                $DocumentFile = basename($doc_attachment['name'][$i]);

                $AttachmentFile = '';
                if($DocumentFile != '') {

                    $AttachmentFile = date('YmdHisA').'-'.time().'-DOCUMENT-'.mt_rand().'.'.end(explode('.', $DocumentFile));

                    $path = DOC_DIR;

                    $path = $path.$AttachmentFile;
                    $source = $doc_attachment['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                } else {
                }

                $DocumentName = $DocumentFile;

                $insertData = array(
                                    'DocumentFolderId'      => $DocumentFolderId,
                                    'DocumentName'          => $DocumentName,
                                    'DocumentPath'          => $AttachmentFile,
                                    'DocumentStatus'        => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'UpdatedBy'             => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    'UpdatedOn'             => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->DocumentTbl, $insertData);
            }
        } else {
            $DocumentFile = basename($doc_attachment['name']);
            $AttachmentFile = '';
            if($DocumentFile != '') {

                $AttachmentFile = date('YmdHisA').'-'.time().'-DOCUMENT-'.mt_rand().'.'.end(explode('.', $DocumentFile));

                $path = DOC_DIR;

                $path = $path.$AttachmentFile;
                $source = $doc_attachment['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);
            }
            $DocumentName = $DocumentFile;
            $insertData = array(
                                'DocumentFolderId'      => $DocumentFolderId,
                                'DocumentName'          => $DocumentName,
                                'DocumentPath'          => $AttachmentFile,
                                'DocumentStatus'        => 1,
                                'AddedBy'               => $UserProfileId,
                                'UpdatedBy'             => $UserProfileId,
                                'AddedOn'               => date('Y-m-d H:i:s'),
                                'UpdatedOn'             => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->DocumentTbl, $insertData);
        }
        return true;
    }


    public function updateMyDocument($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->DocumentTbl, $updateData);

        return $this->db->affected_rows();
    }


    public function getMyAllDocument($UserProfileId, $parent_folder_id = 0) {
        $docs = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $parent_folder_id = ($parent_folder_id > 0) ? $parent_folder_id : 0;
            $this->db->select('DocumentId');
            $this->db->from($this->DocumentTbl);
            $this->db->where('DocumentFolderId', $parent_folder_id);
            $this->db->where('AddedBy', $UserProfileId);
            $this->db->where('DocumentStatus !=', -1);
            $this->db->order_by('UpdatedOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $docs[] = $this->getDocumentDetail($result['DocumentId'], $UserProfileId);
            }
        } else {
            $docs = array();
        }
        return $docs;
    }

    
    public function getDocumentDetail($DocumentId, $UserProfileId = 0) {
        $doc_detail = array();
        if(isset($DocumentId) && $DocumentId > 0) {

            $sql = "SELECT d.*, df.DocumentFolderName FROM 
                                                ".$this->DocumentTbl." AS d 
                                            LEFT JOIN ".$this->DocumentFolderTbl." AS df ON d.DocumentFolderId = df.DocumentFolderId
                                            WHERE 
                                                d.DocumentId = '".$DocumentId."'
                                            ORDER BY d.AddedOn DESC";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['DocumentId'] > 0) {
                $doc_detail = $this->returnDocumentDetail($res, $UserProfileId);
            }
        } else {
            $doc_detail = array();
        }
        return $doc_detail;
    }

    
    public function returnDocumentDetail($res, $UserProfileId = 0) {
        $DocumentId             = $res['DocumentId'];
        $DocumentFolderId       = $res['DocumentFolderId'];
        $DocumentFolderName     = $res['DocumentFolderName'];
        $DocumentName           = (($res['DocumentName'] != NULL) ? $res['DocumentName'] : "");
        $DocumentPath           = (($res['DocumentPath'] != NULL) ? DOC_URL.$res['DocumentPath'] : "");
        $DocumentStatus         = (($res['DocumentStatus'] != NULL) ? $res['DocumentStatus'] : "");

        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        //$DocumentProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

        $doc_folder_data_array = array(
                                    "DocumentId"            => $DocumentId,
                                    "DocumentFolderId"      => $DocumentFolderId,
                                    "DocumentFolderName"    => $DocumentFolderName,
                                    "DocumentName"          => $DocumentName,
                                    "DocumentPath"          => $DocumentPath,
                                    "DocumentStatus"        => $DocumentStatus,
                                    "AddedOn"               => $AddedOn,
                                    "AddedOnTime"           => $res['AddedOn'],
                                    "UpdatedOn"             => $UpdatedOn,
                                    "UpdatedOnTime"         => $res['UpdatedOn'],
                                    //"DocumentProfile"     => $DocumentProfile,
                                    );
        return $doc_folder_data_array;
    }

    public function getFolders() {
        $this->db->select('*');
        $this->db->from($this->DocumentFolderTbl);
        $this->db->where('ParentDocumentFolderId', 0);

        $parent = $this->db->get();
        
        $categories = $parent->result();
        $i=0;
        $dir = array();
        foreach($categories as $p_cat){
            $dir[$i] = $p_cat;
            $dir[$i]->SubFolder = $this->getSubFolders($p_cat->DocumentFolderId);
            $i++;
        }
        return $categories;
    }

    public function getSubFolders($id){

        $this->db->select('*');
        $this->db->from($this->DocumentFolderTbl);
        $this->db->where('ParentDocumentFolderId', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        $sub_cat = array();
        foreach($categories as $p_cat){
            $sub_cat[$i] = $p_cat;
            $sub_cat[$i]->SubFolder = $this->getSubFolders($p_cat->DocumentFolderId);
            $i++;
        }
        return $sub_cat;       
    }

    public function getMyAllDocumentFolderOld($UserProfileId, $parent_folder_id = 0) {
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('DocumentFolderId');
            $this->db->from($this->DocumentFolderTbl);
            $this->db->where('AddedBy', $UserProfileId);
            $this->db->where('ParentDocumentFolderId', $parent_folder_id);
            $this->db->where('DocumentFolderStatus !=', -1);
            $this->db->order_by('DocumentFolderName','ASC');
            $query = $this->db->get();

            $res = $query->result_array();

            $i = 0;
            foreach($res AS $key => $result) {
                $doc_folders[$i] = $this->getDocumentFolderDetail($result['DocumentFolderId'], $UserProfileId);
                $doc_folders[$i]['SubFolder'][] = $this->getMyAllSubDocumentFolder($result['DocumentFolderId'], $UserProfileId);
                $i++;
            }
        }
        return $doc_folders;
    }

    public function getMyAllSubDocumentFolder($parent_folder_id, $UserProfileId) {
        $this->db->select('DocumentFolderId');
        $this->db->from($this->DocumentFolderTbl);
        $this->db->where('ParentDocumentFolderId', $parent_folder_id);
        $this->db->where('DocumentFolderStatus !=', -1);
        $this->db->order_by('DocumentFolderName','ASC');
        $child = $this->db->get();

        $res = $child->result_array();


        $i = 0;
        $sub_doc_folders = array();
        foreach($res AS $key => $result) {

            $sub_doc_folders[$i] = $this->getDocumentFolderDetail($result['DocumentFolderId'], $UserProfileId);
            $sub_doc_folders[$i]['SubFolder'][] = $this->getMyAllSubDocumentFolder($result['DocumentFolderId'], $UserProfileId);

            $i++;
        }
        return $sub_doc_folders;
    }


    public function getMyAllDocumentFolder($UserProfileId, $parent_folder_id = 0) {
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $parent_folder_id = ($parent_folder_id > 0) ? $parent_folder_id : 0;

            $this->db->select('DocumentFolderId');
            $this->db->from($this->DocumentFolderTbl);
            $this->db->where('AddedBy', $UserProfileId);
            $this->db->where('ParentDocumentFolderId', $parent_folder_id);
            $this->db->where('DocumentFolderStatus !=', -1);
            $this->db->order_by('DocumentFolderName','ASC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $doc_folders[] = $this->getDocumentFolderDetail($result['DocumentFolderId'], $UserProfileId);
            }
        }
        return $doc_folders;
    }

    
    public function getDocumentFolderDetail($DocumentFolderId, $UserProfileId = 0) {
        $folder_detail = array();
        if(isset($DocumentFolderId) && $DocumentFolderId > 0) {

            $query = $this->db->query("SELECT * FROM $this->DocumentFolderTbl WHERE DocumentFolderId = '".$DocumentFolderId."'");

            $res = $query->row_array();

            if($res['DocumentFolderId'] > 0) {
                $folder_detail = $this->returnDocumentFolderDetail($res, $UserProfileId);
            }
        } else {
            $folder_detail = array();
        }
        return $folder_detail;
    }

    
    public function returnDocumentFolderDetail($res, $UserProfileId = 0) {
        $DocumentFolderId           = $res['DocumentFolderId'];
        $DocumentFolderName         = $res['DocumentFolderName'];
        $DocumentFolderDescription  = (($res['DocumentFolderDescription'] != NULL) ? $res['DocumentFolderDescription'] : "");
        $ParentDocumentFolderId     = $res['ParentDocumentFolderId'];
        $DocumentFolderStatus       = (($res['DocumentFolderStatus'] != NULL) ? $res['DocumentFolderStatus'] : "");

        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        //$DocumentFolderProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

        $doc_folder_data_array = array(
                                    "DocumentFolderId"          => $DocumentFolderId,
                                    "DocumentFolderName"        => $DocumentFolderName,
                                    "DocumentFolderDescription" => $DocumentFolderDescription,
                                    "ParentDocumentFolderId"    => $ParentDocumentFolderId,
                                    "DocumentFolderStatus"      => $DocumentFolderStatus,
                                    "AddedOn"                   => $AddedOn,
                                    "AddedOnTime"               => $res['AddedOn'],
                                    "UpdatedOn"                 => $UpdatedOn,
                                    "UpdatedOnTime"             => $res['UpdatedOn'],
                                    //"DocumentFolderProfile"     => $DocumentFolderProfile,
                                    );
        return $doc_folder_data_array;
    }



    public function getDocumentFolderExist($DocumentFolderName, $UserProfileId, $ParentDocumentFolderId) {
        $folder_res = array();
        if(isset($DocumentFolderName) && $DocumentFolderName != '') {

            $query = $this->db->query("SELECT * FROM $this->DocumentFolderTbl WHERE lower(DocumentFolderName) = '".strtolower($DocumentFolderName)."' AND `AddedBy` = '".$UserProfileId."' AND `ParentDocumentFolderId` = '".$ParentDocumentFolderId."'");

            $folder_res = $query->row_array();

        }
        return $folder_res;
    }


}