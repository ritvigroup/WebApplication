<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Complaint_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->DepartmentTbl            = 'Department';

        $this->complaintTbl             = 'Complaint';
        $this->complaintAssignedTbl     = 'ComplaintAssigned';
        $this->complaintAttachmentTbl   = 'ComplaintAttachment';
        $this->complaintMemberTbl       = 'ComplaintMember';
        $this->complaintStatusTbl       = 'ComplaintStatus';
        $this->complaintTypeTbl         = 'ComplaintType';
        $this->complaintHistoryTbl      = 'ComplaintHistory';
        $this->complaintHistoryAttachmentTbl   = 'ComplaintHistoryAttachment';

        $this->ComplaintLikeTbl         = 'ComplaintLike';
        $this->ComplaintCommentTbl         = 'ComplaintComment';
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


    public function getAllDepartment() {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->DepartmentTbl);
        $this->db->where('DepartmentStatus', 1);
        $this->db->order_by('DepartmentName', 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }


    public function getAllComplaintType() {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->complaintTypeTbl);
        $this->db->where('TypeStatus', 1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }


    public function getAllComplaintStatus() {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->complaintStatusTbl);
        $this->db->where('StatusStatus', 1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }


    public function getComplaintStatusDetail($ComplaintStatusId) {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->complaintStatusTbl);
        $this->db->where('ComplaintStatusId', $ComplaintStatusId);
        $this->db->where('StatusStatus', 1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result[0];
    }


    public function saveMyComplaint($insertData) {
        $this->db->insert($this->complaintTbl, $insertData);

        $complaint_id = $this->db->insert_id();

        return $complaint_id;
    }


    public function updateMyComplaint($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->complaintTbl, $updateData);

        return $this->db->affected_rows();
    }


    public function updateComplaint($UserProfileId, $ComplaintId, $current_status = 0) {
        if($current_status > 0) {
            $this->db->where('ComplaintId', $ComplaintId);

            $updateData = array(
                                'ComplaintStatus' => $current_status,
                                'UpdatedOn' => date('Y-m-d H:i:s'),
                                'UpdatedBy' => $UserProfileId,
                                );

            $this->db->update($this->complaintTbl, $updateData);
        }
    }


    public function assignComplaintToLeaderSubLeader($ComplaintId, $UserProfileId, $AssignedTo) {
        $insertData = array(
                            'ComplaintId'       => $ComplaintId,
                            'AssignedTo'        => $AssignedTo,
                            'AssignedBy'        => $UserProfileId,
                            'AddedOn'           => date('Y-m-d H:i:s'),
                            );
        $this->db->insert($this->complaintAssignedTbl, $insertData);
        return true;
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

    public function copyMyComplaintMembers($OldComplaintId, $NewComplaintId, $UserProfileId) {
        $this->db->select('*');
        $this->db->from($this->complaintMemberTbl);
        $this->db->where('ComplaintId', $OldComplaintId);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach($result AS $member) {
                
                $complaint_member[] = $member['UserProfileId'];
                
            }
            $this->saveMyComplaintMembers($NewComplaintId, $UserProfileId, $complaint_member);
        }
        return true;
    }


    public function copyMyComplaintAttachment($OldComplaintId, $NewComplaintId, $UserProfileId) {
        $this->db->select('*');
        $this->db->from($this->complaintAttachmentTbl);
        $this->db->where('ComplaintId', $OldComplaintId);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach($result AS $attachment) {
                $insertData = array(
                                    'ComplaintId'               => $NewComplaintId,
                                    'AttachmentTypeId'          => $attachment['AttachmentTypeId'],
                                    'AttachmentFile'            => $attachment['AttachmentFile'],
                                    'AttachmentOrginalFile'     => $attachment['AttachmentOrginalFile'],
                                    'AttachmentThumb'           => $attachment['AttachmentThumb'],
                                    'AttachmentOrder'           => $attachment['AttachmentOrder'],
                                    'AttachmentStatus'          => $attachment['AttachmentStatus'],
                                    'AddedBy'                   => $UserProfileId,
                                    'AddedOn'                   => date('Y-m-d H:i:s'),
                                    'DeletedOn'                 => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->complaintAttachmentTbl, $insertData);
                
            }
        }
        return true;
    }


    public function saveMyComplaintHistory($insertData) {
        $this->db->insert($this->complaintHistoryTbl, $insertData);

        $complaint_history_id = $this->db->insert_id();

        return $complaint_history_id;
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
                $source = $complaint_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-COMPLAINT-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = COMPLAINT_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'ComplaintId'           => $ComplaintId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->complaintAttachmentTbl, $insertData);
            }
        }
        return true;
    }


    public function saveMyComplaintHistoryAttachment($ComplaintHistoryId, $UserProfileId, $complaint_history_attachment) {
        $j = 0;
        for($i = 0; $i < count($complaint_history_attachment['name']); $i++) {

            $upload_file_name = $complaint_history_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-COMPLAINT-HISTORY-'.mt_rand().'.'.end(explode('.', $upload_file_name));

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
                $source = $complaint_history_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-COMPLAINT-HISTORY-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = COMPLAINT_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'ComplaintHistoryId'    => $ComplaintHistoryId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->complaintHistoryAttachmentTbl, $insertData);
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


    public function getMyAllComplaint($UserProfileId, $FriendProfileId) {
        $complaints = array();
        
        if($FriendProfileId > 0) {

            /*$sql = "(SELECT ComplaintId FROM ".$this->complaintTbl." WHERE `AddedBy` = '".$UserProfileId."' ORDER BY AddedOn DESC) 
                    UNION 
                    (SELECT cm.ComplaintId FROM ".$this->complaintMemberTbl." cm 
                     LEFT JOIN ".$this->complaintTbl." AS c ON cm.ComplaintId = c.ComplaintId WHERE cm.`UserProfileId` = '".$UserProfileId."' ORDER BY c.AddedOn DESC) 
                    ";*/


            if($UserProfileId != $FriendProfileId) {
                $sql = $this->db->query("SELECT ComplaintId FROM $this->complaintTbl WHERE `AddedBy` = '".$FriendProfileId."' AND `ComplaintPrivacy` = '1' ORDER BY AddedOn DESC");
            } else {
                $sql = $this->db->query("SELECT ComplaintId FROM $this->complaintTbl WHERE `AddedBy` = '".$FriendProfileId."' ORDER BY AddedOn DESC");
            }

            $query = $this->db->query($sql);

            $res = $query->result_array();

            $complaint_array = array();
            foreach($res AS $key => $result) {
                if(!@in_array($result['complaint_array'], $complaint_array)) {
                    $complaints[] = $this->getComplaintDetail($result['ComplaintId'], $UserProfileId);
                    $complaint_array[] = $result['ComplaintId'];
                }
            }
        }
        return $complaints;
    }


    // Get All Complaint Where Myself Associated
    public function getAllComplaintWhereMyselfAssociated($UserProfileId, $FriendProfileId) {
        $complaints = array();
        if($FriendProfileId > 0) {

            if($UserProfileId != $FriendProfileId) {
                $this->db->select('cm.ComplaintId');
                $this->db->from($this->complaintMemberTbl.' AS cm');
                $this->db->join($this->complaintTbl.' AS c', 'cm.ComplaintId = c.ComplaintId', 'LEFT');
                $this->db->where('cm.UserProfileId', $FriendProfileId);
                $this->db->where('c.ComplaintPrivacy', 1);
                $this->db->where('cm.AcceptedYesNo !=', -1); // Declined
                $this->db->order_by('c.AddedOn', 'DESC');

            } else {
                $this->db->select('cm.ComplaintId');
                $this->db->from($this->complaintMemberTbl.' AS cm');
                $this->db->join($this->complaintTbl.' AS c', 'cm.ComplaintId = c.ComplaintId', 'LEFT');
                $this->db->where('cm.UserProfileId', $FriendProfileId);
                $this->db->where('cm.AcceptedYesNo !=', -1); // Declined
                $this->db->order_by('c.AddedOn', 'DESC');
            }

            
            $query = $this->db->get();

            //echo $this->db->last_query();
            
            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $complaints[] = $this->getComplaintDetail($result['ComplaintId'], $UserProfileId);
            }
        }
        return $complaints;
    }


    public function getAllAssignedComplaintToMe($UserProfileId) {
        $complaints = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $sql = "SELECT DISTINCT(c.ComplaintId) AS ComplaintId FROM 
                                                ".$this->complaintAssignedTbl." ca
                                            LEFT JOIN ".$this->complaintTbl." AS c ON ca.ComplaintId = c.ComplaintId 
                                            WHERE 
                                                ca.`AssignedTo` = '".$UserProfileId."' 
                                            AND c.ComplaintStatus > 0 
                                            ORDER BY c.AddedOn DESC";
            $query = $this->db->query($sql);

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $complaints[] = $this->getComplaintDetail($result['ComplaintId'], $UserProfileId);
            }
        } else {
            $complaints = array();
        }
        return $complaints;
    }


    // Accept Complaint Invitations
    public function updateComplaintInvitations($UserProfileId, $ComplaintId) {
        if($ComplaintId > 0) {
            $this->db->where('ComplaintId', $ComplaintId);
            $this->db->where('UserProfileId', $UserProfileId);

            $SignatureAttached = '';
            if(basename($_FILES['file']['name']) != '') {
                $SignatureAttached = date('YmdHisA').'-'.time().'-COMPLAINT-SIGNATURE-'.mt_rand().'.'.end(explode('.', $_FILES['file']['name']));

                $path = COMPLAINT_IMAGE_DIR;
                $path = $path.$SignatureAttached;
                $source = $_FILES['file']['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);
            }

            $updateData = array(
                                'AcceptedYesNo'     => 1,
                                'AcceptedOn'        => date('Y-m-d H:i:s'),
                                'SignatureAttached' => $SignatureAttached,
                                );

            $this->db->update($this->complaintMemberTbl, $updateData);
            return true;
        } 
        return false;
    }


    // Reject Complaint Invitations
    public function rejectComplaintInvitations($UserProfileId, $ComplaintId) {
        if($ComplaintId > 0) {
            $this->db->where('ComplaintId', $ComplaintId);
            $this->db->where('UserProfileId', $UserProfileId);

            $updateData = array(
                                'AcceptedYesNo' => -1,
                                'RejectedOn' => date('Y-m-d H:i:s'),
                                );

            $this->db->update($this->complaintMemberTbl, $updateData);
            return true;
        } 
        return false;
    }


    // Get Complaint Detail By Unique Id
    public function getComplaintDetailByUniqueId($ComplaintUniqueId, $UserProfileId) {
        $complaint_detail = array();
        if(isset($ComplaintUniqueId) && $ComplaintUniqueId != '') {

            $query = $this->db->query("SELECT * FROM $this->complaintTbl WHERE ComplaintUniqueId = '".$ComplaintUniqueId."'");

            $res = $query->row_array();

            $complaint_detail = $this->returnComplaintDetail($res, $UserProfileId);
        } else {
            $complaint_detail = array();
        }
        return $complaint_detail;
    }


    public function getActiveUserProfileIdAssociatedWithComplaint($ComplaintId, $except_UserProfileId = 0) {

        $user_profile_id_array = array();

        // Complaint Creator
        $query = $this->db->query("SELECT AddedBy FROM ".$this->complaintTbl." WHERE ComplaintId = '".$ComplaintId."'");        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            if(!@in_array($result['AddedBy'], $user_profile_id_array) && $result['AddedBy'] != $except_UserProfileId) {
                $user_profile_id_array[] = $result['AddedBy'];
            }
        }

        // Complaint Members
        $query = $this->db->query("SELECT UserProfileId FROM ".$this->complaintMemberTbl." WHERE ComplaintId = '".$ComplaintId."' AND AcceptedYesNo = '1'");        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            if(!@in_array($result['UserProfileId'], $user_profile_id_array) && $result['UserProfileId'] != $except_UserProfileId) {
                $user_profile_id_array[] = $result['UserProfileId'];
            }
        }

        // Complaint History Repiers
        $query = $this->db->query("SELECT AddedBy FROM ".$this->complaintHistoryTbl." WHERE ComplaintId = '".$ComplaintId."'");        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            if(!@in_array($result['AddedBy'], $user_profile_id_array) && $result['AddedBy'] != $except_UserProfileId) {
                $user_profile_id_array[] = $result['AddedBy'];
            }
        }

        return $user_profile_id_array;
    }


    // Get Complaint Detail
    public function getComplaintDetail($ComplaintId, $UserProfileId) {
        $complaint_detail = array();
        if(isset($ComplaintId) && $ComplaintId > 0) {

            $query = $this->db->query("SELECT c.*, cs.StatusName AS ComplaintStatusName, d.DepartmentName AS DepartmentName 
                                            FROM ".$this->complaintTbl." AS c 
                                            LEFT JOIN ".$this->complaintStatusTbl." AS cs ON c.ComplaintStatus = cs.ComplaintStatusId
                                            LEFT JOIN ".$this->DepartmentTbl." AS d ON c.ComplaintDepartment = d.DepartmentId
                                            WHERE 
                                                c.ComplaintId = '".$ComplaintId."'");

            $res = $query->row_array();

            $complaint_detail = $this->returnComplaintDetail($res, $UserProfileId);
        } else {
            $complaint_detail = array();
        }
        return $complaint_detail;
    }

    // Return Complaint Detail
    public function returnComplaintDetail($res, $UserProfileId) {
        $ComplaintId            = $res['ComplaintId'];
        $ComplaintUniqueId      = $res['ComplaintUniqueId'];
        $ComplaintTypeId        = $res['ComplaintTypeId'];

        $ApplicantName          = (($res['ApplicantName'] != NULL) ? $res['ApplicantName'] : "");
        $ApplicantFatherName    = (($res['ApplicantFatherName'] != NULL) ? $res['ApplicantFatherName'] : "");
        $ApplicantGender        = (($res['ApplicantGender'] != NULL) ? $res['ApplicantGender'] : "");
        $ApplicantMobile        = (($res['ApplicantMobile'] != NULL) ? $res['ApplicantMobile'] : "");
        $ApplicantEmail         = (($res['ApplicantEmail'] != NULL) ? $res['ApplicantEmail'] : "");
        $ApplicantAadhaarNumber = (($res['ApplicantAadhaarNumber'] != NULL) ? $res['ApplicantAadhaarNumber'] : "");
        $ApplicantDistrict      = (($res['ApplicantDistrict'] != NULL) ? $res['ApplicantDistrict'] : "");
        $ApplicantTehsil        = (($res['ApplicantTehsil'] != NULL) ? $res['ApplicantTehsil'] : "");
        $ApplicantThana         = (($res['ApplicantThana'] != NULL) ? $res['ApplicantThana'] : "");
        $ApplicantBlock         = (($res['ApplicantBlock'] != NULL) ? $res['ApplicantBlock'] : "");
        $ApplicantVillagePanchayat      = (($res['ApplicantVillagePanchayat'] != NULL) ? $res['ApplicantVillagePanchayat'] : "");
        $ApplicantVillage       = (($res['ApplicantVillage'] != NULL) ? $res['ApplicantVillage'] : "");
        $ApplicantTownArea      = (($res['ApplicantTownArea'] != NULL) ? $res['ApplicantTownArea'] : "");
        $ApplicantWard          = (($res['ApplicantWard'] != NULL) ? $res['ApplicantWard'] : "");
        $ApplicantAddress       = (($res['ApplicantAddress'] != NULL) ? $res['ApplicantAddress'] : "");
        
        $ComplaintDepartment    = (($res['ComplaintDepartment'] != NULL) ? $res['ComplaintDepartment'] : "");
        $DepartmentName         = (($res['DepartmentName'] != NULL) ? $res['DepartmentName'] : "");
        
        $ComplaintPrivacy       = $res['ComplaintPrivacy']; // 1 = Public , 0 = Private
        $AddedBy                = $res['AddedBy'];
        
        $ComplaintPlace         = (($res['ComplaintPlace'] != NULL) ? $res['ComplaintPlace'] : "");
        $ComplaintAddress       = (($res['ComplaintAddress'] != NULL) ? $res['ComplaintAddress'] : "");
        $ComplaintLatitude      = (($res['ComplaintLatitude'] != NULL) ? $res['ComplaintLatitude'] : "");
        $ComplaintLongitude     = (($res['ComplaintLongitude'] != NULL) ? $res['ComplaintLongitude'] : "");

        $ComplaintSubject       = (($res['ComplaintSubject'] != NULL) ? $res['ComplaintSubject'] : "");
        $ComplaintDescription   = (($res['ComplaintDescription'] != NULL) ? $res['ComplaintDescription'] : "");
        $ComplaintStatus        = $res['ComplaintStatus'];
        $ComplaintStatusName    = (($res['ComplaintStatusName'] != NULL) ? $res['ComplaintStatusName'] : "Deleted");

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $ComplaintProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $ComplaintAssigned      = $this->getComplaintAssigned($ComplaintId, $UserProfileId);
        $ComplaintMember        = $this->getComplaintMember($ComplaintId, $UserProfileId);
        $ComplaintAttachment    = $this->getComplaintAttachment($ComplaintId, $UserProfileId);
        //$ComplaintHistory       = $this->getComplaintHistory($ComplaintId);

        $TotalLikes     = $this->getTotalLike($ComplaintId);
        $TotalUnLikes   = $this->getTotalUnLike($ComplaintId);
        $MeLike         = $this->getMeLike($UserProfileId, $ComplaintId);
        $MeUnLike       = $this->getMeUnLike($UserProfileId, $ComplaintId);
        $TotalComment   = 0;

        $user_data_array = array(
                                "ComplaintId"               => $ComplaintId,
                                "ComplaintUniqueId"         => $ComplaintUniqueId,
                                "ComplaintTypeId"           => $ComplaintTypeId,

                                "ApplicantName"             => $ApplicantName,
                                "ApplicantFatherName"       => $ApplicantFatherName,
                                "ApplicantGender"           => $ApplicantGender,
                                "ApplicantMobile"           => $ApplicantMobile,
                                "ApplicantEmail"            => $ApplicantEmail,
                                "ApplicantAadhaarNumber"    => $ApplicantAadhaarNumber,
                                "ApplicantDistrict"         => $ApplicantDistrict,
                                "ApplicantTehsil"           => $ApplicantTehsil,
                                "ApplicantThana"            => $ApplicantThana,
                                "ApplicantBlock"            => $ApplicantBlock,
                                "ApplicantVillagePanchayat" => $ApplicantVillagePanchayat,
                                "ApplicantVillage"          => $ApplicantVillage,
                                "ApplicantTownArea"         => $ApplicantTownArea,
                                "ApplicantWard"             => $ApplicantWard,
                                "ApplicantAddress"          => $ApplicantAddress,

                                "ComplaintDepartment"       => $ComplaintDepartment,
                                "DepartmentName"            => $DepartmentName,
                                "ComplaintPrivacy"          => $ComplaintPrivacy,
                                "ComplaintSubject"          => $ComplaintSubject,
                                "ComplaintDescription"      => $ComplaintDescription,
                                "ComplaintStatus"           => $ComplaintStatus,
                                "ComplaintStatusName"       => $ComplaintStatusName,
                                
                                "ComplaintPlace"            => $ComplaintPlace,
                                "ComplaintAddress"          => $ComplaintAddress,
                                "ComplaintLatitude"         => $ComplaintLatitude,
                                "ComplaintLongitude"        => $ComplaintLongitude,

                                "TotalLikes"                => $TotalLikes,
                                "TotalUnLikes"              => $TotalUnLikes,
                                "MeLike"                    => $MeLike,
                                "MeUnLike"                  => $MeUnLike,
                                "TotalComment"              => $TotalComment,

                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "ComplaintProfile"          => $ComplaintProfile,
                                "ComplaintMember"           => $ComplaintMember,
                                "ComplaintAttachment"       => $ComplaintAttachment,
                                "ComplaintAssigned"         => $ComplaintAssigned,
                                //"ComplaintHistory"          => $ComplaintHistory,
                                );
        return $user_data_array;
    }


    public function getComplaintAssigned($ComplaintId, $UserProfileId) {
        $ComplaintAssigned = array();

        $query = $this->db->query("SELECT ca.* 
                                            FROM ".$this->complaintAssignedTbl." AS ca 
                                            LEFT JOIN ".$this->userProfileTbl." up ON ca.AssignedTo = up.UserProfileId
                                            WHERE 
                                                ca.`ComplaintId` = '".$ComplaintId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $user_detail = $this->User_Model->getUserProfileInformation($result['AssignedTo'], $UserProfileId);
            $ComplaintAssigned[] = $user_detail;
        }

        return $ComplaintAssigned;
    }


    // Get Complaint Member Attached
    public function getComplaintMember($ComplaintId, $UserProfileId) {
        
        $ComplaintMember = array();

        $query = $this->db->query("SELECT cm.* 
                                            FROM ".$this->complaintMemberTbl." AS cm 
                                            LEFT JOIN ".$this->userProfileTbl." up ON cm.UserProfileId = up.UserProfileId
                                            WHERE 
                                                cm.`ComplaintId` = '".$ComplaintId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $user_detail = $this->User_Model->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            $user_detail = array_merge($user_detail, array('AcceptedYesNo' => $result['AcceptedYesNo']));
            $user_detail = array_merge($user_detail, array('AcceptedOn' => $result['AcceptedOn']));


            $SignatureAttached = ($result['SignatureAttached'] != '' || $result['SignatureAttached'] != NULL) ? COMPLAINT_IMAGE_URL.$result['SignatureAttached'] : '';
            $user_detail = array_merge($user_detail, array('SignatureAttached' => $SignatureAttached));
            $ComplaintMember[] = $user_detail;
        }

        return $ComplaintMember;
    }


    // Get Complaint Attachement
    public function getComplaintAttachment($ComplaintId, $UserProfileId) {
        
        $ComplaintAttachment = array();

        $query = $this->db->query("SELECT ca.*, at.TypeName 
                                            FROM ".$this->complaintAttachmentTbl." AS ca 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON ca.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                ca.`ComplaintId` = '".$ComplaintId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            $AddedBy = $result['AddedBy'];
            $AttachmentProfile = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

            if($AttachmentTypeId == 1) {
                $path = COMPLAINT_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = COMPLAINT_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = COMPLAINT_AUDIO_URL;
            } else {
                $path = COMPLAINT_DOC_URL;
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
                                'AddedBy'                   => $AttachmentProfile,
                                'AddedOn'                   => return_time_ago($result['AddedOn']),
                                'AddedOnTime'               => ($result['AddedOn']),
                                );
        }

        return $ComplaintAttachment;
    }

    // Start Get All Complaint History
    public function getComplaintHistory($ComplaintId, $UserProfileId) {
        $complaint_history_detail = array();
        if(isset($ComplaintId) && $ComplaintId > 0) {

            $query = $this->db->query("SELECT ComplaintHistoryId FROM $this->complaintHistoryTbl WHERE ComplaintId = '".$ComplaintId."' ORDER BY AddedOn DESC");

            $res = $query->result_array();
            foreach($res AS $key => $result) {
                $complaint_history_detail[] = $this->getComplaintHistoryDetail($result['ComplaintHistoryId'], $UserProfileId);
            }

        } else {
            $complaint_history_detail = array();
        }
        return $complaint_history_detail;
    }

    // Start Get Complaint History Detail
    public function getComplaintHistoryDetail($ComplaintHistoryId, $UserProfileId) {
        $complaint_history_detail = array();
        if(isset($ComplaintHistoryId) && $ComplaintHistoryId > 0) {

            $query = $this->db->query("SELECT * FROM $this->complaintHistoryTbl WHERE ComplaintHistoryId = '".$ComplaintHistoryId."'");

            $res = $query->row_array();
            
            $complaint_history_detail = $this->returnComplaintHistoryDetail($res, $UserProfileId);

        } else {
            $complaint_history_detail = array();
        }
        return $complaint_history_detail;
    }

    // Return Complaint Histpory Detail with Attachement and history history
    public function returnComplaintHistoryDetail($res, $UserProfileId) {
        $ComplaintHistoryId         = $res['ComplaintHistoryId'];
        $ComplaintId                = $res['ComplaintId'];
        $ParentComplaintHistoryId   = $res['ParentComplaintHistoryId'];
        $AddedBy                    = $res['AddedBy'];
        
        $HistoryTitle           = (($res['HistoryTitle'] != NULL) ? $res['HistoryTitle'] : "");
        $HistoryDescription     = (($res['HistoryDescription'] != NULL) ? $res['HistoryDescription'] : "");
        $HistoryStatus          = $res['HistoryStatus'];

        $AddedOn                = return_time_ago($res['AddedOn']);

        $ComplaintHistoryProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $ComplaintHistoryAttachment    = $this->getComplaintHistoryAttachment($ComplaintHistoryId, $UserProfileId);

        $ComplaintHistoryHistory       = $this->getComplaintHistoryDetail($ParentComplaintHistoryId, $UserProfileId);

        $data_array = array(
                            "ComplaintHistoryId"            => $ComplaintHistoryId,
                            "ComplaintId"                   => $ComplaintId,
                            "ParentComplaintHistoryId"      => $ParentComplaintHistoryId,
                            "HistoryTitle"                  => $HistoryTitle,
                            "HistoryDescription"            => $HistoryDescription,
                            "HistoryStatus"                 => $HistoryStatus,
                            "AddedOn"                       => $AddedOn,
                            "AddedOnTime"                   => $res['AddedOn'],
                            "ComplaintHistoryProfile"       => $ComplaintHistoryProfile,
                            "ComplaintHistoryAttachment"    => $ComplaintHistoryAttachment,
                            "ComplaintHistoryHistory"       => $ComplaintHistoryHistory,
                            );
        return $data_array;
    }


    // get Complaint History Attachments
    public function getComplaintHistoryAttachment($ComplaintHistoryId, $UserProfileId) {
        
        $ComplaintHistoryAttachment = array();

        $query = $this->db->query("SELECT cha.*, at.TypeName 
                                            FROM ".$this->complaintHistoryAttachmentTbl." AS cha 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON cha.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                cha.`ComplaintHistoryId` = '".$ComplaintHistoryId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            $AddedBy = $result['AddedBy'];
            $AttachmentProfile = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

            if($AttachmentTypeId == 1) {
                $path = COMPLAINT_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = COMPLAINT_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = COMPLAINT_AUDIO_URL;
            } else {
                $path = COMPLAINT_DOC_URL;
            }

            $AttachmentThumb = ($result['AttachmentThumb'] != '') ? COMPLAINT_IMAGE_URL.$result['AttachmentThumb'] : '';

            $ComplaintHistoryAttachment[] = array(
                                                'ComplaintHistoryAttachmentId'      => $result['ComplaintHistoryAttachmentId'],
                                                'ComplaintHistoryId'                => $result['ComplaintHistoryId'],
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

        return $ComplaintHistoryAttachment;
    }
    


    public function likeComplaint($UserProfileId, $ComplaintId) {
        $res = $this->db->select('*')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['ComplaintLikeId'] > 0) {
            $ComplaintLike   = (($res[0]['ComplaintLike'] > 0) ? 0 : 1);
            $ComplaintUnlike = (($res[0]['ComplaintUnlike'] > 0) ? 0 : 1);
            $updateData = array(
                                'ComplaintLike'      => $ComplaintLike,
                                'ComplaintUnlike'    => $ComplaintUnlike,
                                'LikedOn'            => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'ComplaintId'        => $ComplaintId,
                                'UserProfileId'      => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->ComplaintLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'ComplaintLike'      => 1,
                                'ComplaintUnlike'    => 0,
                                'ComplaintId'        => $ComplaintId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->ComplaintLikeTbl, $insertData);
        }
        return $this->getTotalLike($ComplaintId);
    }

    public function unlikeComplaint($UserProfileId, $ComplaintId) {
        $res = $this->db->select('*')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['ComplaintLikeId'] > 0) {
            $updateData = array(
                                'ComplaintLike'      => 0,
                                'ComplaintUnlike'    => 1,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'ComplaintId'        => $ComplaintId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->ComplaintLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'ComplaintLike'      => 0,
                                'ComplaintUnlike'    => 1,
                                'ComplaintId'        => $ComplaintId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->ComplaintLikeTbl, $insertData);
        }
        return $this->getTotalUnLike($ComplaintId);
    }

    public function getMeLike($UserProfileId, $ComplaintId) {
        $res = $this->db->select('ComplaintLike')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['ComplaintLike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalLike($ComplaintId) {
        $res = $this->db->select('COUNT(ComplaintLikeId) AS TotalLike')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'ComplaintLike' => 1))->get()->row_array();
        return (($res['TotalLike'] > 0) ? $res['TotalLike'] : 0);
    }

    public function getMeUnLike($UserProfileId, $ComplaintId) {
        $res = $this->db->select('ComplaintUnlike')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['ComplaintUnlike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalUnLike($ComplaintId) {
        $res = $this->db->select('COUNT(ComplaintLikeId) AS TotalUnLike')->from($this->ComplaintLikeTbl)->where(array('ComplaintId'=> $ComplaintId, 'ComplaintUnlike' => 1))->get()->row_array();
        return (($res['TotalUnLike'] > 0) ? $res['TotalUnLike'] : 0);
    }


    public function saveComplaintComment($insertData) {
        $this->db->insert($this->ComplaintCommentTbl, $insertData);

        $ComplaintCommentId = $this->db->insert_id();

        return $ComplaintCommentId;
    }

    public function getAllComplaintComment($ComplaintId, $UserProfileId, $total_list = 0) {
        $comments = array();
        $query = $this->db->query("SELECT ComplaintCommentId FROM ".$this->ComplaintCommentTbl." WHERE `ComplaintId` = '".$ComplaintId."' AND `CommentStatus` = '1' ORDER BY CommentOn DESC");
        $res = $query->result_array();

        if($total_list > 0) {
            return $query->num_rows();
        }
        if($query->num_rows() > 0) {
            foreach($res AS $comment) {
                if($comment['ComplaintCommentId'] > 0) {
                    $comments[] = $this->getComplaintCommentDetail($ComplaintId, $comment['ComplaintCommentId'], $UserProfileId);
                }
            }
        }
        return $comments;
    }

    public function getComplaintCommentDetail($ComplaintId, $CommentId, $UserProfileId) {
        $comment_detail = array();
        $query = $this->db->query("SELECT * FROM ".$this->ComplaintCommentTbl." WHERE `ComplaintId` = '".$ComplaintId."' AND `ComplaintCommentId` = '".$CommentId."'");
        $res = $query->row_array();
        if($res['ComplaintCommentId'] > 0) {
            $comment_detail = $this->returnComplaintCommentDetail($res, $UserProfileId);
        }
        return $comment_detail;
    }

    public function returnComplaintCommentDetail($res, $UserProfileId) {
        $ComplaintCommentId      = $res['ComplaintCommentId'];
        $ComplaintId             = $res['ComplaintId'];
        $AddedBy            = $res['UserProfileId'];
        $CommentText        = (($res['CommentText'] != NULL) ? $res['CommentText'] : "");
        $CommentPhoto       = (($res['CommentPhoto'] != NULL) ? $res['CommentPhoto'] : "");
        $ParentId           = $res['ParentId'];
        $CommentStatus      = $res['CommentStatus'];

        $CommentOn          = return_time_ago($res['CommentOn']);

        $CommentProfile        = $this->User_Model->getUserProfileInformation($AddedBy);

        $data_array = array(
                                "ComplaintCommentId"     => $ComplaintCommentId,
                                "ComplaintId"            => $ComplaintId,
                                "AddedBy"           => $AddedBy,
                                "CommentText"       => $CommentText,
                                "CommentPhoto"      => $CommentPhoto,
                                "ParentId"          => $ParentId,
                                "CommentStatus"     => $CommentStatus,
                                "CommentOn"         => $CommentOn,
                                "CommentOnTime"     => $res['CommentOn'],
                                "CommentProfile"    => $CommentProfile,
                                );
        return $data_array;
    }

    public function deleteComplaintComment($UserProfileId, $ComplaintCommentId) {
        $res = $this->db->select('*')->from($this->ComplaintCommentTbl)->where(array('ComplaintCommentId'=> $ComplaintCommentId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['ComplaintCommentId'] > 0) {
            $updateData = array(
                                'CommentStatus' => -1,
                                );
            $whereData = array(
                                'ComplaintCommentId'        => $ComplaintCommentId,
                                'UserProfileId'        => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->ComplaintCommentTbl, $updateData);
            return 1;
        } else {
            return 0;
        }
    }

}