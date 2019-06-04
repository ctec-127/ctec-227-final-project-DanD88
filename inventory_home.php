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

require 'inc/add/content.inc.php';

?>



<body>
    <section>

        <button type="button" class="myButton btn btn-info mx-5 btn-lg" data-toggle="modal" data-target="#myModal">Add Items</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="container my-3">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                                <div class="log form-group">
                                    <h2 id="log-title">Add to Inventory</h2>
                                    <br>
                                    <label class="form-label" for="ItemNum">Item Num</label>
                                    <br>
                                    <input class="form-control" type="text" name="ItemNum" id="ItemNum" value="<?php echo (isset($ItemNum) ? $ItemNum : ''); ?>" required>
                                    <br>
                                    <label for="description">Description</label>
                                    <br>
                                    <input class="form-control" type="text" name="prodName" id="prodName" value="<?php echo (isset($prodName) ? $prodName : ''); ?>" required>
                                    <br>
                                    <label for="OnHand">On Hand?</label>
                                    <br>
                                    <input class="form-control" type="text" name="OnHand" id="OnHand" value="<?php echo (isset($OnHand) ? $OnHand : ''); ?>" required>
                                    <br>
                                    <label for="category">Category</label>
                                    <input class="form-control" type="text" name="category" id="category" value="<?php echo (isset($category) ? $category : ''); ?>" required>
                                    <br>
                                    <label for="price">Price</label>
                                    <br>
                                    <input class="form-control" type="text" name="price" id="price" value="<?php echo (isset($price) ? $price : ''); ?>" required>

                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Add">
                        <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : ''); ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <button type="button" class="myButton btn btn-info btn-lg mx-5" data-toggle="modal" data-target="#myModal1">Sell Items</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <p>Something to sell. Possibly sell by typing in ItemNum</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </section>



</body>

</html>