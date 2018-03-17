<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Profile Management
*/

class Userprofile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getUserInformation() {
        $error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {
                
                $user_info = $this->User_Model->getUserDetail($UserId);

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
                           "user_info"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getUserAllProfileInformation() {
		$error_occured = false;
        $UserId = $this->input->post('user_id');
        
        if($UserId == "") {
			$msg = "Please select user";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->getUserInformation($UserId);

            if($res_u['UserStatus'] == '1') {
                
                $user_info = $this->User_Model->getUserDetail($UserId, 1); // 1 = Full Information

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
                           "user_info"	 => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


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

            $res_u = $this->User_Model->getUserProfileInformation($FriendUserProfileId);

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
                           "profile"    => $profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


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
                
                $user_info = $this->User_Model->getUserDetail($UserId);

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
                           "user_info"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


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
                
                $user_info = $this->User_Model->getUserDetail($UserId);

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
                           "user_info"   => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


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
                                    'FirstName'     => $FirstName,
                                    'MiddleName'    => $MiddleName,
                                    'LastName'      => $LastName,
                                    'DateOfBirth'   => $date_of_birth,
                                    'Gender'        => $gender,
                                    'Email'         => $email,
                                    'Mobile'        => $mobile,
                                    'AltMobile'     => $alt_mobile,
                                    'State'         => $state,
                                    'UpdatedOn'     => date('Y-m-d H:i:s'),
                                    'UpdatedBy'     => $UserProfileId,
                                );
                if($this->User_Model->updateUserProfileData($UserProfileId, $updateData)) {
                    
                    $this->User_Model->saveUserPhoto('photo', $UserId, 1);

                    $user_info = $this->User_Model->getUserDetail($UserId);

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
                           "user_info"   => $user_info,
                           "message"     => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function updateProfile() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
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
                                    'FirstName'     => $FirstName,
                                    'MiddleName'    => $MiddleName,
                                    'LastName'      => $LastName,
                                    'DateOfBirth'   => $date_of_birth,
                                    'Gender'        => $gender,
                                    'Email'         => $email,
                                    'Mobile'        => $mobile,
                                    'AltMobile'     => $alt_mobile,
                                    'State'         => $state,
                                    'UpdatedOn'     => date('Y-m-d H:i:s'),
                                    'UpdatedBy'     => $UserProfileId,
                                );
                if($this->User_Model->updateUserProfileData($UserProfileId, $updateData)) {
                    
                    $this->User_Model->saveUserPhoto('photo', $UserId, 1);

                    $user_info = $this->User_Model->getUserDetail($UserId);

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
                           "user_info"   => $user_info,
                           "message"     => $msg,
                           );
        }
        displayJsonEncode($array);
    }
        
}
