<?php 
include("db_connect.php");

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $ $dom->appendChild($node);

$query = "SELECT * FROM markers WHERE 1";
$result = $db->query($query);
if(!$result) {
	die("Nothing in result: ");
}

header("Content-type: text/xml");

//TODO: Uncomment production code
/*
while($row = $result->fetch_array()) {
	$node = $dom->createElement("marker");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("name", $row['name']);
	$newnode->setAttribute("description", $row['description']);
	$newnode->setAttribute("lat", $row['lat']);
	$newnode->setAttribute("long", $row['long']);
}
*/
while($row = $result->fetch_array()) {
	$node = $dom->createElement("marker");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("arb_x", $row['arbitrary_x']);
	$newnode->setAttribute("arb_y", $row['arbitrary_y']);
}

$result->close();
$db->close();

echo ($dom->saveXML());
?>