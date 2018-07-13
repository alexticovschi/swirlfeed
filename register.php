<?php  
session_start(); // starts a session which allows to store variable values inside a sesion variable
 
$con = mysqli_connect("localhost", "root", "root", "swirlfeed");

if(mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}

// Declaring variables to prevent errors
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = [];

if(isset($_POST['register_button'])) {
	// Registration form values

	// First name
	$fname = strip_tags($_POST['reg_fname']); // remove html tags
	$fname = str_replace('', '', $fname); // remove spaces
	$fname = ucfirst(strtolower($fname)); // uppercase first letter
	$_SESSION['reg_fname'] = $fname; // stores first name into session variable

	// Last name
	$lname = strip_tags($_POST['reg_lname']); // remove html tags
	$lname = str_replace('', '', $lname); // remove spaces
	$lname = ucfirst(strtolower($lname)); // uppercase first letter
	$_SESSION['reg_lname'] = $lname; // stores last name into session variable


	// Email
	$em = strip_tags($_POST['reg_email']); // remove html tags
	$em = str_replace('', '', $em); // remove spaces
	$em = ucfirst(strtolower($em)); // uppercase first letter
	$_SESSION['reg_email'] = $em; // stores email into session variable


	// Confirmation Email
	$em2 = strip_tags($_POST['reg_email2']); // remove html tags
	$em2 = str_replace('', '', $em2); // remove spaces
	$em2 = ucfirst(strtolower($em2)); // uppercase first letter
	$_SESSION['reg_email2'] = $em; // stores email2 into session variable


	// Password
	$password = strip_tags($_POST['reg_password']); // remove html tags
	// Confirmation Password
	$password2 = strip_tags($_POST['reg_password2']); // remove html tags

	// Curent date
	$date = date("Y-m-d");

	if($em == $em2) {
		// Check if email is in valid format
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			// Check if email already exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='{$em}'");

			// Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows) {
				array_push($error_array, "Email already in use!<br>");
			}

		} else {
			array_push($error_array, "Invalid email format<br>");
		}
	} else {
		array_push($error_array, "Emails don't match");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters");
	}
	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array, "Your last name must be between 2 and 25 characters");
	}
	if($password != $password2) {
		array_push($error_array, "Your passwords do not match!");
	} else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be between 5 and 30 characters");
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome To Swirlfeed</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; }  ?>" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; }  ?>" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; }  ?>" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; } ?>" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="register_button" value="Register">
	</form>
</body>
</html>



