<?php 
$page_title = 'Register';

// Include the header
include('includes/header.html');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    // Connect to the database
    require ('mysqli_connect.php');

    // Check that first name is entered
    if (empty($_POST['first_name'])){
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_escape_string($dbc, trim ($_POST['first_name']));
    }

    // Check last name
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_escape_string($dbc, trim($_POST['last_name']));
    }

    //Check email
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_escape_string($dbc, trim($_POST['email']));
    }

    // Validate passwords
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }

    if(empty($errors)) {
        
        // Add user to the database
        $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) 
                    VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";
        $r = @mysqli_query ($dbc, $q);  // The @ suppresses strange errors from displaying to users

        if ($r) {
            echo '<h1>Thank you!</h1>
                <p>You are now registered. Click the login link above to get started!</p>
                <p><br /> </p>';

            // Send mail to the registered user
            $to = $e;
            $subject = "You have registered an account with me!";
            $body = "Congratulations! Your registration worked!";
            mail ($to, $subject, $body);
        } else {
            echo '<h1>System Error</h1>
            <p class="error"> You could not be registered.</p>';
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
 ?> <!-- End of PHP section. Begin HTML form. -->

 <h1>Register</h1>
 <form action="" method="post">
    <p>First Name: <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
    <p>Last Name: <input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    <p>Email: <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
    <p>Password: <input type="password" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
    <p>Confirm Password: <input type="password" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
    <p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php 
include ('includes/footer.html');
 ?>    

    

