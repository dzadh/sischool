<?php
include('db.php');
include('function.php');
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		echo $_POST["caption"];
		
	}

	/*if($_POST["operation"] == "Edit")
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
			"UPDATE galeri
			SET sekolah_id = :sekolah_id, caption = :caption,image = :image  
			WHERE id_foto = :id_foto
			"
		);
		$result = $statement->execute(
			array(
				':sekolah_id'		=>	$_POST["sekolah_id"],
				':caption'			=>	$_POST["caption"],
				':image'			=>	$image,
				':id_foto'			=>	$_POST["id_foto"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}*/
}

?>