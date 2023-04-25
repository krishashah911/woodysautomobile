<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
	$Cust_Id = $user_data['Cust_Id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
       
        $V_Number = $_POST['V_Number'];
        $Location_Id = $_POST['Location_Id'];
        $Appt_Date = $_POST['Appt_Date'];
		$Service_Type = $_POST['Service_Type'];
        
		if(!empty($Appt_Date) && !empty($Cust_Id) && !empty($V_Number) && !empty($Location_Id))
		{   
			//save to database
			#$user_id = random_num(20);
			$query = "insert into service_appointment (Cust_Id,V_Number,Location_Id,Appt_Date,Service_Type) values ('$Cust_Id','$V_Number','$Location_Id','$Appt_Date','$Service_Type')";

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
	<title>Service Appointment</title>
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
	<a href="vehicle.php">Register Vehicle</a>
	<a class="active" href="service_appt.php">Book Service Appointment</a>
	<a href="profile.php">My Profile</a>
	<a href="trackservice.php">Track Service</a>
	<a href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white; text-align: center;">Make Appointment</div>
			<br>
		
            Vehicle Number:
			<?php
			$result2 = mysqli_query($con,"SELECT V_Number FROM VEHICLE WHERE Cust_Id=$Cust_Id");
			$row2= mysqli_fetch_array($result2);

			echo '<select name="V_Number" id="V_Number">';
			foreach ($result2 as $row2) {
				if ($selected === $row2['V_Number']) {
					echo '<option value="'.htmlspecialchars($row2['V_Number']).'" selected >';
				} else {
					echo '<option value="'.htmlspecialchars($row2['V_Number']).'">';
				}
				echo htmlspecialchars($row2['V_Number']);
				echo '</option>';
			}
			echo '</select>';
			?>
			<br>
			<br>

            <label for="Location_Id">Select Shop Location</lable>
			<select name="Location_Id" id="Location_Id">
				<option value="10101">West Orange</option>
				<option value="20202">Sringfield</option>
				<option value="30303">Caldwell</option>
				<option value="40404">Livingston</option>
                <option value="50505">Verona</option>
			</select>
			<br>
			<br>
            Date
			<input id="text" type="date" name="Appt_Date"><br><br>

            <label for="Service_Type">Select Service Type</lable>
			<select name="Service_Type" id="Service_Type">
				<option value="Brakes">Brakes</option>
				<option value="Engine tune-ups">Engine tune-ups</option>
				<option value="Front End Alignments">Front End Alignments</option>
				<option value="Oil Changes">Oil Changes</option>
                <option value="State Vehicle Inspections">State Vehicle Inspections</option>
				<option value="Tire repairs and replacements">Tire repairs and replacements</option>
				<option value="Vehicle Computer diagnostics">Vehicle Computer diagnostics</option>
			</select>
			<br>
			<br>

			<input id="button" type="submit" value="Book"><br><br>

		</form>
	</div>
</body>
</html>