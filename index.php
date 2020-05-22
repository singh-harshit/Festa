<?php
// ----Links----
require 'var.php';
require 'connect.inc.php';

// ---- Check if the user is logged in ----

if(loggedin())
{
	$firstname=getuserfield($con,'first_name');;
	$lastname=getuserfield($con,'last_name');
	echo 'Logged in as '.$firstname.' '.$lastname.'<br><a href="logout.php">Log out</a><br>';
	 
}
else
{
	require 'login_form.php';
}
?>