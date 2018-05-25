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

if($login_request == "LOGIN_WITH_MPIN") {

	$user_detail = array();
	$mobile 	= trim($_POST['mobile']);
	$mpin 		= trim($_POST['mpin']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($mpin == "") {
		$msg = "Please enter your mpin";
		$error_occured = true;
	} else {
		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."' AND `mpin` = '".$mpin."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u = fetch_array($exe_u);
			if($res_u['status'] == '1') {
				$user_id 			= $res_u['id'];
				
				$upd_u = "UPDATE `users` SET `login_status`	= '1' WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_user_detail($user_id);
				$msg = "User logged in successfully";
			} else {
				$msg = "You are not a valid user. Please send your detail to admin.";
				$error_occured = true;
			}
		} else {
			$msg = "Mobile or Mpin incorrect";
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

} else if($login_request == "LOGIN_MOBILE" || $login_request == "REGENERATE_MOBILE_OTP") {
	$mobile 		= trim($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();
		//$otp = 12345;

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u 			= fetch_array($exe_u);

			$upd_otp = "UPDATE `users` SET 
											`login_otp` 					= '".$otp."', 
											`device_token` 					= '".$device_token."', 
											`status` 						= '0',
											`login_status` 					= '0',
											`login_otp_valid_till` 			= '".$login_otp_valid_till."' 
										WHERE 
											`phone` = '".$mobile."'";
			$exe_otp = execute_query($upd_otp);
			
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

				$upd_u = "UPDATE `users` SET `login_status`	= '1' WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($upd_u);

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
} else {
	$array = array(
						"status" 		=> 'failed',
						"message" 		=> 'Unauthourised page access',
					);
}
echo json_encode($array);

?>
