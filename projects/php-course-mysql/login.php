<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Include the login functions and database connection
    require ('includes/login_functions.inc.php');
    require ('mysqli_connect.php');


    // $check is the boolean, $data is the value of either $errors or $row
    list ($check, $data) = check_login ($dbc, $_POST['email'], $_POST['pass']);

    if ($check) {
        session_start();
        $_SESSION['users_id'] = $data['users_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['email'] = $data['email'];
        
        redirect_user('loggedin.php');
    } else {
        $errors = $data;
    }
    mysqli_close($dbc);
}

include ('includes/login_page.inc.php');

 ?>