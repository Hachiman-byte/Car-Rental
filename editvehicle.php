<?php
	session_start();  
	include("include/connection.php");

	if (isset($_POST['update'])) {
		header('Location: vehicle.php');
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
	<p class="path1">Admin ><i style="color: blue;">Manage Vehicles</i>> <i style="color: blue;">Edit</i></p>
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
		<h2 style="margin-bottom:30px;font-family:'Impact';font-weight:500;font-size: 25px;">Edit Vehicle</h2>
			<form method="post" enctype="multipart/form-data">
				<?php
					if (isset($_GET['edit'])) {
					 	$car_id = $_GET['edit'];
					 	$sql_show2 = "SELECT * FROM cars where car_id = '{$car_id}'";

					 	$result = $conn->query($sql_show2);

					 	if ($result->num_rows>0) {
					 		while ($rows2 = $result->fetch_assoc()) {
				?>
				<div class="row">
					<div class="column">
						<label>Vehicle Name</label>
						<input required class="vehicleinfo" type="text" name="carname" value="<?php echo $rows2['carName'];?>">
					</div>
					<div class="column">
						<label>Brand</label>
						<select required class="vehicleinfo" name="brand">
							<option selected disabled>Select...</option>
						<?php 
							$sql_show = "SELECT * FROM brands";
							$brand = $conn->query($sql_show);

							if ($brand->num_rows>0) {
								while($rows = $brand->fetch_assoc()){
						?>
								<option <?php echo ($rows2['brand_id'] == $rows['brand_id'])? "selected":""; ?> value="<?php echo $rows['brand_id']; ?>"><?php echo $rows['brand_name']; ?></option>
						<?php
								}
							}
						?>
						</select>
						
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label>Category</label>
						<select required class="vehicleinfo" name="category">
							<option>Select...</option>
							<?php  
								$sql_show1 = "SELECT * FROM category";	
								$result1 = $conn->query($sql_show1);
								if ($result1->num_rows>0) {
									while ($rows1 = $result1->fetch_assoc()) {
							?>
									<option <?php echo ($rows2['category_id'] == $rows1['category_id'])? "selected":""; ?> value="<?php echo $rows1['category_id']; ?>"><?php echo $rows1['category_name']; ?></option>
							<?php
									}
								}
							?>
						</select>
					</div>
					<div class="column">
						<label>Fuel Type</label>
						<select required class="vehicleinfo" name="fuel"> 
							<option <?php echo ($rows2['Fuel_Type'] == "Petrol")? "selected":""; ?> value="Petrol">Petrol</option>
							<option <?php echo ($rows2['Fuel_Type'] == "Diesel")? "selected":""; ?> value="Diesel">Diesel</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label>Seats</label>
						<input required class="vehicleinfo" type="number" name="seats" value="<?php echo $rows2['Seats']; ?>">
					</div>
					<div class="column">
						<label>Price</label>
						<input required class="vehicleinfo" type="number" name="price" value="<?php echo $rows2['Price']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label>Image</label>
						<input type="file" name="photo">
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label>Description</label>
						<textarea required name="description" ><?php echo $rows2['Description']; ?>"</textarea>
					</div>
				</div>
				<input hidden type="number" name="carid" value="<?php echo $rows2['car_id']; ?>">				
				<?php
						if (isset($_POST['update'])) {
							$car_id = $_POST['carid'];
							$cat_id = $_POST['category'];
							$name = $_POST['carname'];
							$price = $_POST['price'];
							$brand = $_POST['brand'];
							$fuel = $_POST['fuel'];
							$seats = $_POST['seats'];
							$description = $_POST['description'];
							$filename = $_FILES['photo']['name'];	
							if ($filename =='') {
            					$filename = $rows2['Image1'];
        					}
        					else{
            					$tempname = $_FILES['photo']['tmp_name'];
            					$folder = "img/".$filename;
            					move_uploaded_file($tempname, $folder);
        					}
							//

							$sql_update = "UPDATE cars set carName = '{$name}',brand_id = '{$brand}',category_id = '{$cat_id}',Description = '{$description}',Fuel_Type = '{$fuel}',Seats = '{$seats}',Price = '{$price}',Image1 = '{$filename}' where car_id = '{$car_id}'";

							$conn->query($sql_update);
								} 
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