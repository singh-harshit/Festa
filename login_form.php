<?php
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username)&&!empty($password))
		{
			$password = md5($password);
			$query = "SELECT `username` from `logging` WHERE `username` = '".mysqli_real_escape_string($con,$username)."' AND `password`= '".mysqli_real_escape_string($con,$password)."'";
			// ---- Check if username password entered matches----
			if($query_run=mysqli_query($con,$query))
			{
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows==1)
				{
					$_SESSION['username']=$username;
					header('Location: index.php');
				}
				else 
				{
					echo 'Invalid username or password';
				}
			}
			else
			{
				echo 'Error';
			}
		}
		else 
		{
			echo 'please fill in all fields';
		}
	}
?>
<form action="<?php echo $current_file; ?>" method="POST">
	Username: <input type="text" name="username"> Password: <input type="password" name="password"><br>
	<input type="submit" value="Log In"><br><br>
	Register as a new user<br>
	<a href='register.php'>Register</a>
</form>