<?php
include('db.php');
include('function.php');
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO video (sekolah_id,video) 
			VALUES (:sekolah_id,:video)
		");
		$result = $statement->execute(
			array(
				':sekolah_id'	  		=>	$_POST["sekolah_id"],
				':video'				=>	$_POST["video"],
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}

	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE video
			SET video = :video  
			WHERE id_video = :id_video
			"
		);
		$result = $statement->execute(
			array(
				':video'			=>	$_POST["video"],
				':id_video'			=>	$_POST["id_video"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>