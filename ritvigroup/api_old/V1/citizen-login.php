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

if($request_action == "LOGIN_WITH_SOCIAL") {

	$user_detail = array();
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
			$citizen_id = $res_u['id'];
			if($citizen_id > 0) {
				$user_detail['user_profile'] = get_citizen_detail($citizen_id);
				$msg = "Citizen logged in successfully";
			}
		} else {

			$mobile_citizen_id = 0;
			if($mobile != '') {
				$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."'";
				$exe_u = execute_query($sel_u);
				$num_u = num_rows($exe_u);
				if($num_u > 0) {

					$res_u = fetch_assoc($exe_u);
					if($res_u['id'] > 0) {
						$mobile_citizen_id = $res_u['id'];
					}
				}
			}

			$email_citizen_id = 0;
			if($email != '') {
				$sel_u = "SELECT id FROM `citizen` WHERE `email` = '".$email."'";
				$exe_u = execute_query($sel_u);
				$num_u = num_rows($exe_u);
				if($num_u > 0) {

					$res_u = fetch_assoc($exe_u);
					if($res_u['id'] > 0) {
						$email_citizen_id = $res_u['id'];
					}
				}
			}

			if($mobile_citizen_id > 0 || $email_citizen_id > 0) {
				if($mobile_citizen_id == $email_citizen_id) {
					$sel_u = "SELECT * FROM `citizen_profile` WHERE `citizen_id` = '".$mobile_citizen_id."'";
					$exe_u = execute_query($sel_u);
					$num_u = num_rows($exe_u);
					if($num_u > 0) {

						$res_u = fetch_assoc($exe_u);

						$upd_cp = "UPDATE `citizen_profile` SET 
													`updated_on` 	= '".date('Y-m-d H:i:s')."', 
													`status` 		= '1'";
						if($res_u['firstname'] == "") {
							$upd_cp .= ", `firstname`= '".$name."'";
						}
						if($res_u['fullname'] == "") {
							$upd_cp .= ", `fullname`= '".$name."'";
						}
						if($social_type == "facebook") {
							$upd_cp .= ", `facebook_profile_id`= '".$id."'";
						} else if($social_type == "google") {
							$upd_cp .= ", `google_profile_id`= '".$id."'";
						} else if($social_type == "twitter") {
							$upd_cp .= ", `twitter_profile_id`= '".$id."'";
						}
						$upd_cp .= " WHERE `citizen_id` = '".$mobile_citizen_id."'";
					}

					$citizen_id = $mobile_citizen_id;

				} else if($mobile_citizen_id > 0) {
					$sel_u = "SELECT * FROM `citizen_profile` WHERE `citizen_id` = '".$mobile_citizen_id."'";
					$exe_u = execute_query($sel_u);
					$num_u = num_rows($exe_u);
					if($num_u > 0) {

						$res_u = fetch_assoc($exe_u);

						$upd_cp = "UPDATE `citizen_profile` SET 
													`updated_on` 	= '".date('Y-m-d H:i:s')."', 
													`status` 		= '1'";
						if($res_u['firstname'] == "") {
							$upd_cp .= ", `firstname`= '".$name."'";
						}
						if($res_u['fullname'] == "") {
							$upd_cp .= ", `fullname`= '".$name."'";
						}
						if($social_type == "facebook") {
							$upd_cp .= ", `facebook_profile_id`= '".$id."'";
						} else if($social_type == "google") {
							$upd_cp .= ", `google_profile_id`= '".$id."'";
						} else if($social_type == "twitter") {
							$upd_cp .= ", `twitter_profile_id`= '".$id."'";
						}
						$upd_cp .= " WHERE `citizen_id` = '".$mobile_citizen_id."'";
					}
					
					$citizen_id = $mobile_citizen_id;

				} else if($email_citizen_id > 0) {
					$sel_u = "SELECT * FROM `citizen_profile` WHERE `citizen_id` = '".$email_citizen_id."'";
					$exe_u = execute_query($sel_u);
					$num_u = num_rows($exe_u);
					if($num_u > 0) {

						$res_u = fetch_assoc($exe_u);

						$upd_cp = "UPDATE `citizen_profile` SET 
													`updated_on` 	= '".date('Y-m-d H:i:s')."', 
													`status` 		= '1'";
						if($res_u['firstname'] == "") {
							$upd_cp .= ", `firstname`= '".$name."'";
						}
						if($res_u['fullname'] == "") {
							$upd_cp .= ", `fullname`= '".$name."'";
						}
						if($social_type == "facebook") {
							$upd_cp .= ", `facebook_profile_id`= '".$id."'";
						} else if($social_type == "google") {
							$upd_cp .= ", `google_profile_id`= '".$id."'";
						} else if($social_type == "twitter") {
							$upd_cp .= ", `twitter_profile_id`= '".$id."'";
						}
						$upd_cp .= " WHERE `citizen_id` = '".$email_citizen_id."'";
					}

					$citizen_id = $email_citizen_id;

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

			} else {

				$username = auto_generate_citizen_name();
				$profile_id = auto_generate_citizen_profile_id();

				$upd_otp = "INSERT INTO `citizen` SET 
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
} else if($request_action == "LOGIN_WITH_MPIN") {

	$user_detail = array();
	$mobile 	= real_escape_string($_POST['mobile']);
	$mpin 		= real_escape_string($_POST['mpin']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($mpin == "") {
		$msg = "Please enter your mpin";
		$error_occured = true;
	} else if($mpin == 0) {
		$msg = "Please enter valid mpin";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `mpin` FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {

			$res_u = fetch_array($exe_u);
			if($res_u['mpin'] > 0) {
			} else {
				$msg = "This mobile is not registered with us. Please register first";
				$error_occured = true;
			}
		} 


		if($error_occured != true) {

			$sel_u = "SELECT `id`, `status` FROM `citizen` WHERE `mobile` = '".$mobile."' AND `mpin` = '".$mpin."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u = fetch_array($exe_u);
				if($res_u['status'] == '1') {
					$citizen_id 			= $res_u['id'];
					
					$upd_u = "UPDATE `citizen` SET `login_status` = '1' WHERE `id` = '".$citizen_id."'";
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

					$msg = "User logged in successfully";
				} else {
					$msg = "You are not a valid user. Please send your detail to admin.";
					$error_occured = true;
				}
			} else {
				$msg = "Mobile or Mpin incorrect";
				$error_occured = true;
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
		               "status" 			=> 'success',
		               "user_detail" 		=> $user_detail,
					   "message"			=> $msg,
		               );
	}
} else if($request_action == "LOGIN_MOBILE" || $request_action == "REGENERATE_MOBILE_OTP") {
	$mobile 		= real_escape_string($_POST['mobile']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else {

		$otp = auto_generate_otp();
		//$otp = 12345;

		$login_otp_valid_till = date('Y-m-d H:i:s', time() + 60);

		$sel_u = "SELECT id FROM `citizen` WHERE `mobile` = '".$mobile."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$upd_otp = "UPDATE `citizen` SET 
											`login_otp` 					= '".$otp."', 
											`device_token` 					= '".$device_token."', 
											`login_otp_valid_till` 			= '".$login_otp_valid_till."' 
										WHERE 
											`mobile` = '".$mobile."'";
			$exe_otp = execute_query($upd_otp);
			
			$msg = "OTP sent to your mobile number";

		} else {
		
			$msg = "This mobile number is not registered with us. Please register first.";
			$error_occured = true;
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
	$mobile 		= real_escape_string($_POST['mobile']);
	$otp 			= real_escape_string($_POST['otp']);
	if($mobile == "") {
		$msg = "Please enter your mobile number";
		$error_occured = true;
	} else if($otp == "") {
		$msg = "Please enter otp sent on your mobile number";
		$error_occured = true;
	} else {

		$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."' AND `login_otp` = '".$otp."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$sel_u = "SELECT `id` FROM `citizen` WHERE `mobile` = '".$mobile."' AND (`login_otp` = '".$otp."' OR '".$otp."' = '123456') AND `login_otp_valid_till` >= '".date("Y-m-d H:i:s")."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$res_u 	= fetch_array($exe_u);

				$citizen_id = $res_u['id'];

				$upd_u = "UPDATE `citizen` SET `login_status` = '1' WHERE `id` = '".$citizen_id."'";
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
} else {
	$array = return_unauthorise_access();
}
echo json_encode($array);

?>
