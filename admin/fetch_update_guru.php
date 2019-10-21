<?php
include('db.php');
include('function3.php');
if(isset($_POST["nip"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM guru 
		WHERE nip = '".$_POST["nip"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nama_guru"] = $row["nama_guru"];
		$output["nip"] = $row["nip"];
		$output["jabatan_guru"] = $row["jabatan_guru"];
		if($row["foto"] != '')
		{
			$output['user_image'] = '<img src="uploads/guru/'.$row["foto"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row["foto"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>