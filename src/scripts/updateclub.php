<?php
session_start();
include("db_connect_test.php");
$name = mysqli_real_escape_string($db, stripslashes($_POST["name"]));
$genre = mysqli_real_escape_string($db, stripslashes($_POST["genre"]));
$description = mysqli_real_escape_string($db, stripslashes($_POST["description"]));
$contact_info = mysqli_real_escape_string($db, stripslashes($_POST["contact_info"]));

$sql = "UPDATE Club SET name = '{$name}', genre = '{$genre}', description='{$description}', contact_info='{$contact_info}' WHERE club_id={$_SESSION['curr_club']}";
$_SESSION["error"] = $sql;
$db->query($sql);
header("Location: https://go-portlethen.azurewebsites.net/profile");