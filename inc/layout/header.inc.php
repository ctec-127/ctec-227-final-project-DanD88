<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter:700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/13944e85af.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title><?php echo $pageTitle; "home" ?></title>
</head>
<?php
require_once('inc/functions.inc.php');
?>

<div class="nav-bar">

<?php
		if(isset($_SESSION['role']) && $_SESSION['role'] == "master"){
			$isAdmin = "(Master)";
			$user_role = '<a class="nav-link" href="inventory_home.php" title="Administrator">Admin</a>';
		} else {
			$user_role = "";
			$isAdmin = "(User)";
		}

		if(isset($_SESSION['firstname'])){
			echo '<div class="userheader"><i class="fa fa-user-circle-o fa-5 icon"></i>&nbsp;<a href="profile.php?id=' . $_SESSION['id'] . '" class="profilelink" title="Profile">' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . "</a> $isAdmin</div>";
        }
        
        if(isset($_SESSION['loggedin'])) {
			$logtext = '<a class="nav-link" href="logout.php" title="Logout">Logout</a>;';
		} else {
			$logtext = '<a class="nav-link" href="login.php" title="Login">Login</a>';
		}
		?>

	
	

    <nav class="navbar navbar-expand-lg navbar-dark">

   

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                 <!--<li class="nav-item">
                        <a class="nav-link" href="login.1.php">Login</a>
                    </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventory.php">Inventory</a>
                </li>
                
                <li class="nav-item"><?php echo $user_role ?></li>
                <?php echo $logtext ?>




                <!-- <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php
                                                                                                                                                ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>  -->
        </div>
</div>
</nav>
</nav>

<header>
    <div class="container">
        <h1 class="title text-center display-1">Home Brew Supply Store</h1>
    </div>
</header>