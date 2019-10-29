<?php 

	$conn = mysqli_connect("localhost","root","","music");
	
	if(!$conn)
		echo"Connection failed".mysqli_error();
		
	$result = mysqli_query($conn,"SELECT * FROM album");
	echo"<table>";
	echo"<caption id='caption'>Highest Rated Albums</caption>";
	echo"<th></th> <th>Album Title</th> <th>Artist</th> <th>Critic score</th> <th>User score</th>";
	
	while($row = mysqli_fetch_assoc($result))
	{
	
	
	echo"<tr>";
	?>
	
	<td><a href='rate.php?album_id_session=<?php echo $row['album_id']; ?>'>
	<?php echo"<img src = $row[art_link]>"; ?>
	</a></td>
	
	<?php
	
	$i = 0;
	foreach($row as $cell)
	{
		echo"<td>$cell</td>";
		if(++$i==4)
			break;
	}
	echo"</tr>";
	}
	echo"</table>";
	
?>