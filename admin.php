<?php
	session_start();  
	include("include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1 class="path">Admin | Dashboard</h1>
	<p class="path1">Admin > <i style="color: blue;">Dashboard</i></p>
	<div class="top-left">
		<img src="img/logo.png">
	</div>
	<div class="top-right">
		<h2>Car Rental System</h2>
		<button href class="dropdown">
			<img src="img/user.jpg" class="icon">
			Admin
			<img src="img/dropdown.png" class="down">
		</button>
		<div class="options">
				<img src="img/password.png" style="top: 12%;left: 7%;">
				<a href="changepass.php" style="top: 2%;left: 25%;">Change Password</a>
				<img src="img/power.png" style="top: 56%;left: 6%;">
				<a href="adminlogin.php" style="top: 48%;left: 25%;">Log Out</a>
		</div>
	</div>
	<div class="bottom-left">
		<span style="font-family: 'Arial',sans-serif;font-size: 14px;position: absolute;top: 3%;
		left: 11%;color: #a7a4a4;">MAIN NAVIGATION</span>
		<div class="images" style="margin-top: 61px;border-top: 1px solid silver;">
			<span><img src="img/home.png"></span>
			<span class="secspan"><a class="navbtn" href="admin.php" >Dashboard</a></span>
		</div>
		<div class="images">
			<span><img src="img/person.png"></span>
			<span class="secspan"><a class="navbtn" href="manageadmin.php" >Manage Admin</a></span>
		</div>
		<div class="images">
			<span><img src="img/person.png"></span>
			<span class="secspan"><a class="navbtn" href="users.php" >Manage Users</a></span>
		</div>
		<div class="images">
			<span><img src="img/add.png"></span>
			<span class="secspan"><a class="navbtn" href="category.php" >Category</a></span>
		</div>
		<div class="images">
			<span><img src="img/brand.png"></span>
			<span class="secspan"><a class="navbtn" href="brand.php" >Brands</a></span>
		</div>
		<div class="images">
			<span><img src="img/vehicle.png"></span>
			<span class="secspan"><button id="vehicle" class="navbtn" href="vehicle.php" >Vehicles</button></span>
			<span class="arrowcase1"><div class="arrow1"></div></span>
		</div>
		<div class="subnav" id="vehiclenav">
			<div>
				<a href="addvehicle.php">Add new vehicle</a>
			</div>
			<div>
				<a href="vehicle.php">Manage Vehicles</a>
			</div>		
		</div>
		<div class="images">
			<span><img src="img/booking.png"></span>
			<span class="secspan"><button id="bookings" class="navbtn" href="#" >Bookings</button></span>
			<span class="arrowcase2"><div class="arrow2"></div></span>
		</div>
		<div class="subnav" id="booknav">
			<div>
				<a href="newbookings.php">New</a>
			</div>
			<div>
				<a href="confirmbookings.php">Confirmed</a>
			</div>
			<div>
				<a href="cancelbookings.php">Canceled</a>
			</div>			
		</div>
		<div class="images">
			<span><img src="img/message.png"></span>
			<span class="secspan"><a class="navbtn" href="contactqueries.php" >Manage Contact Queries</a></span>
		</div>
		<div class="images">
			<span><img src="img/contactinfo.png"></span>
			<span class="secspan"><a class="navbtn" href="upcontactinfo.php" >Update Contact Info</a></span>
		</div>
		<div class="images">
			<span><img src="img/history.png"></span>
			<span class="secspan"><a class="navbtn" href="transaction.php" >Transaction History</a></span>
		</div>
	</div>
	<div class="bottom-right">
		<div class="box box1">
			<h1><?php 
				$sql1 = "SELECT * from tblusers";
				$result1 = $conn->query($sql1);
				echo $result1->num_rows;
			?></h1>
			<p>Registered Users</p>
			<a href="users.php">[Manage Users]</a>
		</div>
		<div class="box box2">
			<h1><?php 
				$sql1 = "SELECT * from cars";
				$result1 = $conn->query($sql1);
				echo $result1->num_rows;
			?>
			</h1>
			<p>Listed Vehicles</p>
			<a href="vehicle.php">[Manage Vehicles]</a>
		</div>
		<div class="box box3">
			<h1><?php 
				$sql1 = "SELECT * from bookings";
				$result1 = $conn->query($sql1);
				echo $result1->num_rows;
			?>
			</h1>
			<p>Total Bookings</p>
			<a href="newbookings.php">[Manage Bookings]</a>
		</div>
		<div class="box box4">
			<h1><?php 
				$sql1 = "SELECT * from contactus";
				$result1 = $conn->query($sql1);
				echo $result1->num_rows;
			?>
			</h1>
			<p>Message Queries</p>
			<a href="contactqueries.php">[Manage Messages]</a>
		</div>
		<div class="box box5">
			<h1><?php 
				$sql1 = "SELECT * from brands";
				$result1 = $conn->query($sql1);
				echo $result1->num_rows;
			?>
			</h1>
			<p>Listed Brands</p>
			<a href="brand.php">[Manage Brands]</a>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>