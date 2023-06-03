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
		<a href="userbookings.php" style="color:red;">My Bookings</a>
		<a href="index.php">Sign Out</a>
	</div>
	<div class="bookingbox bookingbox1">
		<?php  
			if (isset($_GET['pay'])) {
				$booking_id = $_GET['pay'];
				$sql_show = "SELECT *
				from bookings
				INNER JOIN tblusers ON bookings.user_id = tblusers.user_id
				INNER JOIN cars ON bookings.car_id = cars.car_id
				INNER JOIN brands ON cars.brand_id = brands.brand_id
				where bookings.booking_id = '{$booking_id}'";

				$result = $conn->query($sql_show);
				while ($rows = $result->fetch_assoc()) {
		?>
		<div class="bookingcards ">
			<div class="bookingcards">
				<div style="display:flex;">
					<img src="img/<?php echo $rows['Image1']; ?>">
					<div class="carddetails">
						<b><?php echo $rows['brand_name'].", ".$rows['carName']; ?></b>
						<p class="details"><b class="details">From: </b> <?php echo $rows['from_date']; ?>  <b class="details">To: </b> <?php echo $rows['to_date']; ?></p>
					</div>
				</div>
			</div>
			<h2>Invoice</h2>
			<table>
				<tr>
					<th>Vehicle Name</th>
					<th>From Date</th>
					<th>To Date</th>
					<th>Total Days</th>
					<th>Rent / Day</th>
				</tr>
				<tr>
					<td>
						<?php echo $rows['carName'].', ',$rows['brand_name']; ?>
					</td>
					<td style="font-size:14px;width:150px;">
						<?php echo $rows['from_date']; ?>
					</td>
					<td style="font-size:14px;width:150px;">
						<?php echo $rows['to_date']; ?>
					</td>
					<td>
						<?php  
							$date1=date_create($rows['from_date']);
							$date2=date_create($rows['to_date']);
							$diff=date_diff($date1,$date2);
							echo $diff->format("%a");
						?>
					</td>
					<td style="width:150px;">
						<?php echo "&#8369; ".number_format($rows['Price']); ?>
					</td>	
				</tr>
				<tr>
					<td style="font-weight: 700;" colspan="4">Grand Total</td>
					<td style="font-weight: 700;" ><?php  
							$date1=date_create($rows['from_date']);
							$date2=date_create($rows['to_date']);
							$diff=date_diff($date1,$date2);
							$sum = $diff->format("%a") * $rows['Price'];

							echo "&#8369; ".number_format($sum);
					?></td>
				</tr>
			</table>
		</div>
		<?php
				}
			}
		?>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>