<?php
include_once('config.php');
include_once('functions.php');


header('Content-type: application/json');


$error_occured = false;
$msg = '';

$request_action	= $_POST['request_action'];
$device_token 	= $_POST['device_token'];
$language 		= $_POST['language'];
$location_lant 	= $_POST['location_lant'];
$location_long 	= $_POST['location_long'];
$device_name   	= $_POST['device_name'];
$device_os 	  	= $_POST['device_os'];


if($request_action == "FORGOT_MPIN") {
	$mobile = trim($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `admin` WHERE `phone` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0)
		{
			$res_u = fetch_array($exe_u);
			if($res_u['status'] == '1') {

				$array = send_forgot_mpin_for_admin_phone($res_u);

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
} else {
	$array = array(
						"status" 		=> 'failed',
						"message" 		=> 'Unauthourised page access',
					);
}
echo json_encode($array);

?>

