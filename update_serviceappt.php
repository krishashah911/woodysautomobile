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
?>
<?php
    $result = mysqli_query($con,"SELECT * FROM service_appointment WHERE Service_Appt_Id='" . $_GET['Service_Appt_Id'] . "' AND Location_Id=$Location_Id");
    $row= mysqli_fetch_array($result);

    $Service_Type = $row['Service_Type'];
    $V_Number = $row['V_Number'];

    $result2 = mysqli_query($con,"SELECT FName,LName FROM EMPLOYEE WHERE Job_Type='TECHNICIAN' AND Location_Id = $Location_Id");
    $row2= mysqli_fetch_array($result2);

    $fetch11 = mysqli_query($con, "SELECT * FROM vehicle WHERE V_Number =$V_Number");
    $V_Type = mysqli_fetch_array($fetch11);
    $Vehicle_Type = $V_Type['V_Type'];

    $fetch22 = mysqli_query($con,"SELECT * FROM services WHERE Service_Type = '$Service_Type' AND Vehicle_Type = '$Vehicle_Type'");
    $Labor = mysqli_fetch_array($fetch22);

    $fetch33 = mysqli_query($con,"SELECT * FROM PARTS_USED WHERE Service_Type = '$Service_Type' AND Vehicle_Type = '$Vehicle_Type'");
    $PN = mysqli_fetch_array($fetch33);
    $Parts_Num = $PN['Parts_Num'];

    $fetch44 = mysqli_query($con,"SELECT * FROM PARTS_INVENTORY WHERE Parts_Num = '$Parts_Num' AND Location_Id = $Location_Id");
    $Parts = mysqli_fetch_array($fetch44);
    $Price = $Parts['Price'];

?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $Service_Appt_Id = $row['Service_Appt_Id'];
        // $V_Number = $row['V_Number'];
		$Appt_Date = $row['Appt_Date'];
        $Cust_Id = $row['Cust_Id'];       
        $Labor_Charge = $Labor['Labor_Charge'];

        mysqli_query($con,"UPDATE service_appointment set Status='" . $_POST['Status'] . "' WHERE Service_Appt_Id='" . $_GET['Service_Appt_Id'] . "' AND Location_Id=$Location_Id");
        $message = "Record Modified Successfully";

        if(($_POST['Status'])=='in progress')
		{
            $query3 = "INSERT into invoice_details (Service_Appt_Id,V_Number,Technician_Name,Cust_Id,Location_Id,Labor_Charge,Parts_Price) values ($Service_Appt_Id,$V_Number,'" . $_POST['FName'] . "',$Cust_Id,$Location_Id,$Labor_Charge,$Price)";
            mysqli_query($con, $query3);
        }

        header("Location: adminserviceappt.php");
	    die;
    }
?>

<html>
<head>
<title>Update Service Appointment</title>
</head>
<body>
    <style type="text/css">
    #box{
	background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
    </style>	

<div id="box">
<form method="post">
<div style="padding-bottom:5px;">
<a href="adminserviceappt.php">Back</a>
</div>
<br>

Service Appointment ID: <?php echo $row['Service_Appt_Id']; ?><br>
<br>
Appointment Date: <?php echo $row['Appt_Date']; ?><br>
<br>
Customer ID: <?php echo $row['Cust_Id']; ?><br>
<br>
Vehicle Number: <?php echo $row['V_Number']; ?><br>
<br>
Service Type: <?php echo $row['Service_Type']; ?><br>
<br>
Technician: 
<?php
echo '<select name="FName" id="FName">';
foreach ($result2 as $row2) {
    if ($selected === $row2['FName']) {
        echo '<option value="'.htmlspecialchars($row2['FName']).'" selected >';
    } else {
        echo '<option value="'.htmlspecialchars($row2['FName']).'">';
    }
    echo htmlspecialchars($row2['FName']);
    echo '</option>';
}
echo '</select>';
?>

<br>
<br>
<label for="Status">Update Appointment Status</lable>
			<select name="Status" id="Status">
				<option value="pending">pending</option>
				<option value="in progress">in progress</option>
				<option value="waiting for parts">waiting for parts</option>
				<option value="complete">complete</option>
                <option value="closed">closed</option>
			</select>
<br>
<br>
<input type="submit" name="submit" value="Submit" class="button">

</form>
    </div>
</body>
</html>