<?php
include('db.php');
include('function.php');
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
			INSERT INTO sekolah (sekolah_nama, sekolah_deskripsi,sekolah_region,sekolah_jenjang, sekolah_alamat,sekolah_telepon,sekolah_email,sekolah_web, image, premium) 
			VALUES (:sekolah_nama, :sekolah_deskripsi, :sekolah_region,:sekolah_jenjang,:sekolah_alamat,:sekolah_telepon,:sekolah_email,:sekolah_web, :image, 1)
		");
		$result = $statement->execute(
			array(
				':sekolah_nama'	  		=>	$_POST["sekolah_nama"],
				':sekolah_deskripsi'	=>	$_POST["sekolah_deskripsi"],
				':sekolah_region'		=>	$_POST["sekolah_region"],
				':sekolah_jenjang'		=>	$_POST["sekolah_jenjang"],
				':sekolah_alamat'		=>	$_POST["sekolah_alamat"],
				':sekolah_telepon'		=>	$_POST["sekolah_telepon"],
				':sekolah_email'		=>	$_POST["sekolah_email"],
				':sekolah_web'			=>	$_POST["sekolah_web"],
				':image'		  		=>	$image
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
			"UPDATE sekolah
			SET sekolah_nama = :sekolah_nama, sekolah_deskripsi = :sekolah_deskripsi, sekolah_region = :sekolah_region, sekolah_jenjang = :sekolah_jenjang, sekolah_alamat = :sekolah_alamat, sekolah_telepon = :sekolah_telepon, sekolah_email = :sekolah_email, sekolah_web = :sekolah_web, image = :image  
			WHERE sekolah_id = :sekolah_id
			"
		);
		$result = $statement->execute(
			array(
				':sekolah_nama'		=>	$_POST["sekolah_nama"],
				':sekolah_deskripsi'=>	$_POST["sekolah_deskripsi"],
				':sekolah_region'	=>	$_POST["sekolah_region"],
				':sekolah_jenjang'	=>	$_POST["sekolah_jenjang"],
				':sekolah_alamat'	=>	$_POST["sekolah_alamat"],
				':sekolah_telepon'	=>	$_POST["sekolah_telepon"],
				':sekolah_email'	=>	$_POST["sekolah_email"],
				':sekolah_web'		=>	$_POST["sekolah_web"],
				':image'			=>	$image,
				':sekolah_id'		=>	$_POST["sekolah_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>