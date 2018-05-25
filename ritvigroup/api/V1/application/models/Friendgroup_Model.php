<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Friendgroup_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';

        $this->FriendGroupTbl       = 'FriendGroup';
        $this->FriendGroupMemberTbl = 'FriendGroupMember';
    }



    public function saveFriendgroup($insertData) {
        $this->db->insert($this->FriendGroupTbl, $insertData);

        $group_id = $this->db->insert_id();

        return $group_id;
    }


    public function updateFriendGroup($FriendGroupId, $UserProfileId, $updateData) {
        $this->db->where('FriendGroupId', $FriendGroupId);
        $this->db->update($this->FriendGroupTbl, $updateData);

        return $FriendGroupId;
    }


    public function saveFriendgroupImage($FriendGroupId, $UserProfileId, $group_image) {

        $error = true;
        $GroupName = $group_image['name'];

        if($GroupName != '') {

            $AttachmentFile = date('YmdHisA').'-'.time().'-GROUP-'.mt_rand().'.'.end(explode('.', $GroupName));

            $path = DOC_DIR;

            $path = $path.$AttachmentFile;
            $source = $group_image['tmp_name'];

            $upload_result = uploadFileOnServer($source, $path);

            $updateData = array(
                                'FriendGroupPhoto'      => $AttachmentFile,
                                'UpdatedBy'             => $UserProfileId,
                                'UpdatedOn'             => date('Y-m-d H:i:s'),
                                );
            $this->db->where('FriendGroupId', $FriendGroupId);
            $this->db->update($this->FriendGroupTbl, $updateData);

            if($this->db->affected_rows() > 0) {
            } else {
                $error = false;
            }
        }
        return $error;
    }


    public function saveFriendgroupMember($FriendGroupId, $UserProfileId, $group_member) {

        $error = true;
        for($i = 0; $i < count($group_member); $i++) {
        
            if($group_member[$i] > 0) {

                $sql = "SELECT * FROM ".$this->FriendGroupMemberTbl." WHERE FriendGroupId = '".$FriendGroupId."' AND `UserProfileId` = '".$group_member[$i]."'";
                $query = $this->db->query($sql);

                $num = $query->num_rows();
                if($num > 0) {

                } else {

                    $IsAdmin = 0;
                    if($UserProfileId == $group_member[$i]) {
                        $IsAdmin = 1;
                    }

                    $insertData = array(
                                        'FriendGroupId'     => $FriendGroupId,
                                        'UserProfileId'     => $group_member[$i],
                                        'IsAdmin'           => $IsAdmin,
                                        'GetNotification'   => 1,
                                        'AddedBy'           => $UserProfileId,
                                        'AddedOn'           => date('Y-m-d H:i:s'),
                                        );
                    $this->db->insert($this->FriendGroupMemberTbl, $insertData);

                    $mm = $this->db->insert_id();
                    if($mm > 0) {

                    } else { 
                        $error = false;
                    }
                }
            }
        }
        return $error;
    }


    // Check Member in Group Detail
    public function checkGroupMemberGroupDetail($UserProfileId, $FriendGroupId) {

        $this->db->select('*');
        $this->db->from($this->FriendGroupMemberTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendGroupId', $FriendGroupId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return 0;
        }
    }

    
    public function getFriendgroupDetail($FriendGroupId, $UserProfileId = 0) {
        $group_detail = array();
        if(isset($FriendGroupId) && $FriendGroupId > 0) {

            $sql = "SELECT * FROM ".$this->FriendGroupTbl." WHERE FriendGroupId = '".$FriendGroupId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['FriendGroupId'] > 0) {
                $group_detail = $this->returnFriendgroupDetail($res, $UserProfileId);
            }
        } else {
            $group_detail = array();
        }
        return $group_detail;
    }

    
    public function returnFriendgroupDetail($res, $UserProfileId = 0) {
        $FriendGroupId         = $res['FriendGroupId'];
        $FriendGroupName       = $res['FriendGroupName'];
        $FriendGroupPhoto      = (($res['FriendGroupPhoto'] != NULL) ? DOC_URL.$res['FriendGroupPhoto'] : "");
        $FriendGroupStatus     = (($res['FriendGroupStatus'] != NULL) ? $res['FriendGroupStatus'] : "");

        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $GroupProfile       = $this->User_Model->getUserProfileInformation($AddedBy);
        $GroupMembers       = $this->getFriendgroupMember($FriendGroupId, $UserProfileId);
        $GroupMemeberDetail = $this->checkGroupMemberGroupDetail($UserProfileId, $FriendGroupId);

        $doc_folder_data_array = array(
                                    "FriendGroupId"         => $FriendGroupId,
                                    "FriendGroupName"       => $FriendGroupName,
                                    "FriendGroupPhoto"      => $FriendGroupPhoto,
                                    "FriendGroupStatus"     => $FriendGroupStatus,
                                    "AddedOn"               => $AddedOn,
                                    "AddedOnTime"           => $res['AddedOn'],
                                    "UpdatedOn"             => $UpdatedOn,
                                    "UpdatedOnTime"         => $res['UpdatedOn'],
                                    "GroupProfile"          => $GroupProfile,
                                    "GroupMemeberDetail"    => $GroupMemeberDetail,
                                    "GroupMembers"          => $GroupMembers,
                                    );
        return $doc_folder_data_array;
    }


    public function getFriendgroupMember($FriendGroupId, $UserProfileId = 0) {
        $group_member_detail = array();
        if(isset($FriendGroupId) && $FriendGroupId > 0) {

            $sql = "SELECT UserProfileId FROM ".$this->FriendGroupMemberTbl." WHERE FriendGroupId = '".$FriendGroupId."' ORDER BY AddedOn DESC";
            $query = $this->db->query($sql);

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $group_member_detail[] = $this->User_Model->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
        } else {
            $group_member_detail = array();
        }
        return $group_member_detail;
    }

    

    public function getMyAllFriendgroup($FriendUserProfileId, $UserProfileId) {
        $friend_group = array();
        if(isset($FriendUserProfileId) && $FriendUserProfileId > 0) {

            $this->db->select('fg.FriendGroupId');
            $this->db->from($this->FriendGroupTbl.' AS fg');
            $this->db->join($this->FriendGroupMemberTbl.' AS fgm', 'fgm.FriendGroupId = fg.FriendGroupId', 'LEFT');
            $this->db->where('fgm.UserProfileId', $FriendUserProfileId);
            $this->db->where('fg.FriendGroupStatus', 1);
            $this->db->order_by('fgm.AddedOn','ASC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $friend_group[] = $this->getFriendgroupDetail($result['FriendGroupId'], $UserProfileId);
            }
        } else {
            $friend_group = array();
        }
        return $friend_group;
    }


    // Check Group Member Exist for notifications
    public function checkUserFriendRequest($UserProfileId, $FriendUserProfileId) {

        $this->db->select('*');
        $this->db->from($this->UserFriendTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return 0;
        }
    }


    // Update Get Notification From Friend
    public function updateGetNotification($UserProfileId, $FriendGroupId, $GetNotification) {
        $updateData = array(
                            'GetNotification'       => $GetNotification,
                            );
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendGroupId', $FriendGroupId);
        $this->db->update($this->FriendGroupMemberTbl, $updateData);
    }


    public function validateMemberInFriendgroup($FriendGroupId, $UserProfileId, $member_id) {
        $friend_group = array();
        if(isset($FriendGroupId) && $FriendGroupId > 0) {

            $this->db->select('FriendGroupMemberId');
            $this->db->from($this->FriendGroupMemberTbl);
            $this->db->where('FriendGroupId', $FriendGroupId);
            $this->db->where('UserProfileId', $member_id);
            $query = $this->db->get();

            $res = $query->row_array();

            if($res['FriendGroupMemberId'] > 0) {
                return true;
            }
        }
        return false;
    }


    public  function updateMemberAsGroupAdmin($FriendGroupId, $UserProfileId, $member_id) {
        $friend_group = array();
        if(isset($FriendGroupId) && $FriendGroupId > 0) {

            $this->db->select('FriendGroupMemberId');
            $this->db->from($this->FriendGroupMemberTbl);
            $this->db->where('FriendGroupId', $FriendGroupId);
            $this->db->where('UserProfileId', $member_id);
            $query = $this->db->get();

            $res = $query->row_array();

            if($res['FriendGroupMemberId'] > 0) {
                $this->db->where('FriendGroupId', $FriendGroupId);
                $this->db->where('UserProfileId', $member_id);

                $updateData = array(
                                    'IsAdmin' => 1
                                    );
                $this->db->update($this->FriendGroupMemberTbl);
                return true;
            }
        }
        return false;
    }


    public function deleteMemberFromFriendgroup($FriendGroupId, $member_id) {
        $this->db->where('FriendGroupId', $FriendGroupId);
        $this->db->where('UserProfileId', $member_id);
        $this->db->delete($this->FriendGroupMemberTbl);

        return true;
    }

}