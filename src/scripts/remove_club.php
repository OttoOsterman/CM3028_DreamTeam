<?php
session_start();
if (isset($_SESSION["acc_type"]) && isset($_POST["club_id"])) {
    if($_SESSION["acc_type"] == "admin") {
        include("db_connect_test.php");
        $sql = "DELETE FROM Club WHERE club_id = {$_POST["club_id"]}";
        $db->query($sql);
        header("Location: https://go-portlethen.azurewebsites.net/profile");
    }
}