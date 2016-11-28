<?php
echo('
		<!DOCTYPE html>
		<head>
		<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
		</head>
		<body>
		
');

include('scripts/navbar.php');

echo('
		</body>
		');
?>

//TODO: Fix club pages
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
	$sql = "SELECT Club.name, Club.genre, Club.description, Photo.photo_path FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id";
	$result = $db->query($sql);

    $row = $result->fetch_array();
    echo($row["name"]);
	
	while ($row = $result->fetch_array()) {
        if (isset($row['photo_path'])) {
            echo("
			<img src={$row['photo_path']}><h1 id='clubName'>{$row['name']}</h1>" . "<div id='clubGenre'>{$row['genre']}</div>"
                . "<div id='clubDesc'>{$row['description']}</div>"
            );
        }
        else {
            echo("
			<img src='images/default.jpg'><h1>{$row['name']}</h1>" . $row['genre'] . $row['description']
            );
        }
		echo("
			<img src={$row['photo_path']}></img><h1>{$row['name']}</h1>" . $row['genre'] . $row['description']
		);
	}
	?>
</div>
</body>