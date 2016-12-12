<?php
session_start();

if (isset($_SESSION["acc_type"]) && isset($_SESSION["curr_club"])) {
    if ($_SESSION["acc_type"] == "admin" || $_SESSION["acc_type"] == "club_admin") {
        include("db_connect_test.php");
        $sql = "DELETE FROM ClubMember WHERE user_id = {$_POST['user_id']} AND club_id = {$_SESSION['curr_club']}";
        $db->query($sql);
    }
}