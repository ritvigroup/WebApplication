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


$error_occured = false;
$msg = '';

if($request_action == "SAVE_COMPLAINT") {
	$user_id 				= $_POST['user_id'];
	$self_other_group 		= real_escape_string($_POST['self_other_group']);
	$c_name 				= real_escape_string($_POST['c_name']);
	$c_father_name 			= real_escape_string($_POST['c_father_name']);
	$c_gender 				= real_escape_string($_POST['c_gender']);
	$c_mobile 				= real_escape_string($_POST['c_mobile']);
	$c_email 				= real_escape_string($_POST['c_email']);
	$c_aadhaar_number 		= real_escape_string($_POST['c_aadhaar_number']);
	$c_district 			= real_escape_string($_POST['c_district']);
	$c_tehsil 				= real_escape_string($_POST['c_tehsil']);
	$c_thana 				= real_escape_string($_POST['c_thana']);
	$c_block 				= real_escape_string($_POST['c_block']);
	$c_village_panchayat 	= real_escape_string($_POST['c_village_panchayat']);
	$c_village 				= real_escape_string($_POST['c_village']);
	$c_town_area 			= real_escape_string($_POST['c_town_area']);
	$c_ward 				= real_escape_string($_POST['c_ward']);
	$c_full_address 		= real_escape_string($_POST['c_full_address']);
	$c_department 			= real_escape_string($_POST['c_department']);
	$c_subject 				= real_escape_string($_POST['c_subject']);
	$c_description 			= real_escape_string($_POST['c_description']);

	if($user_id == "") {
		$msg = "Please select your question";
		$error_occured = true;
	} else if($c_name == "") {
		$msg = "Please enter your name";
		$error_occured = true;
	} else if($c_father_name == "") {
		$msg = "Please enter your father's name ";
		$error_occured = true;
	} else {

		$data = array();

		$ins = "INSERT INTO `complaint` SET 
										`self_other_group` 		= '".$self_other_group."',
										`c_name` 				= '".$c_name."',
										`c_father_name` 		= '".$c_father_name."',
										`c_gender` 				= '".$c_gender."',
										`c_mobile` 				= '".$c_mobile."',
										`c_email` 				= '".$c_email."',
										`c_aadhaar_number` 		= '".$c_aadhaar_number."',
										`c_district` 			= '".$c_district."',
										`c_tehsil` 				= '".$c_tehsil."',
										`c_thana` 				= '".$c_thana."',
										`c_block` 				= '".$c_block."',
										`c_village_panchayat` 	= '".$c_village_panchayat."',
										`c_village` 			= '".$c_village."',
										`c_town_area` 			= '".$c_town_area."',
										`c_ward` 				= '".$c_ward."',
										`c_full_address` 		= '".$c_full_address."',
										`c_department` 			= '".$c_department."',
										`c_subject` 			= '".$c_subject."',
										`c_description` 		= '".$c_description."',
										`c_added_on` 			= '".date('Y-m-d H:i:s')."',
										`c_added_by` 			= '".$user_id."'";
		$exe = execute_query($ins);

		$c_id = insert_id();

		$complaint_id = generate_new_complaint_id();

		$upd_c = "UPDATE `complaint` SET 
									`complaint_id` 		= '".$complaint_id."',
									`c_added_on` 	= '".date('Y-m-d H:i:s')."' 
								WHERE 
									`id` = '".$c_id."'";
		$exe_c = execute_query($upd_c);

		for($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
			if($_FILES['file']['name'][$i] != '') {
				$image_file_path = date("YmdHis")."-".time()."-".mt_rand()."-COMPLAINT-".rand().".".@end(@explode('.', $_FILES['file']['name'][$i]));
				$source = $_FILES['file']['tmp_name'][$i];
				$path = MSG_IMAGE_DIR.$image_file_path;
				$result = uploads3($path, $source);

				$c_type = $_POST['c_type'][$i];

				$ins_attach = "INSERT INTO `complaint_attachment` SET 
											`c_id` 				= '".$c_id."',
											`c_type` 			= '".$c_type."',
											`c_filename` 		= '".$image_file_path."',
											`c_org_filename` 	= '".basename($_FILES['file']['name'][$i])."',
											`c_status` 			= '1',
											`c_added_on` 		= '".date('Y-m-d H:i:s')."'";
				$exe_attach = execute_query($ins_attach);
			}
		}

		$msg = "Complaint added successfully";
	}

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 		=> 'success',
					   "complaint_id"	=> $complaint_id,
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