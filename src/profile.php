<?php
session_start();
?>
<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
    <link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
    <link rel="script" type="text/javascript" href="./src/JavaScript/general.js"/>
</head>
<body>
<?php

include ("scripts/navbar.php");
//TODO: REMOVE TESTING CODE
include ("scripts/db_connect_test.php");

$get_clubs_sql = "SELECT club_id FROM ClubMember WHERE user_id = {$_SESSION['user_id']}";
$get_clubs_result = $db->query($get_clubs_sql);
if ($get_clubs_result->num_rows > 0) {
    echo("num rows eval'd to true");
    $row = $get_clubs_result->fetch_array();
    echo("array fetched");
    echo($row["club_id"]);
    $sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id AND (Club.club_id = {$row["club_id"]}";
    while($row = $get_clubs_result->fetch_array()) {
        $sql = $sql . " OR Club.club_id = '{$row["club_id"]}'";
    }
    $sql = $sql . ");";
    echo($sql);
    die();
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
            $result = $db->query($sql);

        } else if (!(isset($row['photo_path']))) {
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
} else {
    echo("num rows eval'd to false");
}
?>
</body>