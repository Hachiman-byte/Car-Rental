<?php 
	session_start();   
	include("include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/users.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/products.css">
</head>
<body>
	<h1 class="path">Admin | Update Contact Info </h1>
	<p class="path1">Admin > </i><i style="color: blue;">Update Contact Info </i></p>
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
	<div class="tablebox">
		<h2 style="font-family:'Impact';font-weight:500;font-size: 25px;">Contact Info</h2>
		<form method="get">
			<?php  
				$sql_show = "SELECT * from contactusinfo";

				$result = $conn->query($sql_show);
				while ($rows = $result->fetch_assoc()) {
			?>
				<div class="section section1">
					<label  style="margin-top: 30px;">Address</label>
					<textarea name="address"><?php echo $rows['address']; ?></textarea>
				</div>
				<div class="section section2">
					<label  style="margin-top: 20px;">Email</label>
					<input type="email" name="email" value="<?php echo $rows['email']; ?>">
				</div>
				<div class="section section3" style="margin-bottom: 8%;">
					<label  style="margin-top: 20px;">Contact Number</label>
					<input  type="number" name="contact" value="<?php echo $rows['contact_no']; ?>">
				</div>
			<?php
				}
			?>
			
			<input id="addvehicle" type="submit" name="update" value="Update"> 
		</form>		
			
	</div>
	<?php
		if (isset($_GET['update'])) {
			$address = $_GET['address'];
			$email = $_GET['email'];
			$contact = $_GET['contact'];

			$sql_update = "UPDATE contactusinfo set address = '{$address}',email = '{$email}',contact_no = '{$contact}'";

			$result = $conn->query($sql_update);
			header("Location:upcontactinfo.php");	
		}
	?>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>