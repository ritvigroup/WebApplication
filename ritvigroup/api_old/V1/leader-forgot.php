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


if($request_action == "FORGOT_PASSWORD") {
	$error_occured = false;
	$msg = '';

	$username = real_escape_string($_POST['username']);
	if($username == "") {
		$msg = "Please enter your username";
		$error_occured = true;
	} else {

		$sel_u = "SELECT l.`id`, l.`status`, l.`email`, l.`username`, lp.`first_name`, lp.`last_name` 
											FROM 
												`leader` AS l 
											LEFT JOIN `leader_profile` AS lp ON l.`id` = lp.`leader_id` 
											WHERE 
												l.`username` = '".$username."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0)
		{
			$res_u = fetch_array($exe_u);
			if($res_u['status'] == '1') {

				$array = sendResetPasswordLinkLeader($res_u);

				if($array['status'] == "success") {

					$msg = "Reset password link has been sent to your email. Please check your email.";
					
				} else {
					$msg = $array['message'];
					$error_occured = true;
				}
				
			} else {
				$msg = "Your account is deactivated. Please send email to support team";
				$error_occured = true;
			}
		} 
		else
		{
			$msg = "This username is not registered with us. Please enter correct username.";
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
} else if($request_action == "SET_NEW_PASSWORD") {
	$resetpassword 		= real_escape_string($_POST['resetpassword']);
	$newpassword 		= real_escape_string($_POST['newpassword']);
	$confirmpassword	= real_escape_string($_POST['confirmpassword']);
	if($resetpassword == "") {
		$msg = "Reset Password is blank";
		$error_occured = true;
	} else if($newpassword == "") {
		$msg = "Please enter new password";
		$error_occured = true;
	} else if($confirmpassword == "") {
		$msg = "Please confirm your password";
		$error_occured = true;
	} else if($newpassword != $confirmpassword) {
		$msg = "Password and Confirm Password not matched";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `id` FROM `leader` WHERE `reset_password_code` = '".$resetpassword."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u 		= fetch_assoc($exe_u);
			$leader_id 	= $res_u['id'];
			
			$upd_u = "UPDATE `leader` SET `password` = '".md5($newpassword)."', `reset_password_code` = '', `updated_on` = '".date('Y-m-d H:i:s')."' WHERE `id` = '".$leader_id."'";
			$exe_u = execute_query($upd_u);

			$msg = "Your new password is set. Please login.";

		} else {
			$msg = "This code is not valid. Please reset your password.";
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
					   "message"			=> $msg,
		               );
	}
} else {
	$array = return_unauthorise_access();
}
echo json_encode($array);

?>

