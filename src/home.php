<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo($_SERVER['REQUEST_URI']); ?>/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
</head>

<body>
	<div id="navbar">
		<?php include('scripts/navbar.php') ?>
	</div>
	<div id="welcome">
		<h1>
			Welcome to Go Portlethen
		</h1>
	</div>
</body>
</html>