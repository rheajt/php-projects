<?php 
$page_title = 'Register';

// Include the header
include('includes/header.html');
include('includes/kwl_functions.inc.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    // Connect to the database
    require ('kwldb_conn.php');

    // Check that first name is entered
    if (empty($_POST['first_name'])){
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim ($_POST['first_name']));
    }

    // Check last name
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }

    //Check email
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    // Validate passwords
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }

    if(empty($errors)) {
        
        // Add user to the database
        $q = "INSERT INTO users (first_name, last_name, email, role, pass, registration_date) 
                    VALUES ('$fn', '$ln', '$e', 'teacher', SHA1('$p'), NOW() )";
        $r = @mysqli_query ($dbc, $q);  // The @ suppresses strange errors from displaying to users

        if ($r) {
            redirect_user();
        } else {
            // Error reporting. Should remove the mysqli_error call
            echo '<div class="alert alert-danger"><h1>System Error</h1>
            <p class="alert alert-danger"> You could not be registered.</p>';
            echo '<p>'. mysqli_error($dbc).'<br><br> Query: '. $q. '</p></div>';
        } 

        mysqli_close($dbc);
        include ('includes/footer.html');
        exit();

    } else {
        // display the error messages to the user
        echo '<div class="alert alert-danger">';
        echo '<h1>Error!</h1>
            <p> The following error(s) occurred:<br>';

        foreach($errors as $msg) {
            echo "$msg<br>\n";
        }

        echo '<p>Please try again.</p></div>';
    }
} elseif (($_SERVER['REQUEST_METHOD'] == "GET") && (isset($_GET['email'])) && (isset($_GET['id'])) && (isset($_GET['fname'])) && (isset($_GET['fname']))) {
    // Auto register student accounts
    require('kwldb_conn.php');
    
    $id = mysqli_real_escape_string($dbc, $_GET['id']);
    $em = mysqli_real_escape_string($dbc, $_GET['email']);
    $fn = mysqli_real_escape_string($dbc, $_GET['fname']);
    $ln = mysqli_real_escape_string($dbc, $_GET['lname']);

    $query = "SELECT email FROM users WHERE email='$em'";
    $result = mysqli_query($dbc, $query);

    // If they exist in the database, log them in; otherwise add them to the database
    if (mysqli_num_rows($result) == 0) {
        $insert_query = "INSERT INTO users (first_name, last_name, email, role, pass, registration_date) 
                    VALUES ('$fn', '$ln', '$em', 'student', SHA1('$id'), NOW() )";
        $result = mysqli_query($dbc, $insert_query);

        redirect_user('login_page.php');

    } else {
        redirect_user('login_page.php');
    }
}
 ?> <!-- End of PHP section. Begin HTML form. -->

 <h4 class="text-center"><i class="fa fa-user-plus fa-3x">New User</i></h4><br>
 <div class="col-md-4"></div>
 <div class="col-md-4">
     <form action="" method="post">
        <div class="input-group">
            <p>First Name: <input class="form-control" type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
            <p>Last Name: <input class="form-control" type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
            <p>Email: <input class="form-control" type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
            <p>Password: <input class="form-control" type="password" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
            <p>Confirm Password: <input class="form-control" type="password" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
            <p><input class="form-control" type="submit" name="submit" value="Register" /></p>
        </div>
    </form>
</div>
<div class="col-md-4"></div>

<?php 
include ('includes/footer.html');
 ?>    

    

