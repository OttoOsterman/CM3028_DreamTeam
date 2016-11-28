<?php
echo('
		<!DOCTYPE html>
		<head>
		<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
		</head>
		<body>
		
		<div class="flex-container">
<header>
  <h1>Clubs and Societies</h1>
</header>

<nav class="nav">
<ul>
  <li><a href="#">Football</a></li>
  <li><a href="#">Ice Hockey</a></li>
  <li><a href="#">Tennis</a></li>
</ul>
</nav>

<article class="article">
  <h1>Football</h1>
  <p>Spicy jalapeno bacon ipsum dolor amet t-bone jerky doner picanha. Spare ribs cupim tenderloin venison.
   Ground round kevin landjaeger, sausage filet mignon turducken pig salami burgdoggen alcatra chuck.
    Strip steak corned beef hamburger shoulder filet mignon brisket doner pork loin ball tip, chicken meatloaf.</p>
  <p>Meatball burgdoggen corned beef t-bone shankle bacon. 
  Burgdoggen landjaeger pork belly turducken meatloaf filet mignon ham hock boudin prosciutto. 
  Pork belly turducken chuck sirloin hamburger tenderloin. Kielbasa ham hock tri-tip alcatra rump,
   strip steak t-bone pork chop swine prosciutto ham tail. Beef sirloin shoulder, turkey prosciutto kevin brisket. 
   Biltong shankle meatloaf, jerky doner bresaola t-bone corned beef burgdoggen pork belly jowl filet mignon.
    Ball tip tri-tip meatball short loin pastrami.</p>
</article>

<footer>Copyright © DreamTeam</footer>
</div>
		
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
<link rel="stylesheet" type="text/css" href="./src/css/clubs.css"/>
<!-- TODO: Remove testing code -->
<?php include('scripts/db_connect_test.php') ?>
</head>
<body>
<?php include('scripts/navbar.php') ?>
<div id=clublist>
	<?php 
	$sql = "SELECT Club.name, Club.genre, Club.description, Photo.photo_path FROM Club INNER JOIN Photo ON Club.club_id = Photo.club_id";
	$result = $db->query($sql);
	
	while ($row = $result->fetch_array()) {
        if (isset($row['photo_path'])) {
            echo("
			<img src={$row['photo_path']}></img><h1>{$row['name']}</h1>" . $row['genre'] . $row['description']
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