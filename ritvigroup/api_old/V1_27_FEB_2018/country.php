<?php
include_once('config.php');
include_once('functions.php');

header('Content-type: application/json');

$website_url = 'http://13.127.5.154';

$country = array();
$sel_vl = "SELECT * FROM `country` ORDER BY `favourite` ASC";
$exe_vl = execute_query($sel_vl);
$num_vl = num_rows($exe_vl);
if($num_vl > 0) {
	while($res = fetch_array($exe_vl)) {
		$country[] = array(
						'country_id' 	=> $res['country_id'],
						'country_name' 	=> $res['name'],
						'phone_code' 	=> '+'.$res['phone_code'],
						'country_code' 	=> $res['iso_code_2'],
						'country_image' => $website_url.'/homytapp/flags/'.strtolower($res['iso_code_2']).'.png',
						);
	}
$array = array(
				"status" 		=> 'success',
				"country" 		=> $country,
				"message" 		=> 'Country found',
			);
}
echo json_encode($array);

?>