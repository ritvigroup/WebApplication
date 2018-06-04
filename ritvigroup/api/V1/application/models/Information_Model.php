<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Information_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->informationTbl                   = 'Information';
        $this->informationAttachmentTbl         = 'InformationAttachment';
        $this->informationHistoryTbl            = 'InformationHistory';
        $this->informationHistoryAttachmentTbl  = 'InformationHistoryAttachment';
    }


    public function generateInformationUniqueId() {
        $InformationUniqueId = "I".mt_rand().time();
        $this->db->select('InformationUniqueId');
        $this->db->from($this->informationTbl);
        $this->db->where('InformationUniqueId', $InformationUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateInformationUniqueId();
        }
        return $InformationUniqueId;
    }


    public function saveMyInformation($insertData) {
        $this->db->insert($this->informationTbl, $insertData);

        $information_id = $this->db->insert_id();

        return $information_id;
    }



    public function saveMyInformationAttachment($InformationId, $UserProfileId, $information_attachment) {
        $j = 0;
        for($i = 0; $i < count($information_attachment['name']); $i++) {

            $upload_file_name = $information_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-INFORMATION-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = INFORMATION_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = INFORMATION_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = INFORMATION_AUDIO_DIR;
                } else {
                    $path = INFORMATION_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $information_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $insertData = array(
                                    'InformationId'         => $InformationId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $j++;
                $this->db->insert($this->informationAttachmentTbl, $insertData);
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


    public function getMyAllInformation($UserProfileId) {
        $information = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT InformationId FROM $this->informationTbl WHERE `AddedBy` = '".$UserProfileId."' ORDER BY AddedOn DESC");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $information[] = array(
                                        'feedtype'          => 'information',
                                        'informationdata'   => $this->getInformationDetail($result['InformationId'], $UserProfileId),
                                        );
            }
        } else {
            $information = array();
        }
        return $information;
    }


    
    public function getInformationDetail($InformationId, $UserProfileId) {
        $information_detail = array();
        if(isset($InformationId) && $InformationId > 0) {

            $query = $this->db->query("SELECT * FROM $this->informationTbl WHERE InformationId = '".$InformationId."'");

            $res = $query->row_array();

            $information_detail = $this->returnInformationDetail($res, $UserProfileId);
        } else {
            $information_detail = array();
        }
        return $information_detail;
    }

    
    public function returnInformationDetail($res, $UserProfileId) {
        $InformationId              = $res['InformationId'];
        $InformationUniqueId        = $res['InformationUniqueId'];
        $InformationPrivacy         = $res['InformationPrivacy'];
        $ApplicantName              = $res['ApplicantName'];
        $ApplicantFatherName        = $res['ApplicantFatherName'];
        $ApplicantGender            = $res['ApplicantGender'];
        $ApplicantMobile            = $res['ApplicantMobile'];
        $ApplicantEmail             = $res['ApplicantEmail'];
        $ApplicantAadhaarNumber     = $res['ApplicantAadhaarNumber'];
        $AddedBy                    = $res['AddedBy'];
        
        $InformationSubject       = (($res['InformationSubject'] != NULL) ? $res['InformationSubject'] : "");
        $InformationDescription   = (($res['InformationDescription'] != NULL) ? $res['InformationDescription'] : "");
        $InformationStatus        = $res['InformationStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $InformationProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $InformationAttachment    = $this->getInformationAttachment($InformationId);

        $user_data_array = array(
                                "InformationId"             => $InformationId,
                                "InformationUniqueId"       => $InformationUniqueId,
                                "InformationPrivacy"        => $InformationPrivacy,
                                "ApplicantName"             => $ApplicantName,
                                "ApplicantFatherName"       => $ApplicantFatherName,
                                "ApplicantGender"           => $ApplicantGender,
                                "ApplicantMobile"           => $ApplicantMobile,
                                "ApplicantEmail"            => $ApplicantEmail,
                                "ApplicantAadhaarNumber"    => $ApplicantAadhaarNumber,
                                "InformationSubject"        => $InformationSubject,
                                "InformationDescription"    => $InformationDescription,
                                "InformationStatus"         => $InformationStatus,
                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "InformationProfile"        => $InformationProfile,
                                "InformationAttachment"     => $InformationAttachment,
                                );
        return $user_data_array;
    }



    public function getInformationAttachment($InformationId) {
        
        $InformationAttachment = array();

        $query = $this->db->query("SELECT ia.*, at.TypeName 
                                            FROM ".$this->informationAttachmentTbl." AS ia 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON ia.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                ia.`InformationId` = '".$InformationId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = INFORMATION_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = INFORMATION_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = INFORMATION_AUDIO_URL;
            } else {
                $path = INFORMATION_DOC_URL;
            }

            $InformationAttachment[] = array(
                                'InformationAttachmentId'     => $result['InformationAttachmentId'],
                                'InformationId'               => $result['InformationId'],
                                'AttachmentTypeId'          => $result['AttachmentTypeId'],
                                'AttachmentType'            => $result['TypeName'],
                                'AttachmentFile'            => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile'     => $result['AttachmentOrginalFile'],
                                'AttachmentOrder'           => $result['AttachmentOrder'],
                                'AttachmentStatus'          => $result['AttachmentStatus'],
                                'AddedOn'                   => return_time_ago($result['AddedOn']),
                                'AddedOnTime'               => ($result['AddedOn']),
                                );
        }

        return $InformationAttachment;
    }
    

}