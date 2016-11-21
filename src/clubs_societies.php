<!DOCTYPE html>
<head>
<title>Clubs</title>
<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
<link rel="stylesheet" type="text/css" href="./src/css/clubs.css"/>
<!-- TODO: Remove testing code -->
<?php include('scripts/db_connect_test.php') ?>
</head>
<body>
<?php include('scripts/navbar.php') ?>
<div id=clublist>
	<?php 
	$sql = "SELECT Club.name, Club.genre, Club.description, Photo.photo_path FROM Club INNER JOIN Photo ON Club.club_id = Photo.club_id";
	$result = $db->query($sql);
	
	while ($row = $result->fetch_array()) {
		echo("
			<img src={$row['photo_path']}></img><h1>{$row['name']}</h1>" . $row['genre'] . $row['description']
		);
	}
	?>
</div>
</body>