<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$Q1_Date = $_POST['Q1_Date'];
        $Q1_Location = $_POST['Q1_Location'];
		$_SESSION['Q1_Date'] = $Q1_Date;
		$_SESSION['Q1_Location'] = $Q1_Location;

		if(!empty($Q1_Date) && !empty($Q1_Location))
		{   
			header("Location: query1ans.php");
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
	<title>Query 1</title>
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

	</style>


	<div class="topnav">
	<a href="manager.php">Home</a>
	<a class="active" href="query1.php">Query 1</a>
	<a href="query2.php">Query 2</a>
	<a href="query3.php">Query 3</a>
	<a href="login.php">Log In</a>
	</div>

<h1>Query 1</h1>
<h4>For a given day and location, a report of the pending service
appointments.</h4>

<div id="box">
<form method="post">

Date
<input id="text" type="date" name="Q1_Date"><br><br>

<label for="Q1_Location">Select Shop Location</lable>
			<select name="Q1_Location" id="Q1_Location">
				<option value="10101">West Orange</option>
				<option value="20202">Sringfield</option>
				<option value="30303">Caldwell</option>
				<option value="40404">Livingston</option>
                <option value="50505">Verona</option>
			</select>
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</div>
</body>
</html>