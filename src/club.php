<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <?php
    include('scripts/db_connect_test.php');
    $request_array = explode("/", $_SERVER["REQUEST_URI"]);
    $club_id = end($request_array);
    $club_id = stripslashes($club_id);
    $club_id = mysqli_real_escape_string($db, $club_id);
    $sql = "SELECT Club.name, Club.genre, Club.description, Club.contact_info, Photo.photo_path FROM Club LEFT JOIN Photo ON Club.club_id = Photo.club_id WHERE Club.club_id = " . $club_id;
    $results = $db->query($sql);
    $row = $results->fetch_array();
    ?>
    <title>
        <?php
        if (isset($row['name'])) {
            echo("{$row['name']}");
        } else {
            echo("Not found");
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.0/build/pure.css">
    <link rel="stylesheet" type="text/css" href="https://go-portlethen.azurewebsites.net/src/css/club.css"/>
    <link rel="stylesheet" type="text/css" href="https://go-portlethen.azurewebsites.net/src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="https://go-portlethen.azurewebsites.net/src/css/general.css"/>
</head>

<body>

<?php include('scripts/navbar.php') ?>

<div id="pageWidth">

<div id="clubContainer">

    <?php
    if (isset($row["name"]) && $row["name"] !== null) {
        echo("
        <section class='clubSection'>
        ");
        if (isset($row["photo_path"]) && $row["photo_path"] !== null) {
            echo("
<img class='clubImage' src='{$row['photo_path']}'>");
        }
        echo("
        <h1 class='clubName'>{$row["name"]}</h1>
        <section class='clubGenre'>{$row["genre"]}</section>
        <section class='clubDesc'>{$row["description"]}</section>
        <section class='clubContact'>{$row["contact_info"]}</section>
        ");
        while ($row = $results->fetch_array()) {
            echo("<img class='clubImage' src='{$row['photo_path']}'>");
        }
        echo "</section>";
    } else {
        echo("<h1>Club not found</h1>");
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
</html>