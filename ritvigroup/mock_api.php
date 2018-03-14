<?php
include('mock_config.php');

$pageName = $_REQUEST['page_name'];

switch ($pageName) {
	case 'userlogin/loginMobileMpin':
		$mobile = $_REQUEST['mobile'];
		$mpin = $_REQUEST['mpin'];

		$postData = array(
							'mobile' => $mobile,
							'mpin' => $mpin,
							);
		callTestMockApi($pageName, $postData);
		break;
	
	default:
		# code...
		break;
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
			foreach($postData AS $key => $val) {
				$sel_p .= " INNER JOIN `TestMockApiParam` AS tmap".$i." ON (tma.`TestMockApiId` = tmap".$i.".`TestMockApiId` AND tmap".$i.".`TestMockApiKey` = '".$key."' AND tmap".$i.".`TestMockApiValue` = '".$val."') ";
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
	}
}


/*function post_curl($pageName, $postvars) {
	$ch = curl_init();
	
	$url = "http://www.google.com";
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
	curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
	curl_setopt($ch,CURLOPT_TIMEOUT, 20);
	$response = curl_exec($ch);
	
	header('Content-type: application/json');

	echo $response;

	curl_close ($ch);
}*/
?>