<?php
require 'var.php';
require 'connect.inc.php';
if(!loggedin())
{
	if(isset($_POST['username'])&&
	isset($_POST['password'])&&
	isset($_POST['password_again'])&&
	isset($_POST['firstname'])&&
	isset($_POST['lastname']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_again=$_POST['password_again'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($lastname))
		{
			if(strlen($username)>30||strlen($firstname)>30||strlen($lastname)>30)
			{
				echo 'please adhere to maxlength restrictions';
			}
			else
			{
				if(strlen($password)<8)
				{
					echo 'password less than 8 characters';
				}
				else
				{
					if($password==$password_again)
					{
						$password = md5($password);
						$query = "INSERT INTO `logging` VALUES ('".mysqli_real_escape_string($con,$username)."','".mysqli_real_escape_string($con,$password)."','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$lastname)."')";
						if($query_run=mysqli_query($con,$query))
						{
							$_SESSION['username']=$username;
							header('Location: index.php');
						}
						else 
						{
							echo 'username exists';
							?>
							<a href="index.php">Log in</a>
							<?php
						}
					}
					else 
					{
						echo 'password do not match';
					}
				}
			}
		}
		else
		{
			echo 'All fields are required';
		}
	}
	?>
	<form action="register.php" method="POST">
	Username:<br> <input type="text" name="username" maxlength="30" value="<?php echo @$username; ?>"><br><br>
	Password:<br> <input type="password" name="password"><br><br>
	Password again:<br> <input type="password" name="password_again"><br><br>
	Firstname: <br><input type="text" name="firstname" maxlength="30" value="<?php echo @$firstname; ?>"><br><br>
	Lastname: <br> <input type="text" name="lastname" maxlength="30" value="<?php echo @$lastname; ?>"><br><br>

	<input type="submit" name="Register"><br><br>
	<a href="index.php">Log in</a>
	</form>
<?php
}
else 
{
	echo 'you are logged in';
}

?>