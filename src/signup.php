<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="./src/css/signup.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
</head>
<?php
include("navbar.php");
if (isset($_SESSION["username"])) {
    echo("
        <body>
        <h1>Please log out before attempting to create a new account.</h1>
        </body>
    ");
} else {
    echo("
            <form action='signup'>
                <label>Please enter an e-mail address</label>
                <input type='text' id='username' required>
                <label>Please enter a new password</label>
                <input type='password' id='password' required>
                <button type='submit'>Submit</button>
            </form>
        ");
    if($POST) {
		echo("Working");
        //TODO: REMOVE TESTING CODE
        include("db_connect_test.php");
        $username = $_POST["username"];
        $username = stripslashes($username);
        $username = mysqli_real_escape_string($username);

        $getusername = $db->prepare("SELECT username FROM User WHERE username = ?");
        $getusername->bind_param("s", $username);
        $getusername->execute();
        $getusername->bind_result($result);
        $getusername->fetch();

        echo("Result is " . $result);
    }
}
?>