<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $Q3_Begin_Date = $_SESSION['Q3_Begin_Date'];
    $Q3_End_Date = $_SESSION['Q3_End_Date'];

    $query = "SELECT SUM(I.Total_Amount) as total, ID.Location_Id FROM invoice I, invoice_details ID WHERE I.Invoice_Id = ID.Invoice_Id AND I.Date_Paid > '$Q3_Begin_Date' AND I.Date_Paid < '$Q3_End_Date ' GROUP BY ID.Location_Id ORDER BY total DESC LIMIT 3";	
    $result = mysqli_query($con, $query);
	
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Query 3 Answer</title>
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

<h1>Query 3 Answer</h1>

<?php
	if (mysqli_num_rows($result) > 0) {
	?>
    <table>
	
	<tr>
		<th>Locations ID</th>
		<th>Total Revenue</th>
	</tr>

	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>

	<tr>
	<td><?php echo $row["Location_Id"]; ?></td>
    <td><?php echo '$',$row["total"]; ?></td>
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