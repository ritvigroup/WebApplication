<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Profile Management
*/

class Userconnect extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function sendUserProfileFriendRequest() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $UserProfileDetail = $this->User_Model->checkUserFriendRequest($FriendUserProfileId, $UserProfileId);

            $friend = 0; // 0 = Sending Request, 1 = Now friends, 2 = Not able to send request, -1 = Unfriend 

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                if($UserProfileDetail['RequestAccepted'] == 0) {
                    $this->User_Model->acceptUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "You are now friend with this user";
                    $friend = 1;
                } else if($UserProfileDetail['RequestAccepted'] == 2) {
                    $msg = "You cannot send friend request any more";
                    $error_occured = true;
                } else if($UserProfileDetail['RequestAccepted'] == 1) {
                    $this->User_Model->deleteUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "You are now unfriend from this user";
                    $friend = -1;
                }
            } else {

                $UserProfileDetail = $this->User_Model->checkUserFriendRequest($UserProfileId, $FriendUserProfileId);

                if($UserProfileDetail['UserProfileId'] > 0) {
                    $this->db->query("BEGIN");
                    if($UserProfileDetail['RequestAccepted'] == 1) {
                        $this->User_Model->deleteUserFriendRequest($UserProfileId, $FriendUserProfileId);
                        $this->db->query("COMMIT");
                        $msg = "You are now unfriend from this user";
                    } else if($UserProfileDetail['RequestAccepted'] == 0) {
                        $msg = "You already sent request to user";
                        $error_occured = true;
                    }
                } else {
                    $this->User_Model->sendUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "Sent request to user";
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"      => 'success',
                           "message"     => $msg,
                           "friend"     => $friend,
                           );
        }
        displayJsonEncode($array);
    }


    public function cancelUserProfileFriendRequest() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $UserProfileDetail = $this->User_Model->checkUserFriendRequest($FriendUserProfileId, $UserProfileId);

            $friend = 0; // 0 = Sending Request, 1 = Now friends, 2 = Not able to send request, -1 = Unfriend 

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                if($UserProfileDetail['RequestAccepted'] == 0) {
                    $this->User_Model->cancelUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "Cancelled user request successfully";
                    $friend = 2;
                } else if($UserProfileDetail['RequestAccepted'] == 2) {
                    $msg = "You cannot send friend request any more";
                    $error_occured = true;
                }
            } else {
                $msg = "You cannot send friend request any more";
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
                           "status"      => 'success',
                           "message"     => $msg,
                           "friend"     => $friend,
                           );
        }
        displayJsonEncode($array);
    }


    public function undoUserProfileFriendRequest() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {
            $friend = 0;
            $this->User_Model->undoUserProfileFriendRequest($UserProfileId, $FriendUserProfileId);
            $msg = "My request cancelled";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"      => 'success',
                           "message"     => $msg,
                           "friend"     => $friend,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllFriendRequest($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $friend_request = $this->User_Model->getMyAllFriendRequest($UserProfileId);

            if(count($friend_request) > 0) {
                $msg = count($friend_request)."Friend request found."
            } else {

                $msg = "No friend request found";
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
                           "status"      => 'success',
                           "message"     => $msg,
                           "result"     => $friend_request,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllRequestToFriends($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $request_friend = $this->User_Model->getMyAllRequestToFriends($UserProfileId);

            if(count($request_friend) > 0) {
                $msg = count($request_friend)." request sent to your friends found."
            } else {

                $msg = "No request to friend found";
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
                           "status"      => 'success',
                           "message"     => $msg,
                           "result"     => $request_friend,
                           );
        }
        displayJsonEncode($array);
    }



    public function getMyAllFriends($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $friends = $this->User_Model->getMyAllFriends($UserProfileId);

            if(count($friends) > 0) {
                $msg = count($friends)."  friends found."
            } else {

                $msg = "No friend found";
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
                           "status"      => 'success',
                           "message"     => $msg,
                           "result"     => $friends,
                           );
        }
        displayJsonEncode($array);
    }


        
}
