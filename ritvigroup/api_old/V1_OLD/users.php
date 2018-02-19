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
$search_text 	= trim($_POST['search_text']); // Search any other user

$error_occured = false;
$msg = '';

if($request_action == "USERS") 
{
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$user_detail = array();

		if($search_text != '') {
			$sel_u = "SELECT id FROM `users` WHERE `status` = '1' AND 
														(`username` LIKE '%".$search_text."%')";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				while($res_u = fetch_array($exe_u)) {
					$user_detail[] = get_user_detail($res_u['id']);
				}
			} else {
				$msg = "No user found";
				$error_occured = true;
			}
		} else {
			$msg = "Please enter something to search";
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