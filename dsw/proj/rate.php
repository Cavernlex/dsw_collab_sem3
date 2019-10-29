<?php 

include 'navigation.php';

if(isset($_GET['album_id_session']))
{
	$album_id_val = $_GET['album_id_session'];
?>

<head>
<link rel="stylesheet" type="text/css" href="rate.css">
</head>

<div class="music_info">

<?php
 $conn = mysqli_connect("localhost","root","","music");
 
 if(!$conn)
  echo"Error connecting to the database".mysqli_error();
 
 $result = mysqli_query($conn,"SELECT * FROM album,artist where album.artist_id =artist.artist_id AND album.album_id=$album_id_val");

 
while($row = mysqli_fetch_assoc($result))
{
	echo"<img src=$row[art_link] id='album_art'>";
?>

<div class="info">

<?php

	echo"<small id='album'>$row[album_name]</small>";
	echo"<br>";
	echo"<small id='artist'>$row[artist_name]</small><br><br>";
	echo"<p>$row[description]</p>";
	echo"<b>Release: </b>$row[release_date]<br>";
	echo"<b>Genre:  </b>$row[genre] <br>";
	echo"<b>Record Label:  </b>$row[label] <br>";
	echo"<p> </p>";
}
?>
</div>
</div>



<?php  

include 'reviews.php';

?>


<div class="user_review">
<form class="rating" action="insert_review_into.php" method="post">

  <label>
    <input type="radio" name="stars" value="1" />
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="2" />
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="3" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>   
  </label>
  <label>
    <input type="radio" name="stars" value="4" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="5" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
 
  <br><br><br>
  
  <input type="text" name="review" placeholder="Write your review here">
  <input type="submit">
  
</form>

<?php } ?>
</body>
</html>