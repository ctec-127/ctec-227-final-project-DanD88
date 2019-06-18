<?php

// require_once "inc/mysqli_connect.php";

require_once('inc/mysqli_connect.php');

$error_bucket = [];
//$db_table = "inventory";

// `id` int(11) NOT NULL,
//   `ItemNum` int(20) NOT NULL,
//   `description` varchar(60) NOT NULL,
//   `OnHand` int(40) NOT NULL,
//   `category` varchar(40) NOT NULL,
//   `price` float NOT NULL

// function display_error_bucket($error_bucket){
//     echo '<p>The following errors were detected:</p>';
//     echo '<div class="pt-4 alert alert-warning" role="alert">';
//         echo '<ul>';
//         foreach ($error_bucket as $text){
//             echo '<li>' . $text . '</li>';
//         }
//         echo '</ul>';
//     echo '</div>';
//     echo '<p>All of these fields are required. Please fill them in.</p>';
// }

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (!empty($_POST['id'])) {
//         $id = $_POST['id'];
//     }

//     if (empty($_POST['ItemNum'])) {
//         array_push($error_bucket, "<p>Please put in the item number.</p>");
//     } else {
//         $ItemNum = $db->real_escape_string(strip_tags($_POST['ItemNum']));
//     }

//     if (empty($_POST['prodName'])) {
//         array_push($error_bucket, "<p>Please put in the Product Name.</p>");
//     } else {
//         $prodName = $db->real_escape_string(strip_tags($_POST['prodName']));
//     }

//     // something goes here to increase count of onhand

//     if (empty($_POST['OnHand'])) {
//         array_push($error_bucket, "<p>Please put in the item quantity.</p>");
//     } else {
//         $OnHand = $db->real_escape_string(strip_tags($_POST['OnHand']));
//     }

//     if (empty($_POST['category'])) {
//         array_push($error_bucket, "<p>Please put in the item category.</p>");
//     } else {
//         $category = $db->real_escape_string(strip_tags($_POST['category']));
//     }

//     if (empty($_POST['price'])) {
//         array_push($error_bucket, "<p>Please put in the item price.</p>");
//     } else {
//         $price = $db->real_escape_string(strip_tags($_POST['price']));
//     }

//     if (count($error_bucket) == 0) {

//         $sql = "INSERT INTO inventory (ItemNum,prodName,OnHand,category,price) ";
//         $sql .= "VALUES ('$ItemNum','$prodName','$OnHand','$category','$price')";
//         // Increment current value
//         //$sql = ("UPDATE inventory SET ONHAND = ONHAND + 1 
//                  //WHERE id = '".$id."'");
       

//         $result = $db->query($sql);

//         if (!$result) {
//             echo '<div> <p>The new item could not be saved.' . $db->error . '.</div>';

//             unset($ItemNum);
//             unset($OnHand);
//             unset($prodName);
//             unset($category);
//             unset($price);
//         }
//     } else {
//         display_error_bucket($error_bucket);
//     }
// } 


// else {
//     $id = $_GET['id'];

//     $sql = "SELECT * FROM store WHERE id=$id LIMIT 1";

//     $result = $db->query($sql);

//     while($row = $result->fetch_assoc()) {
//         $ItemNum = $row['ItemNum'];
//         $ItemNum = $row['OnHand'];
//         $ItemNum = $row['description'];
//         $ItemNum = $row['category'];
//         $ItemNum = $row['price'];
//     }
// }
