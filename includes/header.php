<?php require('config/config.php'); ?>

<?php  

if(isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_assoc($user_details_query);
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Swirlfeed</a>
		</div>

		<nav>
			<a href="<?php echo $userLoggedIn; ?>"><?php echo $user['first_name']; ?></a>
			<a href="#"><i class="fa fa-home fa-lg"></i></a>
			<a href="#"><i class="fa fa-envelope fa-lg"></i></a>
			<a href="#"><i class="fa fa-bell-o fa-lg"></i></a>
			<a href="#"><i class="fa fa-users fa-lg"></i></a>
			<a href="#"><i class="fa fa-cog fa-lg"></i></a>
			<a href="includes/handlers/logout.php"><i class="fa fa-sign-out fa-lg"></i></a>
		</nav>
	</div>

	<div class="wrapper">
		