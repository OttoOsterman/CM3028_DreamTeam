<?php
include("db_connect_test.php");

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parent_node = $dom->appendChild($node);

//TODO: Select from production table
$query = "SELECT * FROM Location";
$result = $db->query($query);
if(!$result) {
	die("Nothing in result: ");
}

header("Content-type: text/xml");
while($row = $result->fetch_array()) {
    $node = $dom->createElement("marker");
    $new_node = $parent_node->appendChild($node);
    $new_node->setAttribute("name", $row["name"]);
    $new_node->setAttribute("lat", $row["latitude"]);
    $new_node->setAttribute("lng", $row["longitude"]);
}

$result->close();
$db->close();
echo ($dom->saveXML());
?>