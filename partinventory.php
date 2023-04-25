<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_adminlogin($con);
    if ($user_data['User_Name']=='admin1')
    {
    $Location_Id = '10101';
    }
    elseif ($user_data['User_Name']=='admin2')
    {
        $Location_Id = '20202';
    }
    elseif ($user_data['User_Name']=='admin3')
    {
        $Location_Id = '30303';
    }
    elseif ($user_data['User_Name']=='admin4')
    {
        $Location_Id = '40404';
    }
    elseif ($user_data['User_Name']=='admin5')
    {
        $Location_Id = '50505';
    }

    $query = "SELECT * from parts_inventory WHERE Location_Id=$Location_Id";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Parts Available</title>
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
    <a href="serviceupdate.php">Services</a>
	<a class="active" href="partinventory.php">Parts Inventory</a>
	<a href="adminlogout.php">Logout</a>
	</div>

    <h2>Available Parts</h2>

	<?php
	if (mysqli_num_rows($result) > 0){
	?>
		  <table> 
		  <tr>
			<td><b>Parts Number</b></td>
			<td><b>Parts Name</b></td>
			<td><b>Price Per Piece</b></td>
		  </tr>
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
	?>
		<tr>
			<td><?php echo $row["Parts_Num"]; ?></td>
			<td><?php echo $row["Parts_Name"]; ?></td>
			<td><?php echo "$", $row["Price"]; ?></td>
			<td><a href="update_parts_price.php?Parts_Num=<?php echo $row["Parts_Num"]; ?>&Location_Id=<?php echo $row["Location_Id"]; ?>">Update</a></td>

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
            echo $row['Parts_Num']. " || " . $row['Parts_Name']. " || " . $row['Price']. "<br>";
        }
    } else {
        echo "0 results";
    } -->

</body>
</html>