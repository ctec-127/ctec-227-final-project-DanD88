// fetch using ajax for search mock code

<?php
include('inc/mysqli_connect.php');
include('inc/functions.inc.php');
$query = '';
$output = array();
$query .= "SELECT * FROM inventory ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE ItemNum LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR prodName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR OnHand LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR category LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR price LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
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
    // for image
//  $image = '';
//  if($row["image"] != '')
//  {
//   $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
//  }
//  else
//  {
//   $image = '';
//  }
 $sub_array = array();
 
 $sub_array[] = $row["ItemNum"];
 $sub_array[] = $row["prodName"];
 $sub_array[] = $row["OnHand"];
 $sub_array[] = $row["category"];
 $sub_array[] = $row["price"];
 //$sub_array[] = $ProdImage;
 
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>