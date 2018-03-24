<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Forgot Password and Mpin Management
*/

class Forgot extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function forgotPassword() {
        $error_occured = false;
        $username = $this->input->post('username');
        
        if($username == "") {
            $msg = "Please enter your username";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->userUsernameExist($username);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $ResetPasswordCode = $this->User_Model->autoGenerateResetPasswordCode();

                $ResetPasswordCodeValidTill = date('Y-m-d H:i:s', time() + 120);

                $updateData = array(
                    'ResetPasswordCode' => $ResetPasswordCode,
                    'ResetPasswordCodeValidTill' => $ResetPasswordCodeValidTill,
                    'UpdatedOn' => date('Y-m-d H:i:s'),
                );

                $this->sendResetPasswordLink($res_u['UserEmail'], $ResetPasswordCode);
                
                $this->User_Model->updateUserData($UserId, $updateData);

                $user_info = $this->User_Model->getUserDetail($UserId);

                $msg = "Reset password link sent to your email address";
            } else {
                $msg = "Error: Username doesnot exist";
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
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function sendResetPasswordLink($UserEmail, $ResetPasswordCode) {

        $link = 'http://localhost:81/ritvigroup.com/html/leader/resetpassword/'.$ResetPasswordCode;
        $this->load->library('email');
        $message = '';
        $message .= '<table width="100%">
            <tr>
                <td>Hello '.$UserEmail.',</td>
            </tr>
            <tr>
                <td><a href="'.$link.'" target="_blank">'.$link.'</a></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Regards, <br><b>Kaajneeti</b></td>
            </tr>
        </table>';


        $this->email->from('info@ritvigroup.com');
        $this->email->to($UserEmail);
        $this->email->bcc("rajesh1may@gmail.com");
        
        $this->email->subject('Reset Password URL');
        $this->email->message($message);
        $this->email->send();
    }


    public function updatePassword() {
        $error_occured = false;
        $resetpassword     = $this->input->post('resetpassword');
        $newpassword       = $this->input->post('newpassword');
        $confirmpassword   = $this->input->post('confirmpassword');
        
        if($resetpassword == "") {
            $msg = "Your reset password is blank";
            $error_occured = true;
        } else if($newpassword == "") {
            $msg = "Please enter alteast 6 character password";
            $error_occured = true;
        } else if($confirmpassword == "") {
            $msg = "Please confirm your password";
            $error_occured = true;
        } else if($newpassword != $confirmpassword) {
            $msg = "New Password and confirm password not matched";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->existResetPasswordCode($resetpassword);

            if(isset($res_u['UserId']) && $res_u['UserId'] > 0) {

                $UserId = $res_u['UserId'];

                $updateData = array(
                    'ResetPasswordCode'     => '',
                    'UserPassword'          => md5($newpassword),
                    'UpdatedOn'             => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);

                $user_info = $this->User_Model->getUserDetail($UserId);                

                $msg = "New Password updated successfully";
            } else {
                $msg = "Error either reset password code is expired or incorrect".$res_u;
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"     => 'failed',
                            "message"    => $msg,
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


    public function forgotMobileMpin() {
		$error_occured = false;
        $mobile = $this->input->post('mobile');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else {

            $res_u = $this->User_Model->userMobileExist($mobile);

            if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $ResetPasswordCode = $this->User_Model->autoGenerateResetPasswordCode();

                $ResetPasswordCodeValidTill = date('Y-m-d H:i:s', time() + 120);

                $updateData = array(
                    'ResetPasswordCode' => $ResetPasswordCode,
                    'ResetPasswordCodeValidTill' => $ResetPasswordCodeValidTill,
                    'UpdatedOn' => date('Y-m-d H:i:s'),
                );
                
                $this->User_Model->updateUserData($UserId, $updateData);

                $user_info = $this->User_Model->getUserDetail($UserId);

                $msg = "Reset Mpin sent to your mobile number";
            } else {
                $msg = "Error: Either mobile number or mpin incorrect";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            // code
            $otp_message = "Reset forgot password code is sent to your mobile number. Reset password code is: ".$ResetPasswordCode;
            $otp_sent = sendMessageToPhone($mobile, $otp_message);

            $array = array(
                           "status"         => 'success',
                           "message"        => $msg,
                           "result"         => $user_info,
                           );
        }
        displayJsonEncode($array);
    }


    public function validateResetPasswordCode() {
		$error_occured = false;
        $mobile 		= $this->input->post('mobile');
        $reset_code 	= $this->input->post('reset_code');
        
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($reset_code == "") {
			$msg = "Please enter reset code sent on your mobile number";
			$error_occured = true;
		} else {

			$res_u = $this->User_Model->userMobileResetcodeValidate($mobile, $reset_code);

			if($res_u['UserStatus'] == '1') {
                
                $UserId = $res_u['UserId'];

                $user_info = $this->User_Model->getUserDetail($UserId);
                
                $msg = "Reset Password code validated successfully";
			} else {
				$msg = "Reset Password code incorrect or expired. Please regenerate";
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
			               "status" 	    => 'success',
						   "result"	    => $user_info,
						   "message"		=> $msg,
			               );
		}
        displayJsonEncode($array);
    }


    public function updateMobileMpin() {
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
                    'UserMpin'      => $mpin,
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
                            "status"     => 'failed',
                            "message"    => $msg,
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

        
}
