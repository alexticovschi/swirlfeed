<?php include('includes/header.php'); ?>
<?php include('includes/classes/User.php'); ?>
<?php include('includes/classes/Post.php'); ?>

<?php  

if(isset($_POST['post'])) {
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}

?>


<?php //session_destroy(); ?>

		<div class="user_details column">
			<a href="<?php echo $userLoggedIn; ?>">
				<img src="<?php echo $user['profile_pic']; ?>" alt="profile pic" />
			</a>
			<div class="user_details_left_right">
				<a href="<?php echo $userLoggedIn; ?>">
					<?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
				</a>
				<br>
			
				<?php 
					echo "Posts: " . $user['num_posts'] . "<br>"; 
					echo "Likes: " . $user['num_likes'];
				?>
			</div>
		</div>
		
		<div class="main_column column">
			<form class="post_form" action="index.php" method="POST">
				<textarea name="post_text" id="post_text" placeholder="Got something to say?" cols="40" rows="3"></textarea>
				<input type="submit" name="post" id="post_buttom" value="Post">
				<hr>
			</form>

			<?php 

			$post = new Post($con, $userLoggedIn);
			$post->loadPostsFriends();

			?>
		</div>



	</div>
</body>
</html>