<?php

include('db.php');
include("function3.php");

if(isset($_POST["nip"]))
{
	$image = get_image_name($_POST["nip"]);
	if($image != '')
	{
		unlink("uploads/guru/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM guru WHERE nip = :nip"
	);
	$result = $statement->execute(
		array(
			':nip'	=>	$_POST["nip"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>