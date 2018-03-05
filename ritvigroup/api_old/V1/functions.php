<?php
require 'class.qr_barcode.php'; // QR Code Generator


function return_unauthorise_access() {
	$array = array(
						"status" 		=> 'failed',
						"message" 		=> 'Unauthourised page access',
					);
	return $array;
}

function get_detail_to_show_for_leader() {
	$detail_to_show = array('lp.leader_id', 'lp.leader_type', 'lp.parent_leader_id', 'lp.leader_role', 'lp.first_name', 'lp.middle_name', 'lp.last_name', 'lp.email', 'lp.date_of_birth', 'lp.gender', 'lp.state', 'lp.mobile', 'lp.alt_mobile', 'lp.image_id', 'lp.cover_image_id', 'lp.created_on', 'lp.updated_on', 'lp.status');
	return $detail_to_show;
}


function create_album_for_citizen($citizen_id, $album_name, $album_description) {
	$sel_ca = "SELECT `id` FROM `citizen_album` WHERE lower(`name`) = '".strtolower($album_name)."' AND `citizen_id` = '".$citizen_id."'";
	$exe_ca = execute_query($sel_ca);
	$num_ca = num_rows($exe_ca);
	if($num_ca > 0) {
		$res_ca = fetch_assoc($exe_ca);
		$album_id = $res_ca['id'];
	} else {
		$ins_ca = "INSERT INTO `citizen_album` SET 
													`citizen_id` 		= '".$citizen_id."',
													`name` 				= '".$album_name."',
													`description` 		= '".$album_description."',
													`created_on` 		= '".date('Y-m-d H:i:s')."',
													`updated_on` 		= '".date('Y-m-d H:i:s')."',
													`status` 			= '1'";
		$exe_ca = execute_query($ins_ca);
		$album_id = insert_id();
	}
	return $album_id;
}

function insert_citizen_photo($citizen_id, $album_id, $profile_image, $photo_title, $photo_description) {
	$ins_p = "INSERT INTO `citizen_photo` SET 
												`citizen_id` 		= '".$citizen_id."',
												`album_id` 			= '".$album_id."',
												`photo` 			= '".$profile_image."',
												`photo_title` 		= '".$photo_title."',
												`photo_description` = '".$photo_description."',
												`added_on` 			= '".date('Y-m-d H:i:s')."',
												`status` 			= '1'";
	$exe_p = execute_query($ins_p);
	$photo_id = insert_id();

	return $photo_id;

}
function get_citizen_home($citizen_id) {
	$sel_tc = "SELECT COUNT(id) AS `total_complains` FROM `complaint` WHERE `c_added_by` = '".$citizen_id."'";
	$exe_tc = execute_query($sel_tc);
	$res_tc = fetch_assoc($exe_tc);

	$sel_ts = "SELECT COUNT(id) AS `total_suggestions` FROM `suggestion` WHERE `c_added_by` = '".$citizen_id."'";
	$exe_ts = execute_query($sel_ts);
	$res_ts = fetch_assoc($exe_ts);	

	$citizen_home = array(
							'complains' 	=> $res_tc['total_complains'],
							'suggestion' 	=> $res_ts['total_suggestions'],
							'events' 		=> 0,
							'my_polls' 		=> 0,
								);
	return $citizen_home;
}


function get_auto_generate_code_live_key() {
	$code = auto_generate_code_live_key();
	$sel = "SELECT * FROM `live_video` WHERE `live_video_key` = '".$code."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		get_auto_generate_code_live_key();
	}
	return $code;
}


function sendOTPMessage($phoneNumbers) {
    
}


