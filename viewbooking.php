<?php  
	session_start();  
	include("include/connection.php");

	if (isset($_GET['confirm'])) {
		$id = $_GET['id'];
		$sql_update = "UPDATE bookings SET status = 1 where booking_id = '{$id}'";

		$conn->query($sql_update);
		header("Location:confirmbookings.php");	
	}
	if (isset($_GET['cancel'])) {
		$id = $_GET['id'];
		$sql_update = "UPDATE bookings SET status = 2 where booking_id = '{$id}'";

		$conn->query($sql_update);
		header("Location:cancelbookings.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/viewbooking.css">
</head>
<body>
	<h1 class="path">Admin | Bookings</h1>
	<p class="path1">Admin > <i style="color: blue;">Bookings</i> > <i style="color: blue;">View</i></p>
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
	<p class="book">Booking Info</p>
	<div class="bottom-right1">

		<div>
			
			<table>
				<?php
				if (isset($_GET['bookid'])) {
					$id = $_GET['bookid'];
					$sql_show = "SELECT *
					from bookings
					INNER JOIN tblusers ON bookings.user_id = tblusers.user_id
					INNER JOIN cars ON bookings.car_id = cars.car_id
					where bookings.booking_id = '{$id}'";

					$result = $conn->query($sql_show);

					if ($result->num_rows > 0) {
						while ($rows = $result->fetch_assoc()) {
				?>
					<tr>
						<th colspan="4">User Details</th>
					</tr>
					<tr>
						<td class="label">Name</td>
						<td><?php echo $rows['First_Name']." ".$rows['Last_Name']; ?></td>
						<td class="label">Email</td>
						<td><?php echo $rows['Email']; ?></td>
					</tr>
					<tr>
						<td class="label">Address</td>
						<td><?php echo $rows['house_no'].", ".$rows['street'].", ".$rows['Barangay'].", ".$rows['City'].", ".$rows['ZipCode']; ?></td>
						<td class="label">Province</td>
						<td><?php echo $rows['Province']; ?></td>
					</tr>
					<tr>
						<td class="label">Country</td>
						<td colspan="3"><?php echo $rows['Country']; ?></td>
					</tr>
					<tr>
						<th colspan="4">Booking Details</th>
					</tr>
					<tr>
						<td class="label">Vehicle Name</td>
						<td><?php echo $rows['carName']; ?></td>
						<td class="label">Booking Date</td>
						<td><?php echo $rows['postingdate']; ?></td>
					</tr>
					<tr>
						<td class="label">From Date</td>
						<td><?php echo $rows['from_date']; ?></td>
						<td class="label">To Date</td>
						<td><?php echo $rows['to_date']; ?></td>
					</tr>
					<tr>
						<td class="label">Total Days</td>
						<td><?php
							$date1=date_create($rows['from_date']);
							$date2=date_create($rows['to_date']);
							$diff=date_diff($date1,$date2);
							echo $diff->format("%a");

						?></td>
						<td class="label">Rent Per Day</td>
						<td><?php echo "&#8369; ".number_format($rows['Price']); ?></td>
					</tr>
					<tr>
						<td colspan="3" class="label">Grand Total</td>
						<td><?php  
							$date1=date_create($rows['from_date']);
							$date2=date_create($rows['to_date']);
							$diff=date_diff($date1,$date2);
							$sum = $diff->format("%a") * $rows['Price'];

							echo "&#8369; ".number_format($sum);
						?></td>
					</tr>
					<tr>
						<td class="label" colspan="3">Booking Status</td>
						<td><?php  
							if ($rows['status'] == 0) {
								echo "Not Confirmed Yet";
							}
							else if ($rows['status'] == 1) {
								echo "Confirmed";
							}
							else if ($rows['status'] == 2) {
								echo "Cancelled";
							}
						?></td>
					</tr>
					<?php  
						if ($rows['status'] == 0) {
					?>
						<tr>
							<td colspan="4">
								<form method="get">
									<input type="number" hidden name="id" value="<?php echo $rows['booking_id']; ?>">
									<input class="inputs input1" type="submit" name="confirm" value="Confirm Booking">
									<input class="inputs input2" type="submit" name="cancel" value="Cancel Booking">
								</form>
							</td>
						</tr>
					<?php
								}
			
							}
						}
					}
				?>
			</table>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>