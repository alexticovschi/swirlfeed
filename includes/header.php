<?php require('config/config.php'); ?>

<?php  

if(isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
} else {
	header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome To Swirlfeed</title>
</head>
<body>