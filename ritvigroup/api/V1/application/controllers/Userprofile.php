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


    public function getUserAllProfileInformationByUniqueProfileId() {
        $error_occured = false;
        $unique_profile_id = $this->input->post('unique_profile_id');
        
        if($unique_profile_id == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->getUserInformationByUniqueProfileId($unique_profile_id);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];
                $user_info = $this->User_Model->getUserDetail($UserId, 0, 1); // 1 = Full Information

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


    public function updateProfile() {
        $UserId         = $this->input->post('user_id');
        $UserProfileId  = $this->input->post('user_profile_id');
        
        $fullname       = $this->input->post('fullname');
        $gender         = $this->input->post('gender');
        $gender         = ($gender > 0) ? $gender : 0;
        $date_of_birth  = $this->input->post('date_of_birth');
        $date_of_birth  = ($date_of_birth != '') ? date('Y-m-d', strtotime($date_of_birth)) : '0000-00-00';
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
                    $LastName      = trim(str_replace($fullname_exp[0].' '.$fullname_exp[1], '', $fullname));
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
            $user_info_address      = $this->User_Model->getUserProfileAddress($UserProfileId);
            $user_info_education    = $this->User_Model->getUserProfileEducation($UserProfileId);

            $user_info = array_merge($user_info, $user_info_address);
            $user_info = array_merge($user_info, $user_info_education);
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
}
