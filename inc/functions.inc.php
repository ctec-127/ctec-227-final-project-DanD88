<?php

function log_page($db,$page_name){
	if(!isset($_SESSION['id'])){
		$user_id = "0";
	} else {
		$user_id = $_SESSION['id'];
	}
	$sql = "INSERT INTO logs (user_id,page_name) VALUES ('$user_id','$page_name')";
	$result = $db->query($sql);
}

function build_select($db,$key){
	$sql = "SELECT name,value FROM keywords WHERE key_name='" . $key . "'";

	$result = $db->query($sql);

	while($row = $result->fetch_assoc()) {?>
		<option value=<?php echo '"' . $row['value'] . '"' . ">" . $row['name'] . "</option>";?>
	<?php }
}

function display_inventory($result) {
	echo '<table id="user_data" class="table table-striped table-bordered">';
	echo '<thead id="data" class="table-dark"><tr><th>Item Num</th>
	<th>Description</th><th>On Hand</th><th>Category</th><th>Price</th></tr></thead>';

	while ($row = $result->fetch_assoc()) { 
		echo "<tr>";
		echo "<td>{$row['ItemNum']}</td>";
		echo "<td>{$row['prodName']}</td>";
		echo "<td>{$row['OnHand']}</td>";
		echo "<td>{$row['category']}</td>";
		echo "<td>{$row['price']}</td>";
		//echo "<td>{$row['ProdImage']}</td>";

	}
	echo '</table>';
}

function category_select($db,$key){
	$sql = "SELECT name,value FROM category WHERE category_name='" . $key . "'";

	$result = $db->query($sql);

	while($row = $result->fetch_assoc()) {?>
		<option value=<?php echo '"' . $row['value'] . '"' . ">" . $row['category_name'] . "</option>";?>
	<?php }
}

function fill_category_list($db)
{
 $sql = "
 SELECT * FROM category  
 ORDER BY category_name ASC
 ";
 $result = $db->query($sql);

 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
 }
 return $output;
}



//Total number of users

function User_Count ($db) {
    $sql = "SELECT COUNT(id) FROM user";
    $result = mysqli_query($db,$sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}

// Category Count
function Category_Count($db) {
    $sql = "SELECT COUNT(category_id) FROM category";
    $result = mysqli_query($db,$sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}

// Item Count
function Item_Count($db) {
    $sql = "SELECT COUNT(id) FROM inventory";
    $result = mysqli_query($db,$sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}






	
		
		
		
		
		
		
	




