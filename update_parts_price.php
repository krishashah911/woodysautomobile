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

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        mysqli_query($con,"UPDATE PARTS_INVENTORY set Price='" . $_POST['Price'] . "' WHERE Parts_Num='" . $_GET['Parts_Num'] . "' AND Location_Id=$Location_Id");
        $message = "Record Modified Successfully";

        header("Location: partinventory.php");
	    die;
    }

?>
<html>
<head>
<title>Update Parts Price</title>
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
<a href="partinventory.php">Back</a>
</div>
<br>

<?php
    $result = mysqli_query($con,"SELECT * FROM PARTS_INVENTORY WHERE Parts_Num='" . $_GET['Parts_Num'] . "' AND Location_Id=$Location_Id");
    $row= mysqli_fetch_array($result);
?>

Part Number: <?php echo $row['Parts_Num']; ?><br>
<br>
Part Name: <?php echo $row['Parts_Name']; ?><br>
<br>
Part Price:
<input type="text" name="Price" class="txtField" value="<?php echo $row['Price']; ?>">
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
    </div>
</body>
</html>