<?php

include('db.php');
include("function2.php");

if(isset($_POST["id_foto"]))
{
	$image = get_image_name($_POST["id_foto"]);
	if($image != '')
	{
		unlink("uploads/images/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM galeri WHERE id_foto = :id_foto"
	);
	$result = $statement->execute(
		array(
			':id_foto'	=>	$_POST["id_foto"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>