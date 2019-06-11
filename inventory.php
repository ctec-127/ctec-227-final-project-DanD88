<?php

session_start();
try {
    require_once('inc/mysqli_connect.php');
    $sql = "SELECT * FROM inventory";
    $result = $db->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<?php
require 'inc/layout/header.inc.php';
?>

<body>
    <div class="container my-5">
        <label class="form-label" for="table"><h2>Inventory Page:</h2></label>
        <input class="border-rounded search" type="text" placeholder="Search:">
    </div>

    <div class="container">

        <?php if (isset($error)) {
            echo "<p>$error</p>";
        }

        $numrows = $result->num_rows;

        if (!$numrows) {
            echo "<p>No rows were found</p>";
        } else {
            echo "<p>Total results found: " . $numrows;

            ?>

            <table class="table">
                <thead id="user_data" class="thead-dark">
                    <tr>
                        <th>Item Num</th>
                        <th>Description</th>
                        <th>On Hand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>

                    <?php
                    // loop through all data

                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['ItemNum']; ?></td>
                            <td><?php echo $row['prodName']; ?></td>
                            <td><?php echo $row['OnHand']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['ProdImage']; ?></td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
    <?php
}
// close db connection
$db->close();
?>

</body>

<?php
require 'inc/layout/footer.inc.php';
?>