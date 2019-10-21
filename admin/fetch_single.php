<?php
include('db.php');
include('function.php');
if(isset($_POST["sekolah_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM sekolah 
		WHERE sekolah_id = '".$_POST["sekolah_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["sekolah_nama"] = $row["sekolah_nama"];
		$output["sekolah_deskripsi"] = $row["sekolah_deskripsi"];
		$output["sekolah_region"] = $row["sekolah_region"];
		$output["sekolah_jenjang"] = $row["sekolah_jenjang"];
		$output["sekolah_alamat"] = $row["sekolah_alamat"];
		$output["sekolah_telepon"] = $row["sekolah_telepon"];
		$output["sekolah_email"] = $row["sekolah_email"];
		$output["sekolah_web"] = $row["sekolah_web"];

		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="uploads/logo/'.$row["image"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>