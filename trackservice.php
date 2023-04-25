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
    <a class="active" href="trackservice.php">Track Service</a>
	<a href="trackinvoice.php">My Invoices</a>
	<a href="logout.php">Logout</a>
	</div>

    <h2>My Services</h2>

	<div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
									<label>Enter Vehicle Number</label> <br>
                                        <?php
                                            $result2 = mysqli_query($con,"SELECT V_Number FROM VEHICLE WHERE Cust_Id=$Cust_Id");
                                            $row2= mysqli_fetch_array($result2);
                                        ?>
                                        <select name="search" id="V_Number" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <?php
                                            foreach ($result2 as $row2) {
                                                if ($selected === $row2['V_Number']) {
                                                    echo '<option value="'.htmlspecialchars($row2['V_Number']).'" selected >';
                                                } else {
                                                    echo '<option value="'.htmlspecialchars($row2['V_Number']).'">';
                                                }
                                                echo htmlspecialchars($row2['V_Number']);
                                                echo '</option>';
                                            }
                                        ?>
                                        </select>
                                        
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
									<label>Enter Service Type</label> <br>
                                        <?php
                                            $result3 = mysqli_query($con,"SELECT DISTINCT Service_Type FROM SERVICES");
                                            $row3= mysqli_fetch_array($result3);
                                        ?>
                                            <select name="search1" id="Service_Type" required value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; } ?>" class="form-control" placeholder="Search data">
                                        <?php
                                            foreach ($result3 as $row3) {
                                                if ($selected === $row3['Service_Type']) {
                                                    echo '<option value="'.htmlspecialchars($row3['Service_Type']).'" selected >';
                                                } else {
                                                    echo '<option value="'.htmlspecialchars($row3['Service_Type']).'">';
                                                }
                                                echo htmlspecialchars($row3['Service_Type']);
                                                echo '</option>';
                                            }
                                        ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Service Appointment ID</th>
                                    <th>Appointment Date</th>
                                    <th>Vehicle Number</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","woodysautomobiledb");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM service_appointment WHERE V_Number LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['Service_Appt_Id']; ?></td>
                                                    <td><?= $items['Appt_Date']; ?></td>
                                                    <td><?= $items['V_Number']; ?></td>
                                                    <td><?= $items["Service_Type"]; ?></td>
													<td><?= $items['Status']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    if(isset($_GET['search1']))
                                    {
                                        $filtervalues1 = $_GET['search1'];
                                        $query1 = "SELECT * FROM service_appointment WHERE Service_Type LIKE '%$filtervalues1%' ";
                                        $query_run1 = mysqli_query($con, $query1);
                                        if(mysqli_num_rows($query_run1) > 0)
                                        {
                                            foreach($query_run1 as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['Service_Appt_Id']; ?></td>
                                                    <td><?= $items['Appt_Date']; ?></td>
                                                    <td><?= $items['V_Number']; ?></td>
                                                    <td><?= $items["Service_Type"]; ?></td>
													<td><?= $items['Status']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



</body>
</html>