<?php  

$con = mysqli_connect("localhost", "root", "root", "swirlfeed");

if($con) {
	echo "Connected!";
} else if(mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome To Swirlfeed</title>
</head>
<body>
	<h1>PHP7 Rules!</h1>
	
</body>
</html>