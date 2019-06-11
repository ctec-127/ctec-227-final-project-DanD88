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

        $error = false;
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
            }
        }

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

                echo "<h3>You are now ready to go!</h3>";
            }
            header('location: login.php');
        }
    }
    ?>

    <div class="container"></div>
    <form action="register.php" method="POST">
        <div class="register form-group border border-dark rounded my-5">
            <?php if (!$success) { ?>
                <h3>Create an account:</h3>
                <hr>
                <label class="reglabel form-label" for="role">User Role:</label>
                <select class="form-control" id="role" name="role">
                    <?php build_select($db, "user_role"); ?>
                </select>
                <br>
                <label class="form-label" for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" required name="first_name">
                <br>
                <label class="form-label" for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" required name="last_name">
                <br>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" required name="email">
                <br>
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" required name="password">
                <br>
                <input class="btn btn-primary" type="submit" value="Register">
            </div>
        </form>
    <?php } ?>

</body>


<?php
require 'inc/layout/footer.inc.php';
?>