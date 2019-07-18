<?php 
$page_title = "Student Profile";
include 'includes/header.html';


if (!isset($_SESSION['first_name'])){
    include 'includes/kwl_functions.inc.php';
    redirect_user();
}


 ?>