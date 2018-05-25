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

$user_id 		= trim($_POST['user_id']); // Logged In User id
$friend_id 		= trim($_POST['friend_id']); // Opening User profile

$error_occured = false;
$msg = '';

if($request_action == "USER_PROFILE") 
{
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else if($friend_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$user_detail = array();

		// Friend Profile Detail
		$sel_u = "SELECT * FROM `users` WHERE `id` = '".$friend_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u = fetch_array($exe_u);

			$user_detail['user_profile'] = get_user_detail($friend_id);

		} else {
			$msg = "Sorry this user doesnot exist";
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
		               "status" => 'success',
		               "user_detail" => $user_detail,
		               "message" => 'User found successfully',
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