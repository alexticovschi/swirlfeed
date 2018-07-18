<?php include('includes/header.php'); ?>
<?php //session_destroy(); ?>

		<div class="user_details column">
			<a href="#">
				<img src="<?php echo $user['profile_pic']; ?>" alt="profile pic" />
			</a>
			
			<a href="#">
				<?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
			</a>
			<br>
			<?php 
				echo "Posts: " . $user['num_posts'] . "<br>"; 
				echo "Likes: " . $user['num_likes'];
			?>
		</div>

	</div>
</body>
</html>