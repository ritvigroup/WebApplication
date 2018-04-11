<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Review Management
*/

class Review extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Review_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }

    
    public function getAllReviewForMe() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $review = $this->Review_Model->getAllReviewForMe($UserProfileId);
            if(count($review) > 0) {
                $msg = "Review fetched successfully";
            } else {
                $msg = "No review found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $review,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getAllReviewByMe() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $review = $this->Review_Model->getAllReviewByMe($UserProfileId);
            if(count($review) > 0) {
                $msg = "Review fetched successfully";
            } else {
                $msg = "No review found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $review,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveMyReview() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        $UserReview             = $this->input->post('user_review');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else if($UserReview == "") {
			$msg = "Please select review star";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'UserProfileId'         => $UserProfileId,
                                'FriendUserProfileId'   => $FriendUserProfileId,
                                'UserReview'            => $UserReview,
                                'ReviewStatus'          => 1,
                                'ReviewOn'              => date('Y-m-d H:i:s'),
                            );
			$ReviewId = $this->Review_Model->saveMyReview($insertData);

            if($ReviewId > 0) {
                
                $review_detail = $this->Review_Model->getReviewDetail($ReviewId);

                $this->db->query("COMMIT");

                $msg = "Review saved successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Review not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $review_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}

