<?php 

session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
    $Cust_Id = $user_data['Cust_Id'];
    $Total_Amount = $_GET['Labor_Charge'] + $_GET['Parts_Price'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        mysqli_query($con,"INSERT into INVOICE (Invoice_Id,Total_Amount) values ('" . $_GET['Invoice_Id'] . "','$Total_Amount')");
        $message = "Payment Successfully";

        mysqli_query($con, "UPDATE SERVICE_APPOINTMENT set Status='closed' WHERE Service_Appt_Id='" . $_GET['Service_Appt_Id'] . "'");

        header("Location: invoice.php");
	    die;
    }

?>
<html>
<head>
<title>Make Payment</title>
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
<a href="trackservice.php">Back</a>
</div>
<br>
<?php
    $result = mysqli_query($con,"SELECT * FROM invoice_details WHERE Cust_Id=$Cust_Id AND Invoice_Id='" . $_GET['Invoice_Id'] . "'");
    $row= mysqli_fetch_array($result);
    $Invoice_Id = $_GET['Invoice_Id'];
    $_SESSION['Invoice_Id'] = $Invoice_Id;

    $result2 = mysqli_query($con,"SELECT Credit_Card FROM CUSTOMER WHERE Cust_Id=$Cust_Id");
    $row2= mysqli_fetch_array($result2);
?>

Invoice ID: <?php echo $row['Invoice_Id']; ?><br>
<br>
Select Credit Card: 
<?php
echo '<select name="Credit_Card" id="Credit_Card">';
foreach ($result2 as $row2) {
    if ($selected === $row2['Credit_Card']) {
        echo '<option value="'.htmlspecialchars($row2['Credit_Card']).'" selected >';
    } else {
        echo '<option value="'.htmlspecialchars($row2['Credit_Card']).'">';
    }
    echo htmlspecialchars($row2['Credit_Card']);
    echo '</option>';
}
echo '</select>';
?>
<br>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
    </div>
</body>
</html>