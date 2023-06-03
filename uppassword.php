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
		<a href="uppassword.php" style="color:red;">Update Password</a>
		<a href="userbookings.php">My Bookings</a>
		<a href="index.php">Sign Out</a>
	</div>
	<div class="profile-box">
		<form method="get">
		<h2 style="margin-bottom:40px;color: red;">Update Password</h2>
		<?php 
			$user_id = $_SESSION['id']; 
			$sql_show = "SELECT * FROM tblusers where user_id = '{$user_id}'";
			$result = $conn->query($sql_show);
			while($rows = $result->fetch_assoc()){
		?>
			<div class="profile-section" style="gap:12px;">
				<?php  
					if (isset($_GET['save'])) {
						$user_id = $_SESSION['id'];
						$currentpass = $_GET['currentpass'];
						$newpass = $_GET['newpass'];
						$confirmpass = $_GET['confirmpass'];

						$sql_show = "SELECT * FROM tblusers where user_id = '{$user_id}'";
						$result = $conn->query($sql_show);

						while ($rows = $result->fetch_assoc()) {
							if ($currentpass != $rows['Password']) {
								echo "<p style='color:red;'>Incorrect Password.</p>";
							}
							else if($newpass != $confirmpass){
								echo "<p style='color:red;'>Confirm Password should match the new password.</p>";
							}
							else{
								$sql_update = "UPDATE tblusers SET Password = '{$confirmpass}' where user_id = '{$user_id}'";
								$conn->query($sql_update);
								echo "<p style='color:green;'>Password Successfully Changed.</p>";
							}
						}
					}
				?>
				<div class="rowss" style="margin-left: 20%;">	
					<div class="names">
						<label class="profile-label">Current Password</label>
						<input required style="width:200%;" type="password" name="currentpass">
					</div>
				</div>
				<div class="rowss" style="margin-left: 20%;">	
					<div class="names">
						<label class="profile-label">New Password</label>
						<input required style="width:200%;" type="password" name="newpass">
					</div>
				</div>
				<div class="rowss" style="margin-left: 20%;">	
					<div class="names">
						<label class="profile-label">Confirm Password</label>
						<input required style="width:200%;" type="password" name="confirmpass">
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