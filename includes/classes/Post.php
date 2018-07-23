<?php  

class Post {
	private $user_obj;
	private $con;

	public function __construct($con, $user) {
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

	public function submitPost($body, $user_to) {
		$body = strip_tags($body); // removes html tags
		$body = mysqli_real_escape_string($this->con, $body);
		$check_empty = preg_replace('/\s+/', '', $body); // deletes all spaces

		if($check_empty != "") {

			// Current date and time
			$date_added = date("Y-m-d H:i:s");

			// Get username
			$added_by = $this->user_obj->getUsername();

			// If user is on its own profile, user_to is 'none'
			if($user_to == $added_by) { $user_to = "none"; }

			// Insert post 
			$query = "INSERT INTO posts ";
			$query .= "(body, added_by, user_to, date_added, user_closed, deleted, likes) ";
			$query .= "VALUES ('$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')";
			$insert_query = mysqli_query($this->con, $query);
			$returned_id = mysqli_insert_id($this->con);

			// Insert notification


			// Update post count fro user
			$num_posts = $this->user_obj->getNumPosts();
			$num_posts++;

			$query = "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'";
			$update_query = mysqli_query($this->con, $query);
		}
	}

	public function loadPostsFriends() {
		$str = ""; // String to return
		$data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

		while($row = mysqli_fetch_assoc($data)) {
			$id = $row['id'];
			$body = $row['body'];
			$added_by = $row['added_by'];
			$date_added = $row['date_added'];

			// Prepare user_to string so it can be included even if not postsed to a user
			if($row['user_to'] =="none") {
				$user_to = "";
			} else {
				$user_to_obj = new User($con, $row['user_to']);
				$user_to_name = $user_to_obj->getFirstAndLastName();
				$user_to = "<a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
			}

			// Check if user who posted, has their account closed
			$added_by_obj = new User($con, $added_by);
			if($added_by_obj->isClosed()) {
				continue;
			}		
	}
}




?>