<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="./src/css/signup.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
</head>
<?php
include("scripts/navbar.php");
if (isset($_SESSION["username"])) {
    echo("
        <body>
        <h1>Please log out before attempting to create a new account.</h1>
        </body>
    ");
} else {
    echo("
            <form id='signup_form' action='signup' method='POST'>
                <label>Please enter an e-mail address</label>
                <input type='text' name='username' required>
                <label>Please enter a password</label>
                <input type='password' name='password' required>
                <button type='submit'>Submit</button>
            </form>
        ");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //TODO: REMOVE TESTING CODE
        include("scripts/db_connect_test.php");
        $username = $_POST["username"];
        $username = stripslashes($username);
        $username = mysqli_real_escape_string($db, $username);

		$sql = "SELECT username FROM User WHERE username = '{$username}'";
		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			echo("<h2>Sorry, this e-mail is already in use.</h2>");
		} else {
			$password = $_POST["password"];
			$salt = date('U');
			$password_hash = hash('sha256', $password . $salt);
			$sql = "INSERT INTO User (username, hash, salt, acc_type) VALUES ('{$username}', '{$password_hash}', '{$salt}', 'general_user')";
			$db->query($sql);
			echo("
				<script>
				
					document.getElementById('signup_form').style.display = 'none';
				</script>
				<h2>Your account has been successfully created, please log in.</h2>
				");
		}
    }
}
?>