<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
		$Cust_Email_Id = $_POST['Cust_Email_Id'];
        $Cust_Phone = $_POST['Cust_Phone'];
        $Credit_Card = $_POST['Credit_Card'];
        $Street = $_POST['Street'];
        $City = $_POST['City'];
        $State = $_POST['State'];
        $Country = $_POST['Country'];
        $Password = $_POST['Password'];

		if(!empty($FName) && !empty($LName) && !empty($Cust_Email_Id) && !empty($Cust_Phone) && !empty($Credit_Card) && !empty($Street) && !empty($City) && !empty($State) && !empty($Country) && !empty($Password))
		{

			//save to database
			#$user_id = random_num(20);
			$query = "insert into customer (FName,LName,Cust_Email_Id,Cust_Phone,Credit_Card,Street,City,State,Country,Password) values ('$FName','$LName','$Cust_Email_Id','$Cust_Phone','$Credit_Card','$Street','$City','$State','$Country','$Password')";

			mysqli_query($con, $query);

			header("Location: login.php");
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
	<title>Signup</title>
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

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white; text-align: center;">Signup</div>

            First Name
            <input id="text" type="text" name="FName"><br><br>
            Last Name
            <input id="text" type="text" name="LName"><br><br>
            Email Id
            <input id="text" type="email" name="Cust_Email_Id"><br><br>
            Contact
            <input id="text" type="text" name="Cust_Phone"><br><br>
            Credit Card Number
            <input id="text" type="text" name="Credit_Card"><br><br>
            <h4 style="text-align: center;">Address</h4>
            Street
            <input id="text" type="text" name="Street"><br><br>
            City
            <input id="text" type="text" name="City"><br><br>
            State
            <input id="text" type="text" name="State"><br><br>
            Country
            <input id="text" type="text" name="Country"><br><br>
            Password
			<input id="text" type="password" name="Password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>