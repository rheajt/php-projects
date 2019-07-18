<?php 
session_start();
include('includes/vocab_functions.inc.php');

$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()- 3600);

redirect_user();


 ?>