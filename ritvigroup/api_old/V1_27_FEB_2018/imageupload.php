<?php
include('config.php');

header('Content-type: application/json');

$name = @basename($_FILES['image']['name']);

if($name != '') {

	$user_friend_path = '1_2/';

	$image_name = date("YmdHis").'-'.time().'-'.mt_rand().'.'.end(explode('.', $name));

	$image_path = CHAT_IMAGE_DIR.$user_friend_path.$image_name;
	$web_image_path = CHAT_IMAGE_URL.$user_friend_path.$image_name;
	$image_upload = @move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

	$ins = "INSERT INTO `chat_image` SET 
										`chat_between_user` = '".$user_friend_path."',
										`image_path` = '".$image_path."',
										`web_image_path` = '".$web_image_path."',
										`uploaded_on` = '".date('Y-m-d H:i:s')."'";
	$exe = execute_query($ins);

	$array = array(
	               "status" 		=> 'success',
	               "image" 			=> CHAT_IMAGE_URL.$user_friend_path.$image_name,
				   "message"		=> "Image uploaded successfully",
	               );
} else {
	$array = array(
					"status" 		=> 'failed',
					"message" 		=> 'Image not found',
					);
}
echo json_encode($array);


?>