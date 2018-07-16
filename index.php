<?php include('includes/header.php'); ?>
<?php //session_destroy(); ?>

	<h1><?php if(isset($_SESSION['username'])) echo 'Hello ' . $_SESSION['username'] . '!'; ?></h1>
</body>
</html>