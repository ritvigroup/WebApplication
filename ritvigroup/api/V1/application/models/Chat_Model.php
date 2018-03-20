<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Chat_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->chatTbl              = 'Chat';
        $this->chatGroupMemberTbl   = 'ChatGroupMember';
        $this->chatGroupTbl         = 'ChatGroup';
    }


    public function generateChatUniqueId() {
        $ChatUniqueId = "C".mt_rand().time();
        $this->db->select('ChatUniqueId');
        $this->db->from($this->chatTbl);
        $this->db->where('ChatUniqueId', $ChatUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateChatUniqueId();
        }
        return $ChatUniqueId;
    }


    public function saveMyChat($insertData) {
        $this->db->insert($this->chatTbl, $insertData);

        $complaint_id = $this->db->insert_id();

        return $complaint_id;
    }


    public function saveMyChatGroupMembers($ChatGroupId, $UserProfileId, $chat_group_member) {
        foreach($chat_group_member AS $member_user_profile_id) {
            $insertData = array(
                                'ChatGroupId'       => $ChatGroupId,
                                'UserProfileId'     => $member_user_profile_id,
                                'AcceptedYesNo'     => 0,
                                'GroupAdminYesNo'   => 0,
                                'AddedBy'           => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->chatGroupMemberTbl, $insertData);
        }
        return true;
    }


    public function saveMyChatAttachment($insertData, $chat_file) {
        $j = 0;

        $chat_array = array();
        $file_upload = false;
        for($i = 0; $i < count($chat_file['name']); $i++) {

            $upload_file_name = $chat_file['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = $ChatId.'-'.date('YmdHisA').'-'.mt_rand().'-'.time().'-CHAT-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = MSG_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = MSG_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = MSG_AUDIO_DIR;
                } else {
                    $path = MSG_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $chat_file['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);

                $insertChatData = array_merge($insertData, array('ChatPhotoPath' => $ChatPhotoPath));

                $ChatId = $this->saveMyChat($insertChatData);

                $chat_array[] = $ChatId;

                $file_upload = true;
            }
        }

        if($file_upload == false) {
            return false;
        }
        return $chat_array;
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


    public function getMyAllChat($UserProfileId) {
        $chats = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT ChatId FROM $this->chatTbl WHERE `UserProfileId` = '".$UserProfileId."' OR `FriendUserProfileId` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $chats[] = $this->getChatDetail($result['ChatId']);
            }
        } else {
            $chats = array();
        }
        return $chats;
    }

    
    public function getChatDetail($ChatId) {
        $complaint_detail = array();
        if(isset($ChatId) && $ChatId > 0) {

            $query = $this->db->query("SELECT * FROM $this->chatTbl WHERE ChatId = '".$ChatId."'");

            $res = $query->row_array();

            $complaint_detail = $this->returnChatDetail($res);
        } else {
            $complaint_detail = array();
        }
        return $complaint_detail;
    }

    
    public function returnChatDetail($res) {
        $ChatId                     = $res['ChatId'];
        $UserProfileId              = $res['UserProfileId'];
        $FriendUserProfileId        = $res['FriendUserProfileId'];
        $UserGroupId                = $res['UserGroupId'];
        $ChatType                   = $res['ChatType'];
        $DeleteForUserProfileIdYesNo     = $res['DeleteForUserProfileIdYesNo'];
        $DeleteForFriendUserProfileId    = $res['DeleteForFriendUserProfileId'];
        
        $ChatPhotoPath          = (($res['ChatPhotoPath'] != NULL) ? $res['ChatPhotoPath'] : "");
        $ChatThumbnailPath      = (($res['ChatThumbnailPath'] != NULL) ? $res['ChatThumbnailPath'] : "");
        $ChatFileSize           = (($res['ChatFileSize'] != NULL) ? $res['ChatFileSize'] : "");
        $ChatVideoTime          = (($res['ChatVideoTime'] != NULL) ? $res['ChatVideoTime'] : "");
        $ChatText               = (($res['ChatText'] != NULL) ? $res['ChatText'] : "");

        $SentOn                 = return_time_ago($res['SentOn']);
        $DeliveredOn            = return_time_ago($res['DeliveredOn']);
        $ViewedOn               = return_time_ago($res['ViewedOn']);

        $ChatSenderProfile      = $this->User_Model->getUserProfileWithUserInformation($UserProfileId);
        $ChatReceiverProfile    = $this->User_Model->getUserProfileWithUserInformation($FriendUserProfileId);


        $user_data_array = array(
                                "ChatId"                        => $ChatId,
                                "UserProfileId"                 => $UserProfileId,
                                "FriendUserProfileId"           => $FriendUserProfileId,
                                "UserGroupId"                   => $UserGroupId,
                                "ChatType"                      => $ChatType,
                                "DeleteForUserProfileIdYesNo"   => $DeleteForUserProfileIdYesNo,
                                "DeleteForFriendUserProfileId"  => $DeleteForFriendUserProfileId,
                                "ChatPhotoPath"                 => $ChatPhotoPath,
                                "ChatThumbnailPath"             => $ChatThumbnailPath,
                                "ChatFileSize"                  => $ChatFileSize,
                                "ChatVideoTime"                 => $ChatVideoTime,
                                "ChatText"                      => $ChatText,
                                "SentOn"                        => $SentOn,
                                "DeliveredOn"                   => $DeliveredOn,
                                "ViewedOn"                      => $ViewedOn,
                                "ChatSenderProfile"             => $ChatSenderProfile,
                                "ChatReceiverProfile"           => $ChatReceiverProfile,
                                );
        return $user_data_array;
    }



    public function getChatGroupMember($ChatGroupId) {
        
        $ChatGroupMember = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->chatGroupMemberTbl." AS cgm 
                                            LEFT JOIN ".$this->userProfileTbl." up ON cgm.UserProfileId = up.UserProfileId
                                            WHERE 
                                                cgm.`ChatGroupId` = '".$ChatGroupId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $ChatGroupMember[] = $this->User_Model->getUserProfileWithUserInformation($result['UserProfileId']);
        }

        return $ChatGroupMember;
    }

}

