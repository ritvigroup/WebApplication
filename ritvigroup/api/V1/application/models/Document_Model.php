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


    public function saveDocument($DocumentFolderId, $UserProfileId, $DocumentName, $doc_attachment) {
        $j = 0;

        /*if($doc_attachment['name'][0] != '') {
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
        } else {*/
            $DocumentFile = basename($doc_attachment['name']);
            $AttachmentFile = '';
            if($DocumentFile != '') {

                $AttachmentFile = date('YmdHisA').'-'.time().'-DOCUMENT-'.mt_rand().'.'.end(explode('.', $DocumentFile));

                $path = DOC_DIR;

                $path = $path.$AttachmentFile;
                $source = $doc_attachment['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);
            } else {

            }

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
        //}
        return true;
    }


    public function updateMyDocument($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->DocumentTbl, $updateData);

        return $this->db->last_query();
        return $this->db->affected_rows();
    }


    public function getMyAllDocument($UserProfileId) {
        $docs = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('DocumentId');
            $this->db->from($this->DocumentTbl);
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

        $DocumentProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

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
                                    "DocumentProfile"     => $DocumentProfile,
                                    );
        return $doc_folder_data_array;
    }

    

    public function getMyAllDocumentFolder($UserProfileId) {
        $doc_folders = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('DocumentFolderId');
            $this->db->from($this->DocumentFolderTbl);
            $this->db->where('AddedBy', $UserProfileId);
            $this->db->where('DocumentFolderStatus !=', -1);
            $this->db->order_by('DocumentFolderName','ASC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $doc_folders[] = $this->getDocumentFolderDetail($result['DocumentFolderId'], $UserProfileId);
            }
        } else {
            $doc_folders = array();
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
        $DocumentFolderStatus       = (($res['DocumentFolderStatus'] != NULL) ? $res['DocumentFolderStatus'] : "");

        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $DocumentFolderProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

        $doc_folder_data_array = array(
                                    "DocumentFolderId"          => $DocumentFolderId,
                                    "DocumentFolderName"        => $DocumentFolderName,
                                    "DocumentFolderDescription" => $DocumentFolderDescription,
                                    "DocumentFolderStatus"      => $DocumentFolderStatus,
                                    "AddedOn"                   => $AddedOn,
                                    "AddedOnTime"               => $res['AddedOn'],
                                    "UpdatedOn"                 => $UpdatedOn,
                                    "UpdatedOnTime"             => $res['UpdatedOn'],
                                    "DocumentFolderProfile"     => $DocumentFolderProfile,
                                    );
        return $doc_folder_data_array;
    }



    public function getDocumentFolderExist($DocumentFolderName, $UserProfileId = 0) {
        $folder_res = array();
        if(isset($DocumentFolderName) && $DocumentFolderName != '') {

            $query = $this->db->query("SELECT * FROM $this->DocumentFolderTbl WHERE lower(DocumentFolderName) = '".strtolower($DocumentFolderName)."'");

            $folder_res = $query->row_array();

        }
        return $folder_res;
    }


}