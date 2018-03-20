<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Complaint_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->complaintTbl             = 'Complaint';
        $this->complaintAssignedTbl     = 'ComplaintAssigned';
        $this->complaintAttachmentTbl   = 'ComplaintAttachment';
        $this->complaintMemberTbl       = 'ComplaintMember';
        $this->complaintStatusTbl       = 'ComplaintStatus';
        $this->complaintTypeTbl         = 'ComplaintType';
        $this->complaintHistoryTbl      = 'ComplaintHistory';
        $this->complaintHistoryAttachmentTbl   = 'ComplaintHistoryAttachment';
    }


    public function generateComplaintUniqueId() {
        $ComplaintUniqueId = "C".mt_rand().time();
        $this->db->select('ComplaintUniqueId');
        $this->db->from($this->complaintTbl);
        $this->db->where('ComplaintUniqueId', $ComplaintUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateComplaintUniqueId();
        }
        return $ComplaintUniqueId;
    }


    public function saveMyComplaint($insertData) {
        $this->db->insert($this->complaintTbl, $insertData);

        $complaint_id = $this->db->insert_id();

        return $complaint_id;
    }


    public function saveMyComplaintMembers($ComplaintId, $UserProfileId, $complaint_member) {
        foreach($complaint_member AS $member_user_profile_id) {
            $insertData = array(
                                'ComplaintId'       => $ComplaintId,
                                'UserProfileId'     => $member_user_profile_id,
                                'AcceptedYesNo'     => 0,
                                'AddedBy'           => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'AcceptedOn'        => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->complaintMemberTbl, $insertData);
        }
        return true;
    }


    public function saveMyComplaintAttachment($ComplaintId, $UserProfileId, $complaint_attachment) {
        $j = 0;
        for($i = 0; $i < count($complaint_attachment['name']); $i++) {

            $upload_file_name = $complaint_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-COMPLAINT-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = COMPLAINT_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = COMPLAINT_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = COMPLAINT_AUDIO_DIR;
                } else {
                    $path = COMPLAINT_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $complaint_attachment['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);

                $insertData = array(
                                    'ComplaintId'           => $ComplaintId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $j++;
                $this->db->insert($this->complaintAttachmentTbl, $insertData);
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


    public function getMyAllComplaint($UserProfileId) {
        $complaints = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT ComplaintId FROM $this->complaintTbl WHERE `AddedBy` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $complaints[] = $this->getComplaintDetail($result['ComplaintId']);
            }
        } else {
            $complaints = array();
        }
        return $complaints;
    }


    public function getAllComplaintWhereMyselfAssociated($UserProfileId) {
        $complaints = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT ComplaintId FROM $this->complaintMemberTbl WHERE `UserProfileId` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $complaints[] = $this->getComplaintDetail($result['ComplaintId']);
            }
        } else {
            $complaints = array();
        }
        return $complaints;
    }


    
    public function getComplaintDetail($ComplaintId) {
        $complaint_detail = array();
        if(isset($ComplaintId) && $ComplaintId > 0) {

            $query = $this->db->query("SELECT * FROM $this->complaintTbl WHERE ComplaintId = '".$ComplaintId."'");

            $res = $query->row_array();

            $complaint_detail = $this->returnComplaintDetail($res);
        } else {
            $complaint_detail = array();
        }
        return $complaint_detail;
    }

    
    public function returnComplaintDetail($res) {
        $ComplaintId            = $res['ComplaintId'];
        $ComplaintUniqueId      = $res['ComplaintUniqueId'];
        $ComplaintTypeId        = $res['ComplaintTypeId'];
        $ApplicantName          = $res['ApplicantName'];
        $ApplicantFatherName    = $res['ApplicantFatherName'];
        $ComplaintDepartment    = $res['ComplaintDepartment'];
        $AddedBy                = $res['AddedBy'];
        
        $ComplaintSubject       = (($res['ComplaintSubject'] != NULL) ? $res['ComplaintSubject'] : "");
        $ComplaintDescription   = (($res['ComplaintDescription'] != NULL) ? $res['ComplaintDescription'] : "");
        $ComplaintStatus        = $res['ComplaintStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $ComplaintProfile       = $this->User_Model->getUserProfileWithUserInformation($AddedBy);
        $ComplaintMember        = $this->getComplaintMember($ComplaintId);
        $ComplaintAttachment    = $this->getComplaintAttachment($ComplaintId);

        $user_data_array = array(
                                "ComplaintId"               => $ComplaintId,
                                "ComplaintUniqueId"         => $ComplaintUniqueId,
                                "ComplaintTypeId"           => $ComplaintTypeId,
                                "ApplicantName"             => $ApplicantName,
                                "ApplicantFatherName"       => $ApplicantFatherName,
                                "ComplaintDepartment"       => $ComplaintDepartment,
                                "ComplaintSubject"          => $ComplaintSubject,
                                "ComplaintDescription"      => $ComplaintDescription,
                                "ComplaintStatus"           => $ComplaintStatus,
                                "AddedOn"                   => $AddedOn,
                                "UpdatedOn"                 => $UpdatedOn,
                                "ComplaintProfile"          => $ComplaintProfile,
                                "ComplaintMember"           => $ComplaintMember,
                                "ComplaintAttachment"       => $ComplaintAttachment,
                                );
        return $user_data_array;
    }



    public function getComplaintMember($ComplaintId) {
        
        $ComplaintMember = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->complaintMemberTbl." AS cm 
                                            LEFT JOIN ".$this->userProfileTbl." up ON cm.UserProfileId = up.UserProfileId
                                            WHERE 
                                                cm.`ComplaintId` = '".$ComplaintId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $ComplaintMember[] = $this->User_Model->getUserProfileWithUserInformation($result['UserProfileId']);
        }

        return $ComplaintMember;
    }



    public function getComplaintAttachment($ComplaintId) {
        
        $ComplaintAttachment = array();

        $query = $this->db->query("SELECT ca.*, at.TypeName 
                                            FROM ".$this->complaintAttachmentTbl." AS ca 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON ca.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                ca.`ComplaintId` = '".$ComplaintId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = COMPLAINT_IMAGE_DIR;
            } else if($AttachmentTypeId == 2) {
                $path = COMPLAINT_VIDEO_DIR;
            } else if($AttachmentTypeId == 4) {
                $path = COMPLAINT_AUDIO_DIR;
            } else {
                $path = COMPLAINT_DOC_DIR;
            }

            $ComplaintAttachment[] = array(
                                'ComplaintAttachmentId'     => $result['ComplaintAttachmentId'],
                                'ComplaintId'               => $result['ComplaintId'],
                                'AttachmentTypeId'          => $result['AttachmentTypeId'],
                                'AttachmentType'            => $result['TypeName'],
                                'AttachmentFile'            => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile'     => $result['AttachmentOrginalFile'],
                                'AttachmentOrder'           => $result['AttachmentOrder'],
                                'AttachmentStatus'          => $result['AttachmentStatus'],
                                'AddedOn'                   => return_time_ago($result['AddedOn']),
                                );
        }

        return $ComplaintAttachment;
    }
    

}