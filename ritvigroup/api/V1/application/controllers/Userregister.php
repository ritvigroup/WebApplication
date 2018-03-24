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


    public function registerWithSocial() {
		$error_occured = false;
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $social_type = $this->input->post('social_type');
        
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

                $user_info = $this->User_Model->getUserDetail($UserId);

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
	                	array_merge($updateData, array('FacebookProfileId' => $id));
					} else if($social_type == "google") {
						array_merge($updateData, array('GoogleProfileId' => $id));
					} else if($social_type == "twitter") {
						array_merge($updateData, array('TwitterProfileId' => $id));
					} else if($social_type == "linkedin") {
						array_merge($updateData, array('LinkedinProfileId' => $id));
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

                	$insertData = array(
					                    'UserId' 		=> $UserId,
					                    'DeviceTokenId' => $this->device_token,
					                    'DeviceName' 	=> $this->device_name,
					                    'DeviceOs' 		=> $this->device_os,
					                    'Longitude' 	=> $this->location_long,
					                    'Lantitude' 	=> $this->location_lant,
					                    'LoggedIn' 		=> date('Y-m-d H:i:s'),
					                );

		            $this->User_Model->insertUserLog($insertData);

		            $user_info = $this->User_Model->getUserDetail($UserId);

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
	                	array_merge($insertData, array('FacebookProfileId' => $id));
					} else if($social_type == "google") {
						array_merge($insertData, array('GoogleProfileId' => $id));
					} else if($social_type == "twitter") {
						array_merge($insertData, array('TwitterProfileId' => $id));
					} else if($social_type == "linkedin") {
						array_merge($insertData, array('LinkedinProfileId' => $id));
					}

					if($mobile != '') {
						array_merge($insertData, array('UserMobile' => $mobile));
					}
					if($email != '') {
						array_merge($insertData, array('UserEmail' => $email));
					}

		            $UserId = $this->User_Model->insertUser($insertData);

                    if($UserId > 0) {
    		            $insertData = array(
    					                    'UserId' 					=> $UserId,
    					                    'UserTypeId' 				=> 1,
    					                    'ParentUserId' 				=> 0,
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

                        $insertData = array(
                                            'UserId'                    => $UserId,
                                            'UserTypeId'                => 2,
                                            'ParentUserId'              => 0,
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

                        if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {
                            $this->db->query("COMMIT");
                            $user_info = $this->User_Model->getUserDetail($UserId);
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
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"         => 'success',
                           "result"	    => $user_info,
                           "message"        => $msg,
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

                $insertData = array(
                                    'LoginDeviceToken'  => $this->device_token,
                                    'DeviceLongitude'   => $this->location_long,
                                    'DeviceLantitude'   => $this->location_lant,
                                    'UserStatus'        => 1,
                                    'LoginStatus'       => 1,
                                    'Gender'            => $gender,
                                    'UserName'          => $username,
                                    'UserPassword'      => md5($password),
                                    'UserUniqueId'      => $UserUniqueId,
                                    'UserMobile'        => $mobile,
                                    'UserEmail'         => $email,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );

                $UserId = $this->User_Model->insertUser($insertData);

                if($UserId > 0) {

                    // Citizen
                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 1,
                                        'ParentUserId'              => 0,
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

                    $UserCitizenProfileId = $this->User_Model->insertUserProfile($insertData);

                    // Leader
                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 2,
                                        'ParentUserId'              => 0,
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

                    if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {
                        $this->db->query("COMMIT");
                        $user_info = $this->User_Model->getUserDetailAll($UserId);
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


    public function registerMobile() {
		$error_occured = false;
        $mobile = $this->input->post('mobile');
        
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
                                        'ParentUserId'              => 0,
                                        'FirstName'                 => $UserName,
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 1,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserCitizenProfileId = $this->User_Model->insertUserProfile($insertData);

                    $insertData = array(
                                        'UserId'                    => $UserId,
                                        'UserTypeId'                => 2,
                                        'ParentUserId'              => 0,
                                        'FirstName'                 => $UserName,
                                        'UserProfileDeviceToken'    => $this->device_token,
                                        'Mobile'                    => $mobile,
                                        'ProfileStatus'             => 1,
                                        'AddedBy'                   => $UserId,
                                        'UpdatedBy'                 => $UserId,
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                    );

                    $UserLeaderProfileId = $this->User_Model->insertUserProfile($insertData);

                    if($UserCitizenProfileId > 0 && $UserLeaderProfileId > 0) {

                        $updateData = array(
                            'LoginOtp' => $otp,
                            'LoginDeviceToken' => $this->device_token,
                            'LoginOtpValidTill' => $login_otp_valid_till,
                        );
                        
                        $this->User_Model->updateUserData($UserId, $updateData);

                        $this->db->query("COMMIT");

                        $user_info = $this->User_Model->getUserDetail($UserId);

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
		}

		if($error_occured == true) {
			$array = array(
							"status" 		=> 'failed',
							"message" 		=> $msg,
						);
		} else {

			// otp code
			$otp_message = "Your one time verification code for Ritvi Group is ".$otp;
			$otp_sent = sendMessageToPhone($mobile, $otp_message);

			$array = array(
			               "status" 		=> 'success',
						   "message"		=> $msg,
						   "result"			=> $user_info,
			               );
		}
        displayJsonEncode($array);
    }


    public function validateMobileOtp() {
		$error_occured = false;
        $mobile 		= $this->input->post('mobile');
        $otp 			= $this->input->post('otp');
        
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

                $user_info = $this->User_Model->getUserDetail($UserId);
                

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
			               "status" 		=> 'success',
						   "result"	      => $user_info,
						   "message"		=> $msg,
			               );
		}
        displayJsonEncode($array);
    }


    public function setMobileMpin() {
        $error_occured = false;
        $mobile         = $this->input->post('mobile');
        $mpin           = $this->input->post('mpin');
        $mpin_confirm   = $this->input->post('mpin_confirm');
        
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

                $user_info = $this->User_Model->getUserDetail($UserId);

                $insertData = array(
                                    'UserId'        => $UserId,
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
                           "result"         => $user_info,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }
        
}
