<?php require('config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome To Swirlfeed</title>
</head>
<body>
	<h1>PHP7 Rules!</h1>
	<h1><?php if(isset($_SESSION['username'])) echo 'Hello ' . $_SESSION['username'] . '!'; ?></h1>
</body>
</html>