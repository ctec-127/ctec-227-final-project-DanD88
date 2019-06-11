<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php

try {
	require_once('inc/functions.inc.php');
    require_once('inc/mysqli_connect.php');
    require 'inc/layout/header.inc.php';

	// log page usage
	log_page($db,"Home");

} catch(Exception $e) {
	$error = $e->getMessage();
}
?>

<body>

   
    <div class="front">
        <section id="services" class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Services we offer</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Services we offer</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

<?php
require 'inc/layout/footer.inc.php';
?>