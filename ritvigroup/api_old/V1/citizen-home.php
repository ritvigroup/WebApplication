<?php
include_once('config.php');
include_once('functions.php');

header('Content-type: application/json');

$request_action = real_escape_string($_POST['request_action']);
$device_token 	= real_escape_string($_POST['device_token']);
$language 		= real_escape_string($_POST['language']);
$location_lant 	= real_escape_string($_POST['location_lant']);
$location_long 	= real_escape_string($_POST['location_long']);
$device_name   	= real_escape_string($_POST['device_name']);
$device_os 	  	= real_escape_string($_POST['device_os']);

$error_occured = false;
$msg = '';

if($request_action == "REGISTER_MOBILE" || $request_action == "REGENERATE_MOBILE_OTP") {
	$mobile 		= real_escape_string($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 90);

		$sel_u = "SELECT mpin FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_assoc($exe_u);
			if($res_u['mpin'] > 0) {
				$msg = "This mobile is already exist in our system. Please login.";
				$error_occured = true;
			}

		} 


		if($error_occured != true) {
			

			$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$upd_otp = "UPDATE `citizen` SET 
											`login_otp` 				= '".$otp."', 
											`device_token` 				= '".$device_token."', 
											`login_otp_valid_till` 		= '".$login_otp_valid_till."' 
										WHERE 
											`mobile` = '".$mobile."'";
				$exe_otp = execute_query($upd_otp);
			} else {

				$username = auto_generate_citizen_name();
				$profile_id = auto_generate_citizen_profile_id();

				$upd_otp = "INSERT INTO `citizen` SET 
											`login_otp` 			= '".$otp."', 
											`device_token` 			= '".$device_token."', 
											`login_otp_valid_till` 	= '".$login_otp_valid_till."', 
											`created_on` 			= '".date('Y-m-d H:i:s')."', 
											`profile_id` 			= '".$profile_id."', 
											`mobile` 				= '".$mobile."', 
											`username` 				= '".$username."', 
											`login_status` 			= '0',
											`status` 				= '0'";
				$exe_otp = execute_query($upd_otp);

				$citizen_id = insert_id();

				$upd_cp = "INSERT INTO `citizen_profile` SET 
											`citizen_id` 	= '".$citizen_id."', 
											`firstname` 	= '".$username."', 
											`fullname` 		= '".$username."', 
											`updated_on` 	= '".date('Y-m-d H:i:s')."', 
											`mobile` 		= '".$mobile."', 
											`status` 		= '0'";
				$exe_cp = execute_query($upd_cp);
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
} else if($request_action == "VALIDATE_MOBILE_OTP") {
	$mobile 		= trim($_POST['mobile']);
	$otp 			= trim($_POST['otp']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($otp == "") {
		$msg = "Please enter otp sent on your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."' AND `login_otp_valid_till` >= '".date("Y-m-d H:i:s")."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u 		= fetch_assoc($exe_u);
				$user_id 	= $res_u['id'];

				$upd_u = "UPDATE `citizen` SET `login_status`	= '0' WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_citizen_detail($user_id);				

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
} else if($request_action == "SET_MPIN") {
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
