<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$Q3_Begin_Date = $_POST['Q3_Begin_Date'];
		$Q3_End_Date = $_POST['Q3_End_Date'];
		$_SESSION['Q3_Begin_Date'] = $Q3_Begin_Date;
		$_SESSION['Q3_End_Date'] = $Q3_End_Date;

		if(!empty($Q3_Begin_Date) && !empty($Q3_End_Date))
		{   
			header("Location: query3ans.php");
			die;
		}else
		{
			echo "Please select some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Query 3</title>
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
    h4 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}

	#box{
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;

	}

	tr:nth-child(even) {
		background-color: white;
	}
	</style>

	<div class="topnav">
	<a href="manager.php">Home</a>
	<a href="query1.php">Query 1</a>
	<a href="query2.php">Query 2</a>
	<a class="active" href="query3.php">Query 3</a>
	<a href="login.php">Log In</a>
	</div>

<h1>Query 3</h1>

<h4>For a given time period (begin date and end date) compute the top 3
locations (in terms of total service revenue) in descending order.</h4>

<div id="box">
<form method="post">

Begin Date
<input id="text" type="date" name="Q3_Begin_Date"><br><br>

End Date
<input id="text" type="date" name="Q3_End_Date"><br><br>

<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</div>
</body>
</html>