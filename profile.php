<!DOCTYPE html>
<html>

<head>
	<title>My Profile</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/templateStyling.css">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
</head>

<body>
	<?php
	include 'db_connection.php';
	include("header.php");
	$username = $_GET["username"];
	$conn = OpenCon();
	$query = 'SELECT first_name, last_name, age, sex, email, num_posts, num_comments, num_pets FROM users WHERE username = "' . $username . '"';
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$name = $row["first_name"] . " " . $row["last_name"];
			$age = $row["age"];
			if ($row["sex"] == "M")
				$sex = "Male";
			else
				$sex = "Female";
			$email = $row["email"];
			$num_posts = $row["num_posts"];
			$num_comments = $row["num_comments"];
			$num_pets = $row["num_pets"];
		}
	} else {
		echo "0 results";
	}
	?>
	<article class="main">
		<div id="info">
			<img id="ppicture" src="images/img_avatar.png" alt="Profile Pciture">
			<br>
			<p class="attribute">
				<b>Name:</b> <?php echo $name; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Age:</b> <?php echo $age; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Sex:</b> <?php echo $sex; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Email Address:</b> <?php echo $email; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Number of Pets:</b> <?php echo $num_pets; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Number of Posts:</b> <?php echo $num_posts; ?>
			</p>
			<br>
			<p class="attribute">
				<b>Number of Comments:</b> <?php echo $num_comments; ?>
			</p>
		</div>
		<div id="editPane">
			<button type="button" id="edit">
				Edit Profile
			</button>
		</div>
		<div id="content">
			<h1 id="pHeading"><?php echo $username; ?></h1>
			<h2 class="cpHeading">My Comments</h2>
			<div class="comments">
				<ul class="commentLog">
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet Consecte...
							</p>
						</a><img src="images/star2.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet
							</p>
						</a><img src="images/star4.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit
							</p>
						</a><img src="images/star0.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet Consecte...
							</p>
						</a><img src="images/star5.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor
							</p>
						</a><img src="images/star3.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet Consecte...
							</p>
						</a><img src="images/star2.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet
							</p>
						</a><img src="images/star4.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit
							</p>
						</a><img src="images/star0.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor Sit Amet Consecte...
							</p>
						</a><img src="images/star5.png" class="commentStars">
					</li>
					<li class="commentItem">
						<a href="#">
							<p class="commentText">
								Lorem Ipsum Dolor
							</p>
						</a><img src="images/star3.png" class="commentStars">
					</li>
				</ul>
			</div>
			<h2 class="cpHeading">My Posts</h2>

			<div class="posts">
				<ul class="postLog">
					<?php
					$query = 'SELECT title FROM posts WHERE author = "' . $username . '"';
					$result = $conn->query($query);
					CloseCon($conn);
					if ($result->num_rows > 0) {
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							echo '<li class="postItem">
							<a href="#"><p class="postText">' .$row["title"]. '
							</p></a><img src="images/star2.png" class="postStars">
							</li>';
						}
					} else {
						echo "0 results";
					}
					?>
				</ul>
			</div>
		</div>
	</article>

</body>

</html>