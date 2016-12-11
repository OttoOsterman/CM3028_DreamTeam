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
    $_SESSION["error"] = "club_name_already_exists";
    die();
} else {
    $sql = "UPDATE Club SET name = '{$name}', genre = '{$genre}', description='{$description}', contact_info='{$contact_info}' WHERE club_id={$_SESSION['curr_club']}";
    $_SESSION["error"] = $sql;
    $db->query($sql);
}