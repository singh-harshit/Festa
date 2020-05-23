<link rel="stylesheet" type="text/css" href="style.css">
<?php
// ----Links----
$table = 'loging';
require 'var.php';
require 'connect.inc.php';

// ---- Check if the user is logged in ----

if(loggedin())
{
	$firstname=getuserfield($con,'first_name');;
	$lastname=getuserfield($con,'last_name');
	echo 'Logged in as '.$firstname.' '.$lastname.'<br><br><br><a href="logout.php"><button>Log out</button></a><br>';
	 
}
else
{
	require 'login_form.php';
}
?>