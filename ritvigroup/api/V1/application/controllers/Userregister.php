<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Register Management
*/

class Userregister extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function registerWithSocialOld() {
		$error_occured = false;
        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $mobile         = $this->input->post('mobile');
        $social_type    = $this->input->post('social_type');
        $login_type     = $this->input->post('login_type');
        
        if($id == "") {
			$msg = "Please select your id";
			$error_occured = true;
		} else if($name == "") {
			$msg = "Please select your name";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->validateUserSocialProfileLogin($id, $social_type);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginStatus' => 1,
                );
                
                $this->User_Model->updateLoginStatus($UserId, $updateData);

                $msg = "User logged in successfully";

            } else {
            	$MobileUserId = 0;
            	if($mobile != '') {
                	$res_mobile_u = $this->User_Model->isUserMobileExist($mobile);

                	$MobileUserId = $res_mobile_u['UserId'];
                }

                $EmailUserId = 0;
            	if($email != '') {
                	$res_email_u = $this->User_Model->isUserEmailExist($email);

                	$EmailUserId = $res_email_u['UserId'];
                }


                if($MobileUserId > 0 || $EmailUserId > 0) {

                	// If User Mobile or Email exist in our system
                	$updateData = array(
	                    'LoginStatus' => 1,
	                    'UpdatedOn' => date('Y-m-d H:i:s'),
	                );

	                if($social_type == "facebook") {
	                	$updateData = array_merge($updateData, array('FacebookProfileId' => $id));
					} else if($social_type == "google") {
						$updateData = array_merge($updateData, array('GoogleProfileId' => $id));
					} else if($social_type == "twitter") {
						$updateData = array_merge($updateData, array('TwitterProfileId' => $id));
					} else if($social_type == "linkedin") {
						$updateData = array_merge($updateData, array('LinkedinProfileId' => $id));
					}

                	if($MobileUserId == $EmailUserId) {
		                $UserId = $MobileUserId;
		                $this->User_Model->updateUserData($UserId, $updateData);
                	} else if($MobileUserId > 0) {
                		$UserId = $MobileUserId;
                		$this->User_Model->updateUserData($UserId, $updateData);
                	} else if($EmailUserId > 0) {
                		$UserId = $EmailUserId;
                		$this->User_Model->updateUserData($UserId, $updateData);
                	}

                	$this->User_Model->saveUserPhoto('photo', $UserId, $profile_or_cover = 1);

                	$msg = "User logged in successfully";

                } else {

                	// If User Not exist in our system we register him/her first and generate UserId for him/her

                    $this->db->query("BEGIN");

                	$UserName = $this->User_Model->autoGenerateUserName();
					$UserUniqueId = $this->User_Model->autoGenerateUserUniqueId();

                	$insertData = array(
					                    'LoginDeviceToken' 	=> $this->device_token,
					                    'DeviceLongitude' 	=> $this->location_long,
					                    'DeviceLantitude' 	=> $this->location_lant,
					                    'UserStatus' 		=> 1,
					                    'LoginStatus' 		=> 1,
					                    'UserName' 			=> $UserName,
					                    'UserUniqueId' 		=> $user_unique_id,
					                    'AddedOn' 			=> date('Y-m-d H:i:s'),
					                    'UpdatedOn' 		=> date('Y-m-d H:i:s'),
					                );

                	if($social_type == "facebook") {
	                	$insertData = array_merge($insertData, array('FacebookProfileId' => $id));
					} else if($social_type == "google") {
						$insertData = array_merge($insertData, array('GoogleProfileId' => $id));
					} else if($social_type == "twitter") {
						$insertData = array_merge($insertData, array('TwitterProfileId' => $id));
					} else if($social_type == "linkedin") {
						$insertData = array_merge($insertData, array('LinkedinProfileId' => $id));
					}

					if($mobile != '') {
						$insertData = array_merge($insertData, array('UserMobile' => $mobile));
					}
					if($email != '') {
						$insertData = array_merge($insertData, array('UserEmail' => $email));
					}

		            $UserId = $this->User_Model->insertUser($insertData);

                    if($UserId > 0) {
    		            $insertData = array(
    					                    'UserId' 					=> $UserId,
    					                    'UserTypeId' 				=> 1,
    					                    'ParentUserProfileId' 		=> 0,
    					                    'FirstName' 				=> $name,
    					                    'Email' 					=> $email,
    					                    'UserProfileDeviceToken' 	=> $this->device_token,
    					                    'Mobile' 					=> $mobile,
    					                    'ProfileStatus' 			=> 1,
    					                    'AddedBy' 					=> $UserId,
    					                    'UpdatedBy' 				=> $UserId,
    					                    'AddedOn' 					=> date('Y-m-d H:i:s'),
    					                    'UpdatedOn' 				=> date('Y-m-d H:i:s'),
    					                );

                        $UserCitizenProfileId = $this->User_Model->insertUserProfile($insertData);

                        $updateData = array(
                            'AddedBy'   => $UserCitizenProfileId,
                            'UpdatedBy' => $UserCitizenProfileId,
                            'UpdatedOn' => date('Y-m-d H:i:s'),
                        );
                        $this->User_Model->updateUserProfileData($UserCitizenProfileId, $updateData);

                        $insertData = array(
                                            'UserId'                    => $UserId,
                                            'UserTypeId'                => 2,
                                            'ParentUserProfileId'       => 0,
                                            'FirstName'                 => $name,
                                            'Email'                     => $email,
                                            'UserProfileDeviceToken'    => $this->device_token,
                                            'Mobile'                    => $mobile,
                                            'ProfileStatus'             => 1,
                                            'AddedBy'                   => $UserId,
                                            'UpdatedBy'                 => $UserId,
                                            'AddedOn'                   => date('Y-m-d H:i:s'),
                                            'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                        );

                        $UserLeaderProfileId = $this->User_Model->insertUserProfile($insertData);

                        $updateData = array(
                            'AddedBy'   => $UserLeaderProfileId,
                            'UpdatedBy' => $UserLeaderProfileId,
                            'UpdatedOn' => date('Y-m-d H:i:s'),
                        );
                        $this->User_Model->updateUserProfileData($UserLeaderProfileId, $updateData);

                        if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {
                            $this->db->query("COMMIT");

                            $msg = "User registered and logged in successfully";
                        } else {
                            $this->db->query("ROLLBACK");
                            $msg = "Error: Problem to save user profile";
                            $error_occured = true;
                        }

                    } else {
                        $this->db->query("ROLLBACK");
                        $msg = "Error: User not saved.";
                        $error_occured = true;
                    }
                }
            }

            if($error_occured != true) {
                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }

                $insertData = array(
                            'UserId'        => $UserId,
                            'UserProfileId' => $user_profile['UserProfileId'],
                            'DeviceTokenId' => $this->device_token,
                            'DeviceName'    => $this->device_name,
                            'DeviceOs'      => $this->device_os,
                            'Longitude'     => $this->location_long,
                            'Lantitude'     => $this->location_lant,
                            'LoggedIn'      => date('Y-m-d H:i:s'),
                        );

                $this->User_Model->insertUserLog($insertData);
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
                           "result"	    => $user_profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function registerFromWebsite() {
        $error_occured = false;
        $username           = $this->input->post('username');
        $mobile             = $this->input->post('mobile');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $passwordConfirm    = $this->input->post('passwordConfirm');
        $firstname          = $this->input->post('firstname');
        $lastname           = $this->input->post('lastname');
        $gender             = $this->input->post('gender');
        $login_type         = $this->input->post('login_type');
        
        if($username == "") {
            $msg = "Please enter your username";
            $error_occured = true;
        } else if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($email == "") {
            $msg = "Please enter your email";
            $error_occured = true;
        } else if($password == "") {
            $msg = "Please enter your password";
            $error_occured = true;
        } else if($passwordConfirm == "") {
            $msg = "Please enter confirm password";
            $error_occured = true;
        } else if($password != $passwordConfirm) {
            $msg = "Please confirm your password";
            $error_occured = true;
        } else if($firstname == "") {
            $msg = "Please enter your first name";
            $error_occured = true;
        } else if($lastname == "") {
            $msg = "Please enter your last name";
            $error_occured = true;
        } else if($gender == "0") {
            $msg = "Please select your gender";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->userExistForUsernameEmailMobile($username, $email, $mobile);

            if($res_u['UserEmail'] == $email) {
                $msg = "Email already exist";
                $error_occured = true;
            } else if($res_u['UserMobile'] == $mobile) {
                $msg = "Phone number already exist";
                $error_occured = true;
            } else if($res_u['UserName'] == $username) {
                $msg = "Username already exist";
                $error_occured = true;
            } else {
                // If User Not exist in our system we register him/her first and generate UserId for him/her

                $this->db->query("BEGIN");

                $UserUniqueId = $this->User_Model->autoGenerateUserUniqueId();

                $otp = autoGenerateOtp();

                $mobile = str_replace('+91', '', $mobile);
                $mobile = "+91".$mobile;

                $login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

                $insertData = array(
                                    'LoginDeviceToken'  => $this->device_token,
                                    'DeviceLongitude'   => $this->location_long,
                                    'DeviceLantitude'   => $this->location_lant,
                                    'UserStatus'        => 1,
                                    'LoginStatus'       => 1,
                                    'Gender'            => $gender,
                                    'UserName'          => $username,
                                    'LoginOtp'          => $otp,
                                    'UserPassword'      => md5($password),
                                    'UserUniqueId'      => $UserUniqueId,
                                    'UserMobile'        => $mobile,
                                    'UserEmail'         => $email,
                                    'LoginOtpValidTill' => $login_otp_valid_till,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );

                $UserId = $this->User_Model->insertUser($insertData);

                if($UserId > 0) {

                    // Citizen
                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 1,
                                        'ParentUserProfileId'       => 0,
                                        'FirstName'                 => $firstname,
                                        'LastName'                  => $lastname,
                                        'Email'                     => $email,
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 0,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserCitizenProfileId = $this->User_Model->insertUserProfile($insertData);

                    $updateData = array(
                                        'AddedBy'   => $UserCitizenProfileId,
                                        'UpdatedBy' => $UserCitizenProfileId,
                                        'UpdatedOn' => date('Y-m-d H:i:s'),
                                        );
                    $this->User_Model->updateUserProfileData($UserCitizenProfileId, $updateData);

                    // Leader
                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 2,
                                        'ParentUserProfileId'       => 0,
                                        'FirstName'                 => $firstname,
                                        'LastName'                  => $lastname,
                                        'Email'                     => $email,
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 1,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserLeaderProfileId = $this->User_Model->insertUserProfile($insertData);

                    $updateData = array(
                                        'AddedBy'   => $UserLeaderProfileId,
                                        'UpdatedBy' => $UserLeaderProfileId,
                                        'UpdatedOn' => date('Y-m-d H:i:s'),
                                        );
                    $this->User_Model->updateUserProfileData($UserLeaderProfileId, $updateData);

                    if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {
                        $this->db->query("COMMIT");

                        $msg = "User registered and logged in successfully";
                    } else {
                        $this->db->query("ROLLBACK");
                        $msg = "Error: Problem to save user profile";
                        $error_occured = true;
                    }

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Error: User not saved.";
                    $error_occured = true;
                }
            }

            if($error_occured != true) {
                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {
            // otp code
            $otp_message = $otp." is the OTP verifying your mobile with Kaajneeti as citizen";
            $otp_sent = sendMessageToPhone($mobile, $otp_message);

            $array = array(
                           "status"         => 'success',
                           "result"         => $user_profile,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function registerMobile() {
		$error_occured = false;
        $mobile     = $this->input->post('mobile');
        $login_type = $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else {

        	$otp = autoGenerateOtp();
			
        	$login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

        	$res_u = $this->User_Model->userMobileWithMpinExist($mobile);

            if(isset($res_u['UserMpin']) && $res_u['UserMpin'] > 0) {

            	$UserMpin = $res_u['UserMpin'];
				
				$msg = "This mobile is already registered with us. Please login.";
                $error_occured = true;

			} else if(isset($res_u['UserId']) && $res_u['UserId'] > 0) {
			
				$UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginOtp' => $otp,
                    'LoginDeviceToken' => $this->device_token,
                    'LoginOtpValidTill' => $login_otp_valid_till,
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);

                $msg = "Otp send to your mobile for verification.";

			} else {
                // If User Not exist in our system we register him/her first and generate UserId for him/her

                $this->db->query("BEGIN");

                $UserName = $this->User_Model->autoGenerateUserName();
                $UserUniqueId = $this->User_Model->autoGenerateUserUniqueId();

                $insertData = array(
                                    'LoginDeviceToken'  => $this->device_token,
                                    'DeviceLongitude'   => $this->location_long,
                                    'DeviceLantitude'   => $this->location_lant,
                                    'UserStatus'        => 0,
                                    'LoginStatus'       => 0,
                                    'UserMobile'        => $mobile,
                                    'UserName'          => $UserName,
                                    'UserUniqueId'      => $UserUniqueId,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );


                $UserId = $this->User_Model->insertUser($insertData);

                if($UserId > 0) {
                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 1,
                                        'ParentUserProfileId'       => 0,
                                        'FirstName'                 => 'Profile name',
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 1,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserCitizenProfileId = $this->User_Model->insertUserProfile($insertData);

                    $updateData = array(
                                        'AddedBy'   => $UserCitizenProfileId,
                                        'UpdatedBy' => $UserCitizenProfileId,
                                        'UpdatedOn' => date('Y-m-d H:i:s'),
                                        );
                    $this->User_Model->updateUserProfileData($UserCitizenProfileId, $updateData);

                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 2,
                                        'ParentUserProfileId'       => 0,
                                        'FirstName'                 => 'Profile name',
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 0,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserLeaderProfileId = $this->User_Model->insertUserProfile($insertData);

                    $updateData = array(
                                        'AddedBy'   => $UserLeaderProfileId,
                                        'UpdatedBy' => $UserLeaderProfileId,
                                        'UpdatedOn' => date('Y-m-d H:i:s'),
                                        );
                    $this->User_Model->updateUserProfileData($UserLeaderProfileId, $updateData);

                    if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {

                        $updateData = array(
                            'LoginOtp' => $otp,
                            'LoginDeviceToken' => $this->device_token,
                            'LoginOtpValidTill' => $login_otp_valid_till,
                        );
                        
                        $this->User_Model->updateUserData($UserId, $updateData);

                        $this->db->query("COMMIT");

                        $msg = "Otp send to your mobile for verification.";
                    } else {
                        $this->db->query("ROLLBACK");
                        $msg = "Error: Problem to save user profile";
                        $error_occured = true;
                    }
                    
                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Error: User not saved.";
                    $error_occured = true;
                }    
            }

            if($error_occured != true) {
                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }

                $insertData = array(
                                    'UserId'        => $UserId,
                                    'UserProfileId' => $user_profile['UserProfileId'],
                                    'DeviceTokenId' => $this->device_token,
                                    'DeviceName'    => $this->device_name,
                                    'DeviceOs'      => $this->device_os,
                                    'Longitude'     => $this->location_long,
                                    'Lantitude'     => $this->location_lant,
                                    'LoggedIn'      => date('Y-m-d H:i:s'),
                                );
                $this->User_Model->insertUserLog($insertData);
            }

		}

		if($error_occured == true) {
			$array = array(
							"status" 		=> 'failed',
							"message" 		=> $msg,
						);
		} else {

			// otp code
            $otp_message = $otp." is the OTP verifying your mobile with Kaajneeti";
			$otp_sent = sendMessageToPhone($mobile, $otp_message);

			$array = array(
			               "status" 		=> 'success',
						   "message"		=> $msg,
						   "result"			=> $user_profile,
			               );
		}
        displayJsonEncode($array);
    }


    public function validateMobileOtp() {
		$error_occured = false;
        $mobile 		= $this->input->post('mobile');
        $otp            = $this->input->post('otp');
        $login_type		= $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($otp == "") {
			$msg = "Please enter otp sent on your mobile number";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->userMobileOtpValidate($mobile, $otp);

			if($res_u['UserStatus'] == '0') {
                
                $UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginStatus' => 0,
                );
                
                $this->User_Model->updateLoginStatus($UserId, $updateData);

                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }
                

                $msg = "OPT validated successfully";
			} else {
				$msg = "OTP incorrect or expired. Please regenerate";
				$error_occured = true;
			}
		}

		if($error_occured == true) {
			$array = array(
							"status" 		=> 'failed',
							"message" 		=> $msg,
						);
		} else {
			$array = array(
			               "status"       => 'success',
						   "result"	      => $user_profile,
						   "message"	  => $msg,
			               );
		}
        displayJsonEncode($array);
    }


    public function setMobileMpin() {
        $error_occured = false;
        $mobile         = $this->input->post('mobile');
        $mpin           = $this->input->post('mpin');
        $mpin_confirm   = $this->input->post('mpin_confirm');
        $login_type     = $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($mpin == "") {
            $msg = "Please enter 4 digit mpin";
            $error_occured = true;
        } else if($mpin_confirm == "") {
            $msg = "Please confirm 4 digit mpin";
            $error_occured = true;
        } else if($mpin != $mpin_confirm) {
            $msg = "Mpin and Confirm Mpin not matched";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->userMobileExist($mobile);

            if(isset($res_u['UserId']) && $res_u['UserId'] > 0) {

                $UserId = $res_u['UserId'];

                $updateData = array(
                    'UserMpin'   	=> $mpin,
                    'LoginStatus'   => 1,
                    'UserStatus'    => 1,
                    'UpdatedOn'     => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);

                
                
                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }


                $insertData = array(
                                    'UserId'        => $UserId,
                                    'UserProfileId' => $user_profile['UserProfileId'],
                                    'DeviceTokenId' => $this->device_token,
                                    'DeviceName'    => $this->device_name,
                                    'DeviceOs'      => $this->device_os,
                                    'Longitude'     => $this->location_long,
                                    'Lantitude'     => $this->location_lant,
                                    'LoggedIn'      => date('Y-m-d H:i:s'),
                                );
                $this->User_Model->insertUserLog($insertData);

                $msg = "Mpin set successfully";
            } else {
                $msg = "This mobile number does not exist. Please register.";
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


    // Creating Team From User Profile
    public function saveUserProfile() {
        $error_occured = false;
        $user_profile_id = $this->input->post('user_profile_id'); // Added By User Profile Id
        
        $friend_profile     = $this->input->post('friend_profile'); // Selected User Profile Id
        $first_name         = $this->input->post('first_name'); // Created First Name
        $last_name          = $this->input->post('last_name'); // Created last Name
        $email              = $this->input->post('email'); // Created Email
        $department         = $this->input->post('department'); // Department
        $user_name          = $this->input->post('user_name'); // Username
        $password           = $this->input->post('password'); // Passwrord
        $role               = $this->input->post('role'); // User Role
        
        if($user_profile_id == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($friend_profile == "") {
            $msg = "Please select user to create user profile";
            $error_occured = true;
        } else if($first_name == "") {
            $msg = "Please enter first name";
            $error_occured = true;
        } else if($last_name == "") {
            $msg = "Please enter last name";
            $error_occured = true;
        } else if($user_name == "") {
            $msg = "Please enter username";
            $error_occured = true;
        } else if($password == "") {
            $msg = "Please enter password";
            $error_occured = true;
        /*} else if($email == "") {
            $msg = "Please enter email";
            $error_occured = true;
        } else if($department == "") {
            $msg = "Please selected department";
            $error_occured = true;*/
        } else {

            $is_exist = $this->User_Model->validateNewUsernameForUserprofileExist($user_name, $friend_profile);

            if($is_exist == true) {
                $this->db->query("ROLLBACK");
                $msg = "This username already exist. Please choose another";
                $error_occured = true;
            } else {

                $user_detail = $this->User_Model->getUserProfileInformation($user_profile_id);
                $friend_user_detail = $this->User_Model->getUserProfileInformation($friend_profile);

                if($friend_user_detail['UserId'] > 0) {
                    $UserId = $friend_user_detail['UserId'];

                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 3,
                                        'ParentUserProfileId'       => $friend_profile,
                                        'FirstName'                 => $first_name,
                                        'LastName'                  => $last_name,
                                        'Email'                     => $email,
                                        'UserDepartment'            => $department,
                                        'ProfileUserName'           => $user_name,
                                        'ProfileUserPassword'       => md5($password),
                                        'UserRoleId'                => $role,
                                        'UserProfileDeviceToken'    => '',
                                        'Mobile'                    => '',
                                        'ProfileStatus'             => 1,
                                        'AddedBy'                   => $user_profile_id,
                                        'UpdatedBy'                 => $user_profile_id,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $ProfileId = $this->User_Model->insertUserProfile($insertData);

                    if($ProfileId > 0) {

                        $this->User_Model->saveUserProfilePhoto('photo', $user_detail['UserId'], $ProfileId, 1);

                        $to      = 'rajesh1may@gmail.com';
                        $subject = 'the subject';
                        $message = 'hello';
                        $headers = 'From: webmaster@example.com' . "\r\n" .
                            'Reply-To: webmaster@example.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                        @mail($to, $subject, $message, $headers);

                        $this->db->query("COMMIT");
                        $msg = "User saved successfully";
                    } else {
                        $this->db->query("ROLLBACK");
                        $msg = "Error: Problem to save user";
                        $error_occured = true;
                    }

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Error: User not saved.";
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
                           "status"         => 'success',
                           "result"     => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Update Team By User Profile
    public function updateUserProfile() {
        $error_occured = false;
        $user_profile_id = $this->input->post('user_profile_id'); // Added By User Profile Id
        
        $friend_user_profile_id = $this->input->post('friend_user_profile_id'); // Friend User Profile Id
        $first_name             = $this->input->post('first_name'); // Created First Name
        $last_name              = $this->input->post('last_name'); // Created last Name
        $email                  = $this->input->post('email'); // Created Email
        $department             = $this->input->post('department'); // Department
        $user_name              = $this->input->post('user_name'); // Username
        $password               = $this->input->post('password'); // Passwrord
        $role                   = $this->input->post('role'); // User Role
        $status                 = $this->input->post('status'); // Status
        
        if($user_profile_id == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($friend_user_profile_id == "") {
            $msg = "Please select your team profile id";
            $error_occured = true;
        } else if($first_name == "") {
            $msg = "Please enter first name";
            $error_occured = true;
        } else if($last_name == "") {
            $msg = "Please enter last name";
            $error_occured = true;
        } else if($user_name == "") {
            $msg = "Please enter username";
            $error_occured = true;
        /*} else if($email == "") {
            $msg = "Please enter email";
            $error_occured = true;
        } else if($department == "") {
            $msg = "Please selected department";
            $error_occured = true;*/
        } else {

            $is_exist = $this->User_Model->validateUsernameForUserprofileExist($user_name, $friend_user_profile_id);

            if($is_exist == true) {
                $this->db->query("ROLLBACK");
                $msg = "This username already exist. Please choose another";
                $error_occured = true;
            } else {

                $user_profile = $this->User_Model->getUserProfileInformation($friend_user_profile_id, $user_profile_id);

                
                $updateData = array(
                                    'FirstName'                 => $first_name,
                                    'LastName'                  => $last_name,
                                    'Email'                     => $email,
                                    'UserDepartment'            => $department,
                                    'ProfileUserName'           => $user_name,                                    
                                    'UserRoleId'                => $role,
                                    'ProfileStatus'             => $status,
                                    'UpdatedBy'                 => $user_profile_id,
                                    'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                );

                if($password != '') {
                    $updateData = array_merge($updateData, array('ProfileUserPassword' => md5($password)));
                }

                $this->User_Model->updateUserProfileData($friend_user_profile_id, $updateData);

                if($friend_user_profile_id > 0) {

                    $this->User_Model->saveUserProfilePhoto('photo', $user_profile['UserId'], $friend_user_profile_id, 1);

                    $to      = 'rajesh1may@gmail.com';
                    $subject = 'the subject';
                    $message = 'hello';
                    $headers = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    @mail($to, $subject, $message, $headers);

                    $user_profile = $this->User_Model->getUserProfileInformation($friend_user_profile_id, $user_profile_id);

                    $this->db->query("COMMIT");
                    $msg = "User profile updated successfully";
                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Error: Problem to update user successfully";
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
                           "status"         => 'success',
                           "result"         => $user_profile,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
        
}
