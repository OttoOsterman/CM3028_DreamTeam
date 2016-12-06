<!DOCTYPE html>
<html onload="slideAuto()">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./src/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/navbar.css"/>
	<link rel="stylesheet" type="text/css" href="./src/css/general.css"/>
	<link rel="script" type="text/javascript" href="./src/javaScript/general.js"/>

</head>

<body>

<!-- navigation bar-->
		<?php include('scripts/navbar.php') ?>

<center>	
	
<div class="banner">
	<!--Main banner-->
	
	<img src="/src/images/go-portlethen.jpg" style="width:100%";/>
	
</div>


	<!--best photo of portlethen -->
	<div id="container">
		<img id="img" src="/src/imageSlider/img.jpg"/>
		
		<div id=left_holder">
			<img onClick="slide(-1)" class="left" src="/src/imageSlider/left.png"/> 
		</div>
		
		<div id="right_holder">
			<img onClick="slide(1)" class="right" src="/src/imageSlider/right.png"/>
			<div>
		</div>

</center>
</body>

</html>
