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

$user_id 		= $_POST['user_id'];
$feedback_text  = real_escape_string($_POST['feedback_text']);
$feedback_by 	= $_POST['feedback_by'];

$error_occured = false;
$msg = '';

if($request_action == "FEEDBACK") {
	if($user_id == "") {
		$msg = "Please select user";
		$error_occured = true;
	} else if($feedback_text == "") {
		$msg = "Please enter your feedback text";
		$error_occured = true;
	} else {

		$data = array();

		$ins = "INSERT INTO `feedbacks` SET 
										`user_id` 		= '".$user_id."',
										`feedback_by` 	= '".$user_id."',
										`feedback_text` = '".$feedback_text."',
										`sent_on` 		= '".date('Y-m-d H:i:s')."'";
		$exe = execute_query($ins);

		$feedback_id = insert_id();

		if($_FILES['feedback_image']['name'] != '') {
			$image_file_path = date("YmdHis")."-".time()."-".mt_rand()."-FEEDBACK-".rand().".".@end(@explode('.', $_FILES['feedback_image']['name']));
			$source = $_FILES['feedback_image']['tmp_name'];
			$path = MSG_IMAGE_DIR.$image_file_path;
			$result = uploads3($path, $source);

			$upd_feedback = "UPDATE `feedbacks` SET 
										`feedback_image` 	= '".$image_file_path."',
										`sent_on` 			= '".date('Y-m-d H:i:s')."' 
									WHERE 
										`id` = '".$feedback_id."'";
			$exe_feedback = execute_query($upd_feedback);
		}

		$msg = "Feedback saved successfully";
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