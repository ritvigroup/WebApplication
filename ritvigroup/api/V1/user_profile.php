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

$user_id 		= trim($_POST['user_id']); // Logged In User id
$friend_id 		= trim($_POST['friend_id']); // Opening User profile

$error_occured = false;
$msg = '';

if($request_action == "USER_PROFILE") 
{
	if($user_id == "") {
		$msg = "Sorry no user found";
		$error_occured = true;
	} else {

		$user_detail = array();

		// Friend Profile Detail
		$sel_u = "SELECT * FROM `users` WHERE `id` = '".$friend_id."'";
		$exe_u = execute_query($sel_u);
		$num_u = num_rows($exe_u);
		if($num_u > 0) {
			$res_u = fetch_array($exe_u);

			$user_detail['user_profile'] = return_user_detail($res_u);

			$user_detail['user_follow_friend'] = false;
			$sel_u = "SELECT * FROM `user_follows` WHERE `user_id` = '".$user_id."' AND `friend_id` = '".$friend_id."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$user_detail['user_follow_friend'] = true;
			}

			$user_detail['user_followings'] = 0;
			$sel_u = "SELECT * FROM `user_follows` WHERE `user_id` = '".$user_id."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$user_detail['user_followings'] = $num_u;
			}

			$user_detail['user_followers'] = 0;
			$sel_u = "SELECT * FROM `user_follows` WHERE `friend_id` = '".$user_id."'";
			$exe_u = execute_query($sel_u);
			$num_u = num_rows($exe_u);
			if($num_u > 0) {
				$user_detail['user_followers'] = $num_u;
			}

			$user_detail['user_block'] = 0;
			$sel = "SELECT * FROM `user_block_user` WHERE `user_id` = '".$user_id."' AND `friend_id` = '".$friend_id."' AND `profile_block_y_n` = '1'";
			$exe = execute_query($sel);
			$num = num_rows($exe);
			if($num > 0) {
				$user_detail['user_block'] = 1;
			}

			$user_video = array();
			$i = -1;
			for($j = 0; $j < count($video_time_array); $j++) {
				if($j == 0) {
					$sel_v = "SELECT * FROM `videos` WHERE `video_time` != '' AND `video_time` <= ".$video_time_array[$j]." AND `user_id` = '".$friend_id."'";
				} else {

					if($j == 3) {
						$sel_v = "SELECT * FROM `videos` WHERE `video_time` != '' AND  `video_time` >= ".$video_time_array[$j]." AND `user_id` = '".$friend_id."'";
					} else {
						$sel_v = "SELECT * FROM `videos` WHERE `video_time` != '' AND  `video_time` <= ".$video_time_array[$j]." AND `video_time` >= ".$video_time_array[$j - 1]." AND `user_id` = '".$friend_id."'";
					}
				}

				$exe_v = execute_query($sel_v);
				$num_v = num_rows($exe_v);
				if($num_v > 0) {
					$user_video['V_'.$video_time_array[$j]] = $num_v;
				} else {
					$user_video['V_'.$video_time_array[$j]] = 0;
				}
				$i++;
			}

			if($user_id != $friend_id) {
				$ins_upv = "INSERT INTO `user_profile_view` SET 
														`user_id` 			= '".$user_id."',
														`viewed_user_id` 	= '".$friend_id."',
														`viewed_on` 		= '".date('Y-m-d H:i:s')."'";
				$exe_upv = execute_query($ins_upv);
			}

		} else {
			$msg = "Sorry this user doesnot exist";
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
		               "status" => 'success',
		               "user_detail" => $user_detail,
		               "user_videos" => $user_video,
		               "message" => 'User found successfully',
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