<?php 

session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        mysqli_query($con,"UPDATE VEHICLE set V_Type='" . $_POST['V_Type'] . "', Model='" . $_POST['Model'] . "', Manufacturer='" . $_POST['Manufacturer'] . "' ,Color='" . $_POST['Color'] . "', Purchase_Year='" . $_POST['Purchase_Year'] . "' WHERE Cust_Id = $Cust_Id AND V_Number='" . $_GET['V_Number'] . "'");
        $message = "Record Modified Successfully";

        header("Location: profile.php");
	    die;
    }

?>
<html>
<head>
<title>Update My Vehicle</title>
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
<a href="profile.php">Back</a>
</div>

<?php
    $result = mysqli_query($con,"SELECT * FROM VEHICLE WHERE Cust_Id=$Cust_Id AND V_Number='" . $_GET['V_Number'] . "'");
    $row= mysqli_fetch_array($result);
?>
<br>
Vehicle Number: <?php echo $row['V_Number']; ?><br>
<br>
Vehicle Type :<br>
<input type="text" name="V_Type" class="txtField" value="<?php echo $row['V_Type']; ?>">
<br>
<br>
Model Name:<br>
<input type="text" name="Model" class="txtField" value="<?php echo $row['Model']; ?>">
<br>
<br>
Manufacturer:<br>
<input type="text" name="Manufacturer" class="txtField" value="<?php echo $row['Manufacturer']; ?>">
<br>
<br>
Vehicle Color:<br>
<input type="text" name="Color" class="txtField" value="<?php echo $row['Color']; ?>">
<br>
<br>
Purchase Year:<br>
<input type="text" name="Purchase_Year" class="txtField" value="<?php echo $row['Purchase_Year']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
    </div>
</body>
</html>