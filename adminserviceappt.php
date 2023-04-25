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

    $query = "SELECT * from service_appointment WHERE Location_Id = $Location_Id";
    $result = mysqli_query($con, $query);
?>

<?php 

    // if ($_SERVER['REQUEST_METHOD'] == "POST")
	// {

    //     $Service_Appt_Id='2';

	// 	if(!empty($Service_Appt_Id))
	// 	{
 
    //     $Location_Id = "SELECT Location_Id FROM service_appointment WHERE Service_Appt_Id = '$Service_Appt_Id'";
    //     $V_Number = "SELECT V_Number FROM service_appointment WHERE Service_Appt_Id = '$Service_Appt_Id'";
	// 	$Service_Type = "SELECT Service_Type FROM service_appointment WHERE Service_Appt_Id = '$Service_Appt_Id'";
    //     $Vehicle_Type="SELECT V_Type FROM vehicle WHERE V_Number = '$V_Number'";
    //     $Skill_Id = "SELECT Skill_Id FROM services WHERE Service_Type = '$Service_Type' AND Vehicle_Type = '$Vehicle_Type'";     
    //     $SSN = "SELECT SSN FROM technician_skill WHERE Skill_Id = '$Skill_Id'";
    //     $Labor_Charge = "SELECT Labor_Charge FROM services WHERE Service_Type = '$Service_Type' AND Vehicle_Type = '$Vehicle_Type'";
    //     $Parts_Num = "SELECT Parts_Num FROM parts_used WHERE Service_Type = '$Service_Type' AND Vehicle_Type = '$Vehicle_Type'";
    //     $Parts_Price = "SELECT Price FROM parts_inventory WHERE Parts_Num = '$Parts_Num'"; 

    //     $Technician_SSN="SELECT SSN FROM employee WHERE SSN = '$SSN' AND Location_Id = '$Location_Id'";
    //     // $Total_Charge = $Labor_Charge+$Parts_Price;

	// 	$query = "insert into invoice_details (Service_Appt_Id,Service_Type,Vehicle_Type,Technician_SSN) values ('$Service_Appt_Id','$Service_Type','$Vehicle_Type','$Technician_SSN')";
	// 	mysqli_query($con, $query);
              
	// 	header("Location: adminindex.php");
	// 	die;

	//  	}else
	// 	{
	//  		echo "Could not initiate service request";
	// 	}
	//  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Service Appointments</title>
</head>
<body>
	<style type="text/css">

	.topnav {
	background-color: #333;
	overflow: hidden;
	}

	.topnav a {
	float: left;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	}

	.topnav a:hover {
	background-color: #ddd;
	color: black;
	}

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

	.btn1 {
        background-color: #e7e7e7; 
		color: black;
		border: none;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
    }
	</style>


	<div class="topnav">
	<a href="adminindex.php">Home</a>
	<a class="active" href="adminserviceappt.php">Service Appointments</a>
    <a href="serviceupdate.php">Services</a>
	<a href="partinventory.php">Parts Inventory</a>
	<a href="adminlogout.php">Logout</a>
	</div>

    <h2>Services</h2>

	<div class="card-body">
                    
					<form action="" method="GET">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>From Date</label>
									<input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>To Date</label>
									<input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									
								  <button type="submit" class="btn btn-primary">Filter</button>
								  <br>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card mt-4">
				<div class="card-body">
					<br>
					<table class="table table-borderd">
						<thead>
							<tr>
								<th>Appointment ID</th>
								<th>Appointment Date</th>
								<th>Customer Id</th>
								<th>Vehicle Number</th>
								<th>Service Type</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						
						<?php 
							$con = mysqli_connect("localhost","root","","woodysautomobiledb");

							if(isset($_GET['from_date']) && isset($_GET['to_date']))
							{
								$from_date = $_GET['from_date'];
								$to_date = $_GET['to_date'];

								$query = "SELECT * FROM service_appointment WHERE Location_Id = $Location_Id AND Appt_Date BETWEEN '$from_date' AND '$to_date' ";
								$query_run = mysqli_query($con, $query);

								$i=0;
								if(mysqli_num_rows($query_run) > 0)
								{
									foreach($query_run as $row)
									{
										?>
										<tr>
											<td><?= $row['Service_Appt_Id']; ?></td>
											<td><?= $row['Appt_Date']; ?></td>
											<td><?= $row['Cust_Id']; ?></td>
											<td><?= $row['V_Number']; ?></td>
											<td><?= $row['Service_Type']; ?></td>
											<td><?= $row['Status']; ?></td>
											<td><a href="update_serviceappt.php?Service_Appt_Id=<?php echo $row["Service_Appt_Id"]; ?>&Location_Id=<?php echo $row["Location_Id"]; ?>">Edit</a></td>
										</tr>
										<?php
		$i++;
		}
		?>
					</table>
										<br> <button class="btn1" id="print-button" onclick=window.print()>Print Report</button> <br>
											<?php
										}
									}
									else{
										echo "No result found";
										}
								
											
											?>
					</table>
				</div>
			</div>



</body>
</html>