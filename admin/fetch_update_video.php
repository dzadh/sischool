<?php
include('db.php');
if(isset($_POST["video_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM video 
		WHERE video_id = '".$_POST["video_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["video_id"] = $row["video_id"];
		$output["video"] = $row["video"];
		$output["sekolah_id"] = $row["sekolah_id"];
	}
	echo json_encode($output);
}
?>