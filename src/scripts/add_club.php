<?php
session_start();
include("db_connect_test.php");
$name = mysqli_real_escape_string($db, stripslashes($_POST["name"]));
$genre = mysqli_real_escape_string($db, stripslashes($_POST["genre"]));
$description = mysqli_real_escape_string($db, stripslashes($_POST["description"]));
$contact_info = mysqli_real_escape_string($db, stripslashes($_POST["contact_info"]));

$sql = "SELECT name FROM Club WHERE name = '{$name}'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $_SESSION["error"] = "club_already_exists";
    die();
} else {
    $sql = "INSERT INTO Club (name, genre, description, contact_info) VALUES ('{$name}', '{$genre}', '{$description}', '{$contact_info}')";
    $db->query($sql);
    $_SESSION["error"] = null;
}