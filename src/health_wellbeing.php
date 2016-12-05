<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/general.css"/>

    <?php
    include('scripts/db_connect_test.php');
    $request_array = explode("/", $_SERVER["REQUEST_URI"]);
    $club_id = end($request_array);
    $sql = "SELECT News.news_id, News.title, News.content, News.date FROM News";
    $result = $db->query($sql);
    $row = $results->fetch_array();
    ?>
</head>
<body>

<?php include('scripts/navbar.php'); ?>

<?php
echo("
            <section class='newsSection'>
                <section class='newsTitle'>{$row['title']}</section>
                <h1 class='newsContent'>{$row['content']}</h1>
                <div class='newsDate'>{$row['date']}</div>
            </section>
			");
?>

</body>