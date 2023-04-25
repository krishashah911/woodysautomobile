<?php

session_start();

if(isset($_SESSION['Cust_Id']))
{
	unset($_SESSION['Cust_Id']);

}

header("Location: login.php");
die;