<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $V_Number = $_POST['V_Number'];
        $V_Type = $_POST['V_Type'];
		$Model = $_POST['Model'];
        $Manufacturer = $_POST['Manufacturer'];
        $Color = $_POST['Color'];
        $Purchase_Year = $_POST['Purchase_Year'];

		if(!empty($V_Number) && !empty($V_Type) && !empty($Model) && !empty($Manufacturer) && !empty($Color) && !empty($Purchase_Year))
		{
            $Cust_Id = $user_data['Cust_Id'];
			//save to database
			#$user_id = random_num(20);
			$query = "insert into vehicle (V_Number,V_Type,Model,Manufacturer,Color,Purchase_Year,Cust_Id) values ('$V_Number','$V_Type','$Model','$Manufacturer','$Color','$Purchase_Year','$Cust_Id')";

			mysqli_query($con, $query);
            
            
			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Register Vehicle</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

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
	</style>

    <div class="topnav">
	<a href="index.php">Home</a>
	<a class="active" href="vehicle.php">Register Vehicle</a>
	<a href="service_appt.php">Book Service Appointment</a>
	<a href="profile.php">My Profile</a>
	<a href="trackservice.php">Track Service</a>
	<a href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white; text-align: center;">Register Your Vehicle</div>
			<br>
            Vehicle Number
			<input id="text" type="text" name="V_Number"><br><br>
            <label for="V_Type">Vehicle Type</lable>
			<select name="V_Type" id="V_Type">
				<option value="SUV">SUV</option>
				<option value="Sedan">Sedan</option>
				<option value="Sports Car">Sports Car</option>
				<option value="Truck">Truck</option>
			</select>
			<br>
			<br>
            Model Name
			<input id="text" type="text" name="Model"><br><br>            
            Manufacturer
			<input id="text" type="text" name="Manufacturer"><br><br>
            Vehicle Color
			<input id="text" type="text" name="Color"><br><br>
            Year of Purchase
			<input id="text" type="text" name="Purchase_Year"><br><br>

			<input id="button" type="submit" value="Register"><br><br>

		</form>
	</div>
</body>
</html>