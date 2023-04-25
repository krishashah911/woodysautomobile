<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];

    $query = "SELECT * from CUSTOMER WHERE Cust_Id = $Cust_Id";
    $result1 = mysqli_query($con, $query);

    $query = "SELECT * from VEHICLE WHERE Cust_Id = $Cust_Id";
    $result2 = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
	<a href="index.php">Home</a>
	<a href="vehicle.php">Register Vehicle</a>
	<a href="service_appt.php">Book Service Appointment</a>
	<a class="active" href="profile.php">My Profile</a>
	<a href="trackservice.php">Track Service</a>
	<a href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>

    <h2>Personal Info</h2>

    <?php
	if (mysqli_num_rows($result1) > 0){
	?>
		  <table>
		  
		  <tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email Id</td>
			<td>Street</td>
			<td>City</td>
			<td>State</td>
			<td>Country</td>
			<td>Phone Number</td>
			<td>Credit Card Number</td>
		  </tr>
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result1)) {
	?>
		<tr>
			<td><?php echo $row["FName"]; ?></td>
			<td><?php echo $row["LName"]; ?></td>
			<td><?php echo $row["Cust_Email_Id"]; ?></td>
			<td><?php echo $row["Street"]; ?></td>
			<td><?php echo $row["City"]; ?></td>
			<td><?php echo $row["State"]; ?></td>
			<td><?php echo $row["Country"]; ?></td>
			<td><?php echo $row["Cust_Phone"]; ?></td>
			<td><?php echo $row["Credit_Card"]; ?></td>
			<td><a href="update_profile.php?Cust_Id=<?php echo $row["Cust_Id"]; ?>">Update</a></td>
		</tr>
		<?php
		$i++;
		}
		?>
		</table>
		<?php
		}
		else{
    		echo "No result found";
		}
		?>
			
    <!-- if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            echo $row['FName']. " || " . $row['LName']. " || " . $row['Cust_Email_Id']. " || " . $row['Street']. " || " . $row['City'] . " || " . $row['State'] . " || " . $row['Country'] . " || " . $row['Cust_Phone'] . " || " . $row['Credit_Card'] . "<br>";
        }
    } else {
        echo "0 results";
    } -->

	<br>
    <h2>Vehicle Details</h2>

	<?php
	if (mysqli_num_rows($result2) > 0) {
	?>
	<table>
	
	<tr>
		<td>Vehicle Number</td>
		<td>Vehicle Type</td>
		<td>Model Name</td>
		<td>Manufacturer Name</td>
		<td>Vehicle Color</td>
		<td>Year of Purchase</td>
	</tr>

	<?php
	$i=0;
	while($row = mysqli_fetch_array($result2)) {
	?>

	<tr>
    <td><?php echo $row["V_Number"]; ?></td>
    <td><?php echo $row["V_Type"]; ?></td>
    <td><?php echo $row["Model"]; ?></td>
    <td><?php echo $row["Manufacturer"]; ?></td>
	<td><?php echo $row["Color"]; ?></td>
	<td><?php echo $row["Purchase_Year"]; ?></td>
	<td><a href="update_vehicle.php?Cust_Id=<?php echo $row["Cust_Id"]; ?>&V_Number=<?php echo $row["V_Number"]; ?>">Update</a></td>
	</tr>

	<?php
	$i++;
	}
	?>
	</table>

	<?php
	}
	else{
		echo "No result found";
	}
	?>
   
    <!-- if ($result2->num_rows > 0) {
        // output data of each row
        while($row = $result2->fetch_assoc()) {
            echo $row['V_Number']. " || " . $row['V_Type']. " || " . $row['Model']. " || " . $row['Manufacturer']. " || " . $row['Color'] . " || " . $row['Purchase_Year'] . "<br>";
        }
    } else {
        echo "0 results";
    } -->

</body>
</html>