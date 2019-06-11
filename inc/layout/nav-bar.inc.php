
<div>

<?php
if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    $isAdmin = "(Administrator)";
    $user_role = '|&nbsp;&nbsp;<a href="admin.php" title="Administrator">Admin</a>';
} else {
    $user_role = "";
    $isAdmin = "(User)";
}

if(isset($_SESSION['firstname'])){
    echo '<div class="userheader"><i class="fa fa-user-circle-o fa-5 icon"></i>&nbsp;<a href="profile.php?id=' . $_SESSION['id'] . '" class="profilelink" title="Profile">' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . "</a> $isAdmin</div>";
}
?>

</div>

<div class="nav-bar">
        <nav>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand disabled" href="http://">Final Project</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="inventory.php">Inventory</a>
        </li>
        <!--<li class="nav-item">
            <a href="inventory_home.php" class="nav-link">Admin Inventory</a>
        </li>-->
        <?php echo $user_role ?>
        </ul>
       
    </div>
    </nav>
    </nav> -->

    <header>
        <div class="container">
            <h1 class="title text-center display-1">Home Brew Supply Store</h1>           
        </div>
    </header>