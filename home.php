<?php
	session_start();  
	include("include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/landing.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/userside.css">
</head>
<body>
	<div class="navbar">
		<div class="logo">
			<img src="img/logo.png">
		</div>
		<a href="home.php" style="color:red;">Home</a>
		<a href="aboutus.php">About Us</a>
		<a href="carlist.php">Car Listing</a>
		<a href="contactus.php">Contact Us</a>
		<div class="profile" id="profile">
			<img src="img/person.png">
		</div>
	</div>
	<div class="background">
		<img class="car" src="img/landingback.png">
		<div class="qoute animate__animated animate__slideInLeft">
			<h2 class="text" style="color:#ff5722;">Everything you need, Nothing you dont.</h2>
			<i class="text1">Rent with a different variety of car that suits your daily living</i>
			<a class="book" href="carlist.php">Book Now <img src="img/arrow.png"></a>	
		</div>
	</div>
	<div id="dropdown">
		<a href="profile.php">Profile</a>
		<a href="uppassword.php">Update Password</a>
		<a href="userbookings.php">My Bookings</a>
		<a href="index.php">Sign Out</a>
	</div>
	<div class="right-section1">
		<h2>Follow us on Social Media</h2>
		<div>
			<img src="img/facebook.png">
			<img style="width: 72px;" src="img/googleplus.png">
			<img src="img/instagram.png">
			<img style="width: 72px;" src="img/linkedin.png">
			<img src="img/twitter.png">
		</div>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>