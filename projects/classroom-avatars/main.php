<?php 
$page_title = "Main Page";
include 'includes/header.html';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // validate the post data before pushing it to the screen

    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $em = $_POST['email'];
    $cls = $_POST['char_class'];
    $gen = $_POST['gender'];


    include_once 'includes/user.class.php';
    $av = new User($fn, $ln, $em, $cls, $gen);
    
}


 ?>


<div class="container-fluid">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <img src="<?= $av->avatar; ?>">
        <h1><?= $av->title; ?></h1>
    </div>
</div>


<?php // Include the footer file
include 'includes/footer.html';
 ?>
