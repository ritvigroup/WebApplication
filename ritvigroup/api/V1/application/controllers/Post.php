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
}

