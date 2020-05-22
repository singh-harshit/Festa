<?php

require 'var.php';
require 'connect.inc.php';
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