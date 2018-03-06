<?php
include_once('config.php');
include_once('functions.php');

header('Content-type: application/json');

$request_action = $_POST['request_action'];
$device_token 	= $_POST['device_token'];
$language 		= $_POST['language'];
$location_lant 	= $_POST['location_lant'];
$location_long 	= $_POST['location_long'];
$device_name   	= $_POST['device_name'];
$device_os 	  	= $_POST['device_os'];

$error_occured = false;
$msg = '';

if($request_action == "LOGIN_WITH_SOCIAL") {

	$user_detail = array();
	$mobile 	= real_escape_string($_POST['mobile']);
	$mpin 		= real_escape_string($_POST['mpin']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($mpin == "") {
		$msg = "Please enter your mpin";
		$error_occured = true;
	} else if($mpin == 0) {
		$msg = "Please enter valid mpin";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `mpin` FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_array($exe_u);
			if($res_u['mpin'] > 0) {
			} else {
				$msg = "This mobile is not registered with us. Please register first";
				$error_occured = true;
			}

		} 


		if($error_occured != true) {

			$sel_u = "SELECT `id`, `status` FROM `citizen` WHERE `mobile` = '".$mobile."' AND `mpin` = '".$mpin."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u = fetch_array($exe_u);
				if($res_u['status'] == '1') {
					$leader_id 			= $res_u['id'];
					
					$upd_u = "UPDATE `citizen` SET `login_status`	= '1' WHERE `id` = '".$leader_id."'";
					$exe_u = execute_query($upd_u);

					$user_detail['user_profile'] = get_citizen_detail($leader_id);
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
} else if($request_action == "LOGIN_WITH_MPIN") {

	$user_detail = array();
	$mobile 	= real_escape_string($_POST['mobile']);
	$mpin 		= real_escape_string($_POST['mpin']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($mpin == "") {
		$msg = "Please enter your mpin";
		$error_occured = true;
	} else if($mpin == 0) {
		$msg = "Please enter valid mpin";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `mpin` FROM `leader` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_array($exe_u);
			if($res_u['mpin'] > 0) {
			} else {
				$msg = "This mobile is not registered with us. Please register first";
				$error_occured = true;
			}
		}

		if($error_occured != true) {

			$sel_u = "SELECT `id`, `status` FROM `leader` WHERE `mobile` = '".$mobile."' AND `mpin` = '".$mpin."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u = fetch_array($exe_u);
				if($res_u['status'] == '1') {
					$leader_id 			= $res_u['id'];
					
					$upd_u = "UPDATE `leader` SET `login_status` = '1' WHERE `id` = '".$leader_id."'";
					$exe_u = execute_query($upd_u);

					$user_detail['user_profile'] = get_leader_detail($leader_id);
					$msg = "Leader logged in successfully";
				} else {
					$msg = "You are not a valid user. Please send your detail to admin.";
					$error_occured = true;
				}
			} else {
				$msg = "Mobile or Mpin incorrect";
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

		$array = array(
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}
} else if($request_action == "LOGIN_WITH_USERNAME_PASSWORD") {

	$user_detail = array();
	$username 	= real_escape_string($_POST['username']);
	$password 	= real_escape_string($_POST['password']);
	if($username == "") {
		$msg = "Please enter username";
		$error_occured = true;
	} else if($password == "") {
		$msg = "Please enter password";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `id`, `status` FROM `leader` WHERE `username` = '".$username."' AND `password` = '".md5($password)."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u = fetch_array($exe_u);
			if($res_u['status'] == '1') {
				$leader_id 	= $res_u['id'];
				
				$upd_u = "UPDATE `leader` SET `login_status` = '1' WHERE `id` = '".$leader_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_leader_detail($leader_id);
				$msg = "Leader logged in successfully";
			} else {
				$msg = "You are not a valid user. Please send your detail to admin.";
				$error_occured = true;
			}
		} else {
			$msg = "Username or password incorrect";
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
} else if($request_action == "LOGIN_MOBILE" || $request_action == "REGENERATE_MOBILE_OTP") {
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
} else if($request_action == "VALIDATE_MOBILE_OTP") {
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

				$leader_id = $res_u['id'];

				$upd_u = "UPDATE `citizen` SET `login_status` = '1' WHERE `id` = '".$leader_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_citizen_detail($leader_id);

				$upd_ud = "INSERT INTO `citizen_log` 
												SET 
													`leader_id` 		= '".$leader_id."', 
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
} else {
	$array = return_unauthorise_access();
}
echo json_encode($array);

?>
