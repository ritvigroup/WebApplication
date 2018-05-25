<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Connect / Friend / Follow Profile Management
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

    // Add leader in your favourite List
    public function setLeaderAsFavourite() {
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

            $UserProfileDetail = $this->User_Model->checkUserSetAsFavourite($UserProfileId, $FriendUserProfileId);

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                $this->User_Model->deleteUserFavUser($UserProfileId, $FriendUserProfileId);
                $this->db->query("COMMIT");
                $msg = "User profile removed from favourite successfully";
                $favourite = 0;
            } else {
                $this->db->query("BEGIN");
                $insertData = array(
                                    'UserProfileId'         => $UserProfileId,
                                    'FriendUserProfileId'   => $FriendUserProfileId,
                                    'FavOn'                 => date('Y-m-d H:i:s'),
                                );
                $this->User_Model->insertUserFavUser($insertData);
                $this->db->query("COMMIT");
                $msg = "This user is set as favourite";
                $favourite = 1;
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
                           "favourite"     => $favourite,
                           );
        }
        displayJsonEncode($array);
    }

    // Remove Leader from Favourite List
    public function removeLeaderAsFavourite() {
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

            $UserProfileDetail = $this->User_Model->checkUserSetAsFavourite($UserProfileId, $FriendUserProfileId);

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                $this->User_Model->deleteUserFavUser($UserProfileId, $FriendUserProfileId);
                $this->db->query("COMMIT");
                $msg = "User profile removed from favourite successfully";
            } else {
                $msg = "This user is not in your favourite list";
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
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Favourite Leader
    public function getMyAllFavouriteLeader() {
        $error_occured = false;
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_text    = $this->input->post('q');
        $search_text    = ($search_text != '') ? $search_text : '';
        
                
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $fav_leader = $this->User_Model->getMyAllFavouriteLeader($UserId, $UserProfileId, $search_text);

            if(count($fav_leader) > 0) {
                $msg = "Favourite leader found successfully";
            } else {
                $msg = "No leader in your favourite list.";
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
                           "result"     => $fav_leader,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Follow Unfollow user profile
    public function setFollowUnfollowUser() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FollowUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FollowUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $UserProfileDetail = $this->User_Model->checkUserFollow($UserProfileId, $FollowUserProfileId);

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                $this->User_Model->deleteUserFollowUser($UserProfileId, $FollowUserProfileId);
                $this->db->query("COMMIT");
                $msg = "User profile unfollow successfully";
                $follow = 0;
            } else {
                $this->db->query("BEGIN");
                $insertData = array(
                                    'UserProfileId'         => $UserProfileId,
                                    'FollowUserProfileId'   => $FollowUserProfileId,
                                    'FollowOn'              => date('Y-m-d H:i:s'),
                                );
                $this->User_Model->insertUserFollowUser($insertData);
                $this->db->query("COMMIT");
                $msg = "Follow successfull";
                $follow = 1;
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
                           "follow"     => $follow,
                           );
        }
        displayJsonEncode($array);
    }

    // Unfollow User profile
    public function setUnfollowUser() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FollowUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FollowUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $UserProfileDetail = $this->User_Model->checkUserFollow($UserProfileId, $FollowUserProfileId);

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                $this->User_Model->deleteUserFollowUser($UserProfileId, $FollowUserProfileId);
                $this->db->query("COMMIT");
                $msg = "User profile unfollow successfully";
            } else {
                $msg = "This user is not in your follow list";
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
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Followers
    public function getMyAllFollowers() {
        $error_occured = false;
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
                
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $followers = $this->User_Model->getMyAllFollowers($UserId, $UserProfileId);

            if(count($followers) > 0) {

                $msg = "Follow user found successfully";

            } else {
                $msg = "No followers found.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"   => 'failed',
                            "message"  => $msg,
                        );
        } else {

            $array = array(
                           "status"    => 'success',
                           "result"    => $followers,
                           "message"   => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Followings
    public function getMyAllFollowings() {
        $error_occured = false;
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
                
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $followings = $this->User_Model->getMyAllFollowings($UserId, $UserProfileId);

            if(count($followings) > 0) {

                $msg = "Followings found successfully";

            } else {
                $msg = "No following users found.";
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
                           "result"     => $followings,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Set / Unset Get Notification
    public function getNotificationFromUserProfileOnOff() {
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

            $notification_on_off = 0;

            $UserProfileDetail = $this->User_Model->checkUserFriendRequest($UserProfileId, $FriendUserProfileId);


            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                if($UserProfileDetail['GetNotification'] == 1) {
                    $this->User_Model->updateGetNotification($UserProfileId, $FriendUserProfileId, 0);
                    $msg = "Now you will not get notification from this user";
                } else if($UserProfileDetail['GetNotification'] == 0) {
                    $this->User_Model->updateGetNotification($UserProfileId, $FriendUserProfileId, 1);
                    $msg = "Now you will get notifications from this user";
                    $notification_on_off = 1;
                }
                $this->db->query("COMMIT");
            } else {
                $this->User_Model->sendUserFriendRequest($UserProfileId, $FriendUserProfileId);

                $UserProfileDetail = $this->User_Model->checkUserFriendRequest($UserProfileId, $FriendUserProfileId);

                if($UserProfileDetail['UserProfileId'] > 0) {
                    $this->db->query("BEGIN");
                    if($UserProfileDetail['GetNotification'] == 1) {
                        $this->User_Model->updateGetNotification($UserProfileId, $FriendUserProfileId, 0);
                        $msg = "Now you will not get notification from this user";
                    } else if($UserProfileDetail['GetNotification'] == 0) {
                        $this->User_Model->updateGetNotification($UserProfileId, $FriendUserProfileId, 1);
                        $msg = "Now you will get notifications from this user";
                        $notification_on_off = 1;
                    }
                    $this->db->query("COMMIT");
                } else {
                    $msg = "Connect request failed for notifications";
                    $error_occured = true;
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
                           "result"      => $notification_on_off,
                           );
        }
        displayJsonEncode($array);
    }


    // Follow / Unfollow User Profile
    public function followUnfollowUserProfile() {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FollowUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FollowUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $follow = 0;

            $UserProfileDetail = $this->User_Model->checkUserFollow($UserProfileId, $FollowUserProfileId);

            if($UserProfileDetail['UserProfileId'] > 0) {
                $this->db->query("BEGIN");
                $this->User_Model->deleteUserFollowUser($UserProfileId, $FollowUserProfileId);
                $this->db->query("COMMIT");
                $msg = "User profile unfollow successfully";
                $follow = 0;
            } else {
                $this->db->query("BEGIN");
                $insertData = array(
                                    'UserProfileId'         => $UserProfileId,
                                    'FollowUserProfileId'   => $FollowUserProfileId,
                                    'FollowOn'              => date('Y-m-d H:i:s'),
                                );
                $this->User_Model->insertUserFollowUser($insertData);
                $this->db->query("COMMIT");
                $msg = "Follow successfull";
                $follow = 1;
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
                           "result"      => $follow,
                           );
        }
        displayJsonEncode($array);
    }


    // Friend Request Sent
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
                    $msg = "You are now connect with this user";
                    $friend = 1;
                } else if($UserProfileDetail['RequestAccepted'] == 2) {
                    $msg = "You cannot send friend request any more";
                    $error_occured = true;
                } else if($UserProfileDetail['RequestAccepted'] == 1) {
                    $this->User_Model->deleteUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "We are sorry that you now no longer connect with this user.";
                    $friend = -1;
                }
            } else {

                $UserProfileDetail = $this->User_Model->checkUserFriendRequest($UserProfileId, $FriendUserProfileId);

                if($UserProfileDetail['UserProfileId'] > 0) {
                    $this->db->query("BEGIN");
                    if($UserProfileDetail['RequestAccepted'] == 1) {
                        $this->User_Model->deleteUserFriendRequest($UserProfileId, $FriendUserProfileId);
                        $this->db->query("COMMIT");
                        $msg = "You are now unconnect from this user";
                    } else if($UserProfileDetail['RequestAccepted'] == 0) {
                        $msg = "You connect request already sent to user";
                        $error_occured = true;
                    }
                } else {
                    $this->User_Model->sendUserFriendRequest($UserProfileId, $FriendUserProfileId);
                    $this->db->query("COMMIT");
                    $msg = "Sent connection request to user";
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
                           "friend"      => $friend,
                           );
        }
        displayJsonEncode($array);
    }

    // Cancel User friend request
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

    // Undo Friend Request 
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

    // Get All Incomming Friend Request
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
                $msg = count($friend_request)."Friend request found.";
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

    // Get All Outgoing Friend Request
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
                $msg = count($request_friend)." request sent to your friends found.";
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

    // Get My All Friends
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
                $msg = count($friends)."  friends found.";
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


    // Get My All Connections
    public function getMyAllConnections($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalConnections($UserProfileId, 0, 1);

            if(count($connections) > 0) {
                $msg = count($connections)." connect found";
            } else {
                $msg = "No connect found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Citizen Connections
    public function getMyAllCitizenConnections($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalConnections($UserProfileId, 1, 1);
            if(count($connections) > 0) {
                $msg = count($connections)." citizen connect found";
            } else {
                $msg = "No connect found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Leader Connections
    public function getMyAllLeaderConnections($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalConnections($UserProfileId, 2, 1);
            if(count($connections) > 0) {
                $msg = count($connections)." leader connect found";
            } else {
                $msg = "No connect found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Other Connections
    public function getMyAllOtherConnections($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalConnections($UserProfileId, 3, 1);
            if(count($connections) > 0) {
                $msg = count($connections)." other connect found";
            } else {
                $msg = "No connect found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Followers
    public function getMyAllConnectFollowers($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalFollowers($UserProfileId, 1);
            if(count($connections) > 0) {
                $msg = count($connections)." follower found";
            } else {
                $msg = "No follower found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My All Followings
    public function getMyAllConnectFollowings($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $connections = $this->User_Model->getMyTotalFollowings($UserProfileId, 1);
            if(count($connections) > 0) {
                $msg = count($connections)." following found";
            } else {
                $msg = "No following found";
                $error_occured = false;
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
                           "message"        => $msg,
                           "result"         => $connections,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My All Connections with Followers and Followings
    public function getMyAllConnectionsWithFollowersAndFollowings($UserProfileId) {
        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $data = array();
            $data['Connections']    = $this->User_Model->getMyTotalConnections($UserProfileId, 0, 1);
            $data['Citizen']        = $this->User_Model->getMyTotalConnections($UserProfileId, 1, 1);
            $data['Leader']         = $this->User_Model->getMyTotalConnections($UserProfileId, 2, 1);
            $data['Other']          = $this->User_Model->getMyTotalConnections($UserProfileId, 3, 1);
            $data['Followers']      = $this->User_Model->getMyTotalFollowers($UserProfileId, 1);
            $data['Followings']      = $this->User_Model->getMyTotalFollowings($UserProfileId, 1);

            $msg = "User connections with following and followers";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "message"        => $msg,
                           "result"         => $data,
                           );
        }
        displayJsonEncode($array);
    }


    // Search My Friends, Followers and Followings
    public function searchMyFriendFollowerAndFollowing() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        
        $search = $this->input->post('search');
        $search = trim($search);
                
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->searchMyFriendFollowerAndFollowing($UserProfileId, $search);

            if(count($res_u) > 0) {

                $msg = "Profile information found successfully";

            } else {
                $msg = "No user profile Found";
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
                           "result"    => $res_u,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }
}
