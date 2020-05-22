<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}


function loggedin(){
	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
	{
		return true;
	}
	else  
	{
		return false;
	}
}

function getuserfield($con,$field)
{
	$username =$_SESSION['username'];
	global $con;
	$query = "SELECT `".mysqli_real_escape_string($con,$field)."` FROM `logging` WHERE `username`= '".mysqli_real_escape_string($con,$username)."'";
	if($query_run=mysqli_query($con,$query))
	{
		$query_row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
		return $query_row[$field];
	}
}

?>