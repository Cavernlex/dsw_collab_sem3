<?php

session_start();

$conn = mysqli_connect("localhost","root","","music");

if(!$conn)
	echo"Error connecting".mysqli_error();

if(isset($_POST['user_name']) && isset($_POST['pass_word']))
{
$username = $_POST['user_name'];
$password = $_POST['pass_word'];

$login_query = mysqli_query($conn,"SELECT user_id,user_name FROM users WHERE pass_word='$password' AND user_name='$username'");
$login = mysqli_fetch_assoc($login_query);

if(mysqli_num_rows($login_query) != 0)
{
	echo"logged in";
	$_SESSION['user_id'] = $login['user_id'];
	$_SESSION['user_name'] = $login['user_name'];
}
}
?>


<html>
<body>
<link rel="stylesheet" type="text/css" href="navigation.css">

<div class="top_nav">
<div id="logged_in"> 
<?php if(isset($_SESSION['user_name']))
{
	echo"logged in as".$_SESSION['user_name']; 
}

?> </div>
<a href="proj.php" > Home </a>
<a href=""> Genres </a>

<?php 
if(isset($_SESSION['user_name']))
{
	echo"<a href=''> My reviews </a>";
	
	if((mysqli_num_rows(mysqli_query($conn,"SELECT artist_id,user_id FROM artist_users WHERE user_id=$_SESSION[user_id];")))!=0)
	{
		echo"<a href='my_music.php' > My music </a>";
	}
}
	?>

<form action="search.php" method="post">
<input type="text" name="searching" placeholder="search...">
</form>

<?php
 if(isset($_SESSION['user_name']))
	 echo"<a id ='logout' href='logout.php'>logout</a>";
	
else
	echo"<a id='login' href = 'login.htm'>login</a>";
	

?>


</div>

<br>