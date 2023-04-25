<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$User_Name = $_POST['User_Name'];
		$Pass = $_POST['Pass'];

		if(!empty($User_Name) && !empty($Pass))
		{

			//read from database
			$query = "select * from manager where User_Name = '$User_Name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Pass'] === $Pass)
					{

						$_SESSION['SSN'] = $user_data['SSN'];
						header("Location: adminindex.php");
						die;
					}
				}
			}
			
			echo "wrong user name or password!";
		}else
		{
			echo "wrong user name or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
            <h3>User Name</h3>
			<input id="text" type="text" name="User_Name"><br><br>
            <h3>Password</h3>
			<input id="text" type="password" name="Pass"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>