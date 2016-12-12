<?php
session_start();

if (isset($_SESSION["acc_type"]) && isset($_SESSION["curr_club"]) && isset($_POST["username"])) {
    if ($_SESSION["acc_type"] == "admin" || $_SESSION["acc_type"] == "club_admin") {
        //TODO: REMOVE RESTING CODE
        include("db_connect_test.php");
        $sql = "SELECT user_id FROM User WHERE username = {$_POST["username"]}";
        $res = $db->query($sql);
        if ($res->num_rows == 1) {
            $sql = "INSERT INTO ClubMember (user_id, club_id) VALUES ({$row["user_id"]}, {$_SESSION{"curr_club"}})";
        }
    }
}
?>