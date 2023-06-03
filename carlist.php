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
		<a href="aboutus.php">About Us</a>
		<a href="carlist.php" style="color:red;">Car Listing</a>
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
	<div class="right">
		<div class="filter">
			<h2>Filter By</h2>
			<div class="select">
				<form method="get">
					<select name="brand">
						<option selected disabled>Select Brand</option>
						<?php  
							$sql_brand = "SELECT * FROM brands";
							$category = $conn->query($sql_brand);

							if ($category->num_rows>0) {
								while ($row = $category->fetch_assoc()) {
						?>
							<option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
						<?php
								}
							}
						?>
					</select>
					<input class="btn" type="submit" name="search" value="Search">
					<a style="width:91%;background-color: #ed7853;" class="btn" href="carlist.php">Refresh</a>
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
	<div class="carlist" style="display:<?php if (isset($_GET['search'])) {echo "none";} ?> ">
		<h2>All</h2>
		<?php  
			$sql_show = "SELECT * 
			from cars
			INNER JOIN brands ON cars.brand_id = brands.brand_id
			INNER JOIN category ON cars.category_id = category.category_id
			ORDER BY cars.car_id DESC;
			";

			$result = $conn->query($sql_show);
			if ($result->num_rows>0) {
				while($rows = $result->fetch_assoc()){
		?>
				<div class="cards">
					<img class="car" src="img/<?php echo $rows['Image1']; ?>">
					<div class="info">
						<h2 class="name"><?php echo $rows['brand_name'].", ".$rows['carName']; ?></h2>
						<p style="margin-bottom:25px;"><?php echo "&#8369; ".number_format($rows['Price'])." /Day"; ?></p>
						<div class="other">
							<img style="width: 30px;height: 30px;" src="img/seat.png">
							<p style="margin-top:10px;margin-left: 5px;"><?php echo $rows['Seats']; ?></p>
							<img style="margin-left: 20%;" src="img/fuel.png">
							<p style="margin-top:5px;margin-left: 5px;"><?php echo $rows['Fuel_Type']; ?></p>
							<img style="width: 30px;height: 30px;margin-left: 20%;" src="img/category.png">
							<p style="margin-top:5px;margin-left: 5px;"><?php echo $rows['category_name']; ?></p>
						</div>
					</div>
					<a class="viewbtn" href="viewcar.php?car=<?php echo $rows['car_id']; ?>">View Details <img src="img/arrow.png"></a>
				</div>
		<?php
				}
			}
		?>
	</div>
	<?php  
		if (isset($_GET['search'])) {
			$brand = $_GET['brand'];
	?>
	<div class="carlist">
		<h2>
			<?php  
				$sql_brand = "SELECT * FROM brands where brand_id = '{$brand}'";
				$rr = $conn->query($sql_brand);
				$rs =$rr->fetch_assoc();
				echo $rs['brand_name'];
			?>
		</h2>	
	<?php
			$sql_search ="SELECT * 
			from cars
			INNER JOIN brands ON cars.brand_id = brands.brand_id
			INNER JOIN category ON cars.category_id = category.category_id
			WHERE cars.brand_id = '{$brand}'";

			$result_search = $conn->query($sql_search);
			if ($result_search->num_rows>0) {
				while($ro = $result_search->fetch_assoc()){
	?>
			
				
				<div class="cards">
					<img class="car" src="img/<?php echo $ro['Image1']; ?>">
					<div class="info">
						<h2 class="name"><?php echo $ro['brand_name'].", ".$ro['carName']; ?></h2>
						<p style="margin-bottom:25px;"><?php echo "&#8369; ".number_format($ro['Price'])." /Day"; ?></p>
						<div class="other">
							<img style="width: 30px;height: 30px;" src="img/seat.png">
							<p style="margin-top:10px;margin-left: 5px;"><?php echo $ro['Seats']; ?></p>
							<img style="margin-left: 20%;" src="img/fuel.png">
							<p style="margin-top:5px;margin-left: 5px;"><?php echo $ro['Fuel_Type']; ?></p>
							<img style="width: 30px;height: 30px;margin-left: 20%;" src="img/category.png">
							<p style="margin-top:5px;margin-left: 5px;"><?php echo $ro['category_name']; ?></p>
						</div>
					</div>
					<a class="viewbtn" href="viewcar.php?car=<?php echo $ro['car_id']; ?>">View Details <img src="img/arrow.png"></a>
				</div>
			
	<?php
				}
			}
	?>
		</div>
	<?php		
		}
	?>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</html>