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
	<!-- PopperJS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<!-- BootstrapJS -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- BootstrapCSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Swirlfeed</a>
		</div>
	</div>