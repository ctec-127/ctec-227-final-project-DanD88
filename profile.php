<?php

session_start();
try {
    require_once('inc/mysqli_connect.php');
    require_once('inc/functions.inc.php');
    log_page($db, "Profile");
} catch (Exception $e) {
    $error = $e->getMessage();
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    $sql = "SELECT * FROM user WHERE id=" . $_GET['id'];

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $role = $row['role'];
}
?>

<?php

require_once("inc/layout/header.inc.php");
require_once("inc/functions.inc.php");

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required = array('firstname', 'lastname', 'email');

    $error = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }

    if ($error) {
        echo '<div class="error">All fields are required.</div>';
    } else {

        $sql = "UPDATE user SET first_name='" . $_POST['firstname'] .
            "',last_name='" . $_POST['lastname'] .
            "',email='" . $_POST['email'] .
            "',role='" . $_POST['role'] .
            "' WHERE id=" . $id;


        $result = $db->query($sql);

        if ($db->error) {
            echo '<div class="error">' . $db->error . '</div>';
        } else {
            // reset the session variables
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['role'] = $_POST['role'];
            echo header("location:logout.php");
            $success = true;
        }
    }
}





$db->close();

if (!$success) { ?>

    <div class="container">
        <h1 id="pro-title">Profile</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
            <div class="profile form-group border border-dark rounded">
                <label class="form-label" for="role">User Role:</label>
                <select class="custom-select" id="role" name="role">
                    <option value="user" <?php if ($role == 'user') {echo "selected";} ?>>User</option>
                    <option value="master" <?php if ($role == 'master') { echo "selected";} ?>>Master</option>
                </select>
                <br>
                <br>
                <label class="form-label" for="firstname">First Name:</label>
                <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $first_name; ?>">
                <br>
                <label class="form-label" for="lastname">Last Name:</label>
                <input class="form-control" type="text" id="lastname" autocomplete="off" name="lastname" value="<?php echo $last_name; ?>">
                <br>

                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>">
                <br>
                <input class="btn btn-primary" type="submit">
            </div>
        </form>
    </div>
<?php } ?>
<?php

require_once("inc/layout/footer.inc.php");

?>