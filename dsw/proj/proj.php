<?php  include 'navigation.php';?>


<head>
<link rel="stylesheet" type="text/css" href="proj.css">
</head>

<?php

$latest_result = mysqli_query($conn,"SELECT * FROM album JOIN artist ON album.artist_id = artist.artist_id ORDER BY release_date LIMIT 3");

while($latest = mysqli_fetch_assoc($latest_result))
{
}
	?>
	

<div class="links">
 <a href=""> New Releases </a> <br>
 <a href=""> All time high scores</a> <br>
 <a href=""> Index of Artists </a> <br>
 <a href=""> Year high scores </a> <br>
</div>


<div class="top_rated">
<?php  include 'top_rated.php';?>

</div>

</body>
</html>
