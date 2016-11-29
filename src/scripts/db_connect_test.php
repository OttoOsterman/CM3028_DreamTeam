<?php
echo("nothing wrong");
$db = new mysqli(
		"us-cdbr-azure-southcentral-f.cloudapp.net",
		"b2274755cf7719",
		"3d705615",
		"acsm_c7b68337b4bae6d"
		);
//TODO: REMOVE TESTING CODE
echo("Attempted connection");
if($db->connect_errno) {
    echo("Connection Failed");
	die('Connectfailed['.$db->connect_error.']');
}
echo("Conncetion succeeded");
?>