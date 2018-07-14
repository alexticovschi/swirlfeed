<?php 

ob_start(); // Turn on output buffering
session_start(); // starts a session which allows to store variable values inside a sesion variable
 
$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("localhost", "root", "root", "swirlfeed");

if(mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}


?>