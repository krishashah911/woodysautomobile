<?php 
session_start();

	include("connection.php");
	include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manager</title>
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
	<a href="query1.php">Query 1</a>
	<a href="query2.php">Query 2</a>
	<a href="query3.php">Query 3</a>
	<a href="login.php">Log In</a>
	</div>

<h1>
		Hello, Manager
</h1>
</body>
</html>