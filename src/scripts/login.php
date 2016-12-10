<?php
//TODO: Remove testing code
session_start();
$_SESSION["error"] = "couldn't connect to db";
include("db_connect_test.php");
$username = stripslashes($_POST["username"]);
$username = mysqli_real_escape_string($db, $username);
$password = $_POST["password"];

$sql = "SELECT hash, salt FROM User WHERE username = '{$username}'";
$result = $db->query($sql);
$_SESSION["error"] = "num rows returned 0, username {$_POST["username"]}, sql {$sql}";
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $hashed_password = hash("sha256", $password . $row["salt"]);
    if ($hashed_password === $row["hash"]) {
        $_SESSION["error"] = "no error";
        $_SESSION["username"] = $username;
    } else {
        $retval = "wrong password, password is: {$password}, hash is: {$hashed_password}, expected: {$row["hash"]}";
        $_SESSION["error"] = $retval;
    }
} else {
    $_SESSION{"error"} = "username_not_found";
}
?>