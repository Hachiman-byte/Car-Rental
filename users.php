<?php 
	session_start();   
	include("include/connection.php");

	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		$sql_delete = "DELETE from tblusers where user_id = '{$id}'";
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
</head>
<body>
	<h1 class="path">Admin | Manage Users</h1>
	<p class="path1">Admin > <i style="color: blue;">Manage Users</i> </p>
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
		<button class="add">+New</button>
		<table>
				<tr style="border-bottom: 3px solid silver;font-family: 'Raleway', sans-serif;">
					<th>Full Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Full Address</th>
					<th>Date Added</th>
					<th>Tools</th>
				</tr>
				<?php  
					$sql_show = "SELECT * from tblusers order by user_id desc";
					$result = $conn->query($sql_show);

					if ($result->num_rows > 0) {
						while ($rows = $result->fetch_assoc()) {
				?>
					<tr>
						<td><?php echo $rows['First_Name']." ".$rows['Last_Name']; ?></td>
						<td><?php echo $rows['Email']; ?></td>
						<td><?php echo $rows['ContactNo']; ?></td>
						<?php  
							if ($rows['house_no'] == '') {
						?>
							<td><?php echo $rows['street'].", ".$rows['Barangay'].", ".$rows['City'].", ".$rows['Province'].", ".$rows['Country']; ?></td>
						<?php		
							}
							else if($rows['street'] == ''){
						?>
							<td><?php echo $rows['house_no'].", ".$rows['Barangay'].", ".$rows['City'].", ".$rows['Province'].", ".$rows['Country']; ?></td>
						<?php		
							}
							else if($rows['house_no'] == '' && $rows['street'] == ''){
						?>
							<td><?php echo $rows['Barangay'].", ".$rows['City'].", ".$rows['Province'].", ".$rows['Country']; ?></td>
						<?php
							}
							else{
						?>
							<td><?php echo $rows['house_no'].", ". $rows['street'].", ".$rows['Barangay'].", ".$rows['City'].", ".$rows['Province'].", ".$rows['Country']; ?></td>
						<?php
							}
						?>
						
						<td><?php echo $rows['RegDate']; ?></td>
						<td style="text-align: center;">
							<form method="get">
								<a class="edit" href="upuser.php?edit=<?php echo $rows['user_id']; ?>">Edit</a>
								<a class="delete" href="users.php?del=<?php echo $rows['user_id']; ?>">Delete<a/>
							</form>
						</td>
					</tr>
				<?php
						}
					}
				?>
		</table>
	</div>
	<?php
		if (isset($_GET['add'])) {
		 	$fname = $_GET['fname'];
		 	$lname = $_GET['lname'];
		 	$email = $_GET['email'];
		 	$pass = $_GET['pass'];
		 	$houseno = $_GET['houseno'];
		 	$street = $_GET['street'];
		 	$barangay = $_GET['barangay'];
		 	$city = $_GET['city'];
		 	$province = $_GET['province'];
		 	$country = $_GET['country'];
		 	$date = date('y-m-d');
		 	$phone = $_GET['phone'];
		 	$zip = $_GET['zip'];

		 	$sql_insert = "INSERT INTO tblusers(First_Name,Last_Name,Email,Password,ContactNo,house_no,street,Barangay,City,Province,Country,RegDate,ZipCode) VALUES('{$fname}','{$lname}','{$email}','{$pass}','{$phone}','{$houseno}','{$street}','{$barangay}','{$city}','{$province}','{$country}','{$date}','{$zip}')";

		 	$conn->query($sql_insert);
		 	header("Location:users.php");
		 	
		 } 
	?>
	<div class="overlay1 hide">
		<div class="box1 animate__animated animate__bounceIn">
			<h3>Add New User</h3>
			<form method="get">
				<label class="top">First Name</label>
				<input placeholder="First Name"  required class="input1 top" type="text" name="fname">
				<br>
				<label>Last Name</label>
				<input placeholder="Last Name" required class="input1" type="text" name="lname">
				<br>
				<label>Email</label>
				<input placeholder="Email" required class="input1" type="email" name="email">
				<br>
				<label>Password</label>
				<input placeholder="Password" required class="input1" type="password" name="pass">
				<br>
				<label>Country</label>
				<input class="input1" type="text" name="country" value="Philippines" readonly="">
				<br>
				<label>Province</label>
				<select id="dpdlProvince" class="input1" name="province" required>
					<option selected disabled>Select...</option>
					<option>Oriental Mindoro</option>
					<option>Occidental Mindoro</option>
				</select>
				<br>
				<label>City</label>
				<select id="dpdlCity" class="input1" id="mySelect" name="city" required>
					<option selected disabled>Select...</option>
				</select>
				<br>
				<label>Barangay</label>
				<select id="dpdlBarangay" name="barangay" class="input1" required>
					<option selected disabled>Select..</option>
				</select>
				<br>
				<label>Street</label>
				<input placeholder="Street" class="input1" type="text" name="street">
				<br>
				<label>House No</label>
				<input placeholder="House Number" class="input1" type="number" name="houseno">
				<br>
				<label>Zip Code</label>
				<input placeholder="Zip Code" class="input1" type="number" name="zip" required>
				<br>					
				<label>Contact No.</label>
				<input placeholder="Phone" class="input1" type="number" name="phone" max="99999999999" required>
				<br>
				<input class="add" type="submit" name="add" value="ADD">
			</form>
			<button class="close1">Close</button>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/main.js"></script>
</body>
</html>