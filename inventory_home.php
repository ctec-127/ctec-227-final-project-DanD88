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
require_once('inc/functions.inc.php');
require 'inc/add/content.inc.php';

?>

<body>



    <div class="container my-3 py-5">
        <h1 class="mb-5">Admin Page</h1>

        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card card-1">
                    <div class="card-block">
                        <h2 class="card-title">User Count</h2>
                        <h4 class="card-text">
                            <?php echo User_Count($db); ?>
                        </h4>

                    </div>
                </div>

                <!-- Category Count -->
                <div class="card card-1">
                    <div class="card-block">
                        <h2 class="card-title">Category Count</h2>
                        <h4 class="card-text"><?php echo Category_Count($db); ?></h4>
                    </div>
                </div>

                <!-- Item Count Card -->
                <div class="card card-1">
                    <div class="card-block">
                        <h2 class="card-title">
                            Item Count
                        </h2>
                        <h4 class="card-text">
                            <?php echo Item_Count($db);   ?>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <section class="admin">

        <div class="col-12">
            <div class="row">

                <button type="button" class="myButton btn btn-info mx-5 btn-lg" data-toggle="modal" data-target="#myModal">Add Product</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-body">
                                <div class="container my-3">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                        <div class="add form-group">
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


                                            <?php
                                            if (isset($_POST['category_name'])) {
                                                $category_name = $_POST['category_name'];
                                            } else {
                                                $category_name = "";
                                            }
                                            ?>

                                            <label for="category" class="col-form-label">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="select" <?php if ($category_name == "select") echo ' selected=""'; ?>>--Select--</option>
                                                <option value="Kettle" <?php if ($category_name == "ketle") echo ' selected="kettle"'; ?>>Kettle</option>
                                                <option value="Hops" <?php if ($category_name == "hops") echo ' selected="hops"'; ?>>Hops</option>
                                                <option value="Tools" <?php if ($category_name == "tools") echo ' selected="tools"'; ?>>Tools</option>
                                                <option value="Bucket" <?php if ($category_name == "bucket") echo ' selected="bucket"'; ?>>Bucket</option>
                                                <option value="Fermentation" <?php if ($category_name == "fermentation") echo ' selected="fermentation"'; ?>>Fermentation</option>
                                                <option value="Yeast" <?php if ($category_name == "yeast") echo ' selected="yeast"'; ?>>Yeast</option>
                                            </select>
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
                        </form>
                    </div>
                </div>

                <button type="button" class="myButton btn btn-info btn-lg mx-5" data-toggle="modal" data-target="#myModal1">Sell Product</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-body">
                                <form action="inventory_home.php" method="POST">
                                    <label class="form-label" for="search">Search:</label>
                                    <input class="form-control" type="search" name="search" /><br />
                                    <input type="submit" value="search" />
                                </form>

                                <?php
                                // if (!empty($_REQUEST['term'])) {

                                //     $term = mysql_real_escape_string($_REQUEST['product']);

                                //     $sql = "SELECT * FROM inventory WHERE Description LIKE '%" . $product . "%'";
                                //     $r_query = mysql_query($sql);

                                //     while ($row = mysql_fetch_array($r_query)) {

                                //         echo '<br /> Item Number: ' . $row['ItemNum'];
                                //         echo '<br /> Description: ' . $row['ProdName'];
                                //         echo '<br /> On Hand: ' . $row['OnHand'];
                                //         echo '<br /> Category: ' . $row['category'];
                                //         echo '<br /> Price: ' . $row['price'];
                                //     }
                                // }

                                if (isset($_POST['search'])) {
                                    $search = mysqli_real_escape_string($db, $_POST['search']);
                                    $sql = "SELECT * FROM inventory WHERE ItemNum Like '%search%' ";
                                    $result = mysqli_num_rows($db);
                                    $queryResult = mysqli_num_rows($result);

                                    if ($queryResult > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<table id="user_data" class="table table-striped table-bordered">';
                                            echo '<thead id="data" class="table-dark"><tr><th>Item Num</th>
                                <th>Description</th><th>On Hand</th><th>Category</th><th>Price</th></tr></thead>';


                                            echo "<tr>";
                                            echo "<td>{$row['ItemNum']}</td>";
                                            echo "<td>{$row['prodName']}</td>";
                                            echo "<td>{$row['OnHand']}</td>";
                                            echo "<td>{$row['category']}</td>";
                                            echo "<td>{$row['price']}</td>";
                                            //echo "<td>{$row['ProdImage']}</td>";


                                            echo '</table>';
                                        }
                                    }
                                } else {
                                    echo "There are no results matching your search!";
                                }

                                // if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                //     if(!empty($_POST['search'])){

                                //         $sql = "SELECT * FROM inventory WHERE " . '"' . $_POST["search"] . '"' . " IN (ItemNum, description, category, price) ORDER BY ItemNum ASC";

                                //         $result = $db->query($sql);

                                //         if ($result->num_rows == 0) {
                                //             echo "<p class=\"display-4 mt-4 text-center\">No results found for \"<strong>{$_POST['search']}</strong>\"</p>";

                                //             echo "<p class=\"display-4 mt-4 text-center\">Check the Item Number.</p>";
                                //             // echo "<h2 class=\"mt-4\">There are currently no records to display for <strong>last names</strong> starting with <strong>$filter</strong></h2>";
                                //         } else {
                                //             echo "<h2 class=\"mt-4 text-center\">$result->num_rows record(s) found for \"" . $_POST['search'] . '"</h2>';
                                //             display_inventory($result);
                                //         }
                                //     } else {
                                //         echo "<p class=\"display-4 mt-4 text-center\">No Search Entered</p>";
                                //     }
                                // }
                                ?>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>


                <button type="button" onclick="window.location.href='inventory.php'" class="myButton btn btn-info mx-5 btn-lg">Inventory</button>


                <!--
        <button type="button" class="myButton btn btn-info btn-lg mx-5" data-toggle="modal" data-target="#myModal1">Add Existing Item</button>

         Modal 
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">

                 Modal content
                <div class="modal-content">

                    <div class="modal-body">
                        <form action="<?php 
                                        ?>" method="post">
                            Search: <input type="text" name="product" /><br />
                            <input type="submit" value="Submit" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
-->
            </div>
        </div>
    </section>


</body>

<?php
require 'inc/layout/footer.inc.php';
?>