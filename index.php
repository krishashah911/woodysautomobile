<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>
	<style type="text/css">
	/* Add a black background color to the top navigation */
	.topnav {
	background-color: #333;
	overflow: hidden;
	}

	/* Style the links inside the navigation bar */
	.topnav a {
	float: left;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	}

	/* Change the color of links on hover */
	.topnav a:hover {
	background-color: #ddd;
	color: black;
	}

	/* Add a color to the active/current link */
	.topnav a.active {
	background-color: #04AA6D;
	color: white;
	}
	body {
  		background-image: url("car2.jpg");
		background-repeat: no-repeat;
		background-position: center;
		height: 100%;	
	}

    h1 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}
	</style>

	<div class="topnav">
	<a class="active" href="#home">Home</a>
	<a href="vehicle.php">Register Vehicle</a>
	<a href="service_appt.php">Book Service Appointment</a>
	<a href="profile.php">My Profile</a>
	<a href="trackservice.php">Track Service</a>
	<a href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>

<h1>
		Hello, <?php echo $user_data['FName']; ?>
</h1>

</body>
</html>