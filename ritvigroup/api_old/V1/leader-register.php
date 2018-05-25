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

if($request_action == "REGISTER_WITH_SOCIAL") {
	$id 			= real_escape_string($_POST['id']);
	$name 			= real_escape_string($_POST['name']);
	$email 			= real_escape_string($_POST['email']);
	$mobile 		= real_escape_string($_POST['mobile']);
	$social_type 	= real_escape_string($_POST['social_type']);

	if($id == "") {
		$msg = "Please select your id";
		$error_occured = true;
	} else if($name == "") {
		$msg = "Please select your name";
		$error_occured = true;
	} else {

		if($social_type == "facebook") { // FACEBOOK
			$sel_u = "SELECT c.`id` FROM `citizen` AS c 
									LEFT JOIN `citizen_profile` AS cp ON c.id = cp.citizen_id 
									WHERE 
										cp.`facebook_profile_id` = '".$id."'";
		} else if($social_type == "google") { // GOOGLE
			$sel_u = "SELECT c.`id` FROM `citizen` AS c 
									LEFT JOIN `citizen_profile` AS cp ON c.id = cp.citizen_id 
									WHERE 
										cp.`google_profile_id` = '".$id."'";
		} else if($social_type == "twitter") { // TWITTER
			$sel_u = "SELECT c.`id` FROM `citizen` AS c 
									LEFT JOIN `citizen_profile` AS cp ON c.id = cp.citizen_id 
									WHERE 
										cp.`twitter_profile_id` = '".$id."'";
		}
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_assoc($exe_u);
			if($res_u['id'] > 0) {
				$msg = "You are already registered with us. Please login.";
				$error_occured = true;
			}
		}

		if($mobile != '') {
			$sel_u = "SELECT mpin FROM `citizen` WHERE `mobile` = '".$mobile."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {

				$res_u = fetch_assoc($exe_u);
				if($res_u['mpin'] > 0) {
					$msg = "This mobile is already exist in our system. Please login.";
					$error_occured = true;
				}
			}
		}

		if($email != '') {
			$sel_u = "SELECT mpin FROM `citizen` WHERE `email` = '".$email."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {

				$res_u = fetch_assoc($exe_u);
				if($res_u['mpin'] > 0) {
					$msg = "This email is already exist in our system. Please login.";
					$error_occured = true;
				}
			}
		}


		if($error_occured != true) {

			$username = auto_generate_citizen_name();
			$profile_id = auto_generate_citizen_profile_id();

			$upd_otp = "INSERT INTO `citizen` SET 
										`login_otp` 			= '".$otp."', 
										`device_token` 			= '".$device_token."', 
										`created_on` 			= '".date('Y-m-d H:i:s')."', 
										`updated_on` 			= '".date('Y-m-d H:i:s')."', 
										`profile_id` 			= '".$profile_id."', 
										`mobile` 				= '".$mobile."', 
										`email` 				= '".$email."', 
										`username` 				= '".$username."', 
										`lantitude` 			= '".$location_lant."', 
										`longitude` 			= '".$location_long."', 
										`login_status` 			= '1',
										`status` 				= '1'";
			$exe_otp = execute_query($upd_otp);

			$citizen_id = insert_id();

			$upd_cp = "INSERT INTO `citizen_profile` SET 
										`citizen_id` 	= '".$citizen_id."', 
										`firstname` 	= '".$name."', 
										`fullname` 		= '".$name."', 
										`updated_on` 	= '".date('Y-m-d H:i:s')."', 
										`mobile` 		= '".$mobile."', 
										`email` 		= '".$email."', 
										`status` 		= '1'";
			if($social_type == "facebook") {
				$upd_cp .= ", `facebook_profile_id`= '".$id."'";
			} else if($social_type == "google") {
				$upd_cp .= ", `google_profile_id`= '".$id."'";
			} else if($social_type == "twitter") {
				$upd_cp .= ", `twitter_profile_id`= '".$id."'";
			}
			$exe_cp = execute_query($upd_cp);

			$profile_file = basename($_FILES['photo']['name']);
			if($profile_file != '') {
				$profile_image = date('YmdHisA').'-'.time().'-PROFILE-'.mt_rand().'.'.end(explode('.', $profile_file));

				$path = PROFILE_IMAGE_DIR.$profile_image;
				$source = $_FILES["photo"]["tmp_name"];
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

			$user_detail['user_profile'] = get_citizen_detail($citizen_id);

			$upd_ud = "INSERT INTO `citizen_log` 
											SET 
												`citizen_id` 		= '".$citizen_id."', 
												`device_token_id` 	= '".$device_token."', 
												`device_name` 		= '".$device_name."', 
												`device_os` 		= '".$device_os."', 
												`logged_in` 		= '".date('Y-m-d H:i:s')."', 
												`lantitude` 		= '".$location_lant."', 
												`longitude` 		= '".$location_long."'";
			$exe_ud = execute_query($upd_ud);

			$msg = "Citizen registered successfully.";
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
					   "message"		=> $msg,
					   "user_detail" 	=> $user_detail,
		               );
	}
} else if($request_action == "REGISTER_FROM_WEB") {
	$username 		= strtolower(real_escape_string($_POST['username']));
	$mobile 		= real_escape_string($_POST['mobile']);
	$email 			= real_escape_string($_POST['email']);
	$password 		= real_escape_string($_POST['password']);
	$conf_pass 		= real_escape_string($_POST['passwordConfirm']);
	$first_name		= real_escape_string($_POST['firstname']);
	$last_name 		= real_escape_string($_POST['lastname']);
	$gender 		= real_escape_string($_POST['gender']);
	if($username == "") {
		$msg = "Please enter your username";
		$error_occured = true;
	} else if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($email == "") {
		$msg = "Please enter your email";
		$error_occured = true;
	} else if($password == "") {
		$msg = "Please enter your password";
		$error_occured = true;
	} else if($conf_pass == "") {
		$msg = "Please enter confirm password";
		$error_occured = true;
	} else if($password != $conf_pass) {
		$msg = "Please confirm your password";
		$error_occured = true;
	} else if($first_name == "") {
		$msg = "Please enter your first name";
		$error_occured = true;
	} else if($last_name == "") {
		$msg = "Please enter your last name";
		$error_occured = true;
	} else if($gender == "0") {
		$msg = "Please select your gender";
		$error_occured = true;
	} else {

		$sel_u = "SELECT * FROM `leader` WHERE 
									lower(`username`) = '".$username."'
								OR `email` = '".$email."'
								OR `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_assoc($exe_u);
			if($res_u['email'] == $email) {
				$msg = "This email is already in use. Please choose another";
				$error_occured = true;
			} else if($res_u['mobile'] == $mobile) {
				$msg = "This mobile number is already in use. Please choose another";
				$error_occured = true;
			} else if(strtolower($res_u['username']) == $username) {
				$msg = "This username is already taken. Please choose another";
				$error_occured = true;
			}
		} 


		if($error_occured != true) {

			$profile_id = auto_generate_leader_profile_id();

			$upd_otp = "INSERT INTO `leader` SET 
										`password` 				= '".md5($password)."', 
										`device_token` 			= '".$device_token."', 
										`created_on` 			= '".date('Y-m-d H:i:s')."', 
										`profile_id` 			= '".$profile_id."', 
										`mobile` 				= '".$mobile."', 
										`username` 				= '".$username."', 
										`email` 				= '".$email."', 
										`login_status` 			= '1',
										`status` 				= '1'";
			$exe_otp = execute_query($upd_otp);

			$leader_id = insert_id();

			$upd_cp = "INSERT INTO `leader_profile` SET 
										`leader_id` 		= '".$leader_id."', 
										`leader_type` 		= '1', 
										`parent_leader_id` 	= '0', 
										`leader_role` 		= '0', 
										`first_name` 		= '".$first_name."', 
										`middle_name` 		= '', 
										`last_name` 		= '".$last_name."', 
										`email` 			= '".$email."', 
										`device_token` 		= '".$device_token."', 
										`gender` 			= '".$gender."', 
										`created_on` 		= '".date('Y-m-d H:i:s')."', 
										`updated_on` 		= '".date('Y-m-d H:i:s')."', 
										`mobile` 			= '".$mobile."', 
										`status` 			= '1'";
			$exe_cp = execute_query($upd_cp);

			$user_detail['user_profile'] = get_leader_detail($leader_id);

			$msg = "Leader registered successfully";
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
					   "message"		=> $msg,
		               );
	}
} else if($request_action == "REGISTER_MOBILE" || $request_action == "REGENERATE_MOBILE_OTP") {
	$mobile 		= real_escape_string($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 90);

		$sel_u = "SELECT mpin FROM `leader` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_assoc($exe_u);
			if($res_u['mpin'] > 0) {
				$msg = "This mobile is already exist in our system. Please login.";
				$error_occured = true;
			}

		} 


		if($error_occured != true) {

			$sel_u = "SELECT `id` FROM `leader` WHERE `mobile` = '".$mobile."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$upd_otp = "UPDATE `leader` SET 
											`login_otp` 				= '".$otp."', 
											`device_token` 				= '".$device_token."', 
											`login_otp_valid_till` 		= '".$login_otp_valid_till."' 
										WHERE 
											`mobile` = '".$mobile."'";
				$exe_otp = execute_query($upd_otp);
			} else {

				$username = auto_generate_leader_name();
				$profile_id = auto_generate_leader_profile_id();

				$upd_otp = "INSERT INTO `leader` SET 
											`login_otp` 			= '".$otp."', 
											`device_token` 			= '".$device_token."', 
											`login_otp_valid_till` 	= '".$login_otp_valid_till."', 
											`created_on` 			= '".date('Y-m-d H:i:s')."', 
											`profile_id` 			= '".$profile_id."', 
											`mobile` 				= '".$mobile."', 
											`username` 				= '".$username."', 
											`login_status` 			= '0',
											`status` 				= '0'";
				$exe_otp = execute_query($upd_otp);

				$citizen_id = insert_id();

				$upd_cp = "INSERT INTO `leader_profile` SET 
											`citizen_id` 	= '".$citizen_id."', 
											`firstname` 	= '".$username."', 
											`fullname` 		= '".$username."', 
											`updated_on` 	= '".date('Y-m-d H:i:s')."', 
											`mobile` 		= '".$mobile."', 
											`status` 		= '0'";
				$exe_cp = execute_query($upd_cp);
			}
			$msg = "OTP sent to your mobile number";
		}
	}

	if($error_occured == true) {
		$array = array(
						"status" 		=> 'failed',
						"message" 		=> $msg,
					);
	} else {

		// otp code
		$otp_message = "Your one time verification code for Ritvi Group is ".$otp;
		$result = sendmsg($mobile, $otp_message);

		$array = array(
		               "status" 		=> 'success',
					   "message"		=> $msg,
		               );
	}
} else if($request_action == "VALIDATE_MOBILE_OTP") {
	$mobile 		= trim($_POST['mobile']);
	$otp 			= trim($_POST['otp']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($otp == "") {
		$msg = "Please enter otp sent on your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."' AND `login_otp_valid_till` >= '".date("Y-m-d H:i:s")."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u 		= fetch_assoc($exe_u);
				$citizen_id 	= $res_u['id'];

				$upd_u = "UPDATE `citizen` SET `login_status`	= '0' WHERE `id` = '".$citizen_id."'";
				$exe_u = execute_query($upd_u);

				$user_detail['user_profile'] = get_citizen_detail($citizen_id);				

			} else {
				$msg = "Your OTP is expired. Please click regenerate OTP.";
				$error_occured = true;
			}

		} else {
			$msg = "You entered wrong OTP";
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
} else if($request_action == "SET_MPIN") {
	$mobile 		= trim($_POST['mobile']);
	$mpin 			= trim($_POST['mpin']);
	$mpin_confirm	= trim($_POST['mpin_confirm']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($mpin == "") {
		$msg = "Please enter 4 digit mpin";
		$error_occured = true;
	} else if($mpin_confirm == "") {
		$msg = "Please confirm 4 digit mpin";
		$error_occured = true;
	} else if($mpin != $mpin_confirm) {
		$msg = "Mpin and Confirm Mpin not matched";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u 		= fetch_assoc($exe_u);
			$citizen_id 	= $res_u['id'];
			
			$upd_u = "UPDATE `citizen` SET `mpin` = '".$mpin."', `login_status`	= '1', `status` = '1' WHERE `id` = '".$citizen_id."'";
			$exe_u = execute_query($upd_u);

			$user_detail['user_profile'] = get_citizen_detail($citizen_id);


			$upd_ud = "INSERT INTO `citizen_log` 
											SET 
												`citizen_id` 		= '".$citizen_id."', 
												`device_token_id` 	= '".$device_token."', 
												`device_name` 		= '".$device_name."', 
												`device_os` 		= '".$device_os."', 
												`logged_in` 		= '".date('Y-m-d H:i:s')."', 
												`lantitude` 		= '".$location_lant."', 
												`longitude` 		= '".$location_long."'";
			$exe_ud = execute_query($upd_ud);

		} else {
			$msg = "This mobile number is not valid";
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
} else {
	$array = return_unauthorise_access();
}
echo json_encode($array);

?>
