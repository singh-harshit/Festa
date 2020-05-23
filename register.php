<link rel="stylesheet" type="text/css" href="style.css">
<?php
require 'var.php';
require 'connect.inc.php';
$table = 'loging';
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
				echo '<script>alert("Please adhere to max length limits")</script>';
			}
			else
			{
				if(strlen($password)<8)
				{
					echo '<script>alert("Password less than 8 characters")</script>';
				}
				else
				{
					if($password==$password_again)
					{
						$password = md5($password);
						$query = "INSERT INTO `$table` VALUES ('".mysqli_real_escape_string($con,$username)."','".mysqli_real_escape_string($con,$password)."','".mysqli_real_escape_string($con,$firstname)."','".mysqli_real_escape_string($con,$lastname)."')";
						if($query_run=mysqli_query($con,$query))
						{
							$_SESSION['username']=$username;
							header('Location: index.php');
						}
						else 
						{
							echo '<script>alert("username exists already")</script>';
							?>
							<a href="index.php">Log in</a>
							<?php
						}
					}
					else 
					{
						echo '<script>alert("Passwords dont match")</script>';
					}
				}
			}
		}
		else
		{
			echo '<script>alert("Please fill in all fields")</script>';
		}
	}
	?>
	<div id=register>
		<div id="reg_login">
		<a href="index.php"><button >Log in</button></a>
		</div>
		<h1>Welcome New Users</h1>
			<form action="register.php" method="POST">
			Username<br> <input type="text" name="username" maxlength="30" value="<?php echo @$username; ?>"><br><br>
			Password<br> <input type="password" name="password"><br><br>
			Password again<br> <input type="password" name="password_again"><br><br>
			Firstname<br><input type="text" name="firstname" maxlength="30" value="<?php echo @$firstname; ?>"><br><br>
			Lastname<br> <input type="text" name="lastname" maxlength="30" value="<?php echo @$lastname; ?>"><br><br>

			<button><input type="submit" name="Register" id="submit"></button><br><br>
			</form>
	</div>
<?php
}
else 
{
	echo 'you are logged in';
}

?>