<html>
<body>


<link rel="stylesheet" type="text/css" href="review.css">

<?php 

$conn = mysqli_connect("localhost","root","","music");

if(!$conn)
	echo"Error connecting".mysqli_error();

$user_reviews = mysqli_query($conn,"SELECT users.user_name,rating.score,rating.review,users.profile_pic FROM critic_users,album INNER JOIN rating ON album.album_id=rating.album_id INNER JOIN users ON rating.user_id=users.user_id WHERE critic_users.user_id<>rating.user_id AND album.album_id=$album_id_val;");

$critic_reviews = mysqli_query($conn,"SELECT critic_users.publication,users.user_name,rating.score,rating.review,users.profile_pic FROM critic_users,album INNER JOIN rating ON album.album_id=rating.album_id INNER JOIN users ON rating.user_id=users.user_id WHERE users.user_id=critic_users.user_id AND album.album_id=$album_id_val;");

if((mysqli_num_rows($user_reviews) == 0 )&& mysqli_num_rows($critic_reviews)==0)
	echo "<h2>No reviews available for this album</h2>"."<br><br>";

else
{
	
	echo"<div class='user_container'>";

	if(mysqli_num_rows($user_reviews) != 0 )
	{
		$avg_user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT AVG(score) FROM critic_users,album INNER JOIN rating ON album.album_id=rating.album_id INNER JOIN users ON rating.user_id=users.user_id WHERE critic_users.user_id<>rating.user_id AND album.album_id=$album_id_val;"));
		echo"<h2>User reviews</h2>";
		echo"<b>User Score:</b>".$avg_user['AVG(score)']."<br>";


		while($row = mysqli_fetch_assoc($user_reviews))
		{

			echo "<div class='user_reviews'>";

			echo "<img class='pp' src='$row[profile_pic]'>"."<br>";
			echo "<b>".$row['user_name']."</b>"."<br><br><br>";
			echo "<b>Score:</b>".$row['score']."<br>";
			echo "<b>Review:</b>".$row['review']."<br>";
			echo "</div>";

		} 
	}

?>
</div>

<?php

	echo"<div class='critic_container'>";

	if(mysqli_num_rows($critic_reviews)!=0)
	{
		$avg_critic = mysqli_fetch_assoc(mysqli_query($conn,"SELECT AVG(score),critic_users.publication,users.user_name,rating.score,rating.review,users.profile_pic FROM critic_users,album INNER JOIN rating ON album.album_id=rating.album_id INNER JOIN users ON rating.user_id=users.user_id WHERE users.user_id=critic_users.user_id AND album.album_id=$album_id_val;"));
		
		echo"<h2>Critic reviews</h2>";
		echo"<b>Critic Score:</b>".$avg_critic['AVG(score)']."<br>";


		while($row = mysqli_fetch_assoc($critic_reviews))
		{

			echo "<div class='critic_reviews'>";

			echo "<img class='pp' src='$row[profile_pic]'>"."<br>";
			echo "<b>".$row['user_name']."</b>"."<br>";
			echo "<b align='left'>".$row['publication']."</b>"."<br><br>";
			echo "<b>Score:</b>".$row['score']."<br>";
			echo "<b>Review:</b>".$row['review']."<br>";
			echo "</div>";

		} 
	}
}
?>

</div>

</body>
</html>
