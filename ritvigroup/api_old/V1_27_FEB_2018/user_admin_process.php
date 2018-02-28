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
$c_profile_id 	= trim($_POST['c_profile_id']);
$l_profile_id 	= trim($_POST['l_profile_id']);
$complaint_id 	= trim($_POST['complaint_id']);

$error_occured = false;
$msg = '';

if($request_action == "MY_FAVOURITE_LEADER") {
	if($c_profile_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$detail_to_show = array('user_profile_id', 'user_role', 'first_name', 'middle_name', 'last_name', 'created_on', 'status', 'image', 'mobile', 'alt_mobile');
		$admin_view = array();
		$sel_v = "SELECT l_profile_id FROM `user_fav_leader` WHERE `c_profile_id` = '".$c_profile_id."' ORDER BY `fav_on` DESC";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			while($res_v = fetch_array($exe_v)) {
				$array = array('fav_on' => return_time_ago($res_v['fav_on']));
				$user_detail = return_leader_detail_limited($res_v['l_profile_id'], $detail_to_show);
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
} else if($request_action == "SWITCH_TO_LEADER") {

	$user_detail = array();
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$detail_to_show = array('user_profile_id', 'user_role', 'first_name', 'middle_name', 'last_name', 'created_on', 'status', 'image', 'mobile', 'alt_mobile');
		$admin_view = array();
		
		$sel_v = "SELECT * FROM `user_profiles` WHERE `user_type` = '2'	AND `user_id` = '".$user_id."'";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			$res_v = fetch_array($exe_v);
			if($res_v['status'] == '0') {

			} else if($res_v['status'] == '1') {
				$user_detail['user_profile'] = get_user_detail($user_id);
				$l_profile_id = $res_v['user_profile_id'];
			}
		} else {
			$ins = "INSERT INTO `user_profiles` (user_id, user_type, parent_user_id, user_role,first_name, middle_name, last_name, email, created_on, updated_on, status, device_token, image, cover_image, mobile, alt_mobile) 
					SELECT user_id, '2', parent_user_id, '0',first_name, middle_name, last_name, email, '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '1', device_token, image, cover_image, mobile, alt_mobile FROM `user_profiles` WHERE `user_type` = '1' AND `user_id` = '".$user_id."'";
			$exe = execute_query($ins);

			$l_profile_id = insert_id();

			$user_detail['user_profile'] = get_user_detail($user_id);
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
		               "user_detail" 	=> $user_detail,
		               "l_profile_id" 	=> $l_profile_id,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "SWITCH_TO_CITIZEN") {

	$user_detail = array();
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$detail_to_show = array('user_profile_id', 'user_role', 'first_name', 'middle_name', 'last_name', 'created_on', 'status', 'image', 'mobile', 'alt_mobile');
		$admin_view = array();
		
		$sel_v = "SELECT * FROM `user_profiles` WHERE `user_type` = '1'	AND `user_id` = '".$user_id."'";
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			$res_v = fetch_array($exe_v);
			if($res_v['status'] == '0') {
				$msg = "Sorry your account is not-active";
				$error_occured = true;
			} else if($res_v['status'] == '1') {
				$user_detail['user_profile'] = get_user_detail($user_id);
				$c_profile_id = $res_v['user_profile_id'];
			}
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
		               "user_detail" 	=> $user_detail,
		               "c_profile_id" 	=> $c_profile_id,
		               "message" 		=> $msg,
		               );
	}
} else if($request_action == "ALL_LEADERS") {
	if($c_profile_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$search_text = trim($_POST['search_text']);
		$detail_to_show = array('user_profile_id', 'user_role', 'first_name', 'middle_name', 'last_name', 'created_on', 'status', 'image', 'mobile', 'alt_mobile');
		$admin_view = array();
		
		if($search_text != '') {
			$sel_v = "SELECT * FROM `user_profiles` WHERE 1 = 1 
														AND (`user_type` = '2' OR `user_type` = '3')
														AND `status` = '1'
															(`first_name` LIKE '%".$search_text."%' 
														OR `middle_name` LIKE '%".$search_text."%' 
														OR `last_name` LIKE '%".$search_text."%' ) 
														ORDER BY `first_name` ASC 
														LIMIT 0,50";
		} else {
			$sel_v = "SELECT * FROM `user_profiles` WHERE 1 = 1 
														AND (`user_type` = '2' OR `user_type` = '3')
														AND `status` = '1'  
														ORDER BY RAND()  
														LIMIT 0,50";
		}
		$exe_v = execute_query($sel_v);
		$num_v = num_rows($exe_v);
		if($num_v > 0) {
			while($res_v = fetch_array($exe_v)) {
				$my_favourite = 0;
				$user_detail = return_leader_detail_limited($res_v['user_profile_id'], $detail_to_show);
				$sel = "SELECT id FROM `user_fav_leader` WHERE `c_profile_id` = '".$c_profile_id."' AND `l_profile_id` = '".$res_v['user_profile_id']."'";
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
	if($c_profile_id == "") {
		$msg = "Please select user";
		$error_occured = true;
	} else {

		if($l_profile_id > 0) {
			$sel_v = "SELECT id FROM `user_fav_leader` WHERE `c_profile_id` = '".$c_profile_id."' AND `l_profile_id` = '".$l_profile_id."'";
			$exe_v = execute_query($sel_v);
			$num_v = num_rows($exe_v);
			if($num_v > 0) {
				$que = "DELETE FROM `user_fav_leader` WHERE `c_profile_id` = '".$c_profile_id."' AND `l_profile_id` = '".$l_profile_id."'";
				$msg = "Remove from favourite";
				$favourite = 0;
			} else {
				$que = "INSERT INTO `user_fav_leader` SET 
														`c_profile_id` 		= '".$c_profile_id."',
														`l_profile_id` 		= '".$l_profile_id."',
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
	if($c_profile_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {
		$all_complaints = array();
		$sel_v = "SELECT * FROM `complaint`
									WHERE 
										1 = 1 
									AND `c_added_by` = '".$c_profile_id."'
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
	if($c_profile_id == "") {
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
				$all_complaints = array(
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