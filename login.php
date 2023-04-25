<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Cust_Email_Id = $_POST['Cust_Email_Id'];
		$Password = $_POST['Password'];

		if(!empty($Cust_Email_Id) && !empty($Password))
		{

			//read from database
			$query = "select * from customer where Cust_Email_Id = '$Cust_Email_Id' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $Password)
					{

						$_SESSION['Cust_Id'] = $user_data['Cust_Id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            <h3>Email Id</h3>
			<input id="text" type="text" name="Cust_Email_Id"><br><br>
            <h3>Password</h3>
			<input id="text" type="password" name="Password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
			<a href="adminlogin.php">Click for Admin Login</a><br><br>
		</form>
	</div>
</body>
</html>