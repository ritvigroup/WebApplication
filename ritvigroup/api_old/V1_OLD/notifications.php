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

$user_id			= $_POST['user_id']; // User is performing the action

$error_occured = false;
$msg = '';

if($request_action == "DELETE_NOTIFICATION") {

	$message_id = $_POST['message_id'];

	$sel_m = "SELECT id FROM `messages` WHERE `user_id` = '".$user_id."' AND `id` = '".$message_id."'";
	$exe_m = execute_query($sel_m);
	$num_m = num_rows($exe_m);
	if($num_m > 0) {
		while($res_m = fetch_array($exe_m)) {
			$upd = "UPDATE `messages` SET `user_deleted_y_n` = '1' WHERE `id` = '".$res_m['id']."'";
			$exe = execute_query($upd);
		}
	}

	$sel_m = "SELECT id FROM `messages` WHERE `friend_id` = '".$user_id."' AND `id` = '".$message_id."'";
	$exe_m = execute_query($sel_m);
	$num_m = num_rows($exe_m);
	if($num_m > 0) {
		while($res_m = fetch_array($exe_m)) {
			$upd = "UPDATE `messages` SET `friend_deleted_y_n` = '1' WHERE `id` = '".$res_m['id']."'";
			$exe = execute_query($upd);
		}
	}

	$msg = "Message deleted successfully";

	$array = array(
		               "status" 		=> 'success',
					   "message"		=> $msg,
		               );

} else if($request_action == "UPDATE_NOTIFICATION_READ") {
	$message_id		= $_POST['message_id'];
	$seen_y_n 		= $_POST['seen_y_n'];

	$upd = "UPDATE `messages` SET `seen_y_n` = '1', `seen_on` = '".date("Y-m-d H:i:s")."' WHERE `id` = '".$message_id."'";
	$exe = execute_query($upd);

	$user_message = get_message_detail($message_id, 1); // 1 = send_user_profile, 0 = not_send_user_profile

	$msg = "Message seen successfully";

	$array = array(
		               "status" 		=> 'success',
		               "user_message"	=> $user_message,
					   "message"		=> $msg,
		               );

} else if($request_action == "GET_ALL_NOTIFICATION") {
	$user_message = array();

	$error_occured = false;
		
	if($user_id == "") {
		$msg = "Please select user";
		$error_occured = true;
	} else {
		$data = array();
		$user_message = array();
		$sel = "SELECT user_id, friend_id
					FROM `messages` 
					WHERE 
						(`user_id` = '".$user_id."' AND `user_deleted_y_n` = '0')	
					OR (`friend_id` = '".$user_id."' AND `friend_deleted_y_n` = '0')
					GROUP BY `user_id`, `friend_id`";
		$exe = execute_query($sel);
		$num = num_rows($exe);
		if($num > 0) {
			while($res = fetch_array($exe)) {
				if($res['user_id'] == $user_id) {
					if(!@in_array($res['friend_id'], $user_id_array)) {
						$user_id_array[] = $res['friend_id'];
					}
				} else if($res['friend_id'] == $user_id) {
					if(!@in_array($res['user_id'], $user_id_array)) {
						$user_id_array[] = $res['user_id'];
					}
				}
			}

			$user_msg = array();
			$datetime_array = array();

			$i = 0;
			foreach($user_id_array AS $key => $friend_id) {
				$sel_m = "SELECT  * 
									FROM `messages` 
									WHERE 
										(`user_id` = '".$user_id."' AND friend_id = '".$friend_id."' AND `user_deleted_y_n` = '0')  
										OR 
										(`user_id` = '".$friend_id."' AND friend_id = '".$user_id."' AND `friend_deleted_y_n` = '0')
									ORDER BY sent_on DESC LIMIT 1";

				$exe_m = execute_query($sel_m);
				$num_m = num_rows($exe_m);
				if($num_m > 0) {
					while($res_m = fetch_array($exe_m)) {

						$message_type = $res_m['message_type'];
						$path = $res_m['path'];
						$thumbnail = $res_m['thumbnail'];

						$dir_path = '';
						if($path != '') {
							if($message_type == "audio") {
								$dir_path = MSG_AUDIO_URL.$path;
							} else if($message_type == "document") {
								$dir_path = MSG_DOC_URL.$path;
							} else if($message_type == "video") {
								$dir_path = MSG_VIDEO_URL.$path;
							} else if($message_type == "image") {
								$dir_path = MSG_IMAGE_URL.$path;
							} else {
								$dir_path = '';
							}
						}

						$thumbnail_path = '';

						if($thumbnail != '') {
							$thumbnail_path = MSG_THUMB_URL.$thumbnail;
						}

						$user_msg[$i] = array(
											'latest_message_text' 	=> $res_m['message_text'],
								            'latest_message_type' 	=> $res_m['message_type'],
								            'latest_time' 			=> return_time_ago($res_m['sent_on']),
								            'message_id' 			=> $res_m['id'],
											'user_id' 				=> $res_m['user_id'],
											'friend_id' 			=> $res_m['friend_id'],
											'group_id' 				=> $res_m['group_id'],
											'message_type' 			=> $res_m['message_type'],
											'message_text' 			=> $res_m['message_text'],
											'path' 					=> $dir_path,
											'thumbnail' 			=> $thumbnail_path,
											'size' 					=> $res_m['size'],
											'video_length' 			=> $res_m['video_length'],
											'sent_on' 				=> return_time_ago($res_m['sent_on']),
											'sent_on_datetime' 		=> ($res_m['sent_on']),
											'deleted_y_n' 			=> $res_m['deleted_y_n'],
											'received_on' 			=> $res_m['received_on'],
											'seen_on' 				=> $res_m['seen_on'],
											'received_y_n' 			=> $res_m['received_y_n'],
											'seen_y_n' 				=> $res_m['seen_y_n'],
											'firekey' 				=> $res_m['firekey'],
											'group_detail'			=> get_group_detail($res_m['group_id']),
								            "user_profile" 			=> get_user_detail($friend_id),
											);
						$datetime_array[$i] = $res_m['sent_on']; 

						$i++;
					}
				}
			}

			asort($datetime_array);

			$a = array_keys($datetime_array);

			for($i = 0; $i < count($a); $i++) {
				$user_message[] = $user_msg[$a[$i]];
			}

			/*echo '<pre>';
			print_r($datetime_array);
			print_r($a);
			print_r($user_id_array);
			print_r($user_msg);

			$user_message[] = $merge_array;*/

			$msg = "Message found successfully";
		} else {
			$msg = "No any messages sent or received";
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
		               "user_message"	=> $user_message,
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