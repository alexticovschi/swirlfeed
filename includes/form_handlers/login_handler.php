<?php

if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // sanitize email
	$password = strip_tags($_POST['log_password']);
	$_SESSION['log_email'] = $email; // Store email into session variable

	$check_database_query = mysqli_query($con, "SELECT *  FROM users WHERE email='$email'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query) {
		$row = mysqli_fetch_assoc($check_database_query);
		$username = $row['username'];
		$db_user_password = $row['password'];

		if(password_verify($password, $db_user_password)) {

			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit();

		} else {
			array_push($error_array, "Incorrect email or password<br>");
		}
	}

}


?>