<?php
session_start();
?>
<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <title>Profile</title>

    <link rel="stylesheet" type="text/css" href="../src/css/profile.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
</head>
<body>

<?php include ("scripts/navbar.php"); ?>
<!--TODO: REMOVE TESTING CODE-->

<div id="clubList">

<?php include ("scripts/db_connect_test.php");

if ($_SESSION["acc_type"] == "admin") {
    $sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id;";
} else {
    $get_clubs_sql = "SELECT club_id FROM ClubMember WHERE user_id = {$_SESSION['user_id']}";
    $get_clubs_result = $db->query($get_clubs_sql);
    if ($get_clubs_result->num_rows > 0) {
        $row = $get_clubs_result->fetch_array();
        $sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id WHERE (Club.club_id = {$row['club_id']}";
        while ($row = $get_clubs_result->fetch_array()) {
            $sql = $sql . " OR Club.club_id = '{$row["club_id"]}'";
        }
        $sql = $sql . ");";
    }
}

$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        if (isset($row['photo_path']) && $row['is_profile_photo'] == '1') {
            echo("
        <section class='clubSection'>
            <img class='clubImage' src={$row['photo_path']}>
            <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
            <div class='clubGenre'>{$row['genre']}</div>
            <form action='edit_club' method='POST'>
                <input type='hidden' name='club_id' value='{$row["club_id"]}'>
                <input type='submit' class='greenButton' value='Edit Club'>
            </form>
        </section>
		");
        } else if (!(isset($row['photo_path']))) {
            echo("
		<section class='clubSection'>
		    <img class='clubImage' src='../src/images/placeholder.png'>
		    <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
		    <div class='clubGenre'>{$row['genre']}</div>
		    <form action='edit_club' method='POST'>
                <input type='hidden' name='club_id' value='{$row["club_id"]}'>
                <input type='submit' class='greenButton' value='Edit Club'>
            </form>
		</section>
       ");
        }
    }
} else {
    echo ("<h2 id='notMember'> Oops! It looks like you're not a member of any clubs yet.</h2>");
}

if ($_SESSION["acc_type"] == "admin") {
    echo ("
    <form id='clubForm' action='javascript:return add_club()'>
    <label id='clubLabel'>Club Name:   </label>
    <input type='text' id='name'>
    <br>
    <label id='genreLabel'>Club Genre:  </label>
    <input type='text' id='genre'>
    <br>
    <label id='descLabel'>Description:   </label>
    <input type='text' id='description'>
    <br>
    <label id='contactLabel'>Contact info: </label>
    <input type='text' id='contact_info'>
    <br>
    <input type='submit' class='greenButton' value='Add Club'>
    
    
    <script>
    function add_club() {
    
    }
    </script>
    ");
}
?>
</div>
</body>