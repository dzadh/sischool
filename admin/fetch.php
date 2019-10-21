<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM sekolah ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE premium = 0 AND sekolah_nama LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR premium = 0 AND sekolah_region LIKE "%'.$_POST["search"]["value"].'%" ';

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
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="uploads/logo/'.$row["image"].'" class="img-thumbnail" width="100" height="50" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = '<button type="button" name="update" sekolah_id="'.$row["sekolah_id"].'" class="btn btn-primary update"><i class="fa fa-edit"></i></button>';
	$sub_array[] = '<button type="button" name="delete" sekolah_id="'.$row["sekolah_id"].'" class="btn btn-primary delete"><i class="fa fa-remove"></i></button>';
	$sub_array[] = $row["sekolah_nama"];
	$sub_array[] = $row["sekolah_deskripsi"];

	$sub_array[] = $image;
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