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
		<a href="contactus.php">Contact Us</a>
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
	<div class="detail-box">
		<?php  
		if (isset($_GET['book'])) {
		$from = $_GET['from'];
		$to = $_GET['to'];
		$date1=date_create($from);
		$date2=date_create($to);
		$diff=date_diff($date1,$date2);
		$days = $diff->format("%R%a");
		if ($days <= 0) {
			echo "<p class='plz'>Please enter valid date.</p>";
		}
		else{
			$user_id = $_SESSION['id'];
			$stat = 0;
			$car_id = $_GET['carid'];

			$sql_insert = "INSERT INTO bookings(user_id,car_id,from_date,to_date,status) VALUES('{$user_id}','{$car_id}','{$from}','{$to}','{$stat}')";
			$conn->query($sql_insert);

			header("Location:carlist.php");	
		}
		
	}
		?>
		<?php 
			if (isset($_GET['car'])) {
				$car_id = $_GET['car'];

				$select_car = "SELECT * 
				from cars
				INNER JOIN brands ON cars.brand_id = brands.brand_id
				INNER JOIN category ON cars.category_id = category.category_id
				where cars.car_id = '{$car_id}'
				";

				$result = $conn->query($select_car);
				if ($result->num_rows>0) {
					while ($rows = $result->fetch_assoc()) {
		?>
				<div class="carinfo">
					<img class="carpic" src="img/<?php echo $rows['Image1']; ?>">
					<div class="cardetails">
						<h1><?php echo $rows['brand_name'].", ".$rows['carName']; ?></h1>
						<div style="margin-top:20px;">
							<b>Category: </b>
							<p style="margin-left:5px;"><?php echo 	$rows['category_name']; ?></p>
						</div>	
						<div class="types">
							<div class="minibox">
								<img src="img/fuel.png">
								<b><?php echo $rows['Fuel_Type'] ?></b>
								<p>Fuel Type</p>
							</div>
							<div class="minibox">
								<img src="img/seat.png">
								<b><?php echo $rows['Seats'] ?></b>
								<p>Seats</p>
							</div>
							<div class="minibox">
								<img src="img/seat.png">
								<b style="font-size:15px;"><?php echo $rows['RegDate'] ?></b>
								<p>Reg. Date</p>
							</div>
						</div>
						<div class="price">
							<b><?php echo "&#8369;"." ".number_format($rows['Price']); ?></b>
							<p>Per Day</p>
						</div>
					</div>
				</div>
				<div class="description">
					<h2>Vehicle's Description</h2>
					<textarea readonly><?php echo $rows['Description']; ?></textarea>
				</div>
				<div class="booknow">
					<h2>Book Now</h2>
					<form method="get">
						<input hidden type="number" name="carid" value="<?php echo $rows['car_id']; ?>">
						<label>From Date:</label>
						<input required type="date" name="from">
						<label>To Date:</label>
						<input type="date" name="to">
						<input required class="book" type="submit" name="book" value="Book Now">
					</form>					
				</div>
		<?php
					}
				}
			}
		?>
		
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>