<?php 

// Redirect the user based on login
function redirect_user($page = 'index.php') {
    // Build the absolute url to redirect the user to the correct page
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    $url = rtrim($url, '/\\');

    $url .= '/'.$page;

    header ("Location: $url");
    exit();
}

function check_login($dbc, $email='', $pass='') {
    // Validates the login information and add any error messages to the error array
    $errors = array();
    
    if(empty($email)) {
        $errors[] = "You forgot to enter your email.";
    } else {
        $e = mysqli_real_escape_string ($dbc, trim($email));
    }

    if (empty($pass)) {
        $errors[] = "You forgot to enter your password";
    } else {
        $p = mysqli_real_escape_string($dbc, trim($pass));
    }

    // If there were no errors above, then it queries the database for user information
    if (empty($errors)) {
        $q = "SELECT users_id, first_name FROM users WHERE email='$e' AND pass=SHA1('$p')";
        $r = @mysqli_query($dbc, $q);

        if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        } else {
            $errors[] = 'The email address and password entered is incorrect.';
        }
    }

    return array(false, $errors);

} //End of the check_login() function

 ?>