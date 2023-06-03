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
	<div class="bookingbox" style="display:<?php echo (isset($_GET['sort']))? 'none;':''; ?>">
		<h2 class="bookingtitle">My Bookings</h2>
		<h3>All</h3>
		<?php
			$user_id = $_SESSION['id'];   
			$sql_show = "SELECT *
				from bookings
				INNER JOIN tblusers ON bookings.user_id = tblusers.user_id
				INNER JOIN cars ON bookings.car_id = cars.car_id
				INNER JOIN brands ON cars.brand_id = brands.brand_id
				where bookings.user_id = '{$user_id}' 
				ORDER BY bookings.booking_id DESC";
			$result = $conn->query($sql_show);
			if ($result->num_rows == 0) {
				echo "<p>No recorded bookings yet.</p>";
			}
			else{
				while ($rows = $result->fetch_assoc()) {
		?>
			<div class="bookingcards">
				<div style="display:flex;">
					<img src="img/<?php echo $rows['Image1']; ?>">
					<div class="carddetails">
						<b><?php echo $rows['brand_name'].", ".$rows['carName']; ?></b>
						<p class="details"><b class="details">From: </b> <?php echo $rows['from_date']; ?>  <b class="details">To: </b> <?php echo $rows['to_date']; ?></p>
					<?php  
						if ($rows['status'] == 1) {
							echo "<p class='indication' style='background-color:#008000a1;'>Confirmed</p>";
						}
						else if ($rows['status'] == 0) {
							echo "<p class='indication' style='background-color:#ffa5009e;'>Not Confirmed Yet</p>";
						}
						else if ($rows['status'] == 2) {
							echo "<p class='indication' style='background-color:#ff0000a3;'>Cancelled</p>";
						}
					?>
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
			<?php  
				if ($rows['status'] == 1) {
			?>
			<a class='pay' href='pay.php?pay=<?php echo $rows['booking_id']; ?>'>Pay</a>
			<?php
				}
				
			?>
			<hr style="border:2px solid black;">
		<?php
				}
			}
		?>
	</div>
	<?php  
		if (isset($_GET['sort'])) {
			$status1 = $_GET['status'];
	?>
	<div class="bookingbox">
		<h2 class="bookingtitle">My Bookings</h2>
		<h3><?php
				if ($status1 == 0) {
					echo "Not Confirmed Yet";
				}
				else if ($status1 == 1) {
					echo "Confirmed";
				}
				else{
					echo "Cancelled";
				}
			?></h3>
		<?php

		?>
		<?php
			$status = $_GET['status'];
			$user_id = $_SESSION['id'];   
			$sql_show = "SELECT *
				from bookings
				INNER JOIN tblusers ON bookings.user_id = tblusers.user_id
				INNER JOIN cars ON bookings.car_id = cars.car_id
				INNER JOIN brands ON cars.brand_id = brands.brand_id
				where bookings.user_id = '{$user_id}' AND bookings.status = '{$status}'
				ORDER BY bookings.booking_id DESC";
			$result = $conn->query($sql_show);
			if ($result->num_rows == 0) {
				echo "<p>No records yet.</p>";
			}
			else{
				while ($rows = $result->fetch_assoc()) {
		?>
			<div class="bookingcards">
				<div style="display:flex;">
					<img src="img/<?php echo $rows['Image1']; ?>">
					<div class="carddetails">
						<b><?php echo $rows['brand_name'].", ".$rows['carName']; ?></b>
						<p class="details"><b class="details">From: </b> <?php echo $rows['from_date']; ?>  <b class="details">To: </b> <?php echo $rows['to_date']; ?></p>
					<?php  
						if ($rows['status'] == 1) {
							echo "<p class='indication' style='background-color:#008000a1;'>Confirmed</p>";
						}
						else if ($rows['status'] == 0) {
							echo "<p class='indication' style='background-color:#ffa5009e;'>Not Confirmed Yet</p>";
						}
						else if ($rows['status'] == 2) {
							echo "<p class='indication' style='background-color:#ff0000a3;'>Cancelled</p>";
						}
					?>
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
			<?php  
				if ($rows['status'] == 1) {
			?>
			<a class='pay' href='pay.php?pay=<?php echo $rows['booking_id']; ?>'>Pay</a>
			<?php
				}
				
			?>
			<hr style="border:2px solid black;">
		<?php
				}
			}
		?>
	</div>	
	<?php
		}
	?>
	<div class="right">
		<div class="filter">
			<h2>Filter By</h2>
			<div class="select">
				<form method="get">
					<select name="status">
						<option selected disabled>Sort...</option>
						<option value="1">Confirmed</option>
						<option value="2">Cancelled</option>
						<option value="0">Not Confirmed yet</option>
					</select>
					<input class="btn" type="submit" name="sort" value="Sort">
					<a style="width:91%;background-color: #ed7853;" class="btn" href="userbookings.php">Refresh</a>
				</form>
			</div>
		</div>
		<div class="right-section">
			<h2>Follow us on Social Media</h2>
			<div>
				<img src="img/facebook.png">
				<img style="width: 72px;" src="img/googleplus.png">
				<img src="img/instagram.png">
				<img style="width: 72px;" src="img/linkedin.png">
				<img src="img/twitter.png">
			</div>
		</div>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>