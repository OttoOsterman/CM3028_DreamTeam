<?php
include("scripts/navbar.php");
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
    echo("</select>");
}
