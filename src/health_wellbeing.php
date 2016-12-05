<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="../src/css/general.css"/>

    <?php include('scripts/db_connect_test.php') ?>
</head>
<body>

<?php include('scripts/navbar.php'); ?>

<?php
$sql = "SELECT News.news_id, news.title, Nesw.content, news.date FROM News";
$result = $db->query($sql);

echo("
            <section class='newsSection'>
                <img class='newsTitle' src={$row['title']}>
                <h1 class='newsContent'>{$row['content']}</h1>
                <div class='newsDate'>{$row['date']}</div>
            </section>
			");
?>

</body>