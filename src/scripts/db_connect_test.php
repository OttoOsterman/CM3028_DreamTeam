<<?php
$db = new mysqli(
		"us-cdbr-azure-southcentral-f.cloudapp.net",
		"b2274755cf7719",
		"3d705615",
		"staging"
		);
if($db->connect_errno) {
	die('Connectfailed['.$db->connect_error.']');
}
?>