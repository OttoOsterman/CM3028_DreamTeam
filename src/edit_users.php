<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Edit Users</title>
    <link rel="stylesheet" type="text/css" href="../src/css/edit_club.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
</head>
<body>

<?php include ("scripts/navbar.php"); ?>
<!--TODO: REMOVE TESTING CODE-->

<h2 id="editUsersHeader">Edit Club</h2>
<div id="editUsersContainer">

<?php
//TODO: REMOVE TESING CODE
include("scripts/db_connect_test.php");

$sql = "SELECT username, acc_type FROM User";
$acc_type_sql = "SELECT acc_type FROM Permission";

$result = $db->query($sql);
$acc_types = $db->query($acc_type_sql);
while ($row = $result->fetch_array()) {
    echo ("<label>{$row["username"]}</label><select>");
    while ($acc_row = $acc_types->fetch_array()) {
        if ($row["acc_type"] == $acc_row["acc_type"]) {
            echo("<option selected='selected'>{$acc_row["acc_type"]}</option>");
        } else {
            echo("<option>{$acc_row["acc_type"]}</option>");
        }
    }
    $acc_types->data_seek(0);
    echo("</select><br>");
}
?>

</div>
</body>