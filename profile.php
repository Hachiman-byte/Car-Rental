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
		<a href="profile.php" style="color:red;">Profile</a>
		<a href="uppassword.php">Update Password</a>
		<a href="userbookings.php">My Bookings</a>
		<a href="index.php">Sign Out</a>
	</div>
	<div class="profile-box">
		<form method="get">
		<h2 style="margin-bottom:40px;color: red;">Profile Setting</h2>
		<?php 
			$user_id = $_SESSION['id']; 
			$sql_show = "SELECT * FROM tblusers where user_id = '{$user_id}'";
			$result = $conn->query($sql_show);
			while($rows = $result->fetch_assoc()){
		?>	
			<p style="margin-bottom:20px;"><b>Registration Date: </b><?php echo $rows['RegDate']; ?></p>
			<div class="profile-section">
				<div class="rowss">	
					<div class="names" >
						<label class="profile-label">First Name</label>
						<input type="text" name="fname" value="<?php echo $rows['First_Name']; ?>">
					</div>
					<div class="names">
						<label class="profile-label">Last Name</label>
						<input type="text" name="lname" value="<?php echo $rows['Last_Name']; ?>">
					</div>
				</div>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">Email</label>
						<input class="input1" type="email" name="phone" value="<?php echo $rows['Email']; ?>">
					</div>	
				</div>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">Phone</label>
						<input type="number" name="email" value="<?php echo $rows['ContactNo']; ?>">
					</div>	
				</div>
				<h2 style="margin-top:5%;">Adrress</h2>
				<hr>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">Country</label>
						<input readonly type="text" name="country" value="<?php echo $rows['Country']; ?>">
					</div>
					<div class="names">
						<label class="profile-label1">Province</label>
						<input type="text" name="province" value="<?php echo $rows['Province']; ?>">
						<!-- <select name="province" id="dpdlProvince1">
							<option <?php  
								if ($rows['Province'] == 'Occidental Mindoro') {
									echo 'selected';
								}
							?>>Occidental Mindoro</option>
							<option <?php  
								if ($rows['Province'] == 'Oriental Mindoro') {
									echo 'selected';
								}
							?>>Oriental Mindoro</option>
						</select> -->
					</div>		
				</div>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">City</label>
						<input type="text" name="city" value="<?php echo $rows['City']; ?>">
						<!-- <select id="dpdlCity1">
							<option>Select...</option>
						</select> -->
					</div>
					<div class="names">
						<label class="profile-label1">Barangay</label>
						<input type="text" name="barangay" value="<?php echo $rows['Barangay']; ?>">
						<!-- <select id="dpdlBarangay1">
							<option>Select...</option>
						</select> -->
					</div>		
				</div>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">Street</label>
						<input type="text" name="street" value="<?php echo $rows['street']; ?>">
					</div>	
				</div>
				<div class="rowss">
					<div class="names">
						<label class="profile-label1">House No.</label>
						<input type="text" name="houseno" value="<?php echo $rows['house_no']; ?>">
					</div>	
				</div>
			</div>
		<?php
			}
		?>
			<input id="save" type="submit" name="save" value="Save Changes">
		</form>
	</div>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>