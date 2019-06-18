<?php

session_start();
try {
    require_once('inc/mysqli_connect.php');
    require_once('inc/functions.inc.php');
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<body>

    <?php
    require 'inc/layout/header.inc.php';

    $success = false;


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // $required = array('firstname', 'lastname', 'email', 'password', 'role');

        // $error = false;
        // foreach ($required as $field) {
        //     if (empty($_POST[$field])) {
        //         $error = true;
        //     }
        // }

        if ($error) {
            echo '<div class="error">All fields are required.</div>';
        } else {

            $email = $db->real_escape_string($_POST['email']);
            $first_name = $db->real_escape_string($_POST['first_name']);
            $last_name = $db->real_escape_string($_POST['last_name']);
            $password = hash('sha512', $_POST['password']);
            $role = $db->real_escape_string($_POST['role']);

            $sql = "INSERT INTO user (email,first_name,last_name,password,role) 
                        VALUES('$email','$first_name','$last_name','$password', '$role')";

            $result = $db->query($sql);

            if (!$result) {
                echo "<h3>There was a problem registering your account</h3>";
            } else {

                header('location: login.php');
            }
            
        }
    }
    ?>

    <div class="container"></div>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <div class="register form-group border border-dark rounded my-5">
            <?php if (!$success) { ?>
                <h3>Create an account:</h3>
                <hr>
                <label class="reglabel form-label font-weight-bold" for="role">User Role:</label>
                <select class="form-control" id="role" name="role">
                    <?php build_select($db, "user_role"); ?>
                </select>
                <br><!--
                Select Image:<input type="file" name="image"><br /><br />
                Description:<input type="text" name="desc"><br /><br />
                <input type="submit" name="upload" value="Upload Now">-->
                
                <br>
                <label class="form-label font-weight-bold" for="first_name">First Name:</label>
                <input class="form-control" type="text" id="first_name" required name="first_name">
                <br>
                <label class="form-label font-weight-bold" for="last_name">Last Name:</label>
                <input class="form-control" type="text" id="last_name" required name="last_name">
                <br>
                <label class="form-label font-weight-bold" for="email">Email:</label>
                <input class="form-control" type="email" id="email" required name="email">
                <br>
                <label class="form-label font-weight-bold" for="password">Password:</label>
                <input class="form-control" type="password" id="password" required name="password">
                <br>
                <input class="btn btn-primary" type="submit" value="Register">
            </div>
        </form>

    <?php } ?>

    <?php
    // image upload
    if (isset($_POST['submit'])) {
        $image_name = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $desc = $_POST['desc'];

        $fileExt = explode('.' , $image_name);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg' , 'jpeg' , 'png');

        if (in_array($fileActualExt,$allowed)) {
            if ($fileError === 0) {
                if ($image_size < 1000000) {
                    $fileNameNew = uniqid('', true). "." . $fileActualExt ;
                    $fileDestination = 'photos/'.$fileNameNew;
                    move_uploaded_file($image_tmp_name, $fileDestination);
                } else {
                    echo "file to big!";

                }
            } else {
                echo "There was an error.";
            }
        } else {
            echo "Hey dude you can not upload that file.";
        }


        // move_uploaded_file($image_tmp_name, "photos/$image_name");
        // echo "<img src='photos/$image_name' width='400' height='250'><br>$desc";
    }

    ?>

</body>


<?php
require 'inc/layout/footer.inc.php';
?>