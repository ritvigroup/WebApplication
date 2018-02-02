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

if($request_action == "LOGOUT") 
{
	$user_id 		= trim($_POST['user_id']);
	if($user_id == "") {
		$msg = "Please select user to logout";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `users` WHERE `id` = '".$user_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u 			= fetch_array($exe_u);

			$upd_otp = "UPDATE `users` SET 
											`device_token` = ''
										WHERE 
											`id` = '".$user_id."'";
			$exe_otp = execute_query($upd_otp);
			
			$upd_ud = "UPDATE `user_devices` 
											SET 
												`logged_out_on` 	= '".date('Y-m-d H:i:s')."'
											WHERE 
												`user_id` 			= '".$user_id."'
											AND `device_token_id` 	= '".$device_token."'";
			$exe_ud = execute_query($upd_ud);
			
			$msg = "Logout Successfully";
		} else {
			$msg = "No user found";
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
					   "user_id"		=> 0,
					   "message"		=> $msg,
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
