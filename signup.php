<?php
	session_start();  
	include("include/connection.php");

	if (isset($_GET['signup'])) {
		$fname = $_GET['fname'];
		$lname = $_GET['lname'];
		$email = $_GET['email'];
		$phone = $_GET['phone'];
		$pass = $_GET['pass'];
		$password = $_GET['password'];
		$country = $_GET['country'];
		$province = $_GET['province'];
		$city = $_GET['city'];
		$houseno = $_GET['houseno'];
		$street = $_GET['street'];
		$zipcode = $_GET['zipcode'];
		$barangay = $_GET['barangay'];

		if ($pass == $password) {
			$sql_insert = "INSERT INTO tblusers(First_Name,Last_Name,Email,Password,ContactNo,house_no,street,Barangay,City,ZipCode,Province,Country) VALUES('{$fname}','{$lname}','{$email}','{$password}','{$phone}','{$houseno}','{$street}','{$barangay}','{$city}','{$zipcode}','{$province}','{$country}')";

			$conn->query($sql_insert);
			header("Location:index.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
	<img class="car" src="img/landingback.png">
	<img class="car1" src="img/car2.png">
	<div class="overlay"></div>
		<div class="box animate__animated animate__bounceIn">
		<h1 class="title">Sign Up</h1>
		<i class="remind">Sign up your information to get full access to the site.</i>
		<form method="get">
			<div class="row" style="margin-top:20px;">
				<div>
					<label>First Name</label>
					<input required placeholder="First name" class="input" type="text" name="fname">
				</div>
				<div>
					<label>Last Name</label>
					<input required placeholder="Last Name" class="input" type="text" name="lname">
				</div>
			</div>
			<div class="row">
				<div>
					<label>Phone</label>
					<input required placeholder="Phone Number" class="input" type="number" name="phone">
				</div>
			</div>
			<div class="row">
				<div>
					<label>Email</label>
					<input required placeholder="name@gmail.com" class="input" type="email" name="email">
				</div>
			</div>
			<div class="row" style="margin-bottom:10px;">
				<div>
					<label>Password</label>
					<input required placeholder="Password" class="input" type="password" name="pass">
				</div>
				<div>
					<label>Confirm Password</label>
					<input required placeholder="Confirm Password" class="input" type=password name="password">
				</div>
			</div>
			<label style="font-weight: 700;font-size: 18px;">Address</label>
			<hr style="margin-top: 5px;margin-bottom: 5px;">
			<div class="row">
				<div>
					<label>Country</label>
					<input class="input" type="text" name="country" value="Philippines" readonly>
				</div>
				<div>
					<label>Province</label>
					<select id="dpdlProvince" class="input" name="province">
						<option selected disabled>Select...</option>
						<option>Oriental Mindoro</option>
						<option>Occidental Mindoro</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div>
					<label>City</label>
					<select id="dpdlCity" class="input" name="city">
						<option selected disabled>Select...</option>
					</select>
				</div>
				<div>
					<label>Barangay</label>
					<select id="dpdlBarangay" class="input" name="barangay">
						<option selected disabled>Select...</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div>
					<label>House No.</label>
					<input placeholder="House Number" class="input" type="number" name="houseno">
				</div>
				<div>
					<label>Street</label>
					<input placeholder="Street" class="input" type="text" name="street">
				</div>
			</div>
			<div class="column">
				<label>Zip Code</label>
				<input placeholder="Zip Code" class="input" type="number" name="zipcode" maxlength="4" style="width: 30%;">
			</div>		
			<input class="input submit" type="submit" name="signup" value="Sign Up">
			<div class="bot">
				<span><p>Already have an account?</p></span>
				<span><a href="index.php">Login</a></span>
			</div>
		</form>
	</div>
	
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>