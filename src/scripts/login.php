<?php
//TODO: Remove testing code
include("scripts/db_connect_test.php");
$username = stripslashes($_POST["username"]);
$username = mysqli_real_escape_string($username);
$password = $_POST["password"];

$sql = "SELECT hash, salt FROM User WHERE username = {$username}";
$result = $db->query($sql);
if ($result->num_rows != 0) {
    $row = $result->fetch_array();
    $hash = $row["hash"];
    $hashed_password = hash("sha256", $password . $row["salt"]);
    if ($hashed_password === $hash) {
        $_SESSION["username"] = $username;
    }
}
?>