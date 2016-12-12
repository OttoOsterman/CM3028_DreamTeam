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
            <form class='pure-form pure-form-stacked' id='signup_form' action='signup' method='POST'>
                <label for='username'>Email</label>
                <input class='text-box inputStyle' placeholder='Please enter an email address' type='text' id='username' required>
                <label for='password'>Please enter a password</label>
                <input class='text-box inputStyle' placeholder='Please enter a password' type='password' id='password' required>
                <button class='pure-button greenButton' type='submit'>Submit</button>
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

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
	window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

