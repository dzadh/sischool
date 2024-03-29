<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './uploads/guru/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($nip)
{
	include('db.php');
	$statement = $connection->prepare("SELECT foto_guru FROM guru WHERE nip = '$nip'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["foto_guru"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM guru");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>