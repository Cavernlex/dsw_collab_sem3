<?php  include 'navigation.php';?>

<html>
<body>
<link rel="stylesheet" type="text/css" href="search.css">

<?php

$flag = 0;

if(isset($_POST['searching']))
{	
$query = $_POST['searching'];

$conn = mysqli_connect("localhost","root","","music");
?>

<!-- artist search -->

<?php
$artist_result = mysqli_query($conn,"SELECT artist_id,artist_name FROM artist WHERE artist_name LIKE '%$query%' ORDER BY artist_name");

if(mysqli_num_rows($artist_result)!=0)
{
	$flag = 1;
?>


<div class="heads">
<strong> Artists </strong>
</div>

<br>

<div class="Albums">

<?php 
while($row = mysqli_fetch_assoc($artist_result))
{
	?>
	
	<div class='artist_container'>
	
	<a href='artist.php?artist_id_session=<?php echo $row['artist_id']; ?>'>Adele</a>
	
	</div>

	<?php
}
}
	?>
	
</div>

<br><br>

<!-- album search -->

<?php

$album_result = mysqli_query($conn,"SELECT art_link,artist.artist_id,album_name,artist_name,album_id from artist,album WHERE artist.artist_id=album.artist_id AND ((album_name LIKE '%$query%') OR (artist_name LIKE '%$query%')) ORDER BY release_date");
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
}

	?>
	
	<?php 
	if($flag == 0)
	{
		
	}

	?>
</div>

</body>
</html>
