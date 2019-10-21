<?php

include('db.php');
include("function.php");

if(isset($_POST["sekolah_id"]))
{
	$image = get_image_name($_POST["sekolah_id"]);
	if($image != '')
	{
		unlink("uploads/logo/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM sekolah WHERE sekolah_id = :sekolah_id"
	);
	$result = $statement->execute(
		array(
			':sekolah_id'	=>	$_POST["sekolah_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>