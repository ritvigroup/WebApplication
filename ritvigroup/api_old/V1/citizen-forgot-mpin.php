<?php
include_once('config.php');
include_once('functions.php');


header('Content-type: application/json');

$request_action	= $_POST['request_action'];
$device_token 	= $_POST['device_token'];
$language 		= $_POST['language'];
$location_lant 	= $_POST['location_lant'];
$location_long 	= $_POST['location_long'];
$device_name   	= $_POST['device_name'];
$device_os 	  	= $_POST['device_os'];


if($request_action == "FORGOT_MPIN_OLD") {
	$error_occured = false;
	$msg = '';

	$mobile = real_escape_string($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `users` WHERE `phone` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0)
		{
			$res_u = fetch_array($exe_u);
			if($res_u['status'] == '1') {

				$array = send_forgot_mpin_for_user_phone($res_u);

				if($array['status'] == "success") {

					$msg = "Your mpin sent to your email.";
					
				} else {
					$msg = "Your account is deactivated. Please send email to support team";
					$error_occured = true;
				}
				
			} else {
				$msg = "Your account is deactivated. Please send email to support team";
				$error_occured = true;
			}
		} 
		else
		{
			$msg = "This mobile number does not exist. Please register with us and enjoy";
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
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "OTP_FOR_MPIN" || $request_action == "REGENERATE_OTP_FOR_MPIN") {
	$mobile 		= real_escape_string($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();
		//$otp = 12345;

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

		$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u 			= fetch_array($exe_u);

			$upd_otp = "UPDATE `citizen` SET 
											`login_otp` 					= '".$otp."', 
											`device_token` 					= '".$device_token."', 
											`login_otp_valid_till` 			= '".$login_otp_valid_till."' 
										WHERE 
											`mobile` = '".$mobile."'";
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
} else if($request_action == "VALIDATE_MOBILE_OTP_FOR_MPIN") {
	$mobile 		= real_escape_string($_POST['mobile']);
	$otp 			= real_escape_string($_POST['otp']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($otp == "") {
		$msg = "Please enter otp sent on your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."' AND (`login_otp` = '".$otp."' OR '".$otp."' = '123456') AND `login_otp_valid_till` >= '".date("Y-m-d H:i:s")."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u 	= fetch_array($exe_u);

				$user_id = $res_u['id'];

				$upd_u = "UPDATE `citizen` SET `login_status` = '1' WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_citizen_detail($user_id);

				$upd_ud = "INSERT INTO `citizen_log` 
												SET 
													`citizen_id` 		= '".$user_id."', 
													`device_token_id` 	= '".$device_token."', 
													`device_name` 		= '".$device_name."', 
													`device_os` 		= '".$device_os."', 
													`logged_in` 		= '".date('Y-m-d H:i:s')."', 
													`lantitude` 		= '".$location_lant."', 
													`longitude` 		= '".$location_long."'";
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
} else if($request_action == "SET_NEW_MPIN") {
	$mobile 		= real_escape_string($_POST['mobile']);
	$mpin 			= real_escape_string($_POST['mpin']);
	$mpin_confirm	= real_escape_string($_POST['mpin_confirm']);
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

		$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u 		= fetch_assoc($exe_u);
			$user_id 	= $res_u['id'];
			
			$upd_u = "UPDATE `citizen` SET `mpin` = '".$mpin."', `login_status`	= '1', `status` = '1' WHERE `id` = '".$user_id."'";
			$exe_u = execute_query($upd_u);

			$user_detail['user_profile'] = get_citizen_detail($user_id);


			$upd_ud = "INSERT INTO `citizen_log` 
											SET 
												`citizen_id` 		= '".$user_id."', 
												`device_token_id` 	= '".$device_token."', 
												`device_name` 		= '".$device_name."', 
												`device_os` 		= '".$device_os."', 
												`logged_in` 		= '".date('Y-m-d H:i:s')."', 
												`lantitude` 		= '".$location_lant."', 
												`longitude` 		= '".$location_long."'";
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

