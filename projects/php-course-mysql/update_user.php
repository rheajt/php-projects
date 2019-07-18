<?php 
$page_title = "Update User Information";
session_start();


// Make sure the user is logged in
if (!isset($_SESSION['users_id'])) {
    require ('includes/login_functions.inc.php');
    redirect_user('login.php');  
}
//The original GET request
$user= $_SESSION['users_id'];

include ('includes/header.html');
require ('mysqli_connect.php') or die('Could not connect to the database.');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = array();

    // Check that first name is entered
    if (empty($_POST['first_name'])){
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = trim ($_POST['first_name']);
    }

    // Check last name
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = trim($_POST['last_name']);
    }

    //Check email
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = trim($_POST['email']);
    }

    if(empty($errors)) {

        // Update the user in the database
        $q = "UPDATE users SET first_name='$fn', last_name='$ln', email='$e' WHERE users_id='$user'";
        $r = @mysqli_query ($dbc, $q);  // The @ suppresses strange errors from displaying to users

        if ($r) {
            echo '<h1>Thank you!</h1>
                <p>You are now updated.</p>
                <p><br /> </p>';
            $_SESSION['first_name'] = $fn;
            $_SESSION['last_name'] = $ln;
            $_SESSION['email'] = $e;
            
        } else {
            echo '<h1>System Error</h1>
            <p class="error"> You could not be updated.</p>';
            echo '<p>'. mysqli_error($dbc).'<br><br> Query: '. $q. '</p>';
        } 

        mysqli_close($dbc);
        include ('includes/footer.html');
        exit();

    } else {
        // display the error messages to the user
        echo '<h1>Error!</h1>
            <p class="error"> The following error(s) occurred:<br>';

        foreach($errors as $msg) {
            echo "$msg<br>\n";
        }

        echo '<p>Please try again.</p>';
    }    
} 




// Get user information from the database
$q = "SELECT first_name, last_name, email FROM users WHERE users_id='$user'";
$r = @mysqli_query($dbc, $q);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

 ?>

<h1>Update your user information: </h1>
<form action="" method="post">
    <p>Update your first name: <input type="text" name="first_name" value=<?php echo $row['first_name']; ?> /></p>
    <p>Update your last name: <input type="text" name="last_name" value=<?php echo $row['last_name']; ?> /></p>
    <p>Update your email address: <input type="text" name="email" value=<?php echo $row['email']; ?> /></p>
    <input type="submit" name="update" value="Update" />
 </form>

<?php // Close out the update_user.php page
include ('includes/footer.html');
 ?>