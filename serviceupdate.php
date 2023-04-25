<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_adminlogin($con);

    $query = "SELECT * from services";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Services Available</title>
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
	<a href="adminindex.php">Home</a>
	<a href="adminserviceappt.php">Service Appointments</a>
    <a class="active" href="serviceupdate.php">Services</a>
	<a href="partinventory.php">Parts Inventory</a>
	<a href="adminlogout.php">Logout</a>
	</div>

    <h2>Services</h2>

    <?php
	if (mysqli_num_rows($result) > 0){
	?>
		  <table> 
		  <tr>
			<td><b>Service Type</b></td>
			<td><b>Vehicle Type</b></td>
			<td><b>Labor Charge</b></td>
		  </tr>
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
	?>
		<tr>
			<td><?php echo $row["Service_Type"]; ?></td>
			<td><?php echo $row["Vehicle_Type"]; ?></td>
			<td><?php echo "$", $row["Labor_Charge"]; ?></td>
			<td><a href="update_labor_charge.php?Service_Type=<?php echo $row["Service_Type"]; ?>&Vehicle_Type=<?php echo $row["Vehicle_Type"]; ?>">Update</a></td>


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
    <!-- if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['Service_Type']. " || " . $row['Vehicle_Type']. " || " . $row['Labor_Charge']. "<br>";
        }
    } else {
        echo "0 results";
    } -->

</body>
</html>