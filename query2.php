<?php 
session_start();

	include("connection.php");
	include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Query 2</title>
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
	<a href="query1.php">Query 1</a>
	<a class="active" href="query2.php">Query 2</a>
	<a href="query3.php">Query 3</a>
	<a href="login.php">Log In</a>
	</div>

<h1>Query 2</h1>
<h4>For a given time period (begin date and end date) compute revenue by
location and service type.</h4>
<div id="box">
<form method="post">

Begin Date
<input id="text" type="date" name="Q2_Begin_Date"><br><br>

End Date
<input id="text" type="date" name="Q2_End_Date"><br><br>

<label for="Q2_Location">Select Shop Location</lable>
			<select name="Q2_Location" id="Q2_Location">
				<option value="10101">West Orange</option>
				<option value="20202">Sringfield</option>
				<option value="30303">Caldwell</option>
				<option value="40404">Livingston</option>
                <option value="50505">Verona</option>
			</select>
<br>
<br>

<label for="Q2_Service_Type">Select Service Type</lable>
			<select name="Q2_Service_Type" id="Q2_Service_Type">
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
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</div>
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$Q2_Begin_Date = $_POST['Q2_Begin_Date'];
	$Q2_End_Date = $_POST['Q2_End_Date'];
	$Q2_Location = $_POST['Q2_Location'];
	$Q2_Service_Type = $_POST['Q2_Service_Type'];

	$query = "SELECT SUM(I.Total_Amount) as total FROM invoice I, invoice_details ID, service_appointment SA WHERE I.Invoice_Id = ID.Invoice_Id AND ID.Service_Appt_Id = SA.Service_Appt_Id AND I.Date_Paid > '$Q2_Begin_Date' AND I.Date_Paid < '$Q2_End_Date ' AND SA.Service_Type = '$Q2_Service_Type' AND ID.Location_Id='$Q2_Location'";	
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if(empty($row['total']))
	{
		$row['total']=0;
	}
?>
	<h1> Total Revenue: $<?php echo $row['total']; ?> </h1>
<?php
}
	
?>
</body>
</html>