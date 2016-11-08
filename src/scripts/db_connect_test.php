<<?php
$db = new mysqli(
		"us-cdbr-azure-southcentral-f.cloudapp.net",
		"be9b6ca39cad35",
		"e7f30e0c",
		"staging"
		);
if($db->connect_errno) {
	die('Connectfailed['.$db->connect_error.']');
}
?>