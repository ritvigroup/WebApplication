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

if($request_action == "BLOCK_USER") {
	$citizen_id 		= real_escape_string($_POST['citizen_id']);
	$friend_id 			= real_escape_string($_POST['friend_id']);
	$msg_block_y_n 		= ($_POST['msg_block_y_n'] > 0) ? $_POST['msg_block_y_n'] : 0;
	$profile_block_y_n 	= ($_POST['profile_block_y_n'] > 0) ? $_POST['profile_block_y_n'] : 0;
	
	if($citizen_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else if($friend_id == "") {
		$msg = "Please enter friend";
		$error_occured = true;
	} else {

		$sel = "SELECT * FROM `user_block_user` WHERE `citizen_id` = '".$citizen_id."' AND `friend_id` = '".$friend_id."'";
		$exe = execute_query($sel);
		$num = num_rows($exe);
		if($num > 0) {
			$res = fetch_array($exe);
			$block_id = $res['id'];
		} else {
			$ins = "INSERT INTO `user_block_user` 
												SET 
													`citizen_id` = '".$citizen_id."', 
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
	$citizen_id 	= real_escape_string($_POST['citizen_id']);
	if($citizen_id == "") {
		$msg = "Please enter citizen";
		$error_occured = true;
	} else {
		$upd_user = "UPDATE `citizen_profile` SET 
									`cover_photo_id` 	= '0',
									`updated_on` 		= '".date('Y-m-d H:i:s')."' 
								WHERE 
									`citizen_id` = '".$citizen_id."'";
		$exe_user = execute_query($upd_user);
	}

	$user_detail['user_profile'] = get_citizen_detail($citizen_id);

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
	$citizen_id 	= real_escape_string($_POST['citizen_id']);
	if($citizen_id == "") {
		$msg = "Please enter citizen";
		$error_occured = true;
	} else {
		$upd_user = "UPDATE `citizen_profile` SET 
									`profile_photo_id` 	= '0',
									`updated_on` 		= '".date('Y-m-d H:i:s')."' 
								WHERE 
									`citizen_id` = '".$citizen_id."'";
		$exe_user = execute_query($upd_user);
	}

	$msg = "Profile photo removed successfully";

	$user_detail['user_profile'] = get_citizen_detail($citizen_id);

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
} else if($request_action == "UPDATE_PROFILE_LOGIN") {
	$citizen_id 	= real_escape_string($_POST['citizen_id']);
	$fullname 		= real_escape_string($_POST['fullname']);
	$gender     	= ($_POST['gender'] > 0) ? $_POST['gender'] : 0;
	$date_of_birth 	= ($_POST['date_of_birth'] != '') ? $_POST['date_of_birth'] : '0000-00-00';
	$state 			= real_escape_string($_POST['state']);
	$email 			= real_escape_string($_POST['email']);
	$mobile 		= real_escape_string($_POST['mobile']);
	$alt_mobile 	= real_escape_string($_POST['alt_mobile']);

	if($citizen_id == "") {
		$msg = "Please select citizen";
		$error_occured = true;
	} else if($fullname == "") {
		$msg = "Please enter name";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `citizen` WHERE `email` = '".$email."' AND id != '".$citizen_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$msg = "This email is already taken by someone else. Please choose another";
			$error_occured = true;
		}
	}
	
	if($error_occured != true) {

		$user_detail = array();

		$sel_u = "SELECT `id` FROM `citizen` WHERE `id` = '".$citizen_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$upd_user = "UPDATE `citizen_profile` SET 
										`fullname` 		= '".$fullname."', 
										`email` 		= '".$email."',
										`alt_mobile` 	= '".$alt_mobile."', 
										`state` 		= '".$state."', ";
						if($date_of_birth != '0000-00-00') {
							$upd_user .= "`date_of_birth` = '".$date_of_birth."', ";
						}
						if($gender != '0') {
							$upd_user .= "`gender` = '".$gender."', ";
						}
						$upd_user .= " `updated_on` 	= '".date('Y-m-d H:i:s')."' "; 
						$upd_user .= " WHERE `citizen_id` = '".$citizen_id."'";
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

					// Create album and save that photo
					$album_id = create_album_for_citizen($citizen_id, 'Profile', 'My Profile');

					$photo_id = insert_citizen_photo($citizen_id, $album_id, $profile_image, $photo_title, $photo_description);

					// Update Citizen Profile Photo id in Profile
					$upd_user = "UPDATE `citizen_profile` SET 
												`profile_photo_id` 	= '".$photo_id."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`citizen_id` = '".$citizen_id."'";
					$exe_user = execute_query($upd_user);
				}

				$cover_profile_file = basename($_FILES['cover_profile_img']['name']);
				if($cover_profile_file != '') {
					$cover_profile_image = date('YmdHisA').'-'.time().'-COVER-PROFILE-'.mt_rand().'.'.end(explode('.', $cover_profile_file));

					$path = PROFILE_IMAGE_DIR.$cover_profile_image;
					$source = $_FILES["cover_profile_img"]["tmp_name"];
					$result = uploads3($path, $source);

					// Create album and save that photo
					$cover_album_id = create_album_for_citizen($citizen_id, 'Cover Photo', 'My Cover Photoes');

					$cover_photo_id = insert_citizen_photo($citizen_id, $cover_album_id, $cover_profile_image, $cover_photo_title, $cover_photo_description);

					// Update Citizen Profile Photo id in Profile
					$upd_user = "UPDATE `citizen_profile` SET 
												`cover_photo_id` 	= '".$cover_photo_id."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`citizen_id` = '".$citizen_id."'";
					$exe_user = execute_query($upd_user);
				}

				$msg = "Profile updated successfully";
			}
				
			$user_detail['user_profile'] = get_citizen_detail($citizen_id);
			
		} else {
			$msg = "No citizen found";
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
} else if($request_action == "GET_PROFILE_CITIZEN") {
	$citizen_id	= real_escape_string($_POST['citizen_id']);

	$user_detail = array();
	if($citizen_id == "") {
		$msg = "Please enter citizen";
		$error_occured = true;
	} else {
		$user_detail['user_profile'] = get_citizen_detail($citizen_id);
		$msg = "Citizen profile found successfully";
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
} else if($request_action == "UPDATE_PROFILE_CITIZEN") {
	$citizen_id		= real_escape_string($_POST['citizen_id']);
	$fullname 		= real_escape_string($_POST['fullname']);
	$gender     	= ($_POST['gender'] > 0) ? $_POST['gender'] : 0;
	$date_of_birth 	= ($_POST['date_of_birth'] != '') ? $_POST['date_of_birth'] : '0000-00-00';
	$state 			= real_escape_string($_POST['state']);
	$email 			= real_escape_string($_POST['email']);
	$mobile 		= real_escape_string($_POST['mobile']);
	$alt_mobile 	= real_escape_string($_POST['alt_mobile']);

	if($citizen_id == "") {
		$msg = "Please select citizen";
		$error_occured = true;
	} else if($fullname == "") {
		$msg = "Please enter name";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `citizen_profile` WHERE `email` = '".$email."' AND `citizen_id` != '".$citizen_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$msg = "This email is already taken by someone else. Please choose another";
			$error_occured = true;
		}
	}
	
	if($error_occured != true) {

		$user_detail = array();

		$sel_u = "SELECT * FROM `citizen_profile` WHERE `citizen_id` = '".$citizen_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$upd_user = "UPDATE `citizen_profile` SET 
										`first_name` 	= '".$fullname."', 
										`email` 		= '".$email."', 
										`state` 		= '".$state."', ";
						if($date_of_birth != '0000-00-00') {
							$upd_user .= "`date_of_birth` = '".$date_of_birth."', ";
						}
						if($gender != '0') {
							$upd_user .= "`gender` = '".$gender."', ";
						}
						$upd_user .= " `updated_on` 	= '".date('Y-m-d H:i:s')."' "; 
						$upd_user .= " WHERE `citizen_id` = '".$citizen_id."'";
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

					// Create album and save that photo
					$album_id = create_album_for_citizen($citizen_id, 'Profile', 'My Profile');

					$photo_id = insert_citizen_photo($citizen_id, $album_id, $profile_image, $photo_title, $photo_description);

					// Update Citizen Profile Photo id in Profile
					$upd_user = "UPDATE `citizen_profile` SET 
												`profile_photo_id` 	= '".$photo_id."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`citizen_id` = '".$citizen_id."'";
					$exe_user = execute_query($upd_user);
				}

				$cover_profile_file = basename($_FILES['cover_profile_img']['name']);
				if($cover_profile_file != '') {
					$cover_profile_image = date('YmdHisA').'-'.time().'-COVER-PROFILE-'.mt_rand().'.'.end(explode('.', $cover_profile_file));

					$path = PROFILE_IMAGE_DIR.$cover_profile_image;
					$source = $_FILES["cover_profile_img"]["tmp_name"];
					$result = uploads3($path, $source);

					// Create album and save that photo
					$cover_album_id = create_album_for_citizen($citizen_id, 'Cover Photo', 'My Cover Photoes');

					$cover_photo_id = insert_citizen_photo($citizen_id, $cover_album_id, $cover_profile_image, $cover_photo_title, $cover_photo_description);

					// Update Citizen Profile Photo id in Profile
					$upd_user = "UPDATE `citizen_profile` SET 
												`cover_photo_id` 	= '".$cover_photo_id."',
												`updated_on` 		= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`citizen_id` = '".$citizen_id."'";
					$exe_user = execute_query($upd_user);
				}


				$msg = "Profile updated successfully";
			}
				
			$user_detail['user_profile'] = get_citizen_detail($citizen_id);
			
		} else {
			$msg = "No citizen found";
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
} else if($request_action == "GET_PROFILE_LEADER") {
	$l_profile_id	= real_escape_string($_POST['l_profile_id']);

	$user_detail = array();
	if($l_profile_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else {
		$user_detail['user_profile'] = get_leader_detail($l_profile_id);
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
} else if($request_action == "UPDATE_PROFILE_LEADER") {
	$fullname 		= real_escape_string($_POST['fullname']);
	$gender     	= ($_POST['gender'] > 0) ? $_POST['gender'] : 0;
	$date_of_birth 	= ($_POST['date_of_birth'] != '') ? $_POST['date_of_birth'] : '0000-00-00';
	$state 			= real_escape_string($_POST['state']);
	$email 			= real_escape_string($_POST['email']);
	$mobile 		= real_escape_string($_POST['mobile']);
	$alt_mobile 	= real_escape_string($_POST['alt_mobile']);
	$l_profile_id	= real_escape_string($_POST['l_profile_id']);

	if($l_profile_id == "") {
		$msg = "Please enter user";
		$error_occured = true;
	} else if($fullname == "") {
		$msg = "Please enter name";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `user_profiles` WHERE `email` = '".$email."' AND `user_type` = '2' AND `user_profile_id` != '".$l_profile_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$msg = "This email is already taken by someone else. Please choose another";
			$error_occured = true;
		}
	}
	
	if($error_occured != true) {

		$user_detail = array();

		$sel_u = "SELECT * FROM `user_profiles` WHERE `user_profile_id` = '".$l_profile_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$upd_user = "UPDATE `user_profiles` SET 
										`first_name` 	= '".$fullname."', 
										`email` 		= '".$email."', 
										`state` 		= '".$state."', ";
						if($date_of_birth != '0000-00-00') {
							$upd_user .= "`date_of_birth` = '".$date_of_birth."', ";
						}
						if($gender != '0') {
							$upd_user .= "`gender` = '".$gender."', ";
						}
						$upd_user .= " `updated_on` 	= '".date('Y-m-d H:i:s')."' "; 
						$upd_user .= " WHERE `user_profile_id` = '".$l_profile_id."'";
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

					$upd_user = "UPDATE `user_profiles` SET 
												`image` 		= '".$profile_image."',
												`updated_on` 	= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`user_profile_id` = '".$l_profile_id."'";
					$exe_user = execute_query($upd_user);

					/*// Create album and save that photo
					$album_id = create_album_for_user($citizen_id, 'Profile', 1);

					$ins_p = "INSERT INTO `photoes` SET 
												`post_story` 	= '0',
												`citizen_id` 		= '".$citizen_id."',
												`name` 			= 'Profile Photo',
												`description` 	= 'Profile Photo',
												`image_path` 	= '".$profile_image."',
												`album_id` 		= '".$album_id."',
												`added_on` 		= '".date('Y-m-d H:i:s')."',
												`status` 		= '1',
												`deleted_y_n` 	= '0'";
					$exe_p = execute_query($ins_p);*/

				}

				$cover_profile_file = basename($_FILES['cover_profile_img']['name']);
				if($cover_profile_file != '') {
					$cover_profile_image = date('YmdHisA').'-'.time().'-COVER-PROFILE-'.mt_rand().'.'.end(explode('.', $cover_profile_file));

					$path = PROFILE_IMAGE_DIR.$cover_profile_image;
					$source = $_FILES["cover_profile_img"]["tmp_name"];
					$result = uploads3($path, $source);

					$upd_user = "UPDATE `user_profiles` SET 
												`cover_image` 		= '".$cover_profile_image."',
												`updated_on` 	= '".date('Y-m-d H:i:s')."' 
											WHERE 
												`user_profile_id` = '".$l_profile_id."'";
					$exe_user = execute_query($upd_user);

					/*// Create album and save that photo
					$album_id = create_album_for_user($citizen_id, 'Cover', 1);

					$ins_p = "INSERT INTO `photoes` SET 
												`post_story` 	= '0',
												`citizen_id` 		= '".$citizen_id."',
												`name` 			= 'Cover Photo',
												`description` 	= 'Cover Photo',
												`image_path` 	= '".$profile_image."',
												`album_id` 		= '".$album_id."',
												`added_on` 		= '".date('Y-m-d H:i:s')."',
												`status` 		= '1',
												`deleted_y_n` 	= '0'";
					$exe_p = execute_query($ins_p);*/
				}

				$msg = "Profile updated successfully";
			}
				
			$user_detail['user_profile'] = get_leader_detail($l_profile_id);
			
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