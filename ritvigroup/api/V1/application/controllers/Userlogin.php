<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User login Management
*/

class Userlogin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function loginWithSocial() {
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
					                    'UserUniqueId' 		=> $UserUniqueId,
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

                    $citizen_profile_status = 0;
                    $leader_profile_status = 0;
                    if($login_type == '' || $login_type == 1) {
                        $citizen_profile_status = 1;
                    } else if($login_type == 2) {
                        $leader_profile_status = 1;
                    }

                    if($UserId > 0) {
    		            $insertData = array(
    					                    'UserId' 					=> $UserId,
    					                    'UserTypeId' 				=> 1,
    					                    'ParentUserId' 				=> 0,
    					                    'FirstName' 				=> $name,
    					                    'Email' 					=> $email,
    					                    'UserProfileDeviceToken' 	=> $this->device_token,
    					                    'Mobile' 					=> $mobile,
    					                    'ProfileStatus' 			=> $citizen_profile_status,
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
                                            'ProfileStatus'             => $leader_profile_status,
                                            'AddedBy'                   => $UserId,
                                            'UpdatedBy'                 => $UserId,
                                            'AddedOn'                   => date('Y-m-d H:i:s'),
                                            'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                        );

                        $UserLeaderProfileId = $this->User_Model->insertUserProfile($insertData);

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
                           "result"     => $user_profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


	public function loginUsernamePassword() {
		$error_occured = false;
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $login_type     = $this->input->post('login_type');
        
        if($username == "") {
            $msg = "Please enter your username";
            $error_occured = true;
        } else if($password == "") {
            $msg = "Please enter your password";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->verifyUsernamePassword($username, $password);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginStatus' => 1,
                );
                
                $this->User_Model->updateLoginStatus($UserId, $updateData);

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

                $msg = "User logged in successfully";
            } else {
                $msg = "Error: Either username or password incorrect";
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
                           "result"	        => $user_profile,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function loginMobileMpin() {
		$error_occured = false;
        $mobile     = $this->input->post('mobile');
        $mpin       = $this->input->post('mpin');
        $login_type = $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($mpin == "") {
            $msg = "Please enter your mpin";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->verifyMobileMpin($mobile, $mpin);

            if($res_u['UserStatus'] != '2' && $res_u != false) {
                
                $UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginStatus' => 1,
                );
                
                $this->User_Model->updateLoginStatus($UserId, $updateData);

                if($login_type == '' || $login_type == 1) {

                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);

                    $updateData = array(
                        'UserProfileDeviceToken' => $this->device_token,
                    );
                    $this->User_Model->updateUserProfileData($user_profile['UserProfileId'], $updateData);

                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);

                    $updateData = array(
                        'UserProfileDeviceToken' => $this->device_token,
                    );
                    $this->User_Model->updateUserProfileData($user_profile['UserProfileId'], $updateData);
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


                $msg = "User logged in successfully";
            } else if($res_u['UserStatus'] == '2') {
                $msg = "Error: Your account is disabled";
                $error_occured = true;
            } else {
                $msg = "Error: Either mobile number or mpin incorrect";
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
                           "result"	    => $user_profile,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    
    public function loginMobile() {
		$error_occured = false;
        $mobile         = $this->input->post('mobile');
        $login_type     = $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else {

        	$otp = autoGenerateOtp();
			
        	$login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

        	$res_u = $this->User_Model->userMobileExist($mobile);

            if(isset($res_u['UserId']) && $res_u['UserId'] > 0) {

            	$UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginOtp' => $otp,
                    'LoginDeviceToken' => $this->device_token,
                    'LoginOtpValidTill' => $login_otp_valid_till,
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);
				
				$msg = "OTP sent to your mobile number";

			} else {
			
				$msg = "This mobile number is not registered with us. Please register first.";
				$error_occured = true;
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
			               );
		}
        displayJsonEncode($array);
    }


    public function validateMobileOtp() {
		$error_occured = false;
        $mobile 		= $this->input->post('mobile');
        $otp 			= $this->input->post('otp');
        $login_type     = $this->input->post('login_type');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($otp == "") {
			$msg = "Please enter otp sent on your mobile number";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->userMobileOtpValidate($mobile, $otp);

			if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $updateData = array(
                    'LoginStatus' => 1,
                );
                
                $this->User_Model->updateLoginStatus($UserId, $updateData);

                if($login_type == '' || $login_type == 1) {
                    $user_profile = $this->User_Model->getCitizenProfileInformation($UserId);
                } else if($login_type == 2) {
                    $user_profile = $this->User_Model->getLeaderProfileInformation($UserId);
                }
                
                $insertData = array(
                                    'UserId'        => $UserId,
				                    'UserProfileId' => $user_profile['UserProfileId'],
				                    'DeviceTokenId' => $this->device_token,
				                    'DeviceName' 	=> $this->device_name,
				                    'DeviceOs' 		=> $this->device_os,
				                    'Longitude' 	=> $this->location_long,
				                    'Lantitude' 	=> $this->location_lant,
				                    'LoggedIn' 		=> date('Y-m-d H:i:s'),
				                );
                $this->User_Model->insertUserLog($insertData);

                $msg = "OPT validated successfully";
			} else {
				$msg = "OTP incorrect or expired. Please regenerate";
				$error_occured = true;
			}
		}

		if($error_occured == true) {
			$array = array(
							"status" 	  => 'failed',
							"message" 	  => $msg,
						);
		} else {
			$array = array(
			               "status" 	  => 'success',
						   "result"	      => $user_profile,
						   "message"	  => $msg,
			               );
		}
        displayJsonEncode($array);
    }
        
}
