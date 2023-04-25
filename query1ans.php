<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $Q1_Date = $_SESSION['Q1_Date'];
    $Q1_Location = $_SESSION['Q1_Location'];

    $query = "SELECT * from SERVICE_APPOINTMENT WHERE Status='pending'AND Location_Id=$Q1_Location AND Appt_Date='$Q1_Date'";
    $result = mysqli_query($con, $query);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Query 1 Answer</title>
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
    
	h1 {text-align: center;}
    h4 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}
	</style>

<h1>Query 1 Answer</h1>


<?php
	if (mysqli_num_rows($result) > 0) {
	?>
	<table>
	
	<tr>
		<td>Service Appointment ID</td>
		<td>Appointment Date</td>
		<td>Customer ID</td>
		<td>Vehicle Number</td>
		<td>Location ID</td>
		<td>Status</td>
        <td>Service Type</td>
	</tr>

	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>

	<tr>
    <td><?php echo $row["Service_Appt_Id"]; ?></td>
    <td><?php echo $row["Appt_Date"]; ?></td>
    <td><?php echo $row["Cust_Id"]; ?></td>
    <td><?php echo $row["V_Number"]; ?></td>
	<td><?php echo $row["Location_Id"]; ?></td>
	<td><?php echo $row["Status"]; ?></td>
    <td><?php echo $row["Service_Type"]; ?></td>
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