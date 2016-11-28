<?php
//TODO: Remove testing code
include("scripts/db_connect_test.php");
$username = mysqli_real_escape_string($_POST["username"]);
$password = $_POST["password"];

$sql = "SELECT hash, salt FROM User WHERE username = {$username}";
$result = $db->query($sql);
if (mysql_num_rows($result) != 0) {
    $hash = mysqli_fetch_array($result)[0];
    $hashed_password = hash("sha256", $hashed_password);
    if ($hashed_password === $hash) {
        $_SESSION["username"] = $username;
        header($_POST["location"]);
    }
}
header($_POST["location"] . "?error=incorrect_login");
?>