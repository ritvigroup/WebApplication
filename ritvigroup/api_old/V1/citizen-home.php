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

if($request_action == "CITIZEN_HOME") {
	$citizen_id = real_escape_string($_POST['citizen_id']);
	if($citizen_id == "") {
		$msg = "Please select your citizen";
		$error_occured = true;
	} else {

		$citizen_home = get_citizen_home($citizen_id);
	}

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 			=> 'success',
		               "citizen_home" 		=> $citizen_home,
					   "message"			=> $msg,
		               );
	}
} else {
	$array = return_unauthorise_access();
}
echo json_encode($array);

?>
