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
<html>

<!--<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</head>-->

<?php
require 'inc/layout/header.inc.php';
//include('fetch.php');
?>

<body>
    <div class="container my-5">

        <h2>Inventory Page:</h2>

    </div>

    <div class="container pb-5">

        <?php if (isset($error)) {
            echo "<p>$error</p>";
        }

        $numrows = $result->num_rows;

        if (!$numrows) {
            echo "<p>No rows were found</p>";
        } else {
            echo "<p>Total results found: " . $numrows;
        }

        display_inventory($result);
        
            ?>

            
        </div>
    <?php

// close db connection
$db->close();
?>

</body>

<?php
require 'inc/layout/footer.inc.php';
?>

<script>
    $(document).ready(function() {
        $('#user_data').DataTable();
    });
</script>