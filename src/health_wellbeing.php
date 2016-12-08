<!DOCTYPE html>
<head>
	<title>Health and Wellbeing</title>
	<link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/health_wellbeing.css"/>
</head>
<body>

<?php include('scripts/navbar.php'); ?>

<div class="banner">
	<img src="/src/images/go-portlethen.jpg"/>

</div>

<div id="healthSection">
	<!--Facebook plugin-->
	<div class="fb-page" data-href="https://www.facebook.com/Sportlethen"
		 data-tabs="timeline" data-width="400" data-height="600" data-small-header="false"
		 data-adapt-container-width="true" data-hide-cover="false"
		 data-show-facepile="true">
		<blockquote cite="https://www.facebook.com/Sportlethen" class="fb-xfbml-parse-ignore">
			<a href="https://www.facebook.com/Sportlethen">Sportlethen CSH</a></blockquote>
	</div>
	<?php
	$sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id";
	$result = $db->query($sql);

	while ($row = $result->fetch_array()) {
		if (isset($row['photo_path']) && $row['is_profile_photo'] == '1') {
			echo("
            <section class='clubSection'>
                <img class='clubImage' src={$row['photo_path']}>
                <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
                <div class='clubGenre'>{$row['genre']}</div>
                <div class='clubDesc'>{$row['description']}</div>
            </section>
			");
		}
		else if (!(isset($row['photo_path']))) {
			echo("
			<section class='clubSection'>
			    <img class='clubImage' src='../src/images/placeholder.png'>
			    <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
			    <div class='clubGenre'>{$row['genre']}</div>
			    <div class='clubDesc'>{$row['description']}</div>
			</section>
            ");
		}
	}
	?>
</div>

</body>