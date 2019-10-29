<?php

if(isset($_POST['stars']) && isset($_POST['review']))
{
echo $_POST['stars'].$_POST['review'].$_GET['album_id_session'];

}

if(isset($_GET['album_id_session']))
{
echo "getting ok";

}

else
	 echo "error";
?>