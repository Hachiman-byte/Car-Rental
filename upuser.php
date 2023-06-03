<?php  
	session_start();  
	include("include/connection.php");

	if (isset($_GET['update'])) {
		$user_id = $_GET['userid'];
		$fname = $_GET['fname'];
		$lname = $_GET['lname'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		$country = $_GET['country'];
		$province = $_GET['province'];
		$city = $_GET['city'];
		$barangay = $_GET['barangay'];
		$houseno = $_GET['houseno'];
		$street = $_GET['street'];
		$zipcode = $_GET['zipcode'];

		$sql_update = "UPDATE tblusers set First_Name = '{$fname}',Last_Name = '{$lname}',ContactNo = '{$phone}',house_no = '{$houseno}',street = '{$street}',Barangay = '{$barangay}',City = '{$city}',ZipCode = '{$zipcode}',Province = '{$province}',Country = '{$country}' where user_id = '{$user_id}'";

		$conn->query($sql_update);
		header("Location:users.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/users.css">
</head>
<body>
	<h1 class="path">Admin | Manage Users</h1>
	<p class="path1">Admin > <i style="color: blue;">Manage Users</i><i> > </i><i style="color: blue;">Edit</i></p>
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
		<h2 style="margin-bottom:30px;font-family:'Impact';font-weight:500;font-size: 25px;">Edit User</h2>
			<form method="get">
			<?php  
				if (isset($_GET['edit'])) {
					$user_id = $_GET['edit'];
					$sql_show = "SELECT * FROM tblusers where user_id = '{$user_id}'";

					$result = $conn->query($sql_show);
					if ($result->num_rows>0) {
						while ($rows = $result->fetch_assoc()) {
			?>
						<div class="row">
							<div class="column">
								<label>First Name</label>
								<input class="vehicleinfo" value="<?php echo $rows['First_Name']; ?>" type="text" name="fname">
							</div>
							<div class="column">
								<label>Last Name</label>
								<input class="vehicleinfo" value="<?php echo $rows['Last_Name']; ?>" type="text" name="lname">
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label>Phone</label>
								<input class="vehicleinfo" value="<?php echo $rows['ContactNo']; ?>" type="number" name="phone">
							</div>
							<div class="column">
								<label>Email</label>
								<input class="vehicleinfo" value="<?php echo $rows['Email']; ?>" type="text" name="email">
							</div>
						</div>
						<h2 style="font-family:sans-serif;">Address</h2>
						<hr style="margin-bottom:7px;">
						<div class="row">
							<div class="column">
								<label>Country</label>
								<input readonly  class="vehicleinfo" value="<?php echo $rows['Country']; ?>" type="text" name="country">
							</div>
							<div class="column">
								<label>Province</label>
								<input class="vehicleinfo" value="<?php echo $rows['Province']; ?>" type="text" name="province">
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label>City</label>
								<input class="vehicleinfo" value="<?php echo $rows['City']; ?>" type="text" name="city">
							</div>
							<div class="column">
								<label>Barangay</label>
								<input class="vehicleinfo" value="<?php echo $rows['Barangay']; ?>" type="text" name="barangay">
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label>House No.</label>
								<input class="vehicleinfo" value="<?php echo $rows['house_no']; ?>" type="number" name="houseno">
							</div>
							<div class="column">
								<label>Street</label>
								<input class="vehicleinfo" value="<?php echo $rows['street']; ?>" type="text" name="street">
							</div>
						</div>
						<div class="row">
							<div class="column">
								<label>Zip Code</label>
								<input class="vehicleinfo" value="<?php echo $rows['ZipCode']; ?>" type="number" name="zipcode">
							</div>
						</div>
						<input hidden type="number" name="userid" value="<?php echo $rows['user_id']; ?>">
			<?php
						}
					}
				}
			?>		

				<input id="addvehicle" type="submit" name="update" value="Update">
			</form>
			
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>