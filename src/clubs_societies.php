<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <!--Page title-->
    <title>Clubs and Societies</title>
    <!--link navbar, general and clubs and societies CSS to the page-->
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.0/build/pure.css">
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/clubs_societies.css"/>
    <!-- TODO: Remove testing code -->
    <!--Link to database-->
    <?php include('scripts/db_connect_test.php') ?>
</head>
<body>

<!--Link navbar PHP-->
<?php include('scripts/navbar.php') ?>

<!--Set page width-->
<div class="pageWidth">
    <!-- logo -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <img id ="banner" src="/src/images/go-portlethen.jpg"/>

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
    <div class="fb-page" data-href="https://www.facebook.com/Sportlethen" data-tabs="timeline" data-width="700"
         data-height="1000" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false"
         data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/Sportlethen" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/Sportlethen">Sportlethen CSH</a></blockquote>
    </div>
</div>

    <!--Container including clubs-->
<div id="clubContainer">
    <?php
    $sql = "SELECT Club.club_id, Club.name, Club.genre, Club.description, Photo.photo_path, Photo.is_profile_photo FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id";
    $result = $db->query($sql);

    while ($row = $result->fetch_array()) {
        /*If the club has a profile photo, do this*/
        if (isset($row['photo_path']) && $row['is_profile_photo'] == '1') {
            echo("
            <!--Create an individual section for each club-->
                <section class='clubSection'>
                <div class='clubGenre'>{$row['genre']}</div>
                <img class='clubImage' src={$row['photo_path']}>
                <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
                <div class='clubDesc'>{$row['description']}</div>
            </section>
			");
            /*If the club does not a have a profile photo, do this (use a placeholder image)*/
        } else if (!(isset($row['photo_path']))) {
            echo("
            <!--Create an individual section for each club-->
			<section class='clubSection'>
			    <div class='clubGenre'>{$row['genre']}</div>
			    <img class='clubImage' src='../src/images/placeholder.png'>
			    <h1 class='clubName'><a href='club/{$row['club_id']}'>{$row['name']}</a></h1>
			    <div class='clubDesc'>{$row['description']}</div>
			</section>
            ");
        }
    }
    ?>
</div>
</div>
<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

</body> 