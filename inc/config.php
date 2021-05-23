<?php
session_start();

if ($_SERVER["SERVER_NAME"] == "localhost") {
	
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Karachi");
	
	$base_url = 'http://localhost/projects/donation/';
	$dashboard_url = 'http://localhost/projects/donation/dashboard.php';
	$conn = new mysqli('localhost', 'root', '' , 'empower_humanity');
}
else {
	
	error_reporting(0);
	date_default_timezone_set("Asia/Karachi");
	
	$base_url = 'https://projects.weblancia.com/donation/';
	$dashboard_url = 'https://projects.weblancia.com/donation/dashboard.php';
	$conn = new mysqli('localhost', 'foodnkrd_weblancia', 'fjo03310345' , 'foodnkrd_donation');
}

if(mysqli_connect_errno()) 
{
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
}
else
{
	include_once('functions.php');
}
?>