<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Profile Management
*/

class Userprofile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Politicalparty_Model');


        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    // Get All System Users
    public function getAllSystemUser() {
        $error_occured = false;
        $AdminId = $this->input->post('admin_id');
        
        if($AdminId == "") {
            $msg = "You are not authorised";
            $error_occured = true;
        } else {

            $users = $this->User_Model->getAllSystemUser($AdminId);
            if(count($users) > 0) {

            } else {
                $msg = "No user registered with us.";
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
                           "result"         => $users,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get User Information By Unique Id
    public function getUserFullInformationByUniqueId() {
        $error_occured = false;
        $UserUniqueId = $this->input->post('user_unique_id');
        
        if($UserUniqueId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserFullInformationByUniqueId($UserUniqueId);

            if($res_u['UserStatus'] == '1') {
                
                $user_info = $this->User_Model->getUserDetailAll($res_u['UserId']);

                $msg = "User full information found successfully";

            } else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"         => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }



    // Get User Information
    public function getUserInformation() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {
                
                $user_info = $this->User_Model->getUserDetail($UserId, 0, 0);

                $msg = "User information found successfully";

            } else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get User All Profile Information
    public function getUserAllProfileInformation() {
		$error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
			$msg = "Please select user";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {
                
                $user_info = $this->User_Model->getUserDetail($UserId, 0, 1); // 1 = Full Information

                $msg = "User information found successfully";

            } else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"	 => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get User All Profile Information By Unique Profile Id
    public function getUserAllProfileInformationByUniqueProfileId() {
        $error_occured = false;
        $unique_profile_id  = $this->input->post('unique_profile_id');
        $UserProfileId      = $this->input->post('user_profile_id'); // Logged In User Profile Id
        
        if($unique_profile_id == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformationByUniqueProfileId($unique_profile_id);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];
                $user_info = $this->User_Model->getUserDetail($UserId, $UserProfileId, 1); // 1 = Full Information

                $msg = "User information found successfully";

            }/* else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            }*/ else {
                $msg = "No User Found";
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
                           "result"  => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get User Profile Friend Profile Information
    public function getUserprofileFriendsprofileInformation() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        $FriendUserProfileId = $this->input->post('friend_user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserProfileInformation($FriendUserProfileId, $UserProfileId);

            if($res_u['ProfileStatus'] == '1') {
                
                $profile = $res_u;

                $msg = "Friend profile information found successfully";

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
                           "result"    => $profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get User Profile Information With Unique Id Check and Also with Profile Id
    public function getUserprofileFriendsprofileInformationUniqueIdCheck() {
        $error_occured = false;
        $UserProfileId          = $this->input->post('user_profile_id');
        $unique_profile_id      = $this->input->post('unique_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($unique_profile_id == "") {
            $msg = "Please select unique profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {

            $profile = $this->User_Model->getUserprofileFriendsprofileInformationUniqueIdCheck($unique_profile_id, $FriendUserProfileId, $UserProfileId);

            if($profile['UserProfileId'] > 0) {
                
                $msg = "Profile information found successfully";

            } else {
                $msg = "No user profile Found";
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
                           "result"     => $profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get Userprofile Information by Unique Profile id
    public function getUserprofileByUniqueProfileId() {
        $error_occured = false;
        $UserProfileId          = $this->input->post('user_profile_id');
        $unique_profile_id      = $this->input->post('unique_profile_id');
        $user_type              = $this->input->post('user_type');
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($unique_profile_id == "") {
            $msg = "Please select unique profile id";
            $error_occured = true;
        } else {

            $profile = $this->User_Model->getUserprofileByUniqueProfileId($unique_profile_id, $UserProfileId, $user_type);

            if($profile['UserProfileId'] > 0) {

                $msg = "Profile information found successfully";

            } else {
                $msg = "No user profile Found";
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
                           "result"     => $profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Search Citizen Profiles
    public function searchCitizenProfiles() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        
        $search = $this->input->post('search');
                
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($search == "" || count($search) == 0) {
            $msg = "Please enter something to search";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->searchCitizenProfiles($UserProfileId, $search);

            if(count($res_u['UserProfileCitizen']) > 0) {

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

    // Search Leader Profiles
    public function searchLeaderProfiles() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        
        $search = $this->input->post('search');
                
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($search == "" || count($search) == 0) {
            $msg = "Please enter something to search";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->searchLeaderProfiles($UserProfileId, $search);

            if(count($res_u['UserProfileLeader']) > 0) {

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
                            "result"    => $res_u,
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

    // Search SubLeader Profiles
    public function searchSubLeaderProfiles() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        
        $search = $this->input->post('search');
                
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($search == "" || count($search) == 0) {
            $msg = "Please enter something to search";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->searchSubLeaderProfiles($UserProfileId, $search);

            if(count($res_u['UserProfileSubLeader']) > 0) {

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

    // Search All User Profiles
    public function searchAllUserProfiles() {
        $error_occured = false;
        $UserProfileId = $this->input->post('user_profile_id');
        
        $search = $this->input->post('search');
                
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($search == "" || count($search) == 0) {
            $msg = "Please enter something to search";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->searchAllUserProfiles($UserProfileId, $search);

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

    // Update User Profile Bio
    public function updateUserProfileBio() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        $UserProfileId = $this->input->post('user_profile_id');
        $UserBio = $this->input->post('user_bio');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $updateData = array(
                                'UserBio'       => $UserBio,
                                'UpdatedOn'     => date('Y-m-d H:i:s'),
                                'UpdatedBy'     => $UserProfileId,
                            );

            $this->User_Model->updateUserProfileData($UserProfileId, $updateData);

            $user_info = $this->User_Model->getUserProfileInformation($UserProfileId, $UserProfileId);

            $msg = "User profile bio updated successfully";

        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update User Profile Photo
    public function updateUserProfilePhoto() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        $UserProfileId = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $this->User_Model->saveUserProfilePhoto('photo', $UserId, $UserProfileId, 1);

            $user_info = $this->User_Model->getUserProfileInformation($UserProfileId, $UserProfileId);

            $msg = "User profile photo updated successfully";

        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    // Remove Profile Picutre
    public function removeProfilePicture() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {

                $UserId = $res_u['UserId'];

                $updateData = array(
                    'ProfilePhotoId' => 0,
                    'UpdatedOn' => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);
                
                $user_info = $this->User_Model->getUserDetail($UserId, 0, 0);

                $msg = "User profile photo removed successfully";

            } else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Remove User Profile Picutre
    public function removeUserProfilePicture() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        $UserProfileId = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $user_profile = $this->User_Model->getUserProfileInformation($UserProfileId, $UserProfileId);

            if($user_profile['ProfileStatus'] == '1') {

                $updateData = array(
                                    'ProfilePhotoId' => 0,
                                    'UpdatedOn' => date('Y-m-d H:i:s'),
                                    );
                
                $this->User_Model->updateUserProfileData($UserProfileId, $updateData);
                
                $user_profile = $this->User_Model->getUserProfileInformation($UserProfileId, $UserProfileId);

                $msg = "User profile photo removed successfully";

            } else if($user_profile['ProfileStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"         => $user_profile,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Remove Cover Profile Picture
    public function removeCoverProfilePicture() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {

                $UserId = $res_u['UserId'];

                $updateData = array(
                    'CoverPhotoId' => 0,
                    'UpdatedOn' => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);
                
                $user_info = $this->User_Model->getUserDetail($UserId, 0, 0);

                $msg = "User cover profile photo removed successfully";

            } else if($res_u['UserId'] > 0 && $res_u['UserStatus'] != '1') {
                $msg = "User in no longer active.";
                $error_occured = true;
            } else {
                $msg = "No User Found";
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
                           "result"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Profile After Login
    public function updateProfileAfterLogin() {
        $UserId     = $this->input->post('user_id');
        $UserProfileId     = $this->input->post('user_profile_id');
        
        $fullname       = $this->input->post('fullname');
        $gender         = $this->input->post('gender');
        $gender         = ($gender > 0) ? $gender : 0;
        $date_of_birth  = $this->input->post('date_of_birth');
        $date_of_birth  = ($date_of_birth != '') ? $date_of_birth : '0000-00-00';
        $state          = $this->input->post('state');
        $email          = $this->input->post('email');
        $mobile         = $this->input->post('mobile');
        $alt_mobile     = $this->input->post('alt_mobile');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($fullname == "") {
            $msg = "Please enter fullname";
            $error_occured = true;
        } else if($gender == "") {
            $msg = "Please select gender";
            $error_occured = true;
        } else if($date_of_birth == "0000-00-00") {
            $msg = "Please enter date of birth";
            $error_occured = true;
        } else if($state == "") {
            $msg = "Please enter state";
            $error_occured = true;
        } else if($email == "") {
            $msg = "Please enter email";
            $error_occured = true;
        } else if($mobile == "") {
            $msg = "Please enter mobile number";
            $error_occured = true;
        } else if($alt_mobile == "") {
            $msg = "Please enter alternate mobile number";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->isExistUserAndUserProfileMobile($mobile, $UserId);
            if($res_u['UserId'] > 0) {
                $msg = "This Mobile number is already in use. Please choose mobile number";
                $error_occured = true;
            } else {

                $res_u = $this->User_Model->isExistUserAndUserProfileEmail($email, $UserId);
                if($res_u['UserId'] > 0) {
                    $msg = "This Email is already in use. Please choose email address";
                    $error_occured = true;
                } else {

                    $res_u = $this->User_Model->isExistUserAndUserProfileAltMobile($alt_mobile, $UserId);
                    if($res_u['UserId'] > 0) {
                        $msg = "This alternate mobile is already in use. Please choose mobile number";
                        $error_occured = true;
                    }
                }
            }

            if($error_occured == true) {
            } else {

                $this->db->query("BEGIN");

                $fullname_exp = explode(' ', $fullname);

                $FirstName = '';
                $MiddleName = '';
                $LastName = '';
                if(count($fullname_exp) == 1) {
                    $FirstName     = $fullname_exp[0];
                } else if(count($fullname_exp) == 2) {
                    $FirstName     = $fullname_exp[0];
                    $LastName      = $fullname_exp[1];
                } else if(count($fullname_exp) == 3) {
                    $FirstName     = $fullname_exp[0];
                    $MiddleName    = $fullname_exp[1];
                    $LastName      = $fullname_exp[2];
                } else {
                    $FirstName     = $fullname_exp[0];
                    $MiddleName    = $fullname_exp[1];
                    $LastName      = $fullname_exp[2];
                }

                $updateData = array(
                    'DateOfBirth' => $date_of_birth,
                    'Gender' => $gender,
                    'UpdatedOn' => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);

                $updateData = array(
                                    'FirstName'     => $FirstName,
                                    'MiddleName'    => $MiddleName,
                                    'LastName'      => $LastName,
                                    'Email'         => $email,
                                    'Mobile'        => $mobile,
                                    'AltMobile'     => $alt_mobile,
                                    'State'         => $state,
                                    'UpdatedOn'     => date('Y-m-d H:i:s'),
                                    'UpdatedBy'     => $UserProfileId,
                                );

                if($this->User_Model->updateUserProfileData($UserProfileId, $updateData)) {
                    
                    $this->User_Model->saveUserPhoto('photo', $UserId, 1);

                    $user_info = $this->User_Model->getUserDetail($UserId, 0, 0);

                    $this->db->query("COMMIT");
                    $msg = "User profile updated successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "There is some problem to update user profile. Please try again later.";
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
                           "result"   => $user_info,
                           "message"     => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update profile
    public function updateProfile() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $fullname       = $this->input->post('fullname');
        $gender         = $this->input->post('gender');
        $gender         = ($gender > 0) ? $gender : 0;
        $date_of_birth  = $this->input->post('date_of_birth');
        $date_of_birth  = ($date_of_birth != '') ? date('Y-m-d', strtotime($date_of_birth)) : '0000-00-00';
        $city           = $this->input->post('city');
        $state          = $this->input->post('state');
        $pincode        = $this->input->post('pincode');
        $country        = $this->input->post('country');
        $email          = $this->input->post('email');
        $bio          	= $this->input->post('bio');
        $MaritalStatus 	= $this->input->post('martial_status');
        $mobile         = $this->input->post('mobile');
        $alt_mobile     = $this->input->post('alt_mobile');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        /*} else if($fullname == "") {
            $msg = "Please enter fullname";
            $error_occured = true;
        } else if($gender == "") {
            $msg = "Please select gender";
            $error_occured = true;
        } else if($date_of_birth == "0000-00-00") {
            $msg = "Please enter date of birth";
            $error_occured = true;
        } else if($state == "") {
            $msg = "Please enter state";
            $error_occured = true;
        } else if($email == "") {
            $msg = "Please enter email";
            $error_occured = true;*/
        } else if($mobile == "") {
            $msg = "Please enter mobile number";
            $error_occured = true;
        /*} else if($alt_mobile == "") {
            $msg = "Please enter alternate mobile number";
            $error_occured = true;*/
        } else {

            $res_u = $this->User_Model->isExistUserAndUserProfileMobile($mobile, $UserId);
            if($res_u['UserId'] > 0) {
                $msg = "This Mobile number is already in use. Please choose mobile number";
                $error_occured = true;
            } else {
                if($email != '') {
                    $res_u = $this->User_Model->isExistUserAndUserProfileEmail($email, $UserId);
                    if($res_u['UserId'] > 0) {
                        $msg = "This Email is already in use. Please choose email address";
                        $error_occured = true;
                    } else {

                        // $res_u = $this->User_Model->isExistUserAndUserProfileAltMobile($alt_mobile, $UserId);
                        // if($res_u['UserId'] > 0) {
                        //     $msg = "This alternate mobile is already in use. Please choose mobile number";
                        //     $error_occured = true;
                        // }
                    }
                }
            }

            if($error_occured == true) {
            } else {

                $this->db->query("BEGIN");

                $updateData = array();
                if($fullname != '') {
                    $fullname_exp = explode(' ', $fullname);

                    $FirstName = '';
                    $MiddleName = '';
                    $LastName = '';
                    if(count($fullname_exp) == 1) {
                        $FirstName     = $fullname_exp[0];
                    } else if(count($fullname_exp) == 2) {
                        $FirstName     = $fullname_exp[0];
                        $LastName      = $fullname_exp[1];
                    } else if(count($fullname_exp) == 3) {
                        $FirstName     = $fullname_exp[0];
                        $MiddleName    = $fullname_exp[1];
                        $LastName      = $fullname_exp[2];
                    } else {
                        $FirstName     = $fullname_exp[0];
                        $MiddleName    = $fullname_exp[1];
                        $LastName      = trim(str_replace($fullname_exp[0].' '.$fullname_exp[1], '', $fullname));
                    }

                    $updateData = array_merge($updateData, array('FirstName' => $FirstName));
                    $updateData = array_merge($updateData, array('MiddleName' => $MiddleName));
                    $updateData = array_merge($updateData, array('LastName' => $LastName));
                }
                if($date_of_birth != '0000-00-00') {
                    $updateData = array_merge($updateData, array('DateOfBirth' => $date_of_birth));
                }
                if($gender != '0') {
                    $updateData = array_merge($updateData, array('Gender' => $gender));
                }
                if($email != '') {
                    $updateData = array_merge($updateData, array('Email' => $email));
                }

                $updateData2 = array(
                                    'AltMobile'     => $alt_mobile,
                                    'UserBio'       => $bio,
                                    'MaritalStatus' => $MaritalStatus,
                                    'City'          => $city,
                                    'State'         => $state,
                                    'ZipCode'       => $pincode,
                                    'Country'       => $country,
                                    'UpdatedOn'     => date('Y-m-d H:i:s'),
                                    'UpdatedBy'     => $UserProfileId,
                                );
                $updateData = array_merge($updateData, $updateData2);

                if($this->User_Model->updateUserProfileData($UserProfileId, $updateData)) {
                    
                    //$this->User_Model->saveUserPhoto('photo', $UserId, 1);

                    $this->User_Model->saveUserProfilePhoto('photo', $UserId, $UserProfileId, 1);

                    $user_info = $this->User_Model->getUserDetail($UserId, 0, 1);

                    $this->db->query("COMMIT");
                    $msg = "User profile updated successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "There is some problem to update user profile. Please try again later.";
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
                           "result"   => $user_info,
                           "message"     => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update leader profile Setting
    public function updateLeaderProfileSetting() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $fullname       = $this->input->post('fullname');
        $gender         = $this->input->post('gender');
        $gender         = ($gender > 0) ? $gender : 0;
        $date_of_birth  = $this->input->post('date_of_birth');
        $date_of_birth  = ($date_of_birth != '') ? date('Y-m-d', strtotime($date_of_birth)) : '0000-00-00';
        $martial_status = $this->input->post('martial_status');
        $martial_status = ($martial_status > 0) ? 1 : 0;

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($fullname == "") {
            $msg = "Please enter fullname";
            $error_occured = true;
        } else if($gender == "") {
            $msg = "Please select gender";
            $error_occured = true;
        } else if($date_of_birth == "0000-00-00") {
            $msg = "Please enter date of birth";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $fullname_exp = explode(' ', $fullname);

            $FirstName = '';
            $MiddleName = '';
            $LastName = '';
            if(count($fullname_exp) == 1) {
                $FirstName     = $fullname_exp[0];
            } else if(count($fullname_exp) == 2) {
                $FirstName     = $fullname_exp[0];
                $LastName      = $fullname_exp[1];
            } else if(count($fullname_exp) == 3) {
                $FirstName     = $fullname_exp[0];
                $MiddleName    = $fullname_exp[1];
                $LastName      = $fullname_exp[2];
            } else {
                $FirstName     = $fullname_exp[0];
                $MiddleName    = $fullname_exp[1];
                $LastName      = trim(str_replace($fullname_exp[0].' '.$fullname_exp[1], '', $fullname));
            }

            $updateData = array(
                                'FirstName'     => $FirstName,
                                'MiddleName'    => $MiddleName,
                                'LastName'      => $LastName,
                                'UpdatedOn'     => date('Y-m-d H:i:s'),
                                'UpdatedBy'     => $UserProfileId,
                            );
            if($this->User_Model->updateUserProfileData($UserProfileId, $updateData)) {

                $updateData = array(
                                'DateOfBirth'       => $date_of_birth,
                                'Gender'            => $gender,
                                'MaritalStatus'     => $martial_status,
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );

                $this->User_Model->updateUserData($UserId, $updateData);
                
                $this->User_Model->saveUserPhoto('photo', $UserId, 1);

                $user_info = $this->User_Model->getUserDetailLeader($UserId, $UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User profile updated successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to update user profile. Please try again later.";
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
                           "result"   => $user_info,
                           "message"     => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Leader Password
    public function updateLeaderPassword() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $password           = $this->input->post('password');
        $confirm_password   = $this->input->post('confirm_password');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($password == "") {
            $msg = "Please enter password";
            $error_occured = true;
        } else if($confirm_password == "") {
            $msg = "Please enter confirm password";
            $error_occured = true;
        } else if($password != $confirm_password) {
            $msg = "Password and confirm password not matched";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'UserPassword'  => md5($password),
                                'UpdatedOn'     => date('Y-m-d H:i:s'),
                            );
            

            $this->User_Model->updateUserData($UserId, $updateData);
                
            $user_info = $this->User_Model->getUserDetailLeader($UserId, $UserProfileId);
            $this->db->query("COMMIT");
            $msg = "User profile updated successfully";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $user_info,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Leader Contact
    public function updateLeaderContact() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $website_url    = $this->input->post('website_url');
        $facebook_url   = $this->input->post('facebook_url');
        $twitter_url    = $this->input->post('twitter_url');
        $google_url     = $this->input->post('google_url');

       

        $this->db->query("BEGIN");

        $updateData = array(
                            'WebsiteUrl'        => $website_url,
                            'FacebookPageUrl'   => $facebook_url,
                            'TwitterPageUrl'    => $twitter_url,
                            'GooglePageUrl'     => $google_url,
                            'UpdatedOn'         => date('Y-m-d H:i:s'),
                            'UpdatedBy'         => $UserProfileId,
                        );
        

        $this->User_Model->updateUserProfileData($UserProfileId, $updateData);
            
        $user_info = $this->User_Model->getUserDetailLeader($UserId, $UserProfileId);
        $this->db->query("COMMIT");
        $msg = "User profile updated successfully";

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $user_info,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get All Genders
    public function getAllGender() {
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

            $gender = $this->User_Model->getAllGender();

            if(count($gender) > 0) {

                $msg = "Gender found successfully";

            } else {
                $msg = "No gender found";
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
                           "result"    => $gender,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get All Political Party
    public function getAllPoliticalParty() {
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

            $political_party = $this->Politicalparty_Model->getAllPoliticalParty();

            if(count($political_party) > 0) {

                $msg = "Party found successfully";

            } else {
                $msg = "No political party found";
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
                           "result"    => $political_party,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // UPdate Profile Address
    public function updateProfileAddress() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $address        = $this->input->post('address');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if(count($address) == 0) {
            $msg = "Please add some address";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $address_save = $this->User_Model->updateProfileAddress($UserProfileId, $this->input->post());

            if($address_save == true) {
                
                $user_info = $this->User_Model->getUserProfileAddress($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User address updated successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to update user address. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Delete Profile Address
    public function deleteProfileAddress() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $address_id        = $this->input->post('address_id');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($address_id == "") {
            $msg = "Please select address";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $address_save = $this->User_Model->deleteProfileAddress($UserProfileId, $address_id);

            if($address_save == true) {
                
                $user_info = $this->User_Model->getUserProfileAddress($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User address deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to delete user address. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get User Profile Address
    public function getUserProfileAddress() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $user_info = $this->User_Model->getUserProfileAddress($UserProfileId);
            if(count($user_info) > 0) {
                $msg = "User address detail found.";
            } else {
                $msg = "There is no any address detail for this user";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    // Update Profile Education
    public function updateProfileEducation() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $qualification  = $this->input->post('qualification');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if(count($qualification) == 0) {
            $msg = "Please add some qualification";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $qualification_save = $this->User_Model->updateProfileEducation($UserProfileId, $this->input->post());

            if($qualification_save == true) {
                
                $user_info = $this->User_Model->getUserProfileEducation($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User address updated successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to update user education. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Delete Profile Education
    public function deleteProfileEducation() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $qualification_id  = $this->input->post('qualification_id');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($qualification_id == "") {
            $msg = "Please select qualification";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $qualification_save = $this->User_Model->deleteProfileEducation($UserProfileId, $qualification_id);

            if($qualification_save == true) {
                
                $user_info = $this->User_Model->getUserProfileEducation($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User address deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to delete user education. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get user Profile Education
    public function getUserProfileEducation() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $user_info = $this->User_Model->getUserProfileEducation($UserProfileId);
            if(count($user_info) > 0) {
                $msg = "User education detail found.";
            } else {
                $msg = "There is no any eduction detail for this user";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Update Profile Work
    public function updateProfileWork() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $work  = $this->input->post('work');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if(count($work) == 0) {
            $msg = "Please add some work profile";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $work_save = $this->User_Model->updateProfileWork($UserProfileId, $this->input->post());

            if($work_save == true) {
                
                $user_info = $this->User_Model->getUserProfileWork($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User work updated successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to update user work. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Delete Profile Work
    public function deleteProfileWork() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $work_id  = $this->input->post('work_id');

        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($work_id == '') {
            $msg = "Please select work id";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $work_save = $this->User_Model->deleteProfileWork($UserProfileId, $work_id);

            if($work_save == true) {
                
                $user_info = $this->User_Model->getUserProfileWork($UserProfileId);

                $this->db->query("COMMIT");
                $msg = "User work deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "There is some problem to delete user work. Please try again later.";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get user Profile Work
    public function getUserProfileWork() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {

            $user_info = $this->User_Model->getUserProfileWork($UserProfileId);
            if(count($user_info) > 0) {
                $msg = "User work detail found.";
            } else {
                $msg = "There is no any work detail for this user";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get More Detail About User Profile
    public function getMoreDetailAboutUserProfile() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $user_info = array();
            $user_info_address['Profile']       = $this->User_Model->getUserProfileInformation($UserProfileId, $UserProfileId);
            $user_info_address['Address']       = $this->User_Model->getUserProfileAddress($UserProfileId);
            $user_info_education['Education']   = $this->User_Model->getUserProfileEducation($UserProfileId);
            $user_info_work['Work']             = $this->User_Model->getUserProfileWork($UserProfileId);

            $user_info = array_merge($user_info, $user_info_address);
            $user_info = array_merge($user_info, $user_info_education);
            $user_info = array_merge($user_info, $user_info_work);
            if(count($user_info) > 0) {
                $msg = "User more information detail found.";
            } else {
                $msg = "There is no more information detail for this user";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get More Detail About Friend User Profile
    public function getMoreDetailAboutFriendUserProfile() {
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {
            $user_info = array();
            //$user_info_address['UserInfo']      = $this->User_Model->getUserProfileWithUserInformation($FriendUserProfileId, $UserProfileId);
            $user_info_address['Profile']       = $this->User_Model->getUserProfileInformation($FriendUserProfileId, $UserProfileId);
            $user_info_address['Address']       = $this->User_Model->getUserProfileAddress($FriendUserProfileId);
            $user_info_education['Education']   = $this->User_Model->getUserProfileEducation($FriendUserProfileId);
            $user_info_work['Work']             = $this->User_Model->getUserProfileWork($FriendUserProfileId);
            $user_info_friend['Friend']         = $this->User_Model->getUserProrifleMinFriendList($FriendUserProfileId, $UserProfileId);

            $user_info = array_merge($user_info, $user_info_address);
            $user_info = array_merge($user_info, $user_info_education);
            $user_info = array_merge($user_info, $user_info_work);
            $user_info = array_merge($user_info, $user_info_friend);
            if(count($user_info) > 0) {
                $msg = "User more information detail found.";
            } else {
                $msg = "There is no more information detail for this user";
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
                           "status"   => 'success',
                           "result"   => $user_info,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get User Profile Friend List
    public function getUserProfileFriendList() {
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {
            $user_friend_list = $this->User_Model->getUserProrifleFriendList($FriendUserProfileId, $UserProfileId);

            if(count($user_friend_list) > 0) {
                $msg = "User more information detail found.";
            } else {
                $msg = "There is no more friend for this user";
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
                           "status"   => 'success',
                           "result"   => $user_friend_list,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}
