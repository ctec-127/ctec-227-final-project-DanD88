<?php 

    session_start();
    try { 
        require_once('inc/mysqli_connect.php');
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>

    <?php
        require 'inc/layout/header.inc.php';
    ?>

    <?php 
        

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $email = $_POST['email'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = hash('sha512',$_POST['password']);

                $sql = "INSERT INTO user (email,first_name,last_name,password) 
                        VALUES('$email','$first_name','$last_name','$password')";
                // echo $sql;
                $result = $db->query($sql);

                if (!$result) {
                    echo "<h3>There was a problem registering your account</h3>";
                } else {
                    
                    echo "<h3>You are now ready to go!</h3>";
                }
                header('location: login.php');
                
        }
    ?>

    <div class="container"></div>   
        <form action="register.php" method="POST">           
            <div class="register form-group border border-dark rounded mt-3">
            <h3>Create an account:</h3>
                <label  class="form-label" for="first_name">First Name</label>
                <input class="form-control" type="text" id="first_name" required name="first_name">
                <br>
                <label  class="form-label" for="last_name">Last Name</label>
                <input class="form-control" type="text" id="last_name" required name="last_name">
                <br>
                <label  class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" required name="email">
                <br>
                <label  class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" required name="password">
                <br>
                <input class="btn btn-primary" type="submit" value="Register">
            </div>
        </form>

        <?php
            require 'inc/layout/footer.inc.php';
        ?>
</body>
</html>