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

        $this->PostCommentTbl           = 'PostComment';
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

            $PostLike   = (($res[0]['PostLike'] > 0) ? 0 : 1);
            $PostUnlike = (($res[0]['PostUnlike'] > 0) ? 0 : 1);
            $updateData = array(
                                'PostLike'      => $PostLike,
                                'PostUnlike'    => $PostUnlike,
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
        return $this->getTotalLike($PostId);
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
        return $this->getTotalUnLike($PostId);
    }

    public function getMeLike($UserProfileId, $PostId) {
        $res = $this->db->select('PostLike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PostLike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalLike($PostId) {
        $res = $this->db->select('COUNT(PostLikeId) AS TotalLike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'PostLike' => 1))->get()->row_array();
        return (($res['TotalLike'] > 0) ? $res['TotalLike'] : 0);
    }

    public function getMeUnLike($UserProfileId, $PostId) {
        $res = $this->db->select('PostUnlike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PostUnlike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalUnLike($PostId) {
        $res = $this->db->select('COUNT(PostLikeId) AS TotalUnLike')->from($this->PostLikeTbl)->where(array('PostId'=> $PostId, 'PostUnlike' => 1))->get()->row_array();
        return (($res['TotalUnLike'] > 0) ? $res['TotalUnLike'] : 0);
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
                $sql = "SELECT PostId FROM $this->postTbl WHERE `PostStatus` = '1' AND `PostPrivacy` = '1' ";
                $sql .= " AND `UserProfileId` = '".$FriendProfileId."'";
            } else {
                $search_in = $this->input->post('search_in');
            
                $post_search_condition = '';
                if($search_in == "post") {
                    
                    $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                    $posted_by_friend   = $this->input->post('posted_by_friend'); // By Your Friend
                    $myself_tagged      = $this->input->post('myself_tagged'); // My self tagged
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');
                    $location           = $this->input->post('location');
                    $me_liked           = $this->input->post('me_liked');
                    $me_commented       = $this->input->post('me_commented');

                    
                    if($posted_by_me == '1') {
                        $post_search_condition .= " AND `UserProfileId` = '".$FriendProfileId."'";
                    }
                    if($posted_by_friend == '1') {
                        $my_friend_user_profile_id = $this->User_Model->getMyFriendFollowerAndFollowingUserProfileId($UserProfileId);
                        $post_search_condition .= " AND `PostPrivacy` = '1' AND `UserProfileId` IN (".$FriendProfileId.")";
                    } else {
                        $post_search_condition .= " AND `UserProfileId` = '".$FriendProfileId."'";
                    }
                    if($myself_tagged == '1') {
                        $post_search_condition .= " AND ".$FriendProfileId." IN (SELECT pt.UserProfileId FROM `PostTag` AS pt WHERE pt.PostId = Post.PostId)";
                    }
                    if($location != '') {
                        $post_search_condition .= " AND `PostLocation` LIKE '%".$location."%'";
                    }
                    if($me_liked == '1') {
                        $post_search_condition .= " AND 1 <= (SELECT COUNT(pl.UserProfileId) FROM `PostLike` AS pl WHERE pl.PostId = Post.PostId AND pl.PostLike = '1')";
                    }
                    if($me_commented == '1') {
                        $post_search_condition .= " AND 1 <= (SELECT COUNT(pc.UserProfileId) FROM `PostComment` AS pc WHERE pc.PostId = Post.PostId AND pc.CommentStatus = '1')";
                    }
                    
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $post_search_condition .= " AND AddedOn LIKE '%".$date_from."%' ";
                        } else {
                            $post_search_condition .= " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                        }
                    }
                } else {
                    $post_search_condition .= " AND `UserProfileId` = '".$FriendProfileId."'";
                }

                $sql = "SELECT PostId FROM $this->postTbl WHERE `PostStatus` != -1 ";
                $sql .= $post_search_condition;
            }

            $sql .= " ORDER BY AddedOn DESC";

            $query = $this->db->query($sql);

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

        $PostProfile = $this->User_Model->getMinimumUserProfileInformation($AddedBy, $UserProfileId);
        $PostTag = $this->getPostTag($PostId);
        $PostAttachment = $this->getPostAttachment($PostId);

        $TotalLikes     = $this->getTotalLike($PostId);
        $TotalUnLikes   = $this->getTotalUnLike($PostId);
        $MeLike         = $this->getMeLike($UserProfileId, $PostId);
        $MeUnLike       = $this->getMeUnLike($UserProfileId, $PostId);
        $TotalComment   = $this->getAllPostComment($PostId, $UserProfileId, 1);;


        $user_data_array = array(
                                "PostId"                => $PostId,
                                "UserProfileId"         => $AddedBy,
                                "PostTitle"             => $PostTitle,
                                "PostStatus"            => $PostStatus,
                                "PostLocation"          => $PostLocation,
                                "PostDescription"       => $PostDescription,
                                "PostURL"               => $PostURL,

                                "TotalLikes"            => $TotalLikes,
                                "TotalUnLikes"          => $TotalUnLikes,
                                "MeLike"                => $MeLike,
                                "MeUnLike"              => $MeUnLike,
                                "TotalComment"          => $TotalComment,
                                
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
            $PostTag[] = $this->User_Model->getMinimumUserProfileInformation($result['UserProfileId']);
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


    public function savePostComment($insertData) {
        $this->db->insert($this->PostCommentTbl, $insertData);

        $PostCommentId = $this->db->insert_id();

        return $PostCommentId;
    }

    public function getAllPostComment($PostId, $UserProfileId, $total_list = 0) {
        $comments = array();
        $query = $this->db->query("SELECT PostCommentId FROM ".$this->PostCommentTbl." WHERE `PostId` = '".$PostId."' AND `CommentStatus` = '1' ORDER BY CommentOn DESC");
        $res = $query->result_array();

        if($total_list > 0) {
            return $query->num_rows();
        }
        if($query->num_rows() > 0) {
            foreach($res AS $comment) {
                if($comment['PostCommentId'] > 0) {
                    $comments[] = $this->getPostCommentDetail($PostId, $comment['PostCommentId'], $UserProfileId);
                }
            }
        }
        return $comments;
    }

    public function getPostCommentDetail($PostId, $CommentId, $UserProfileId) {
        $comment_detail = array();
        $query = $this->db->query("SELECT * FROM ".$this->PostCommentTbl." WHERE `PostId` = '".$PostId."' AND `PostCommentId` = '".$CommentId."'");
        $res = $query->row_array();
        if($res['PostCommentId'] > 0) {
            $comment_detail = $this->returnPostCommentDetail($res, $UserProfileId);
        }
        return $comment_detail;
    }

    public function returnPostCommentDetail($res, $UserProfileId) {
        $PostCommentId      = $res['PostCommentId'];
        $PostId             = $res['PostId'];
        $AddedBy            = $res['UserProfileId'];
        $CommentText        = (($res['CommentText'] != NULL) ? $res['CommentText'] : "");
        $CommentPhoto       = (($res['CommentPhoto'] != NULL) ? $res['CommentPhoto'] : "");
        $ParentId           = $res['ParentId'];
        $CommentStatus      = $res['CommentStatus'];

        $CommentOn          = return_time_ago($res['CommentOn']);

        $CommentProfile        = $this->User_Model->getMinimumUserProfileInformation($AddedBy);

        $data_array = array(
                                "PostCommentId"     => $PostCommentId,
                                "PostId"            => $PostId,
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

    public function deletePostComment($UserProfileId, $PostCommentId) {
        $res = $this->db->select('*')->from($this->PostCommentTbl)->where(array('PostCommentId'=> $PostCommentId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PostCommentId'] > 0) {
            $updateData = array(
                                'CommentStatus' => -1,
                                );
            $whereData = array(
                                'PostCommentId'        => $PostCommentId,
                                'UserProfileId'        => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PostCommentTbl, $updateData);
            return 1;
        } else {
            return 0;
        }
    }
    

}