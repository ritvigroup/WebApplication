<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Suggestion_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->suggestionTbl             = 'Suggestion';
        $this->suggestionAssignedTbl     = 'SuggestionAssigned';
        $this->suggestionAttachmentTbl   = 'SuggestionAttachment';
        $this->suggestionHistoryTbl      = 'SuggestionHistory';
        $this->suggestionHistoryAttachmentTbl   = 'SuggestionHistoryAttachment';
    }


    public function generateSuggestionUniqueId() {
        $SuggestionUniqueId = "S".mt_rand().time();
        $this->db->select('SuggestionUniqueId');
        $this->db->from($this->suggestionTbl);
        $this->db->where('SuggestionUniqueId', $SuggestionUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateSuggestionUniqueId();
        }
        return $SuggestionUniqueId;
    }


    public function saveMySuggestion($insertData) {
        $this->db->insert($this->suggestionTbl, $insertData);

        $suggestion_id = $this->db->insert_id();

        return $suggestion_id;
    }


    public function assignSuggestionToLeaderSubLeader($SuggestionId, $UserProfileId, $AssignedTo) {
        $insertData = array(
                            'SuggestionId'      => $SuggestionId,
                            'AssignedTo'        => $AssignedTo,
                            'AssignedBy'        => $UserProfileId,
                            'AddedOn'           => date('Y-m-d H:i:s'),
                            );
        $this->db->insert($this->suggestionAssignedTbl, $insertData);
        return true;
    }


    public function saveMySuggestionAttachment($SuggestionId, $UserProfileId, $suggestion_attachment) {
        $j = 0;
        for($i = 0; $i < count($suggestion_attachment['name']); $i++) {

            $upload_file_name = $suggestion_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-SUGGESTION_IMAGE_DIR-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = SUGGESTION_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = SUGGESTION_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = SUGGESTION_AUDIO_DIR;
                } else {
                    $path = SUGGESTION_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $suggestion_attachment['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-SUGGESTION-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = EVENT_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'SuggestionId'           => $SuggestionId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $j++;
                $this->db->insert($this->suggestionAttachmentTbl, $insertData);
            }
        }
        return true;
    }



    public function getAttachmentTypeId($file_name) {
        $photo_file_array = array('jpg', 'jpeg', 'bmp', 'png');
        $doc_file_array = array('doc', 'docx', 'xls', 'pdf', 'txt');
        $video_file_array = array('mp4', 'dat', '3gp');
        $audio_file_array = array('mp3', 'wav');

        $file_extension = strtolower(end(explode('.', $file_name)));

        $AttachmentTypeId = $this->validateAttachmentExtension($extension);
        if(@in_array($file_extension, $photo_file_array)) {
            $AttachmentTypeId = 1;
        } else if(@in_array($file_extension, $video_file_array)) {
            $AttachmentTypeId = 2;
        } else if(@in_array($file_extension, $audio_file_array)) {
            $AttachmentTypeId = 4;
        } else {
            $AttachmentTypeId = 3;
        }
        return $AttachmentTypeId;
    }


    public function validateAttachmentExtension($extension) {
        $query = $this->db->query("SELECT AttachmentTypeId FROM ".$this->attachmentTypeTbl." 
                                                        WHERE 
                                                            `TypeExtensions` LIKE '%".$extension."%'");

        $res_u = $query->row_array();
        if($res_u['AttachmentTypeId'] > 0) {
            return $res_u['AttachmentTypeId'];
        } else {
            return 0;
        }
    }


    public function getMyAllSuggestion($UserProfileId) {
        $suggestions = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT SuggestionId FROM $this->suggestionTbl WHERE `AddedBy` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $suggestions[] = $this->getSuggestionDetail($result['SuggestionId']);
            }
        } else {
            $suggestions = array();
        }
        return $suggestions;
    }


    
    public function getSuggestionDetail($SuggestionId) {
        $suggestion_detail = array();
        if(isset($SuggestionId) && $SuggestionId > 0) {

            $query = $this->db->query("SELECT * FROM $this->suggestionTbl WHERE SuggestionId = '".$SuggestionId."'");

            $res = $query->row_array();

            $suggestion_detail = $this->returnSuggestionDetail($res);
        } else {
            $suggestion_detail = array();
        }
        return $suggestion_detail;
    }

    
    public function returnSuggestionDetail($res) {
        $SuggestionId           = $res['SuggestionId'];
        $SuggestionUniqueId     = $res['SuggestionUniqueId'];
        $ApplicantName          = $res['ApplicantName'];
        $ApplicantFatherName    = $res['ApplicantFatherName'];
        $AddedBy                = $res['AddedBy'];
        
        $ApplicantGender        = (($res['ApplicantGender'] != NULL) ? $res['ApplicantGender'] : "");
        $ApplicantMobile        = (($res['ApplicantMobile'] != NULL) ? $res['ApplicantMobile'] : "");
        $ApplicantEmail         = (($res['ApplicantEmail'] != NULL) ? $res['ApplicantEmail'] : "");
        $ApplicantAadhaarNumber = (($res['ApplicantAadhaarNumber'] != NULL) ? $res['ApplicantAadhaarNumber'] : "");
        $SuggestionSubject      = (($res['SuggestionSubject'] != NULL) ? $res['SuggestionSubject'] : "");
        $SuggestionDescription  = (($res['SuggestionDescription'] != NULL) ? $res['SuggestionDescription'] : "");
        $SuggestionStatus       = $res['SuggestionStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $SuggestionProfile       = $this->User_Model->getUserProfileWithUserInformation($AddedBy);
        $SuggestionAttachment    = $this->getSuggestionAttachment($SuggestionId);

        $user_data_array = array(
                                "SuggestionId"              => $SuggestionId,
                                "SuggestionUniqueId"        => $SuggestionUniqueId,
                                "ApplicantName"             => $ApplicantName,
                                "ApplicantFatherName"       => $ApplicantFatherName,
                                "ApplicantGender"           => $ApplicantGender,
                                "ApplicantMobile"           => $ApplicantMobile,
                                "ApplicantEmail"            => $ApplicantEmail,
                                "ApplicantAadhaarNumber"    => $ApplicantAadhaarNumber,
                                "SuggestionSubject"         => $SuggestionSubject,
                                "SuggestionDescription"     => $SuggestionDescription,
                                "SuggestionStatus"          => $SuggestionStatus,
                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "SuggestionProfile"         => $SuggestionProfile,
                                "SuggestionAttachment"      => $SuggestionAttachment,
                                );
        return $user_data_array;
    }



    public function getSuggestionAttachment($SuggestionId) {
        
        $SuggestionAttachment = array();

        $query = $this->db->query("SELECT sa.*, at.TypeName 
                                            FROM ".$this->suggestionAttachmentTbl." AS sa 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON sa.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                sa.`SuggestionId` = '".$SuggestionId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = SUGGESTION_IMAGE_DIR;
            } else if($AttachmentTypeId == 2) {
                $path = SUGGESTION_VIDEO_DIR;
            } else if($AttachmentTypeId == 4) {
                $path = SUGGESTION_AUDIO_DIR;
            } else {
                $path = SUGGESTION_DOC_DIR;
            }

            $AttachmentThumb = '';

            if($AttachmentTypeId == 2) {
                $AttachmentThumb = SUGGESTION_IMAGE_DIR.$result['AttachmentThumb'];
            }

            $SuggestionAttachment[] = array(
                                'SuggestionAttachmentId'    => $result['SuggestionAttachmentId'],
                                'SuggestionId'              => $result['SuggestionId'],
                                'AttachmentTypeId'          => $result['AttachmentTypeId'],
                                'AttachmentType'            => $result['TypeName'],
                                'AttachmentFile'            => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile'     => $result['AttachmentOrginalFile'],
                                'AttachmentThumb'           => $AttachmentThumb,
                                'AttachmentOrder'           => $result['AttachmentOrder'],
                                'AttachmentStatus'          => $result['AttachmentStatus'],
                                'AddedOn'                   => return_time_ago($result['AddedOn']),
                                'AddedOnTime'               => ($result['AddedOn']),
                                );
        }

        return $SuggestionAttachment;
    }
    

}