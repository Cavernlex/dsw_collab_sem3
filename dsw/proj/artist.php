<?php  include 'navigation.php';?>



<html>
<body>
<link rel="stylesheet" type="text/css" href="search.css">

<?php
if(isset($_GET['artist_id_session']))
{
$artist_id_val = $_GET['artist_id_session'];

$conn = mysqli_connect("localhost","root","","music");

$artist_result = mysqli_query($conn,"SELECT artist_name,description from artist WHERE artist_id = $artist_id_val"); 

echo"<div class='artist'>";

while($row = mysqli_fetch_assoc($artist_result))
{
	
	
	echo"<div class='description'>";

	echo $row['artist_name'];
	echo"<br>";
	echo $row['description'];
	
	echo"</div>";
}
?>
	
</div>

<br><br>

<?php
$flag = 0;


$album_result = mysqli_query($conn,"SELECT art_link,artist.artist_id,album_name,artist_name,album_id from artist,album WHERE artist.artist_id=album.artist_id AND artist.artist_id = $artist_id_val ORDER BY release_date");

if(mysqli_num_rows($album_result)!=0)
{
	$flag = 1;
?>

<div class="heads">
<strong> Albums </strong>
</div>

<br>

<div class="Albums">

<?php 
while($row = mysqli_fetch_assoc($album_result))
{
	?>
	
	<?php 
	echo"<div class='album_container'>";
	?>
	
	<a href='rate.php?album_id_session=<?php echo $row['album_id']; ?>'>
	<?php echo"<img src = $row[art_link] class='art'>"; ?>
	</a>
	<?php
	
	echo"<small>$row[album_name]</small><br>";
	echo"<small>$row[artist_name]</small>";
	echo"</div>";
}
}
	?>
	
	<?php 
	if($flag == 0)
	{
		
	}
}
	?>
</div>

</body>
</html>