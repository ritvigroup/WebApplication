<?php
include_once('config.php');
include_once('functions.php');

header('Content-type: application/json');

$request_action = $_POST['request_action'];
$device_token 	= $_POST['device_token'];
$language 		= $_POST['language'];
$location_lant 	= $_POST['location_lant'];
$location_long 	= $_POST['location_long'];
$device_name   	= $_POST['device_name'];
$device_os 	  	= $_POST['device_os'];


$error_occured = false;
$msg = '';

if($request_action == "BLOCK_USER") {
	$user_id 			= trim($_POST['user_id']);
	$friend_id 			= trim($_POST['friend_id']);
	$msg_block_y_n 		= ($_POST['msg_block_y_n'] > 0) ? $_POST['msg_block_y_n'] : 0;
	$profile_block_y_n 	= ($_POST['profile_block_y_n'] > 0) ? $_POST['profile_block_y_n'] : 0;
	
	if($user_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else if($friend_id == "") {
		$msg = "Please enter friend";
		$error_occured = true;
	} else {

		$sel = "SELECT * FROM `user_block_user` WHERE `user_id` = '".$user_id."' AND `friend_id` = '".$friend_id."'";
		$exe = execute_query($sel);
		$num = num_rows($exe);
		if($num > 0) {
			$res = fetch_array($exe);
			$block_id = $res['id'];
		} else {
			$ins = "INSERT INTO `user_block_user` 
												SET 
													`user_id` = '".$user_id."', 
													`friend_id` = '".$friend_id."',
													`blocked_on` = '".date('Y-m-d H:i:s')."'";
			$exe = execute_query($ins);

			$block_id = insert_id();
		}

		if($msg_block_y_n > 0) {
			$upd_user = "UPDATE `user_block_user` SET 
										`msg_block_y_n` = '1',
										`blocked_on` 	= '".date('Y-m-d H:i:s')."' 
									WHERE 
										`id` = '".$block_id."'";
			$exe_user = execute_query($upd_user);
		}

		if($profile_block_y_n > 0) {
			$upd_user = "UPDATE `user_block_user` SET 
										`profile_block_y_n` = '1',
										`blocked_on` 	= '".date('Y-m-d H:i:s')."' 
									WHERE 
										`id` = '".$block_id."'";
			$exe_user = execute_query($upd_user);
		}
	}

	$msg = "User block successfully";

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 			=> 'success',
					   "message"			=> $msg,
		               );
	}

} else if($request_action == "REMOVE_COVER_PHOTO") {
	$user_id 	= trim($_POST['user_id']);
	if($user_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else {
		$upd_user = "UPDATE `users` SET 
									`cover_image` 		= '',
									`updated_on` 	= '".date('Y-m-d H:i:s')."' 
								WHERE 
									`id` = '".$user_id."'";
		$exe_user = execute_query($upd_user);
	}

	$user_detail['user_profile'] = get_user_detail($user_id);

	$msg = "Cover photo removed successfully";

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}

} else if($request_action == "REMOVE_PROFILE_PHOTO") {
	$user_id 	= trim($_POST['user_id']);
	if($user_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else {
		$upd_user = "UPDATE `users` SET 
									`image` 		= '',
									`updated_on` 	= '".date('Y-m-d H:i:s')."' 
								WHERE 
									`id` = '".$user_id."'";
		$exe_user = execute_query($upd_user);
	}

	$msg = "Profile photo removed successfully";

	$user_detail['user_profile'] = get_user_detail($user_id);

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		$array = array(
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}
} else if($request_action == "UPDATE_NAME_IMAGE") {
	$fullname 	= real_escape_string($_POST['fullname']);
	$user_id 	= trim($_POST['user_id']);

	if($user_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else if($fullname == "") {
		$msg = "Please enter username";
		$error_occured = true;
	} else {

		$sel = "SELECT username FROM `users` WHERE `id` != '".$user_id."' AND lower(`username`) = '".strtolower($fullname)."'";
		$exe = execute_query($sel);
		$num = num_rows($exe);
		if($num > 0) {
			$msg = "This username already exist. Please choose another username";
			$error_occured = true;
		} else {
			$user_detail = array();

			$sel_u = "SELECT * FROM `users` WHERE `id` = '".$user_id."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {

				$upd_user = "UPDATE `users` SET 
											`username` 		= '".$fullname."', 
											`status` 		= '1', 
											`updated_on` 	= '".date('Y-m-d H:i:s')."' 
										WHERE 
											`id` = '".$user_id."'";
				$exe_user = execute_query($upd_user);
				
				if(!$exe_user) {
					$msg = "Error occured during update";
					$error_occured = true;
				} else {
					$profile_file = basename($_FILES['profile_img']['name']);
					if($profile_file != '') {
						$profile_image = date('YmdHisA').'-'.time().'-PROFILE-'.mt_rand().'.'.end(explode('.', $profile_file));

						$path = PROFILE_IMAGE_DIR.$profile_image;
						$source = $_FILES["profile_img"]["tmp_name"];
						$result = uploads3($path, $source);

						$upd_user = "UPDATE `users` SET 
													`image` 		= '".$profile_image."',
													`updated_on` 	= '".date('Y-m-d H:i:s')."' 
												WHERE 
													`id` = '".$user_id."'";
						$exe_user = execute_query($upd_user);

						// Create album and save that photo
						$album_id = create_album_for_user($user_id, 'Profile', 1);

						$ins_p = "INSERT INTO `photoes` SET 
													`post_story` 	= '0',
													`user_id` 		= '".$user_id."',
													`name` 			= 'Profile Photo',
													`description` 	= 'Profile Photo',
													`image_path` 	= '".$profile_image."',
													`album_id` 		= '".$album_id."',
													`added_on` 		= '".date('Y-m-d H:i:s')."',
													`status` 		= '1',
													`deleted_y_n` 	= '0'";
						$exe_p = execute_query($ins_p);

					}

					$msg = "Profile updated successfully";
				}
					
				$sel_u = "SELECT * FROM `users` WHERE `id` = '".$user_id."'";
				$exe_u = execute_query($sel_u);
				$num_u = num_rows($exe_u);
				if($num_u > 0) {
					$res_u = fetch_array($exe_u);

					$user_detail['user_profile'] = return_user_detail($res_u);
				}
			} else {
				$msg = "No user found";
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
			               "status" 			=> 'success',
			               "user_detail" 		=> $user_detail,
						   "message"			=> $msg,
			               );
		}
	}
} else if($request_action == "UPDATE_PROFILE_LOGIN") {
	$fullname 		= real_escape_string($_POST['fullname']);
	$gender     	= ($_POST['gender'] > 0) ? $_POST['gender'] : 0;
	$date_of_birth 	= ($_POST['date_of_birth'] != '') ? $_POST['date_of_birth'] : '0000-00-00';
	$state 			= real_escape_string($_POST['state']);
	$email 			= real_escape_string($_POST['email']);
	$mobile 		= real_escape_string($_POST['mobile']);
	$alt_mobile 	= real_escape_string($_POST['alt_mobile']);
	$user_id 		= trim($_POST['user_id']);

	if($user_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else if($fullname == "") {
		$msg = "Please enter name";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `users` WHERE `email` = '".$email."' AND id != '".$user_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$msg = "This email is already taken by someone else. Please choose another";
			$error_occured = true;
		}
	}
	
	if($error_occured != true) {

		$user_detail = array();

		$sel_u = "SELECT * FROM `users` WHERE `id` = '".$user_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$upd_user = "UPDATE `users` SET 
										`fullname` 		= '".$fullname."', 
										`email` 		= '".$email."', 
										`state` 		= '".$state."', ";
						if($date_of_birth != '0000-00-00') {
							$upd_user .= "`date_of_birth` = '".$date_of_birth."', ";
						}
						if($gender != '0') {
							$upd_user .= "`gender` = '".$gender."', ";
						}
						$upd_user .= " `updated_on` 	= '".date('Y-m-d H:i:s')."' "; 
						$upd_user .= " WHERE `id` = '".$user_id."'";
			$exe_user = execute_query($upd_user);
			
			if(!$exe_user) {
				$msg = "Error occured during update";
				$error_occured = true;
			} else {

				$fullname_exp = @explode(" ", $fullname);

				$sel_ufc = "SELECT user_profile_id FROM `user_profiles` WHERE 
														`user_id` = '".$user_id."' 
													AND `user_type` = '1'";
				$exe_ufc = execute_query($sel_ufc);
				$num_ufc = num_rows($exe_ufc);
				if($num_ufc > 0) {
					$res_ufc = fetch_array($exe_ufc);
					$ins = "UPDATE `user_profiles` SET 
													`mobile` 			= '".$mobile."',
													`alt_mobile` 		= '".$alt_mobile."',
													`first_name` 		= '".$fullname_exp[0]."',
													`middle_name` 		= '',
													`last_name` 		= '".$fullname_exp[1]."',
													`updated_on` 		= '".date('Y-m-d H:i:s')."',
													`device_token` 		= '".$device_token."'
												WHERE 
													`user_profile_id` = '".$res_ufc['user_profile_id']."'";
				} else {		

					$ins = "INSERT INTO `user_profiles` SET 
													`user_id` 			= '".$user_id."',
													`user_type` 		= '1',
													`parent_user_id` 	= '".$user_id."',
													`user_role` 		= '0',
													`mobile` 			= '".$mobile."',
													`alt_mobile` 		= '".$alt_mobile."',
													`first_name` 		= '".$fullname_exp[0]."',
													`middle_name` 		= '',
													`last_name` 		= '".$fullname_exp[1]."',
													`created_on` 		= '".date('Y-m-d H:i:s')."',
													`updated_on` 		= '".date('Y-m-d H:i:s')."',
													`status` 			= '1',
													`device_token` 		= '".$device_token."'";
					
				}
				$exe = execute_query($ins);

				$profile_file = basename($_FILES['profile_img']['name']);
				if($profile_file != '') {
					$profile_image = date('YmdHisA').'-'.time().'-PROFILE-'.mt_rand().'.'.end(explode('.', $profile_file));

					$path = PROFILE_IMAGE_DIR.$profile_image;
					$source = $_FILES["profile_img"]["tmp_name"];
					$result = uploads3($path, $source);

					$upd_user = "UPDATE `users` SET 
												`image` 		= '".$profile_image."',
												`updated_on` 	= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`id` = '".$user_id."'";
					$exe_user = execute_query($upd_user);

					// Create album and save that photo
					$album_id = create_album_for_user($user_id, 'Profile', 1);

					$ins_p = "INSERT INTO `photoes` SET 
												`post_story` 	= '0',
												`user_id` 		= '".$user_id."',
												`name` 			= 'Profile Photo',
												`description` 	= 'Profile Photo',
												`image_path` 	= '".$profile_image."',
												`album_id` 		= '".$album_id."',
												`added_on` 		= '".date('Y-m-d H:i:s')."',
												`status` 		= '1',
												`deleted_y_n` 	= '0'";
					$exe_p = execute_query($ins_p);

				}

				$cover_profile_file = basename($_FILES['cover_profile_img']['name']);
				if($cover_profile_file != '') {
					$cover_profile_image = date('YmdHisA').'-'.time().'-COVER-PROFILE-'.mt_rand().'.'.end(explode('.', $cover_profile_file));

					$path = PROFILE_IMAGE_DIR.$cover_profile_image;
					$source = $_FILES["cover_profile_img"]["tmp_name"];
					$result = uploads3($path, $source);

					$upd_user = "UPDATE `users` SET 
												`cover_image` 		= '".$cover_profile_image."',
												`updated_on` 	= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`id` = '".$user_id."'";
					$exe_user = execute_query($upd_user);

					// Create album and save that photo
					$album_id = create_album_for_user($user_id, 'Cover', 1);

					$ins_p = "INSERT INTO `photoes` SET 
												`post_story` 	= '0',
												`user_id` 		= '".$user_id."',
												`name` 			= 'Cover Photo',
												`description` 	= 'Cover Photo',
												`image_path` 	= '".$profile_image."',
												`album_id` 		= '".$album_id."',
												`added_on` 		= '".date('Y-m-d H:i:s')."',
												`status` 		= '1',
												`deleted_y_n` 	= '0'";
					$exe_p = execute_query($ins_p);
				}

				$msg = "Profile updated successfully";
			}
				
			$user_detail['user_profile'] = get_user_detail($user_id);
			
		} else {
			$msg = "No user found";
			$error_occured = true;
		}

		if($error_occured == true) {
			$array = array(
							"status" 		=> 'failed',
							"message" 		=> $msg,
						);
		} else {

			$array = array(
			               "status" 			=> 'success',
			               "user_detail" 		=> $user_detail,
						   "message"			=> $msg,
			               );
		}
	} else {
		$array = array(
						"status" 		=> 'failed',
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