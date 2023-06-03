<?php
	session_start();  
	include("include/connection.php");
	if (isset($_GET['send'])) {
		$user_id = $_SESSION['id'];
		$stat = 0;
		$message = $_GET['message'];

		$sql_insert = "INSERT INTO contactus(user_id,message,status) VALUES('{$user_id}','{$message}','{$stat}')";
		$conn->query($sql_insert);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/userside.css">
</head>
<body>
	<div class="navbar">
		<div class="logo">
			<img src="img/logo.png">
		</div>
		<a href="home.php" >Home</a>
		<a href="aboutus.php" >About Us</a>
		<a href="carlist.php" >Car Listing</a>
		<a href="contactus.php" style="color:red;">Contact Us</a>
		<div class="profile" id="profile">
			<img src="img/person.png">
		</div>
	</div>
	<div id="dropdown">
		<a href="profile.php">Profile</a>
		<a href="uppassword.php">Update Password</a>
		<a href="userbookings.php">My Bookings</a>
		<a href="index.php">Sign Out</a>
	</div>
	<h1 id="contact-us">Contact Us</h1>
	<h2 id="gtnt" class="animate__animated animate__slideInLeft">Get in touch using the form below</h2>
	<form class="contactbox animate__animated animate__slideInLeft" method="get">
		<label>Message</label>
		<textarea required name="message" class="message"></textarea>
		<input type="submit" name="send" value="Send Message">
	</form>
	<div class="contact-info animate__animated animate__slideInRight">
		<h2>Contact Info</h2>
		<?php  
			$sql_show = "SELECT * from contactusinfo";

			$result = $conn->query($sql_show);
			while ($rows = $result->fetch_assoc()) {
		?>
			<div>
				<img style="width:25px;height:33px;" src="img/locate.png">
				<i><?php echo $rows['address']; ?></i>
			</div>
			<div>
				<img style="width:35px;height:37px;" src="img/email.png">
				<i><?php echo $rows['email']; ?></i>
			</div>
			<div>
				<img style="width:36px;height:33px;" src="img/phone.png">
				<i><?php echo $rows['contact_no']; ?></i>
			</div>
		<?php
			}
		?>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>