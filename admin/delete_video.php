<?php

include('db.php');
include("function.php");

if(isset($_POST["video_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM video WHERE video_id = :video_id"
	);
	$result = $statement->execute(
		array(
			':video_id'	=>	$_POST["video_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>