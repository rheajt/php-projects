<?php 
session_start();

require ('includes/kwl_functions.inc.php');



if(!isset($_SESSION['first_name'])) {
    redirect_user();
} else {
    // Remove the session from the server and cookies
    $_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);

    redirect_user();
}


 ?>