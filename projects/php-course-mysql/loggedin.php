<?php 
session_start();

if (!isset($_SESSION['users_id'])) {
    require ('includes/login_functions.inc.php');
    redirect_user('login.php');  
}

$page_title = 'Logged in!';
include('includes/header.html');

echo "<h1>Logged in!</h1>
    <p>Welcome! You are now logged in, {$_SESSION['first_name']}!</p>";

// Log the event in the registration_log.txt file
$myFile = "registration_log.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $_SESSION['first_name']."\n";
fwrite($fh, $stringData);
fclose($fh);

echo '<h3>Want to upload a text file? <a href="upload.php">Do that here!</a></h3>';

include('includes/footer.html');

 ?>