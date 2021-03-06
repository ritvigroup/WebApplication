<?php
include_once('config.php');
include_once('functions.php');

header('Content-type: application/json');

$login_request 	= $_POST['login_request'];
$device_token 	= $_POST['device_token'];
$language 		= $_POST['language'];
$location_lant 	= $_POST['location_lant'];
$location_long 	= $_POST['location_long'];
$device_name   	= $_POST['device_name'];
$device_os 	  	= $_POST['device_os'];

$error_occured = false;
$msg = '';

if($login_request == "REGISTER_MOBILE" || $login_request == "REGENERATE_MOBILE_OTP") 
{
	$mobile 		= trim($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 90);

		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_array($exe_u);
			if($res_u['mpin'] > 0) {
				$msg = "This mobile is already exist in our system. Please login.";
				$error_occured = true;
			}

		} 


		if($error_occured != true) {
			$username = auto_generate_username();
			$profile_id = auto_generate_profile_id();

			$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$upd_otp = "UPDATE `users` SET 
											`login_otp` 					= '".$otp."', 
											`device_token` 					= '".$device_token."', 
											`login_otp_valid_till` 			= '".$login_otp_valid_till."' 
										WHERE 
											`phone` = '".$mobile."'";
				$exe_otp = execute_query($upd_otp);
			} else {
				$upd_otp = "INSERT INTO `users` SET 
											`login_otp` 					= '".$otp."', 
											`device_token` 					= '".$device_token."', 
											`login_otp_valid_till` 			= '".$login_otp_valid_till."', 
											`created_on` 					= '".date('Y-m-d H:i:s')."', 
											`profile_id` 					= '".$profile_id."', 
											`phone` 						= '".$mobile."', 
											`fullname` 						= '".$username."', 
											`login_status` 					= '0',
											`status` 						= '0'";
				$exe_otp = execute_query($upd_otp);
			}
			$msg = "OTP sent to your mobile number";
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
		$result = sendmsg($mobile, $otp_message);

		$array = array(
		               "status" 		=> 'success',
					   "message"		=> $msg,
		               );
	}
} else if($login_request == "VALIDATE_MOBILE_OTP") {
	$mobile 		= trim($_POST['mobile']);
	$otp 			= trim($_POST['otp']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($otp == "") {
		$msg = "Please enter otp sent on your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."' AND `login_otp` = '".$otp."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."' AND `login_otp` = '".$otp."' AND `login_otp_valid_till` >= '".date("Y-m-d H:i:s")."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u 				= fetch_array($exe_u);

				$user_id 			= $res_u['id'];

				$user_detail['user_profile'] = return_user_detail($res_u);

				$upd_u = "UPDATE `users` SET `login_status`	= '0' WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($upd_u);

			} else {
				$msg = "Your OTP is expired. Please click regenerate OTP.";
				$error_occured = true;
			}

		} else {
			$msg = "You entered wrong OTP";
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
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}
} else if($login_request == "SET_MPIN") {
	$mobile 		= trim($_POST['mobile']);
	$mpin 			= trim($_POST['mpin']);
	$mpin_confirm	= trim($_POST['mpin_confirm']);
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

		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u 				= fetch_array($exe_u);
			$user_id 			= $res_u['id'];
			
			$upd_u = "UPDATE `users` SET `mpin` = '".$mpin."', `login_status`	= '1', `status` = '1' WHERE `id` = '".$user_id."'";
			$exe_u = execute_query($upd_u);

			$sel_ufc = "SELECT user_profile_id FROM `user_profiles` WHERE 
														`user_id` = '".$user_id."' 
													AND `user_type` = '1'";
			$exe_ufc = execute_query($sel_ufc);
			$num_ufc = num_rows($exe_ufc);
			if($num_ufc > 0) {
				$res_ufc = fetch_array($exe_ufc);
				$ins = "UPDATE `user_profiles` SET 
												`alt_mobile` 		= '".$alt_mobile."',
												`first_name` 		= '".$fullname_exp[0]."',
												`middle_name` 		= '',
												`last_name` 		= '".$fullname_exp[1]."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."',
												`device_token` 		= '".$device_token."'
											WHERE 
												`user_profile_id` = '".$res_ufc['user_profile_id']."'";
			} else {

				$ins = "INSERT INTO `user_profiles` SET 
												`user_id` 			= '".$user_id."',
												`user_type` 		= '1',
												`parent_user_id` 	= '".$user_id."',
												`user_role` 		= '0',
												`alt_mobile` 		= '".$alt_mobile."',
												`first_name` 		= '".$fullname_exp[0]."',
												`middle_name` 		= '',
												`last_name` 		= '".$fullname_exp[1]."',
												`created_on` 		= '".date('Y-m-d H:i:s')."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."',
												`status` 			= '1',
												`device_token` 		= '".$device_token."'";
				
			}
			$exe = execute_query($ins);

			$user_detail['user_profile'] = get_user_detail($user_id);


			$upd_ud = "INSERT INTO `users_devices` 
											SET 
												`user_id` 			= '".$user_id."', 
												`device_token_id` 	= '".$device_token."', 
												`device_name` 		= '".$device_name."', 
												`device_os` 		= '".$device_os."', 
												`added_on` 			= '".date('Y-m-d H:i:s')."', 
												`logged_in_on` 		= '".date('Y-m-d H:i:s')."', 
												`lant` 				= '".$location_lant."', 
												`long` 				= '".$location_long."', 
												`status` 			= '1'";
			$exe_ud = execute_query($upd_ud);

		} else {
			$msg = "This mobile number is not valid";
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
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}
} else {
	$array = array(
						"status" 		=> 'failed',
						"message" 		=> 'Unauthourised page access',
					);
}
echo json_encode($array);

?>
