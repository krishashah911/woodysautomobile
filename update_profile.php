<?php 

session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{

        mysqli_query($con,"UPDATE CUSTOMER set FName='" . $_POST['FName'] . "', LName='" . $_POST['LName'] . "', Cust_Email_Id='" . $_POST['Cust_Email_Id'] . "', Street='" . $_POST['Street'] . "' ,City='" . $_POST['City'] . "', State='" . $_POST['State'] . "', Country='" . $_POST['Country'] . "', Cust_Phone='" . $_POST['Cust_Phone'] . "', Credit_Card='" . $_POST['Credit_Card'] . "' WHERE Cust_Id = $Cust_Id");
        $message = "Record Modified Successfully";

        header("Location: profile.php");
	    die;
    }


?>
<html>
<head>
<title>Update My Profile</title>
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
    $result = mysqli_query($con,"SELECT * FROM CUSTOMER WHERE Cust_Id=$Cust_Id");
    $row= mysqli_fetch_array($result);
?>
First Name: <br>
<input type="text" name="FName" class="txtField" value="<?php echo $row['FName']; ?>">
<br>
<br>
Last Name :<br>
<input type="text" name="LName" class="txtField" value="<?php echo $row['LName']; ?>">
<br>
<br>
Email:<br>
<input type="text" name="Cust_Email_Id" class="txtField" value="<?php echo $row['Cust_Email_Id']; ?>">
<br>
<br>
Street:<br>
<input type="text" name="Street" class="txtField" value="<?php echo $row['Street']; ?>">
<br>
<br>
City:<br>
<input type="text" name="City" class="txtField" value="<?php echo $row['City']; ?>">
<br>
State:<br>
<input type="text" name="State" class="txtField" value="<?php echo $row['State']; ?>">
<br>
<br>
Country:<br>
<input type="text" name="Country" class="txtField" value="<?php echo $row['Country']; ?>">
<br>
<br>
Phone:<br>
<input type="text" name="Cust_Phone" class="txtField" value="<?php echo $row['Cust_Phone']; ?>">
<br>
<br>
Credit Card:<br>
<input type="text" name="Credit_Card" class="txtField" value="<?php echo $row['Credit_Card']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
    </div>
</body>
</html>