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

$admin_id 		= trim($_POST['admin_id']);
$complaint_id 	= trim($_POST['complaint_id']);

$error_occured = false;
$msg = '';

if($request_action == "MY_DASHBOARD") {
	if($admin_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$sel_v = "SELECT id FROM `complaint_assigned_to` WHERE `assigned_to_admin` = '".$admin_id."' GROUP BY `complaint_id` ORDER BY `assigned_on` DESC";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			
		}

		$admin_dashboard = array(
								'total_complaint' => $num_v,
								'total_suggestions' => 0,
								'total_events' => 0,
								'total_polls' => 0,
								);
		$msg = "Admin dashboard";
	}

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {
		$array = array(
		               "status" 		=> 'success',
		               "admin_dashboard" 	=> $admin_dashboard,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "ALL_COMPLAINTS") {
	if($admin_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$all_complaints = array();
		$sel_v = "SELECT c.* FROM `complaint` AS c 
									LEFT JOIN `complaint_assigned_to` AS ca ON ca.complaint_id = c.id
									WHERE 
										1 = 1 
									AND ca.assigned_to_admin = '".$admin_id."'
									ORDER BY ca.`assigned_on` DESC";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			while($res_v = fetch_array($exe_v)) {
				$all_complaints[] = array(
											'id' 				=> $res_v['id'],
											'complaint_id' 		=> $res_v['complaint_id'],
											'c_name' 			=> $res_v['c_name'],
											'c_father_name' 	=> $res_v['c_father_name'],
											'c_email' 			=> $res_v['c_email'],
											'c_aadhaar_number' 	=> $res_v['c_aadhaar_number'],
											'c_subject' 		=> $res_v['c_subject'],
											'c_description' 	=> $res_v['c_description'],
											'c_status' 			=> $res_v['c_status'],
											'c_added_on_dt' 	=> return_time_ago($res_v['c_added_on']),
											'c_added_on' 		=> $res_v['c_added_on'],
											);
			}
			$msg = $num_v." complaints found";
		} else {
			$msg = "No complaint found";
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
		               "complaints" 	=> $all_complaints,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "COMPLAINT_VIEW") {
	if($admin_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else if($complaint_id == "") {
		$msg = "Sorry no complaint id found";
		$error_occured = true;
	} else {
		$all_complaints = array();
		$sel_v = "SELECT * FROM `complaint` 
									WHERE 
										1 = 1 
									AND `complaint_id` = '".$complaint_id."'";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			while($res_v = fetch_array($exe_v)) {
				$all_complaints[] = array(
											'id' 				=> $res_v['id'],
											'complaint_id' 		=> $res_v['complaint_id'],
											'c_name' 			=> $res_v['c_name'],
											'c_father_name' 	=> $res_v['c_father_name'],
											'c_gender' 			=> $res_v['c_gender'],
											'c_mobile' 			=> $res_v['c_mobile'],
											'c_email' 			=> $res_v['c_email'],
											'c_aadhaar_number' 	=> $res_v['c_aadhaar_number'],
											'c_district' 		=> $res_v['c_district'],
											'c_tehsil' 			=> $res_v['c_tehsil'],
											'c_thana' 			=> $res_v['c_thana'],
											'c_block' 			=> $res_v['c_block'],
											'c_village_panchayat' 	=> $res_v['c_village_panchayat'],
											'c_village' 		=> $res_v['c_village'],
											'c_town_area' 		=> $res_v['c_town_area'],
											'c_ward' 			=> $res_v['c_ward'],
											'c_full_address' 	=> $res_v['c_full_address'],
											'c_department' 		=> $res_v['c_department'],
											'c_subject' 		=> $res_v['c_subject'],
											'c_description' 	=> $res_v['c_description'],
											'c_status' 			=> $res_v['c_status'],
											'c_added_on_dt' 	=> return_time_ago($res_v['c_added_on']),
											'c_added_on' 		=> $res_v['c_added_on'],
											);
			}
			$msg = $num_v." complaints found";
		} else {
			$msg = "No complaint found";
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
		               "complaints" 	=> $all_complaints,
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