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

    // Generate Suggestion Unique Id
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

    // Save My Suggestion
    public function saveMySuggestion($insertData) {
        $this->db->insert($this->suggestionTbl, $insertData);

        $suggestion_id = $this->db->insert_id();

        return $suggestion_id;
    }


    // Update My Suggestion
    public function updateMySuggestion($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->suggestionTbl, $updateData);

        return $this->db->affected_rows();
    }


    // Save my Suggestion History
    public function saveMySuggestionHistory($insertData) {
        $this->db->insert($this->suggestionHistoryTbl, $insertData);

        $suggestion_history_id = $this->db->insert_id();

        return $suggestion_history_id;
    }
    
    // Assign Suggestion To leader or Sub Leader
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

    // Save my suggestion attachment
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
                $source = $suggestion_attachment['tmp_name'][$i];

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

    // Save My Suggestion History Attachment
    public function saveMySuggestionHistoryAttachment($SuggestionHistoryId, $UserProfileId, $suggestion_history_attachment) {
        $j = 0;
        for($i = 0; $i < count($suggestion_history_attachment['name']); $i++) {

            $upload_file_name = $suggestion_history_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-SUGGESTION-HISTORY-'.mt_rand().'.'.end(explode('.', $upload_file_name));

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
                $source = $suggestion_history_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-SUGGESTION-HISTORY-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = SUGGESTION_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'SuggestionHistoryId'    => $SuggestionHistoryId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->suggestionHistoryAttachmentTbl, $insertData);
            }
        }
        return true;
    }

    // Get Attachment Type id
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

    // Validate Attachment Extension
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

    // Get My All Suggestion
    public function getMyAllSuggestion($UserProfileId) {
        $suggestions = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT SuggestionId FROM $this->suggestionTbl WHERE `AddedBy` = '".$UserProfileId."' ORDER BY `AddedOn` DESC");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $suggestions[] = array(
                                        'feedtype'          => 'suggestion',
                                        'suggestiondata'    => $this->getSuggestionDetail($result['SuggestionId'], $UserProfileId),
                                        );
            }
        } else {
            $suggestions = array();
        }
        return $suggestions;
    }

    // Get All Assigned Suggestion To me
    public function getAllAssignedSuggestionToMe($UserProfileId) {
        $suggestions = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT sa.SuggestionId FROM ".$this->suggestionAssignedTbl." AS sa 
                                                LEFT JOIN ".$this->suggestionTbl." AS s ON sa.SuggestionId = s.SuggestionId
                                                WHERE 
                                                    sa.`AssignedTo` = '".$UserProfileId."' ORDER BY sa.`AddedOn` DESC");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $suggestions[] = $this->getSuggestionDetail($result['SuggestionId'], $UserProfileId);
            }
        } else {
            $suggestions = array();
        }
        return $suggestions;
    }

    // Get Suggestion Detail By Unique Id
    public function getSuggestionDetailByUniqueId($SuggestionUniqueId, $UserProfileId) {
        $suggestion_detail = array();
        if(isset($SuggestionUniqueId) && $SuggestionUniqueId != '') {

            $query = $this->db->query("SELECT * FROM $this->suggestionTbl WHERE SuggestionUniqueId = '".$SuggestionUniqueId."'");

            $res = $query->row_array();

            $suggestion_detail = $this->returnSuggestionDetail($res, $UserProfileId);
        } else {
            $suggestion_detail = array();
        }
        return $suggestion_detail;
    }

    // Get Suggestion Detail
    public function getSuggestionDetail($SuggestionId, $UserProfileId) {
        $suggestion_detail = array();
        if(isset($SuggestionId) && $SuggestionId > 0) {

            $query = $this->db->query("SELECT * FROM $this->suggestionTbl WHERE SuggestionId = '".$SuggestionId."'");

            $res = $query->row_array();

            $suggestion_detail = $this->returnSuggestionDetail($res, $UserProfileId);
        } else {
            $suggestion_detail = array();
        }
        return $suggestion_detail;
    }

    // Return Suggestion Detail
    public function returnSuggestionDetail($res, $UserProfileId) {
        $SuggestionId           = $res['SuggestionId'];
        $SuggestionUniqueId     = $res['SuggestionUniqueId'];
        $ApplicantName          = $res['ApplicantName'];
        $ApplicantFatherName    = $res['ApplicantFatherName'];
        $AddedBy                = $res['AddedBy'];
        
        $ApplicantGender        = (($res['ApplicantGender'] != NULL) ? $res['ApplicantGender'] : "");
        $ApplicantMobile        = (($res['ApplicantMobile'] != NULL) ? $res['ApplicantMobile'] : "");
        $ApplicantEmail         = (($res['ApplicantEmail'] != NULL) ? $res['ApplicantEmail'] : "");

        $ApplicantAddress       = (($res['ApplicantAddress'] != NULL) ? $res['ApplicantAddress'] : "");
        $ApplicantPlace         = (($res['ApplicantPlace'] != NULL) ? $res['ApplicantPlace'] : "");
        $SuggestionLatitude     = (($res['SuggestionLatitude'] != NULL) ? $res['SuggestionLatitude'] : "");
        $SuggestionLongitude    = (($res['SuggestionLongitude'] != NULL) ? $res['SuggestionLongitude'] : "");
        
        $ApplicantAadhaarNumber = (($res['ApplicantAadhaarNumber'] != NULL) ? $res['ApplicantAadhaarNumber'] : "");
        $SuggestionSubject      = (($res['SuggestionSubject'] != NULL) ? $res['SuggestionSubject'] : "");
        $SuggestionDescription  = (($res['SuggestionDescription'] != NULL) ? $res['SuggestionDescription'] : "");
        $SuggestionStatus       = $res['SuggestionStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $SuggestionAssigned      = $this->getSuggestionAssigned($SuggestionId, $UserProfileId);
        $SuggestionProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $SuggestionAttachment    = $this->getSuggestionAttachment($SuggestionId, $UserProfileId);
        $CountSuggestionHistory  = $this->getCountSuggestionHistory($SuggestionId, $UserProfileId);

        $user_data_array = array(
                                "SuggestionId"              => $SuggestionId,
                                "SuggestionUniqueId"        => $SuggestionUniqueId,
                                "ApplicantName"             => $ApplicantName,
                                "ApplicantFatherName"       => $ApplicantFatherName,
                                "ApplicantGender"           => $ApplicantGender,
                                "ApplicantMobile"           => $ApplicantMobile,
                                "ApplicantEmail"            => $ApplicantEmail,
                                "ApplicantAadhaarNumber"    => $ApplicantAadhaarNumber,
                                'ApplicantAddress'          => $ApplicantAddress,
                                'ApplicantPlace'            => $ApplicantPlace,
                                'SuggestionLatitude'        => $SuggestionLatitude,
                                'SuggestionLongitude'       => $SuggestionLongitude,
                                "SuggestionSubject"         => $SuggestionSubject,
                                "SuggestionDescription"     => $SuggestionDescription,
                                "SuggestionStatus"          => $SuggestionStatus,
                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "SuggestionProfile"         => $SuggestionProfile,
                                "SuggestionAssigned"        => $SuggestionAssigned,
                                "SuggestionAttachment"      => $SuggestionAttachment,
                                "CountSuggestionHistory"    => $CountSuggestionHistory,
                                );
        return $user_data_array;
    }


    public function getSuggestionAssigned($SuggestionId, $UserProfileId) {
        $SuggestionAssigned = array();

        $query = $this->db->query("SELECT sa.* 
                                            FROM ".$this->suggestionAssignedTbl." AS sa 
                                            LEFT JOIN ".$this->userProfileTbl." up ON sa.AssignedTo = up.UserProfileId
                                            WHERE 
                                                sa.`SuggestionId` = '".$SuggestionId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $user_detail = $this->User_Model->getUserProfileInformation($result['AssignedTo'], $UserProfileId);
            $SuggestionAssigned[] = $user_detail;
        }

        return $SuggestionAssigned;
    }



    // Get Suggestion Attachment
    public function getSuggestionAttachment($SuggestionId, $UserProfileId) {
        
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
                $path = SUGGESTION_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = SUGGESTION_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = SUGGESTION_AUDIO_URL;
            } else {
                $path = SUGGESTION_DOC_URL;
            }

            $AttachmentThumb = '';

            if($AttachmentTypeId == 2) {
                $AttachmentThumb = SUGGESTION_IMAGE_URL.$result['AttachmentThumb'];
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


    // Start Count Suggestion History
    public function getCountSuggestionHistory($SuggestionId, $UserProfileId) {
        $count_suggestion = 0;
        if(isset($SuggestionId) && $SuggestionId > 0) {

            $query = $this->db->query("SELECT SuggestionHistoryId FROM $this->suggestionHistoryTbl WHERE SuggestionId = '".$SuggestionId."' ORDER BY AddedOn DESC");

            $count_suggestion = $query->num_rows();
        }
        return $count_suggestion;
    }

    // Start Get All Suggestion History
    public function getSuggestionHistory($SuggestionId, $UserProfileId) {
        $suggestion_history_detail = array();
        if(isset($SuggestionId) && $SuggestionId > 0) {

            $query = $this->db->query("SELECT SuggestionHistoryId FROM $this->suggestionHistoryTbl WHERE SuggestionId = '".$SuggestionId."' ORDER BY AddedOn DESC");

            $res = $query->result_array();
            foreach($res AS $key => $result) {
                $suggestion_history_detail[] = $this->getSuggestionHistoryDetail($result['SuggestionHistoryId'], $UserProfileId);
            }

        } else {
            $suggestion_history_detail = array();
        }
        return $suggestion_history_detail;
    }

    // Start Get Suggestion History Detail
    public function getSuggestionHistoryDetail($SuggestionHistoryId, $UserProfileId) {
        $suggestion_history_detail = array();
        if(isset($SuggestionHistoryId) && $SuggestionHistoryId > 0) {

            $query = $this->db->query("SELECT * FROM $this->suggestionHistoryTbl WHERE SuggestionHistoryId = '".$SuggestionHistoryId."'");

            $res = $query->row_array();
            
            $suggestion_history_detail = $this->returnSuggestionHistoryDetail($res, $UserProfileId);

        } else {
            $suggestion_history_detail = array();
        }
        return $suggestion_history_detail;
    }

    // Return Suggestion Histpory Detail with Attachement and history history
    public function returnSuggestionHistoryDetail($res, $UserProfileId) {
        $SuggestionHistoryId         = $res['SuggestionHistoryId'];
        $SuggestionId                = $res['SuggestionId'];
        $ParentSuggestionHistoryId   = $res['ParentSuggestionHistoryId'];
        $AddedBy                    = $res['AddedBy'];
        
        $HistoryTitle           = (($res['HistoryTitle'] != NULL) ? $res['HistoryTitle'] : "");
        $HistoryDescription     = (($res['HistoryDescription'] != NULL) ? $res['HistoryDescription'] : "");
        $HistoryStatus          = $res['HistoryStatus'];

        $AddedOn                = return_time_ago($res['AddedOn']);

        $SuggestionHistoryProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $SuggestionHistoryAttachment    = $this->getSuggestionHistoryAttachment($SuggestionHistoryId, $UserProfileId);

        $SuggestionHistoryHistory       = $this->getSuggestionHistoryDetail($ParentSuggestionHistoryId, $UserProfileId);

        $data_array = array(
                            "SuggestionHistoryId"           => $SuggestionHistoryId,
                            "SuggestionId"                  => $SuggestionId,
                            "ParentSuggestionHistoryId"     => $ParentSuggestionHistoryId,
                            "HistoryTitle"                  => $HistoryTitle,
                            "HistoryDescription"            => $HistoryDescription,
                            "HistoryStatus"                 => $HistoryStatus,
                            "AddedOn"                       => $AddedOn,
                            "AddedOnTime"                   => $res['AddedOn'],
                            "SuggestionHistoryProfile"      => $SuggestionHistoryProfile,
                            "SuggestionHistoryAttachment"   => $SuggestionHistoryAttachment,
                            "SuggestionHistoryHistory"      => $SuggestionHistoryHistory,
                            );
        return $data_array;
    }

    // get Suggestion History Attachments
    public function getSuggestionHistoryAttachment($SuggestionHistoryId, $UserProfileId) {
        
        $SuggestionHistoryAttachment = array();

        $query = $this->db->query("SELECT sha.*, at.TypeName 
                                            FROM ".$this->suggestionHistoryAttachmentTbl." AS sha 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON sha.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                sha.`SuggestionHistoryId` = '".$SuggestionHistoryId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            $AddedBy = $result['AddedBy'];
            $AttachmentProfile = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

            if($AttachmentTypeId == 1) {
                $path = SUGGESTION_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = SUGGESTION_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = SUGGESTION_AUDIO_URL;
            } else {
                $path = SUGGESTION_DOC_URL;
            }

            $AttachmentThumb = ($result['AttachmentThumb'] != '') ? SUGGESTION_IMAGE_URL.$result['AttachmentThumb'] : '';

            $SuggestionHistoryAttachment[] = array(
                                                'SuggestionHistoryAttachmentId'     => $result['SuggestionHistoryAttachmentId'],
                                                'SuggestionHistoryId'               => $result['SuggestionHistoryId'],
                                                'AttachmentTypeId'                  => $result['AttachmentTypeId'],
                                                'AttachmentType'                    => $result['TypeName'],
                                                'AttachmentFile'                    => $path.$result['AttachmentFile'],
                                                'AttachmentThumb'                   => $AttachmentThumb,
                                                'AttachmentOrginalFile'             => $result['AttachmentOrginalFile'],
                                                'AttachmentOrder'                   => $result['AttachmentOrder'],
                                                'AttachmentStatus'                  => $result['AttachmentStatus'],
                                                'AddedBy'                           => $AttachmentProfile,
                                                'AddedOn'                           => return_time_ago($result['AddedOn']),
                                                'AddedOnTime'                       => ($result['AddedOn']),
                                                );
        }

        return $SuggestionHistoryAttachment;
    }


}