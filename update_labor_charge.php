<?php 

session_start();

	include("connection.php");
	include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        mysqli_query($con,"UPDATE SERVICES set Labor_Charge='" . $_POST['Labor_Charge'] . "' WHERE Service_Type='" . $_GET['Service_Type'] . "' AND Vehicle_Type='" . $_GET['Vehicle_Type'] . "'");
        $message = "Record Modified Successfully";

        header("Location: serviceupdate.php");
	    die;
    }

?>
<html>
<head>
<title>Update Labor Charges</title>
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
<a href="serviceupdate.php">Back</a>
</div>
<br>

<?php
    $result = mysqli_query($con,"SELECT * FROM SERVICES WHERE Service_Type='" . $_GET['Service_Type'] . "' AND Vehicle_Type='" . $_GET['Vehicle_Type'] . "'");
    $row= mysqli_fetch_array($result);
?>

Service Type: <?php echo $row['Service_Type']; ?><br>
<br>
Vehicle Type: <?php echo $row['Vehicle_Type']; ?><br>
<br>
Labor Charge:
<input type="text" name="Labor_Charge" class="txtField" value="<?php echo $row['Labor_Charge']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
    </div>
</body>
</html>