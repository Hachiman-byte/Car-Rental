<?php 
	session_start();   
	include("include/connection.php");

	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		$sql_delete = "DELETE from products where id = '{$id}'";
		$conn->query($sql_delete);
	}
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
	<h1 class="path">Admin | Manage Vehicles</h1>
	<p class="path1">Admin > <i style="color: blue;">Manage Vehicles</i> </p>
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
		<button class="add"><a style="text-decoration: none;color: white;"  href="addvehicle.php">+New</a></button>
		<table>
				<tr style="border-bottom: 3px solid silver;font-family: 'Raleway', sans-serif;">
					<th>Vehicle Title</th>
					<th>Brand</th>
					<th>Price Per Day</th>
					<th>Fuel Type</th>
					<th>Seats</th>
					<th>Tools</th>
				</tr>
				<?php  
					$sql_show = "SELECT
					cars.car_id,
					cars.carName,
					FORMAT(cars.Price,0) as price,
					cars.Fuel_Type,
					cars.Seats,
					brands.brand_name
					from cars
					INNER JOIN brands
					ON cars.brand_id = brands.brand_id";
					$result = $conn->query($sql_show);

					if ($result->num_rows>0) {
						while ($rows = $result->fetch_assoc()) {
				?>
						<tr>
							<td><?php echo $rows['carName']; ?></td>
							<td style="text-align: center;"><?php echo $rows['brand_name']; ?></td>		
							<td style="text-align: center;"><?php echo "&#8369; ".$rows['price']; ?></td>
							<td style="text-align: center;"><?php echo $rows['Fuel_Type']; ?></td>
							<td style="text-align: center;"><?php echo $rows['Seats']; ?></td>
							<td style="text-align: center;">
								<form method="get">
									<a class="edit" href="editvehicle.php?edit=<?php echo $rows['car_id']; ?>">Edit</a>
									<a class="delete" href="users.php?del=<?php echo $rows['car_id']; ?>">Delete<a/>
								</form>
							</td>
						</tr>
				<?php
						}
					}
				?>
		</table>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>