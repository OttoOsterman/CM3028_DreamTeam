<?php
session_start();

include("db_connect_test.php");
$sql = "DELETE FROM ClubMember WHERE user_id = {$_POST['user_id']} AND club_id = {$_SESSION['curr_club']}";
$_SESSION["error"] = $sql;
$db->query($sql);