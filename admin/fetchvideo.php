<?php
include('db.php');
include('function.php');  
/*$id = $row["sekolah_id"];
	$sql = "SELECT * FROM sekolah WHERE sekolah_id = '$id' "; 
	$resultsql = mysqli_query($con, $sql);
		
	while($row = mysqli_fetch_assoc($resultsql)){
		$sekolah_nama = $row['sekolah_nama'];
	}      */
$query = '';
$output = array();
$query .= "SELECT * FROM video ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE video LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sekolah_id LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sekolah_id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = '<button type="button" name="update" video_id="'.$row["video_id"].'" class="btn btn-primary update"><i class="fa fa-edit"></i></button>';
	$sub_array[] = '<button type="button" name="delete" video_id="'.$row["video_id"].'" class="btn btn-primary delete"><i class="fa fa-remove"></i></button>';	
	$sub_array[] = $row["video"];
	$sub_array[] = $row["video_id"];
	$sub_array[] = $row["sekolah_id"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>