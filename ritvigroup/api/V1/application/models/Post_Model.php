<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->postTbl              = 'Post';
        $this->postTagTbl           = 'PostTag';
        $this->PostLikeTbl          = 'PostLike';
        $this->postAttachmentTbl    = 'PostAttachment';
        $this->attachmentTypeTbl    = 'AttachmentType';
    }


    public function saveMyPost($insertData) {
        $this->db->insert($this->postTbl, $insertData);

        $post_id = $this->db->insert_id();

        return $post_id;
    }


    public function updateMyPost($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->postTbl, $updateData);

        return $this->db->affected_rows();
    }


    public function likePost($UserProfileId, $PostId) {
        $res = $this->db->select('*')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PostLikeId'] > 0) {
            $updateData = array(
                                'PostLike'      => 1,
                                'PostUnlike'    => 0,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PostId'        => $PostId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PostLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PostLike'      => 1,
                                'PostUnlike'    => 0,
                                'PostId'        => $PostId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PostLikeTbl, $insertData);
        }
        $res = $this->db->select('COUNT(PostLikeId) AS TotalLike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'PostLike' => 1))->get()->row_array();
        return $res['TotalLike'];
    }

    public function unlikePost($UserProfileId, $PostId) {
        $res = $this->db->select('*')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PostLikeId'] > 0) {
            $updateData = array(
                                'PostLike'      => 0,
                                'PostUnlike'    => 1,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PostId'        => $PostId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PostLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PostLike'      => 0,
                                'PostUnlike'    => 1,
                                'PostId'        => $PostId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PostLikeTbl, $insertData);
        }
        $res = $this->db->select('COUNT(PostLikeId) AS TotalLike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'PostUnlike' => 1))->get()->row_array();
        return $res['TotalLike'];
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
                $source = $post_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-POST-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = POST_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'PostId'                => $PostId,
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


    public function getMyAllPost($UserProfileId, $FriendProfileId) {
        $posts = array();
        
        if($FriendProfileId > 0) {

            if($UserProfileId != $FriendProfileId) {
                $query = $this->db->query("SELECT PostId FROM $this->postTbl WHERE `UserProfileId` = '".$FriendProfileId."' AND `PostStatus` = '1' AND `PostPrivacy` = '1' ORDER BY AddedOn DESC");
            } else {
                $query = $this->db->query("SELECT PostId FROM $this->postTbl WHERE `UserProfileId` = '".$FriendProfileId."' AND `PostStatus` != -1 ORDER BY AddedOn DESC");
            }

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $posts[] = array(
                                'feedtype' => 'post',
                                'postdata' => $this->getPostDetail($result['PostId']),
                                );
            }
        }
        return $posts;
    }


    
    public function getPostDetail($PostId, $UserProfileId = 0) {
        if(isset($PostId) && $PostId > 0) {

            $query = $this->db->query("SELECT * FROM $this->postTbl WHERE PostId = '".$PostId."'");

            $res = $query->row_array();

            $post_detail = $this->returnPostDetail($res, $UserProfileId);
        } else {
            $post_detail = array();
        }
        return $post_detail;
    }

    
    public function returnPostDetail($res, $UserProfileId = 0) {
        $PostId             = $res['PostId'];
        $AddedBy            = $res['UserProfileId'];
        
        $PostTitle          = (($res['PostTitle'] != NULL) ? $res['PostTitle'] : "");
        $PostStatus         = $res['PostStatus'];
        $PostFeelingId      = $res['PostFeelingId'];

        $Feelings = $this->Feeling_Model->getFeelingDetail($PostFeelingId);
        $FeelingData        = ($PostFeelingId > 0) ? array($Feelings) : array();
        
        $PostLocation       = (($res['PostLocation'] != NULL) ? $res['PostLocation'] : "");
        $PostDescription    = (($res['PostDescription'] != NULL) ? $res['PostDescription'] : "");
        $PostURL            = (($res['PostURL'] != NULL) ? $res['PostURL'] : "");
        $PostPrivacy        = (($res['PostPrivacy'] != NULL) ? $res['PostPrivacy'] : "");
        
        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PostProfile = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);
        $PostTag = $this->getPostTag($PostId);
        $PostAttachment = $this->getPostAttachment($PostId);

        $user_data_array = array(
                                "PostId"                => $PostId,
                                "UserProfileId"         => $AddedBy,
                                "PostTitle"             => $PostTitle,
                                "PostStatus"            => $PostStatus,
                                "PostLocation"          => $PostLocation,
                                "PostDescription"       => $PostDescription,
                                "PostURL"               => $PostURL,
                                
                                "PostPrivacy"           => $PostPrivacy,
                                
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
            $PostTag[] = $this->User_Model->getUserProfileInformation($result['UserProfileId']);
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

            $AttachmentThumb = $result['AttachmentThumb'];
            if($AttachmentThumb != '') {
                $AttachmentThumb = POST_IMAGE_URL.$AttachmentThumb;
            }
            $PostAttachment[] = array(
                                'PostAttachmentId'          => $result['PostAttachmentId'],
                                'PostId'                    => $result['PostId'],
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

        return $PostAttachment;
    }
    

}