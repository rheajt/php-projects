<?php 
$page_title = "Registration Page";
include 'includes/header.html';

// include the redirect function
include 'includes/redirect_user.function.php';

// does the user have the right stuff to get started?
if (!isset($_GET['fn']) && !isset($_GET['ln']) && !isset($_GET['em'])) {
    include 'includes/registration/basic.unfilled.html';
} else {
    include 'includes/registration/basic.html';
}


include 'includes/footer.html'; 


?>