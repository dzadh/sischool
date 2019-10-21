<?php
include('db.php');
include('function2.php');
if(isset($_POST["id_foto"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM galeri 
		WHERE id_foto = '".$_POST["id_foto"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id_foto"] = $row["id_foto"];
		$output["caption"] = $row["caption"];
		$output["sekolah_id"] = $row["sekolah_id"];
		if($row["foto"] != '')
		{
			$output['user_image'] = '<img src="uploads/images/'.$row["foto"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row["foto"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>