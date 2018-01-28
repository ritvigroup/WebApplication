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

$user_id			= $_POST['user_id'];

$error_occured = false;
$msg = '';

if($request_action == "DEACTIVATE_MY_ACCOUNT") 
{
	if($user_id == "") {
		$msg = "Please select user";
		$error_occured = true;
	} else {
		$upd = "UPDATE `users` SET 
							`status` 			= '2',
							`deactivated_on` 	= '".date('Y-m-d H:i:s')."'
						WHERE 
							`id` = '".$user_id."'";
		$msg = "User deactivated successfulyy";
		$exe= execute_query($upd);
	}

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 		=> 'success',
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