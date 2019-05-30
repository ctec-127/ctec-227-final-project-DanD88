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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>

        

    <?php
        require 'inc/layout/header.inc.php';
    ?>

        <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = hash('sha512',$_POST['password']);

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        //echo $sql;

        $result = $db->query($sql);
        if ($result->num_rows == 1) {

            $_SESSION['loggedin'] = 1;
            $_SESSION['email'] = $email;

            $row = $result->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];

            header('location: home.php');
            
        } else {
            echo '<p>Please try again or go away</p>';
        }
        
        //var_dump($result);

        }

        ?>

        <div class="container my-5">            
                <form action="login.php" method="POST">
                <div class="log form-group border border-dark rounded">
                    <h2 id="log-title">Log in</h2>
                    <br>                
                    <label class="form-label" for="email">Email</label>
                    <br>
                    <input class="form-control" type="email" name="email" id="email" placeholder="user email" required>
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <span id="showPassword" onclick="showPassword()"></span>
                    <input  class="form-control" type="password" name="password" id="password" placeholder="password" required>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Login">
                    <br>
                    <a class="sign-up" href="register.php">sign up</a>
            </div>
            
        </form>

        <script>
            function showPassword() [
                Let passwordField = document.getElementById('password');
                passwordField.type = "text"; 
                
            ]
        </script>
    </div>

    <?php
        require 'inc/layout/footer.inc.php';
    ?>

</body>
</html>