<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Post Management
*/

class Post extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Post_Model');
        $this->load->model('Feeling_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getAllFeelings() {
        $error_occured = false;
        $feeling = $this->Feeling_Model->getAllFeelings();

        if(count($feeling) > 0) {
            $msg = "Feelings found.";
        } else {
            $error_occured = true;
            $msg = "No feeling found";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"       => $feeling,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function postMyStatus() {
		$error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostTitle          = $this->input->post('title');
        $feeling            = $this->input->post('feeling');
        $feeling            = ($feeling > 0) ? $feeling : 0;
        $PostLocation       = $this->input->post('location');
        $PostDescription    = $this->input->post('description');
        $PostURL            = $this->input->post('url');
        $PostPrivacy        = $this->input->post('privacy'); // 1 = Public, 0 = Private

        $PostPrivacy = ($PostPrivacy == 1) ? $PostPrivacy : 0;

        $post_tag = $this->input->post('post_tag');


        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // die;
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		/*} else if($PostTitle == "") {
			$msg = "Please enter some text to post";
			$error_occured = true;*/
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'UserProfileId'     => $UserProfileId,
                                'PostTitle'         => $PostTitle,
                                'PostFeelingId'     => $feeling,
                                'PostStatus'        => 1,
                                'PostLocation'      => $PostLocation,
                                'PostDescription'   => $PostDescription,
                                'PostURL'           => $PostURL,
                                'PostPrivacy'       => $PostPrivacy,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
			$PostId = $this->Post_Model->saveMyPost($insertData);

            if($PostId > 0) {
                
                $this->Post_Model->saveMyPostTags($PostId, $UserProfileId, $post_tag);
                
                $this->Post_Model->saveMyPostAttachment($PostId, $UserProfileId, $_FILES['file']);

                $post_detail = $this->Post_Model->getPostDetail($PostId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Post added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Post not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"    => $post_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function deleteMyPostStatus() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostId             = $this->input->post('post_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post to delete";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'PostStatus'        => -1,
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'UserProfileId' => $UserProfileId,
                                'PostId'        => $PostId,
                                );
            $post_delete = $this->Post_Model->updateMyPost($whereData, $updateData);

            if($post_delete == true) {
                
                $post_detail = $this->Post_Model->getPostDetail($PostId, $UserProfileId);

                $this->db->query("COMMIT");

                $msg = "Post deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Post not deleted. Not authorised to delete this post.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"    => $post_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
       
    public function getPostDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $PostId          = $this->input->post('post_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post";
            $error_occured = true;
        } else {

            $post_detail = $this->Post_Model->getPostDetail($PostId, $UserProfileId);
            $msg = "Post fetched successfully";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"    => $post_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function getMyAllPost() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $posts = $this->Post_Model->getMyAllPost($UserProfileId, $FriendProfileId);
            if(count($posts) > 0) {
                $msg = "Post fetched successfully";
            } else {
                $msg = "No post added by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"       => 'success',
                           "result"   => $posts,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function likePost() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostId             = $this->input->post('post_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post to like";
            $error_occured = true;
        } else {

            $post_like = $this->Post_Model->likePost($UserProfileId, $PostId);

            if($post_like > 0) {
                $msg = "Post liked successfully";
            } else {
                $msg = "Post not like. Not authorised to like this post.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                            "result"        => $post_like,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $post_like,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function unlikePost() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostId             = $this->input->post('post_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post to like";
            $error_occured = true;
        } else {

            $post_unlike = $this->Post_Model->unlikePost($UserProfileId, $PostId);

            if($post_unlike > 0) {
                $msg = "Post unliked successfully";
            } else {
                $msg = "Post not unlike. Not authorised to unlike this post.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $post_unlike,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function savePostComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostId             = $this->input->post('post_id');
        $CommentText        = $this->input->post('your_comment');


        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post";
            $error_occured = true;
        } else if($CommentText == "") {
            $msg = "Please enter your comment";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'PostId'        => $PostId,
                                'UserProfileId' => $UserProfileId,
                                'CommentText'   => $CommentText,
                                'CommentPhoto'  => '',
                                'ParentId'      => '0',
                                'CommentStatus' => '1',
                                'CommentOn'     => date('Y-m-d H:i:s'),
                            );

            $CommentId = $this->Post_Model->savePostComment($insertData);

            if($CommentId > 0) {

                
                //$this->Post_Model->savePostCommentImage($PostId, $_FILES['commment_file']);
               
                $this->db->query("COMMIT");

                $comment_detail = $this->Post_Model->getPostCommentDetail($PostId, $CommentId, $UserProfileId);

                $msg = "Comment added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Comment not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $comment_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function getAllPostComment() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $PostId         = $this->input->post('post_id');
        $Start          = $this->input->post('start');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostId == "") {
            $msg = "Please select post";
            $error_occured = true;
        } else {

            $comments = $this->Post_Model->getAllPostComment($PostId, $UserProfileId, $total_list = 0);
            if(count($comments) > 0) {
                $msg = "Post comments fetched successfully";
            } else {
                $msg = "No post comment found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $comments,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    public function deletePostComment() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PostCommentId      = $this->input->post('comment_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PostCommentId == "") {
            $msg = "Please select post comment to delete";
            $error_occured = true;
        } else {

            $post_comment_delete = $this->Post_Model->deletePostComment($UserProfileId, $PostCommentId);

            if($post_comment_delete > 0) {
                $msg = "Post comment deleted successfully";
            } else {
                $msg = "Post comment not able to delete. Not authorised to delete this post comment.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"         => $post_comment_delete,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

