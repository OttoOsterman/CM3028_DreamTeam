<?php
//TODO: Remove testing code
session_start();
$_SESSION["error"] = "couldn't connect to db";
include("db_connect_test.php");
$username = stripslashes($_POST["username"]);
$username = mysqli_real_escape_string($db, $username);
$password = $_POST["password"];

$sql = "SELECT user_id, hash, salt FROM User WHERE username = '{$username}'";
$result = $db->query($sql);
$_SESSION["error"] = "num rows returned 0, username {$_POST["username"]}, sql {$sql}";
if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        $hashed_password = hash("sha256", $password . $row["salt"]);
        if ($hashed_password === $row["hash"]) {
            $_SESSION["error"] = null;
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["user_id"];
            die();
        } else {
            $_SESSION["error"] = "wrong_password";
        }
    }
} else {
    $_SESSION{"error"} = "username_not_found";
}
?>