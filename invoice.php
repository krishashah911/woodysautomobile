<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];
    $Invoice_Id = $_SESSION['Invoice_Id'];
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>

</head>
<body>
    <style type="text/css">
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        div {
            text-align: center;
        }

        div {
            width: 320px;
            padding: 10px;
            border: 5px solid gray;
            margin: 0;
        }
    </style>
<br>
<b><h2> Congratulations! Payment Successful</h2></b>

<div style="text-align: center; left:50%;">

<?php
    $result = mysqli_query($con,"SELECT * FROM invoice_details WHERE Cust_Id=$Cust_Id AND Invoice_Id=$Invoice_Id");
    $row= mysqli_fetch_array($result);

    $result1 = mysqli_query($con,"SELECT * FROM location WHERE Location_Id='" . $row['Location_Id'] . "'");
    $row1= mysqli_fetch_array($result1);

    $result2 = mysqli_query($con,"SELECT * FROM EMPLOYEE WHERE FName='" . $row['Technician_Name'] . "'");
    $row2= mysqli_fetch_array($result2);

    $result3 = mysqli_query($con,"SELECT * FROM SERVICE_APPOINTMENT WHERE Service_Appt_Id='" . $row['Service_Appt_Id'] . "'");
    $row3= mysqli_fetch_array($result3);

    $result4 = mysqli_query($con,"SELECT * FROM INVOICE WHERE Invoice_Id=$Invoice_Id");
    $row4= mysqli_fetch_array($result4);

?>
<h1>Invoice</h1>   
Invoice ID: <?php echo $row['Invoice_Id']; ?><br>
<br>
Customer ID: <?php echo $row['Cust_Id']; ?><br>
<br>
Service Appointment Number: <?php echo $row['Service_Appt_Id']; ?><br>
<br>
Vehicle Number: <?php echo $row['V_Number']; ?><br>
<br>
Technician Assigned: <?php echo $row['Technician_Name']; ?> <?php echo $row2['LName']; ?><br>
<br>
Shop Location: <?php echo $row1['Street']; ?><?php echo $row1['City']; ?><?php echo $row1['State']; ?><?php echo $row1['Zip_Code']; ?><br>
<br>
Date of Service: <?php echo $row['Appt_Date']; ?><br>
<br>
Type of Service: <?php echo $row3['Service_Type']; ?><br>
<br>
Labor Cost: <?php echo "$",$row['Labor_Charge']; ?><br>
Vehicle Part Cost: <?php echo "$",$row['Parts_Price']; ?><br>
<br>
Total Bill: <?php echo "$",$row4['Total_Amount']; ?><br>
<br>

    <a href="index.php">CLOSE</a>

</div>


</body>
</html>