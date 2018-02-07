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

$error_occured = false;
$msg = '';

if($request_action == "MY_DASHBOARD") {
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
} else {
	$array = array(
						"status" 		=> 'failed',
						"message" 		=> 'Unauthourised page access',
					);
}
echo json_encode($array);

?>