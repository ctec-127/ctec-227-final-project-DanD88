<?php
/* login.php */
session_start();

try {
	require_once('inc/mysqli_connect.php');
	require_once('inc/functions.inc.php');
	log_page($db, "Login");
} catch (Exception $e) {
	$error = $e->getMessage();
}

function login($db)
{
	$email = $db->real_escape_string($_POST['email']);
	$password = hash('sha512', $_POST['password']);

	$sql = "SELECT * FROM user WHERE email='" . $_POST["email"] . "'" . " AND password=" . "'" . $password . "' LIMIT 1";

	$result = $db->query($sql);

	if ($result->num_rows == 1) {
		// return true;
		$row = $result->fetch_assoc();
		$_SESSION['firstname'] = $row['first_name'];
		$_SESSION['lastname'] = $row['last_name'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['loggedin'] = 1;
		$_SESSION['role'] = $row['role'];
		header("location: home.php");
	} else {
		return false;
	}
}

?>

<?php
$pageTitle = "Login";
require_once("inc/layout/header.inc.php");
?>

<?php

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Required field names
	$required = array('email', 'password');

	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	foreach ($required as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}

	if ($error) {
		echo "All fields are required.";
	} else {
		$status = login($db);

		if ($status) {
			echo "<br>You are now logged in!";
			$success = true;
		} else {
			echo "<br>Could not log you in. Please try again.";
		}
	}
}

$db->close();

if (!$success) { ?>


	<div class="container my-5">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
			<div class="log form-group border border-dark rounded">
				<h1 class="log-title font-weight-bold text-center">Log in</h1>
			
				<div class="icon-log">
					<i class="fas fa-user fa-8x"></i>
				</div>
				<hr>
				<br>
				<label class="form-label font-weight-bold" for="email">Email:</label>
				<input class="form-control" type="email" id="email" name="email" size="40" maxlength="60" value="<?php if (isset($_POST["email"])) {
					echo $_POST["email"];} ?>">
				<br>
				<label class="form-label font-weight-bold" for="password">Password:</label>
				<input class="form-control" type="password" id="password" name="password" size="20" maxlength="20" value="<?php if (isset($_POST["password"])) {
				echo $_POST["password"];
				} ?>">
				<br>

				<input class="btn btn-primary" type="submit" value="Login">
				<a class="sign-up mx-4" href="register.php">sign up</a>
			</div>
		</form>
	</div>
<?php } ?>

<?php
require_once("inc/layout/footer.inc.php");
?>