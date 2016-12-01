<!DOCTYPE html>
<head>
<title>Clubs</title>
<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
<link rel="stylesheet" type="text/css" href="./src/css/clubs_societies.css"/>
<!-- TODO: Remove testing code -->
<?php include('scripts/db_connect_test.php') ?>
</head>
<body>
<?php include('scripts/navbar.php') ?>
<div id=clublist>
	<?php
	$sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id";
	$result = $db->query($sql);

	while ($row = $result->fetch_array()) {
        if (isset($row['photo_path'])) {
            echo("
			<img src={$row['photo_path']}><h1 id='clubName'><a href='club?club_id={$row['club_id']}'>{$row['name']}</a></h1><div id='clubGenre'>{$row['genre']}</div><div id='clubDesc'>{$row['description']}</div>
			");
        }
        else {
            echo("
			<section id='clubSection'><img id='clubImage' src='images/default.jpg'><h1 id='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1><div id='clubGenre'>{$row['genre']}</div><div id='clubDesc'>{$row['description']}</div></section>
            ");
        }
	}
	?>
</div>
</body>