<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];

    $query1 = "SELECT * from service_appointment WHERE Cust_Id = $Cust_Id";
    $result1 = mysqli_query($con, $query1);
	
    $query2 = "SELECT * from invoice_details WHERE Cust_Id = $Cust_Id";
    $result2 = mysqli_query($con, $query2);
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Track Service</title>
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
	<a href="profile.php">My Profile</a>
    <a href="trackservice.php">Track Service</a>
    <a class="active" href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>


<h2>My Invoices</h2>

<?php
if (mysqli_num_rows($result2) > 0){
	
?>
<table>
	  
	<tr>
		<td>Service Appointment ID</td>
		<td>Vehicle Number</td>
		<td>Technician Name</td>
		<td>Service Date</td>
		<td>Customer ID</td>
		<td>Location ID</td>
		<td>Labor Charge</td>
		<td>Parts Price</td>
		<td>Invoice ID</td>
	</tr>

<?php
	$i=0;
	while($row2 = mysqli_fetch_array($result2) ) {
	
?>

	<tr>
		<td><?php echo $row2["Service_Appt_Id"]; ?></td>
		<td><?php echo $row2["V_Number"]; ?></td>
		<td><?php echo $row2["Technician_Name"]; ?></td>
		<td><?php echo $row2["Appt_Date"]; ?></td>
		<td><?php echo $row2["Cust_Id"]; ?></td>
		<td><?php echo $row2["Location_Id"]; ?></td>
		<td><?php echo $row2["Labor_Charge"]; ?></td>
		<td><?php echo $row2["Parts_Price"]; ?></td>
		<td><?php echo $row2["Invoice_Id"]; ?></td>
		<td><a href="makepayment.php?Service_Appt_Id=<?php echo $row2["Service_Appt_Id"]; ?>&V_Number=<?php echo $row2["V_Number"]; ?>&Technician_Name=<?php echo $row2["Technician_Name"]; ?>&Appt_Date=<?php echo $row2["Appt_Date"]; ?>&Cust_Id=<?php echo $row2["Cust_Id"]; ?>&Location_Id=<?php echo $row2["Location_Id"]; ?>&Labor_Charge=<?php echo $row2["Labor_Charge"]; ?>&Parts_Price=<?php echo $row2["Parts_Price"]; ?>&Invoice_Id=<?php echo $row2["Invoice_Id"]; ?>">Make Payment</a></td>
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


</body>
</html>