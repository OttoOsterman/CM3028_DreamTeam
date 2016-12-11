<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <title>Clubs and Societies</title>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/clubs_societies.css"/>
    <!-- TODO: Remove testing code -->
    <?php include('scripts/db_connect_test.php') ?>
</head>
<body>

<?php include('scripts/navbar.php') ?>

<div class="pageWidth">
    <!-- logo -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <img id ="banner" src="/src/images/go-portlethen.jpg" ;/>

<!--Facebook include script -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=985300261517338";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!--Contains a list of all clubs w/ an associated profile photo -->
<div id="clubList">
    <!--Facebook plugin-->
    <div class="fb-page" data-href="https://www.facebook.com/Sportlethen" data-tabs="timeline" data-width="500"
         data-height="1000" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false"
         data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/Sportlethen" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/Sportlethen">Sportlethen CSH</a></blockquote>
    </div>
</div>

<div id="clubContainer">

    <?php
    $sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id";
    $result = $db->query($sql);

    while ($row = $result->fetch_array()) {
        if (isset($row['photo_path']) && $row['is_profile_photo'] == '1') {
            echo("
            <section class='clubSection'>
                <img class='clubImage' src={$row['photo_path']}>
                <div class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></div>
                <div class='clubGenre'>{$row['genre']}</div>
                ");

            

                echo("
                <div class='img-wrapper'></div>
                <div class='clubDesc'>{$row['description']}</div>
            </section>
			");
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
    ?>
</div>
</div>
</body>