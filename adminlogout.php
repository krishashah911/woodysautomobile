<?php

session_start();

if(isset($_SESSION['SSN']))
{
	unset($_SESSION['SSN']);

}

header("Location: login.php");
die;