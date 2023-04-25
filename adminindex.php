<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_adminlogin($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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

	h1 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}

	body {
  		background-image: url("car2.jpg");
		background-repeat: no-repeat;
		background-position: center;
		height: 100%;	
	}


	</style>


	<div class="topnav">
	<a class="active" href="#home">Home</a>
	<a href="adminserviceappt.php">Service Appointments</a>
	<a href="serviceupdate.php">Services</a>
	<a href="partinventory.php">Parts Inventory</a>
	<a href="adminlogout.php">Logout</a>
	</div>

<h1>
		Hello, <?php echo $user_data['User_Name']; ?>
</h1>
</body>
</html>