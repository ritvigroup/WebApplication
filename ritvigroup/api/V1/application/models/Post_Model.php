<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->postTbl              = 'Post';
        $this->postTagTbl           = 'PostTag';
        $this->postAttachmentTbl    = 'PostAttachment';
        $this->attachmentTypeTbl    = 'AttachmentType';
    }


    public function saveMyPost($insertData) {
        $this->db->insert($this->postTbl, $insertData);

        $post_id = $this->db->insert_id();

        return $post_id;
    }


    public function saveMyPostTags($PostId, $UserProfileId, $post_tag) {
        foreach($post_tag AS $tag_user_profile_id) {
            $insertData = array(
                                'PostId'            => $PostId,
                                'UserProfileId'     => $tag_user_profile_id,
                                'TagStatus'         => 1,
                                'TagApproved'       => 1,
                                'AddedBy'           => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->postTagTbl, $insertData);
        }
        return true;
    }


    public function saveMyPostAttachment($PostId, $UserProfileId, $post_attachment) {
        $j = 0;
        for($i = 0; $i < count($post_attachment['name']); $i++) {

            $upload_file_name = $post_attachment['name'][$i];
            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-POST-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = POST_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = POST_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = POST_AUDIO_DIR;
                } else {
                    $path = POST_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $post_attachment['tmp_name'];

                $upload_result = uploadFileOnServer($source, $path);

                $insertData = array(
                                    'PostId'                => $PostId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $j++;
                $this->db->insert($this->postAttachmentTbl, $insertData);
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


    public function getMyAllPost($UserProfileId) {
        $posts = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT PostId FROM $this->postTbl WHERE `UserProfileId` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $posts[] = $this->getPostDetail($result['PostId']);
            }
        } else {
            $posts = array();
        }
        return $posts;
    }


    
    public function getPostDetail($PostId) {
        if(isset($PostId) && $PostId > 0) {

            $query = $this->db->query("SELECT * FROM $this->postTbl WHERE PostId = '".$PostId."'");

            $res = $query->row_array();

            $post_detail = $this->returnPostDetail($res);
        } else {
            $post_detail = array();
        }
        return $post_detail;
    }

    
    public function returnPostDetail($res) {
        $PostId             = $res['PostId'];
        $UserProfileId      = $res['UserProfileId'];
        
        $PostTitle          = (($res['PostTitle'] != NULL) ? $res['PostTitle'] : "");
        $PostStatus         = $res['PostStatus'];
        $PostFeelingId      = $res['PostFeelingId'];
        $FeelingData        = ($PostFeelingId > 0) ? $this->Feeling_Model->getFeelingDetail($PostFeelingId) : 0;
        
        $PostLocation       = (($res['PostLocation'] != NULL) ? $res['PostLocation'] : "");
        $PostDescription    = (($res['PostDescription'] != NULL) ? $res['PostDescription'] : "");
        $PostURL            = (($res['PostURL'] != NULL) ? $res['PostURL'] : "");
        
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PostProfile = $this->User_Model->getUserProfileWithUserInformation($UserProfileId);
        $PostTag = $this->getPostTag($PostId);
        $PostAttachment = $this->getPostAttachment($PostId);

        $user_data_array = array(
                                "PostId"                => $PostId,
                                "UserProfileId"         => $UserProfileId,
                                "PostTitle"             => $PostTitle,
                                "PostStatus"            => $PostStatus,
                                "PostLocation"          => $PostLocation,
                                "PostDescription"       => $PostDescription,
                                "PostURL"               => $PostURL,
                                "AddedOn"               => $AddedOn,
                                "AddedOnTime"           => $res['AddedOn'],
                                "UpdatedOn"             => $UpdatedOn,
                                "UpdatedOnTime"         => $res['UpdatedOn'],
                                "FeelingData"           => $FeelingData,
                                "PostProfile"           => $PostProfile,
                                "PostTag"               => $PostTag,
                                "PostAttachment"        => $PostAttachment,
                                );
        return $user_data_array;
    }



    public function getPostTag($PostId) {
        
        $PostTag = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->postTagTbl." AS pt 
                                            LEFT JOIN ".$this->userProfileTbl." up ON pt.UserProfileId = up.UserProfileId
                                            WHERE 
                                                pt.`PostId` = '".$PostId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PostTag[] = $this->User_Model->getUserProfileWithUserInformation($result['UserProfileId']);
            //$PostTag[] = $result['UserProfileId'];
        }

        return $PostTag;
    }



    public function getPostAttachment($PostId) {
        
        $PostAttachment = array();

        $query = $this->db->query("SELECT pa.*, at.TypeName 
                                            FROM ".$this->postAttachmentTbl." AS pa 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON pa.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                pa.`PostId` = '".$PostId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = POST_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = POST_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = POST_AUDIO_URL;
            } else {
                $path = POST_DOC_URL;
            }
            $PostAttachment[] = array(
                                'PostAttachmentId'          => $result['PostAttachmentId'],
                                'PostId'                    => $result['PostId'],
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

        return $PostAttachment;
    }
    

}