function sendPushNotificationAndroid($notification_msg_with_key_array, $friends_device_token_array, $type_of_notification) {
    // prep the bundle
    $msg = array("success" => true, "type" => $type_of_notification, "result" => $notification_msg_with_key_array);
    $fields = array
    (
        'registration_ids' => $friends_device_token_array,
        'data' => $msg
    );

    /*echo '<pre>';
    print_r($friends_device_token_array);
    echo '</pre>';*/
    $headers = array
    (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
}

function sendChatAndroid($token, $chat_title, $filetype, $arr_value) {
    $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    $header=array(
    				"Content-Type: application/json",
        			"Authorization: key=AIzaSyAst10oKdrrlgkXzTquIfk5ZMD3UPuUiwc",
        		);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt($ch, CURLOPT_POST, 1);
    
    $arr=array("success" => true, "type" => "chat", "result" => $arr_value);

    curl_setopt($ch, CURLOPT_POSTFIELDS,  "{  \"to\" : \"".$token."\",\"priority\":10,\"data\" : ".json_encode($arr)."}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_exec($ch);
    curl_close($ch);
}



function save_notifications($action_perform, $description = "", $open_url = "", $user_id, $story_id = 0, $video_id = 0, $profile_id = 0, $added_on, $firekey = "", $friend_id = 0) {

	if($friend_id > 0 && $friend_id != $user_id) {

		$ins = "INSERT INTO `notifications` SET 
										`action_perform` 	= '".$action_perform."',
										`description` 		= '".$description."',
										`open_url` 			= '".$open_url."',
										`user_id` 			= '".$user_id."',
										`story_id` 			= '".$story_id."',
										`video_id` 			= '".$video_id."',
										`profile_id` 		= '".$profile_id."',
										`added_on` 			= '".$added_on."',
										`firekey` 			= '".$firekey."'";
		$exe = execute_query($ins);
		if($exe) {
			$notification_id = insert_id();

			// Push Notification Start

			$user_detail = get_user_detail($user_id);

			$notification_msg_with_key_array = array(
													"msg" 			=> $user_detail['user_full_name']." ".$action_perform,
													"video_id" 		=> $video_id,
													"story_id" 		=> $story_id,
													"profile_id" 	=> $profile_id,
													);

			$friends_device_token_array = get_user_device_token($friend_id);

			sendPushNotificationAndroid($notification_msg_with_key_array, $friends_device_token_array, 'Notification');
			// Push Notification End
		}
	}
}



function return_leader_detail_limited($leader_profile_id, $detail_to_show) {
	$user_detail = array();
	$sel = "SELECT ".implode(',', $detail_to_show).", lph_i.photo AS image, lph_c.photo AS cover_image  
									FROM `leader_profile` AS lp 
									LEFT JOIN `leader_photo` AS lph_i ON lp.image_id = lph_i.id 
									LEFT JOIN `leader_photo` AS lph_c ON lp.cover_image_id = lph_c.id
									 WHERE 
									 	lp.`id` = '".$leader_profile_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		$i = 0;
		while($res_u = fetch_assoc($exe)) {

			foreach($detail_to_show AS $column) {

				$column_name = str_replace('lp.','', $column);
				$show_detail = (($res_u[$column_name] != NULL) ? $res_u[$column_name] : "");
				if($column_name == "image") {
					$show_detail = (($res_u['image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['image'] : "");
				} else if($column_name == "cover_image") {
					$show_detail = (($res_u['cover_image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['cover_image'] : "");
				} else if($column_name == "created_on") {
					$show_detail = return_time_ago($res_u['created_on']);
				}
				$user_detail['up_'.$column_name] = $show_detail;
			}
			$i++;
		}
	}
	return $user_detail;
}



function return_admin_detail_limited($user_id, $detail_to_show) {
	$user_detail = array();
	$sel = "SELECT ".implode(',', $detail_to_show)." FROM `admin` WHERE `id` = '".$user_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		$i = 0;
		while($res_u = fetch_assoc($exe)) {

			foreach($detail_to_show AS $column) {
				$show_detail = (($res_u[$column] != NULL) ? $res_u[$column] : "");
				if($column == "image") {
					$show_detail = (($res_u['image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['image'] : "");
				} else if($column == "cover_image") {
					$show_detail = (($res_u['cover_image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['cover_image'] : "");
				} else if($column == "created_on") {
					$show_detail = return_time_ago($res_u['created_on']);
				}
				$user_detail['user_'.$column] = $show_detail;
			}
			$i++;
		}
	}
	return $user_detail;
}


function return_user_detail_limited($user_id, $detail_to_show) {
	$user_detail = array();
	$sel = "SELECT ".implode(',', $detail_to_show)." FROM `users` WHERE `id` = '".$user_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		$i = 0;
		while($res_u = fetch_assoc($exe)) {

			foreach($detail_to_show AS $column) {
				$show_detail = $res_u[$column];
				if($column == "image") {
					$show_detail = (($res_u['image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['image'] : "");
				} else if($column == "cover_image") {
					$show_detail = (($res_u['cover_image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['cover_image'] : "");
				} else if($column == "created_on") {
					$show_detail = return_time_ago($res_u['created_on']);
				}
				$user_detail['user_'.$column] = $show_detail;
			}
			$i++;
		}
	}
	return $user_detail;
}

function get_citizen_pic_path($profile_pic_id) {

	$path = '';
	$sel_cp = "SELECT `photo` FROM `citizen_photo` WHERE `id` = '".$profile_pic_id."'";
	$exe_cp = execute_query($sel_cp);
	$num_cp = num_rows($exe_cp);
	if($num_cp > 0) {
		$res_cp = fetch_assoc($exe_cp);

		$path = PROFILE_IMAGE_URL.$res_cp['photo'];
	}
	return $path;
}

function return_citizen_detail($res_u) {
	$citizen_id 	= $res_u['citizen_id'];
	$profile_id		= $res_u['profile_id'];
	$firstname 		= (($res_u['firstname'] != NULL) ? $res_u['firstname'] : "");
	$middlename 	= (($res_u['middlename'] != NULL) ? $res_u['middlename'] : "");
	$lastname 		= (($res_u['lastname'] != NULL) ? $res_u['lastname'] : "");
	$fullname 		= (($res_u['fullname'] != NULL) ? $res_u['fullname'] : "");
	$email 			= (($res_u['email'] != NULL) ? $res_u['email'] : "");
	$username 		= (($res_u['username'] != NULL) ? $res_u['username'] : "");
	$mobile 		= $res_u['mobile'];
	$alt_mobile		= (($res_u['alt_mobile'] != NULL) ? $res_u['alt_mobile'] : "");
	$gender 		= $res_u['gender'];
	$status 		= $res_u['status'];
	$created_on 	= return_time_ago($res_u['created_on']);
	$updated_on 	= return_time_ago($res_u['updated_on']);
	$address 		= (($res_u['address'] != NULL) ? $res_u['address'] : "");
	$city 			= (($res_u['city'] != NULL) ? $res_u['city'] : "");
	$state 			= (($res_u['state'] != NULL && $res_u['state'] != '0') ? $res_u['state'] : "");
	$country 		= (($res_u['country'] != NULL && $res_u['country'] != '0') ? $res_u['country'] : "");
	$zipcode 		= (($res_u['zipcode'] != NULL && $res_u['zipcode'] != '0') ? $res_u['zipcode'] : "");
	$about_me 		= (($res_u['about_me'] != NULL && $res_u['about_me'] != '0') ? $res_u['about_me'] : "");
	$device_token	= (($res_u['device_token'] != NULL && $res_u['device_token'] != '') ? $res_u['device_token'] : "");
	$date_of_birth	= (($res_u['date_of_birth'] != NULL && $res_u['date_of_birth'] != '') ? $res_u['date_of_birth'] : "");
	$gender			= (($res_u['gender'] != NULL && $res_u['gender'] != '') ? $res_u['gender'] : "");


	$profile_image 		= (($res_u['profile_photo_id'] > 0) ? get_citizen_pic_path($res_u['profile_photo_id']) : "");
	$cover_image 		= (($res_u['cover_photo_id'] > 0) ? get_citizen_pic_path($res_u['cover_photo_id']) : "");

	$facebook_profile_id 	= (($res_u['facebook_profile_id'] != NULL) ? $res_u['facebook_profile_id'] : "");
	$google_profile_id 		= (($res_u['google_profile_id'] != NULL) ? $res_u['google_profile_id'] : "");
	$twitter_profile_id 	= (($res_u['twitter_profile_id'] != NULL) ? $res_u['twitter_profile_id'] : "");

	$user_data_array = array(
							"citizen_id" 		=> $citizen_id,
							"profile_id" 		=> $profile_id,
			               	"firstname" 		=> $firstname,
			               	"middlename" 		=> $middlename,
						   	"lastname" 			=> $lastname,
						   	"fullname" 			=> $fullname,
						   	"email" 			=> $email,
						   	"username" 			=> $username,
						   	"mobile" 			=> $mobile,
						   	"alt_mobile" 		=> $alt_mobile,
						   	"gender" 			=> $gender,
						   	"status" 			=> $status,
						   	"created_on" 		=> $created_on,
						   	"updated_on" 		=> $updated_on,
						   	"address" 			=> $address,
						   	"city" 				=> $city,
						   	"state" 			=> $state,
						   	"country" 			=> $country,
						   	"zipcode" 			=> $zipcode,
						   	"about_me" 			=> $about_me,
						   	"device_token" 		=> $device_token,
						   	"date_of_birth" 	=> $date_of_birth,
						   	"gender" 			=> $gender,
						   	
						   	"profile_image" 	=> $profile_image,
						   	"cover_image" 		=> $cover_image,

						   	"facebook_profile_id" 	=> $facebook_profile_id,
						   	"google_profile_id" 	=> $google_profile_id,
						   	"twitter_profile_id" 	=> $twitter_profile_id,
							);
	
	return $user_data_array;
}

function return_admin_detail($res_u) {
	$user_id 			= $res_u['id'];
	$user_profile_id	= $res_u['profile_id'];
	$user_full_name 	= $res_u['fullname'];
	$user_image 		= (($res_u['image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['image'] : "");
	$user_email 		= (($res_u['email'] != NULL) ? $res_u['email'] : "");
	$user_mobile 		= $res_u['phone'];
	$user_status 		= $res_u['status'];
	$user_login_status	= $res_u['login_status'];
	$user_name 			= (($res_u['username'] != NULL) ? $res_u['username'] : "");
	$user_phonecountry 	= (($res_u['phonecountry'] != NULL) ? $res_u['phonecountry'] : "");
	$user_createdon 	= return_time_ago($res_u['created_on']);
	$user_address 		= (($res_u['address'] != NULL) ? $res_u['address'] : "");
	$user_city 			= (($res_u['city'] != NULL) ? $res_u['city'] : "");
	$user_state 		= (($res_u['state'] != NULL && $res_u['state'] != '0') ? $res_u['state'] : "");
	$user_device_token	= (($res_u['device_token'] != NULL && $res_u['device_token'] != '') ? $res_u['device_token'] : "");
	$user_date_of_birth	= (($res_u['date_of_birth'] != NULL && $res_u['date_of_birth'] != '') ? $res_u['date_of_birth'] : "");
	$user_gender		= (($res_u['gender'] != NULL && $res_u['gender'] != '') ? $res_u['gender'] : "");

	$user_data_array = array(
							"user_id" 				=> $user_id,
							"user_profile_id" 		=> $user_profile_id,
			               	"user_name" 			=> $user_name,
			               	"user_full_name" 		=> $user_full_name,
						   	"user_image" 			=> $user_image,
						   	"user_email" 			=> $user_email,
						   	"user_phonecountry" 	=> $user_phonecountry,
						   	"user_mobile" 			=> $user_mobile,
						   	"user_createdon" 		=> $user_createdon,
						   	"user_address" 			=> $user_address,
						   	"user_city" 			=> $user_city,
						   	"user_state" 			=> $user_state,
						   	"user_state" 			=> $user_state,
						   	"user_about_me" 		=> $user_about_me,
						   	"user_device_token" 	=> $user_device_token,
						   	"user_date_of_birth" 	=> $user_date_of_birth,
						   	"user_gender" 			=> $user_gender,
						   	"user_login_status" 	=> $user_login_status,
							);
	return $user_data_array;
}

function get_leader_pic_path($profile_pic_id) {

	$path = '';
	$sel_cp = "SELECT `photo` FROM `leader_photo` WHERE `id` = '".$profile_pic_id."'";
	$exe_cp = execute_query($sel_cp);
	$num_cp = num_rows($exe_cp);
	if($num_cp > 0) {
		$res_cp = fetch_assoc($exe_cp);

		$path = PROFILE_IMAGE_URL.$res_cp['photo'];
	}
	return $path;
}


function return_leader_detail($res_u) {
	$leader_id 		= $res_u['leader_id'];
	$profile_id		= $res_u['id'];
	$firstname 		= (($res_u['firstname'] != NULL) ? $res_u['firstname'] : "");
	$middlename 	= (($res_u['middlename'] != NULL) ? $res_u['middlename'] : "");
	$lastname 		= (($res_u['lastname'] != NULL) ? $res_u['lastname'] : "");
	$email 			= (($res_u['email'] != NULL) ? $res_u['email'] : "");
	$username 		= (($res_u['username'] != NULL) ? $res_u['username'] : "");
	$mobile 		= $res_u['mobile'];
	$alt_mobile		= (($res_u['alt_mobile'] != NULL) ? $res_u['alt_mobile'] : "");
	$status 		= $res_u['status'];
	$created_on 	= return_time_ago($res_u['created_on']);
	$updated_on 	= return_time_ago($res_u['updated_on']);
	$address 		= (($res_u['address'] != NULL) ? $res_u['address'] : "");
	$city 			= (($res_u['city'] != NULL) ? $res_u['city'] : "");
	$state 			= (($res_u['state'] != NULL && $res_u['state'] != '0') ? $res_u['state'] : "");
	$country 		= (($res_u['country'] != NULL && $res_u['country'] != '0') ? $res_u['country'] : "");
	$zipcode 		= (($res_u['zipcode'] != NULL && $res_u['zipcode'] != '0') ? $res_u['zipcode'] : "");
	$device_token	= (($res_u['device_token'] != NULL && $res_u['device_token'] != '') ? $res_u['device_token'] : "");
	$date_of_birth	= (($res_u['date_of_birth'] != NULL && $res_u['date_of_birth'] != '') ? $res_u['date_of_birth'] : "");
	$gender			= (($res_u['gender'] != NULL && $res_u['gender'] != '') ? $res_u['gender'] : "");


	$profile_image 		= (($res_u['profile_photo_id'] > 0) ? get_leader_pic_path($res_u['profile_photo_id']) : "");
	$cover_image 		= (($res_u['cover_photo_id'] > 0) ? get_leader_pic_path($res_u['cover_photo_id']) : "");

	$facebook_profile_id 	= (($res_u['facebook_profile_id'] != NULL) ? $res_u['facebook_profile_id'] : "");
	$google_profile_id 		= (($res_u['google_profile_id'] != NULL) ? $res_u['google_profile_id'] : "");
	$twitter_profile_id 	= (($res_u['twitter_profile_id'] != NULL) ? $res_u['twitter_profile_id'] : "");

	$user_data_array = array(
							"leader_id" 		=> $leader_id,
							"profile_id" 		=> $profile_id,
			               	"firstname" 		=> $firstname,
			               	"middlename" 		=> $middlename,
						   	"lastname" 			=> $lastname,
						   	"fullname" 			=> $fullname,
						   	"email" 			=> $email,
						   	"username" 			=> $username,
						   	"mobile" 			=> $mobile,
						   	"alt_mobile" 		=> $alt_mobile,
						   	"gender" 			=> $gender,
						   	"status" 			=> $status,
						   	"created_on" 		=> $created_on,
						   	"updated_on" 		=> $updated_on,
						   	"address" 			=> $address,
						   	"city" 				=> $city,
						   	"state" 			=> $state,
						   	"country" 			=> $country,
						   	"zipcode" 			=> $zipcode,
						   	"device_token" 		=> $device_token,
						   	"date_of_birth" 	=> $date_of_birth,
						   	"gender" 			=> $gender,
						   	
						   	"profile_image" 	=> $profile_image,
						   	"cover_image" 		=> $cover_image,

						   	"facebook_profile_id" 	=> $facebook_profile_id,
						   	"google_profile_id" 	=> $google_profile_id,
						   	"twitter_profile_id" 	=> $twitter_profile_id,
							);
	
	return $user_data_array;
}

function uploads3($upload_path, $source){

	/*$client = S3Client::factory(array(
	    
	    'version' => '2006-03-01',
	    'region' => 'ap-south-1',
		'http' => [ 'verify' => false ]
	));
	$result = $client->putObject(array(
	    'Bucket'     => 'ritvigroup',
	    'Key'        => $upload_path,
	    'SourceFile' => $source,
	    'Metadata'   => array(
						        'Foo' => 'abc',
						        'Baz' => '123'
						    )
	));
	return $result;*/

	$source_exp = explode("/", $source);
	$new_folder_path = '';
	for($i = 0; $i < (count($source_exp)); $i++) {
		$new_folder_path .= $source_exp[$i].'/';
		if(!is_dir($new_folder_path)) {
			@mkdir($new_folder_path, 0777);
		}
	}
}


function generate_new_complaint_id($length = 8) {
	$complaint_id = strtoupper("C".md5(mt_rand().time()));
	$complaint_id = substr( str_shuffle( $complaint_id ), 0, $length );
	$sel = "SELECT id FROM `complaint` WHERE `complaint_id` = '".$complaint_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		generate_new_complaint_id();
	}
	return $complaint_id;
}


function auto_generate_citizen_name() {
	$auto_username = "kaajneeti".time();
	$sel = "SELECT `id` FROM `citizen` WHERE `username` = '".$auto_username."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		auto_generate_citizen_name();
	}
	return $auto_username;
}

function auto_generate_citizen_profile_id() {
	$auto_profile_id = mt_rand().time().rand();
	$sel = "SELECT `id` FROM `citizen` WHERE `profile_id` = '".$auto_profile_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		auto_generate_citizen_profile_id();
	}
	return $auto_profile_id;
}


function auto_generate_admin_username() {
	$auto_username = "ritvigroup-".time();
	$sel = "SELECT * FROM `admin` WHERE `username` = '".$auto_username."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		auto_generate_admin_username();
	}
	return $auto_username;
}

function auto_generate_admin_profile_id() {
	$auto_profile_id = mt_rand().time().rand();
	$sel = "SELECT * FROM `admin` WHERE `profile_id` = '".$auto_profile_id."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		auto_generate_admin_profile_id();
	}
	return $auto_profile_id;
}


function sendmsg($phone, $message)
{
	
}

function get_user_device_token($user_id) {
	$users_array = get_all_my_followers_users_list($user_id);

	$my_user_device_token_list = array();
	$user_detail = get_user_detail($user_id);
	if($user_detail['user_device_token'] != '' && $user_detail['user_login_status'] == '1') {
		$my_user_device_token_list[] = $user_detail['user_device_token'];
	}
	foreach($users_array AS $key => $val) {
		$user_detail = get_user_detail($val);
		if($user_detail['user_device_token'] != '' && $user_detail['user_login_status'] == '1') {
			$my_user_device_token_list[] = $user_detail['user_device_token'];
		}
	}
	return $my_user_device_token_list;
}


function get_citizen_detail($user_id) {

	$user_detail = array();

	if($user_id > 0) {
		$sel = "SELECT * FROM `citizen` AS c 
									LEFT JOIN `citizen_profile` AS cp ON c.id = cp.citizen_id 
									WHERE 
										c.`id` = '".$user_id."'";
		$exe = execute_query($sel);
		$res = fetch_assoc($exe);

		$user_detail = return_citizen_detail($res);
	}
	return $user_detail;
}

function get_admin_detail($user_id) {
	if($user_id > 0) {
		$sel = "SELECT * FROM `admin` WHERE `id` = '".$user_id."'";
		$exe = execute_query($sel);
		$res = fetch_assoc($exe);

		$user_detail = return_admin_detail($res);
	} else {
		$user_detail = array();
	}
	return $user_detail;
}


function get_leader_detail($leader_id) {
	if($leader_id > 0) {
		$sel = "SELECT * FROM `leader` AS l
									LEFT JOIN `leader_profile` AS lp ON l.id = lp.leader_id 
									WHERE 
										l.`id` = '".$leader_id."'
									AND lp.leader_type = '1'";
		$exe = execute_query($sel);
		$res = fetch_assoc($exe);

		$user_detail = return_leader_detail($res);

	} else {
		$user_detail = array();
	}
	return $user_detail;
}


function get_only_website($link) {
	$link = current(explode('?', $link));
	$link = str_replace('https', '', $link);
	$link = str_replace('http', '', $link);
	$link = str_replace(':', '', $link);
	$link = str_replace('//', '', $link);
	$link = current(explode('/', $link));
	return $link;
}

function send_forgot_mpin_for_user_phone($res_user) {
	$headers = "From: Ritvi Group <info@ritvigroup.com>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$subject = "Your MPIN";

	$message = "Hi, ".$res_user['fullname'];
	$message .= "<br><br>Mobile:".$res_user['phone'];
	$message .= '<br>MPIN:'.$res_user['mpin'];
	$message .= "<br><br>Note: Please don't reply to this email" ;
	$message .= '<br><br>Thanks,';
	$message .= '<br>Ritvi Group';
	$message .= '<br><br><br>';

	$email = $res_user['email'];

	if(mail($email, $subject, $message, $headers))
	{
		$array = array(
	            	"status" 	=> 'success',
	               	"message" 	=> 'MPIN sent to your email',
	               	"code" 		=> $code,
	            );

	} else  {
		$array = array(
		               "status" 	=> 'failed',
		               "message" 	=> 'Error occured. Email not sent. Please try again.',
		        );
	}
	return $array;
}

function send_forgot_mpin_for_admin_phone($res_admin) {
	$headers = "From: Ritvi Group <info@ritvigroup.com>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$subject = "Your MPIN";

	$message = "Hi, ".$res_admin['fullname'];
	$message .= "<br><br>Mobile:".$res_admin['phone'];
	$message .= '<br>MPIN:'.$res_admin['mpin'];
	$message .= "<br><br>Note: Please don't reply to this email" ;
	$message .= '<br><br>Thanks,';
	$message .= '<br>Ritvi Group';
	$message .= '<br><br><br>';

	$email = $res_admin['email'];

	if(mail($email, $subject, $message, $headers))
	{
		$array = array(
	            	"status" 	=> 'success',
	               	"message" 	=> 'MPIN sent to your email',
	               	"code" 		=> $code,
	            );

	} else  {
		$array = array(
		               "status" 	=> 'failed',
		               "message" 	=> 'Error occured. Email not sent. Please try again.',
		        );
	}
	return $array;
}

function send_forgot_password_email_for_phone($res_user) {
	$headers = "From: Ritvi Group <info@ritvigroup.com>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$subject = "Your password";

	$message = "Hi, ".$res_user['fullname'];
	$message .= "<br><br>Username:".$res_user['username'];
	$message .= '<br>Password:'.$res_user['password'];
	$message .= "<br><br>Note: Please don't reply to this email" ;
	$message .= '<br><br>Thanks,';
	$message .= '<br>Ritvi Group';
	$message .= '<br><br><br>';

	$email = $res_user['email'];

	if(mail($email, $subject, $message, $headers))
	{
		$array = array(
	            	"status" 	=> 'success',
	               	"message" 	=> 'Password sent to your email',
	               	"code" 		=> $code,
	            );

	} else  {
		$array = array(
		               "status" 	=> 'failed',
		               "message" 	=> 'Error occured. Email not sent. Please try again.',
		        );
	}
	return $array;
}


function send_forgot_password_email($res_user) {
	$headers = "From: Ritvi Group Application";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$code = auto_generate_code();


	$subject = "Reset your password";

	$message = "Hi ".$res_user['name'];
	$message .= "<br>We've received a request to reset your password. If you didn't make the request, just ignore this email. Otherwise, you can reset your password using this link:";
	$message .= '<br><br><input type="button" value="Click here to reset your password" onclick="window.location.href=\"http://www.ritvigroup.com/resetpassword/'.$code.'\"">';
	$message .= '<br><br>Thanks,';
	$message .= '<br>Ritvi Group Team';
	$message .= '<br><br><br>';

	$email = $res_user['email'];

	if(mail($email, $subject, $message, $headers))
	{
		$array = array(
	            	"status" 	=> 'success',
	               	"message" 	=> 'Reset Password email sent Successfully',
	               	"code" 		=> $code,
	            );

	} else  {
		$array = array(
		               "status" 	=> 'failed',
		               "message" 	=> 'Error occured. Email not sent. Please try again.',
		        );
	}
	return $array;
}

function generate_password($length = 8) {
	$small_chars 	= "abcdefghijklmnopqrstuvwxyz";
	$caps_chars 	= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$digit_chars 	= "0123456789";
	$special_chars 	= "!@#$%^&*()_-=+;:,.?";

	$chars = isset($small_chars) ? $small_chars : '';
	$chars .= isset($caps_chars) ? $caps_chars : '';
	$chars .= isset($digit_chars) ? $digit_chars : '';
	$chars .= isset($special_chars) ? $special_chars : '';
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

function auto_generate_code($length = 20) {
	$small_chars 	= "abcdefghijklmnopqrstuvwxyz";
	$caps_chars 	= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$digit_chars 	= "0123456789";

	$chars = isset($small_chars) ? $small_chars : '';
	$chars .= isset($caps_chars) ? $caps_chars : '';
	$chars .= isset($digit_chars) ? $digit_chars : '';
    $code = substr( str_shuffle( $chars ), 0, $length );
    return $code;
}

function auto_generate_otp($length = 6) {
	$digit_chars 	= "0123456789";

	$chars = isset($digit_chars) ? $digit_chars : '';
    $code = substr( str_shuffle( $chars ), 0, $length );
    return $code;
}




function validate_image_file($file_tmp_name)
{
	$mime_types = array(
						// images
			            'png' => 'image/png',
			            'jpe' => 'image/jpeg',
			            'jpeg' => 'image/jpeg',
			            'jpg' => 'image/jpeg',
			            'gif' => 'image/gif',
			            'bmp' => 'image/bmp',
			            );
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$finfo_file = finfo_file($finfo, $file_tmp_name);
	finfo_close($finfo);

	if(!@in_array($finfo_file, $mime_types)) {
		return false;
	}
	return true;
}


function return_time_ago($datetime)  
{  
	$time_ago 			= strtotime($datetime);  
	$current_time 		= time();  
	$time_difference 	= $current_time - $time_ago;  
	$seconds 			= $time_difference;  
	$minutes      		= round($seconds / 60 );       // value 60 is seconds  
	$hours           	= round($seconds / 3600);      //value 3600 is 60 minutes * 60 sec  
	$days          		= round($seconds / 86400);     //86400 = 24 * 60 * 60;  
	$weeks          	= round($seconds / 604800);    // 7*24*60*60;  
	$months          	= round($seconds / 2629440);   //((365+365+365+365+366)/5/12)*24*60*60  
	$years          	= round($seconds / 31553280);  //(365+365+365+365+366)/5 * 24 * 60 * 60  
	if($seconds <= 15) {  
		return "Just Now";  
	} else if($seconds > 15 && $minutes < 1) {
		return $seconds." sec ago";
	} else if($minutes >= 1 && $minutes <= 60) {
		if($minutes==1)  
		{  
			return "1 min ago";  
		}  
		else  
		{  
			return $minutes." min ago";  
		}  
	} else if($hours <= 24) {  
		if($hours == 1)  
		{  
			return "1 hr ago";  
		}  
		else  
		{  
			return $hours." hrs ago";  
		}  
	} else if($days <= 7) {  
		if($days == 1)  
		{  
			return "yesterday";  
		}  
		else  
		{  
			return "$days days ago";  
		}  
	} else if($weeks <= 4.3) //4.3 == 52/12  
	{  
		if($weeks == 1)  
		{  
			return "a week ago";  
		}  
		else  
		{  
			return "$weeks weeks ago";  
		}  
	} else if($months <= 12) {  
		if($months==1)  
		{  
			return "a month ago";  
		}  
		else  
		{  
			return "$months months ago";  
		}  
	} else {  
		if($years == 1)  
		{  
			return "one year ago";  
		}
		else  
		{  
			return "$years years ago";  
		}
	}  
}  


function generate_qr_code() {
	$qr = new QR_BarCode(); 

	// create text QR code 
	$qr->text('Rajesh Kumar Vishwakarma'); 

	/*// create url QR code 
	$qr->url('URL');

	// create text QR code 
	$qr->text('textContent');

	// create email QR code 
	$qr->email('emailAddress', 'subject', 'message');

	// create phone QR code 
	$qr->phone('phoneNumber');

	// create sms QR code 
	$qr->sms('phoneNumber', 'message');

	// create contact QR code 
	$qr->contact('name', 'address', 'phone', 'email');

	// create content QR code 
	$qr->content('type', 'size', 'content');*/

	// display QR code image
	return $qr->qrCode();

}
?>
