<?php
	$table = 'loging';
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username)&&!empty($password))
		{
			$password = md5($password);
			$query = "SELECT `username` from `$table` WHERE `username` = '".mysqli_real_escape_string($con,$username)."' AND `password`= '".mysqli_real_escape_string($con,$password)."'";
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
					echo '<script>alert("Invalid username or password")</script>';
				}
			}
			else
			{
				echo '<script>alert("Error in database.Try later")</script>';
			}
		}
		else 
		{
			echo '<script>alert("please fill in all fields")</script>';
		}
	}
?>


<header>
	<img class="logo" src="images/logo.jpg" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="login_form.php">Log in</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</nav>
	<a class="cta" href="#"><button>Contact</button></a>
</header>
<div id="login">
	<br><br>
	<form action="<?php echo $current_file; ?>" method="POST">
		Username: <input type="text" name="username"><br><br>
		Password: <input type="password" name="password"><br><br>
		<button><input type="submit" value="Log In" id="submit"></button><br><br>
	</form>
</div>
