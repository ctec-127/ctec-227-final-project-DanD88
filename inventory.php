<?php 

    session_start();
    try { 
        require_once('inc/mysqli_connect.php');
        $sql = "SELECT * FROM inventory";
	    $result = $db->query($sql);
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Inventory</title>
</head>   

    <?php
        require 'inc/layout/header.inc.php';
    ?>

    <body>
        <div class="container my-5">
            <h2 class="center">Inventory Page:</h2>
        </div>

        <?php if(isset($error)){
		echo "<p>$error</p>";
    } 
    
    
	

	$numrows = $result->num_rows;

	if (!$numrows){
		echo "<p>No rows were found</p>";
	} else {
		echo "<p>Total results found: " . $numrows;

	?>
	<table class="table">
	<thead class="thead-dark">
		<tr>
			<th scope="row">Item Num</th>
			<th scope="row">Description</th>
			<th scope="row">On Hand</th>
            <th scope="row">Category</th>
            <th scope="row">Price</th>
		</tr>

		<?php 
		// loop through all data

		

		while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['ItemNum'];?></td>
			<td><?php echo $row['description'];?></td>
			<td><?php echo $row['OnHand'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['price'];?></td>
		</tr>
		<?php } ?>
	</table>
	<?php  	
	}
	// close db connection
	$db->close();
	?>

    </body>

    <?php
        require 'inc/layout/footer.inc.php';
    ?>