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
$media_query = "SELECT media_path, location_id FROM Media";
$media_result = $db->query($media_query);

header("Content-type: text/xml");
while($row = $result->fetch_array()) {
    $node = $dom->createElement("marker");
    $new_node = $parent_node->appendChild($node);
    $new_node->setAttribute("name", $row["name"]);
    $new_node->setAttribute("lat", $row["latitude"]);
    $new_node->setAttribute("lng", $row["longitude"]);
    $new_node->setAttribute("description", $row["description"]);
    while($media_row = $media_result->fetch_array()) {
        if ($media_row["location_id"] == $row["location_id"]) {
            $media_node = $new_node->appendChild($dom->createElement("media"));
            $media_node->setAttribute("path", $media_row["media_path"]);
        }
    }
    mysqli_data_seek($media_result, 0);
}

$result->close();
$db->close();
echo ($dom->saveXML());
?>