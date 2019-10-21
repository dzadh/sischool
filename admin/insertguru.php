<?php
include('db.php');
include('function3.php');
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO guru (sekolah_id,nama_guru,nip,foto_guru,jabatan_guru,mapel_guru,email_guru) 
			VALUES (:sekolah_id,:nama_guru,:nip, :image,:jabatan_guru,:mapel_guru,:email_guru)
		");
		$result = $statement->execute(
			array(
				':sekolah_id'	  			=>	$_POST["sekolah_id"],
				':nama_guru'				=>	$_POST["nama_guru"],
				':nip'						=>	$_POST["nip"],
				':image'		  			=>	$image,
				':jabatan_guru'				=>	$_POST["jabatan_guru"],
				':mapel_guru'				=>	$_POST["mapel_guru"],
				':email_guru'				=>	$_POST["email_guru"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}

	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE guru
			SET sekolah_id = :sekolah_id, nama_guru = :nama_guru, nip = :nip, jabatan_guru = :jabatan_guru, mapel_guru = :mapel_guru, email_guru = :email_guru, image = :image  
			WHERE nip = :nip
			"
		);
		$result = $statement->execute(
			array(
				':sekolah_id'	  			=>	$_POST["sekolah_id"],
				':nama_guru'				=>	$_POST["nama_guru"],
				':nip'						=>	$_POST["nip"],
				':image'		  			=>	$image,
				':jabatan_guru'				=>	$_POST["jabatan_guru"],
				':mapel_guru'				=>	$_POST["mapel_guru"],
				':email_guru'				=>	$_POST["email_guru"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>