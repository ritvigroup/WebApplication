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

$user_id 		= trim($_POST['user_id']);
$admin_id 		= trim($_POST['admin_id']);
$complaint_id 	= trim($_POST['complaint_id']);

$error_occured = false;
$msg = '';

if($request_action == "MY_FAVOURITE_LEADER") {
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$detail_to_show = array('id', 'fullname', 'image', 'created_on', 'username');
		$admin_view = array();
		$sel_v = "SELECT admin_id FROM `user_fav_admin` WHERE `user_id` = '".$user_id."' ORDER BY `fav_on` DESC";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			while($res_v = fetch_array($exe_v)) {
				$array = array('fav_on' => return_time_ago($res_v['fav_on']));
				$user_detail = return_admin_detail_limited($res_v['admin_id'], $detail_to_show);
				$array_merge = array_merge($user_detail, $array);
				$admin_view[] = $array_merge;
			}
			$msg = $num_v." leader found";
		} else {
			$msg = "No leader found";
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
		               "user_detail" 	=> $admin_view,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "ALL_LEADERS") {
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$search_text = trim($_POST['search_text']);
		$detail_to_show = array('id', 'fullname', 'image', 'created_on', 'username');
		$admin_view = array();
		
		if($search_text != '') {
			$sel_v = "SELECT * FROM `admin` WHERE 1 = 1 AND 
														(`username` LIKE '%".$search_text."%' 
														OR `fullname` LIKE '%".$search_text."%' ) 
														ORDER BY `fullname` ASC 
														LIMIT 0,50";
			$exe_v = execute_query($sel_v);
			$num_v = num_rows($exe_v);
			if($num_v > 0) {
				while($res_v = fetch_array($exe_v)) {
					$my_favourite = 0;
					$user_detail = return_admin_detail_limited($res_v['id'], $detail_to_show);
					$sel = "SELECT id FROM `user_fav_admin` WHERE `user_id` = '".$user_id."' AND `admin_id` = '".$res_v['id']."'";
					$exe = execute_query($sel);
					$num = num_rows($exe);
					if($num > 0) {
						$my_favourite = 1;
					}
					$array = array(
									'my_favourite' => $my_favourite,
									);
					$array_merge = array_merge($user_detail, $array);
					$admin_view[] = $array_merge;
				}
				$msg = $num_v." leader found";
			} else {
				$msg = "No leader found";
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
		               "status" 		=> 'success',
		               "user_detail" 	=> $admin_view,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "SET_AS_FAVOURITE") {
	if($user_id == "") {
		$msg = "Please select user";
		$error_occured = true;
	} else {

		if($admin_id > 0) {
			$sel_v = "SELECT id FROM `user_fav_admin` WHERE `user_id` = '".$user_id."' AND `admin_id` = '".$admin_id."'";
			$exe_v = execute_query($sel_v);
			$num_v = num_rows($exe_v);
			if($num_v > 0) {
				$que = "DELETE FROM `user_fav_admin` WHERE `user_id` = '".$user_id."' AND `admin_id` = '".$admin_id."'";
				$msg = "Remove from favourite";
				$favourite = 0;
			} else {
				$que = "INSERT INTO `user_fav_admin` SET 
														`user_id` 		= '".$user_id."',
														`admin_id` 		= '".$admin_id."',
														`fav_on` 		= '".date('Y-m-d H:i:s')."'";
				$msg = "Added to your favourite list";
				$favourite = 1;
			}
			$exe = execute_query($que);
		} else {
			$msg = "No leader selected to favourite";
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
		               "favourite" 		=> $favourite,
		               );
	}
} else if($request_action == "ALL_COMPLAINTS") {
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$all_complaints = array();
		$sel_v = "SELECT * FROM `complaint`
									WHERE 
										1 = 1 
									AND `c_added_by` = '".$user_id."'
									ORDER BY `c_added_on` DESC";
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
	if($user_id == "") {
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