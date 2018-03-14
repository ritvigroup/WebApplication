<?php
include('mock_config.php');

$pageName = $_REQUEST['page_name'];

switch ($pageName) {
	case 'userlogin/loginMobileMpin':
		
		break;
	case 'userlogin/loginMobile':
		break;

	case 'userlogin/loginUsernamePassword':
		break;
	
	default:
		# code...
		break;
}

if($_POST['MOCK'] == "Y") {
	callTestMockApi($pageName, $_POST);
} else if($_POST['MOCK'] == "N"){
	postDataInCurlGetResponse($pageName, $_POST);
} else {
	echo "Rajesh";die;
}

function callTestMockApi($pageName, $postData, $checkParam = true) {
	$sel = "SELECT * FROM `TestMockApi` WHERE `TestMockApiName` = '".$pageName."'";
	$exe = execute_query($sel);
	$num = num_rows($exe);
	if($num > 0) {
		$res = fetch_assoc($exe);

		if($checkParam == false) {

		} else {
			$sel_p = "SELECT tma.* FROM `TestMockApi` AS tma ";

			$i = 1;

			$notCheckParam = array('page_name', 'MOCK', 'device_token', 'location_lant', 'location_long', 'device_name', 'device_os');
			foreach($postData AS $key => $val) {
				if(!in_array($key, $notCheckParam)) {
					$sel_p .= " INNER JOIN `TestMockApiParam` AS tmap".$i." ON (tma.`TestMockApiId` = tmap".$i.".`TestMockApiId` AND tmap".$i.".`TestMockApiKey` = '".$key."' AND tmap".$i.".`TestMockApiValue` = '".$val."') ";
				}
				$i++;
			}
			$sel_p .= " WHERE tma.`TestMockApiId` = '".$res['TestMockApiId']."' ";
			//echo $sel_p;

			$exe_p = execute_query($sel_p);
			$num_p = num_rows($exe_p);
			if($num_p > 0) {
				echo $res['TestMockApiResponseSuccess'];
			} else {
				echo $res['TestMockApiResponseFailed'];
			}
		}
	} else {

	}
}


function postDataInCurlGetResponse($pageName, $postvars) {
	$ch = curl_init();

	$headers = array("Content-Type:multipart/form-data");

	$callurl = SITE_URL.'/'.$pageName;

	curl_setopt($ch, CURLOPT_URL, $callurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($ch, CURLOPT_TIMEOUT, 2);
	curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
	$response = curl_exec($ch);
	
	header('Content-type: application/json');

	echo $response;

	curl_close($ch);

}
?>