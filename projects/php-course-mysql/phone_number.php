<?php  // This php script checks that the user input is a valid telephone number
$page_title = "Validate a Phone Number";

if (headers_sent()) {
    header('Location: index.php');
}
// Start the session for this page
session_start();

if (!isset($_SESSION['users_id'])) {
    require ('includes/login_functions.inc.php');
    redirect_user('login.php');  
}
// Include the template header
include('includes/header.html');

if (isset($_POST['phone'])) {
    $phone_number = $_POST['phone'];
    $is_valid = check_valid($phone_number);
    echo "<h3>$phone_number is $is_valid phone number</h3><br>";
} else {
    // something that happens when the page first loads
}

function check_valid($phone_number) {
    $phone_pattern = '(^\()([0-9]{3})(\))([0-9]{3})(\-)([0-9]{4})';

    if (eregi($phone_pattern, $phone_number)) {
        return 'a VALID';
    } else {
        return 'an INVALID';
    }
}

 ?>

<fieldset><legend>Enter Phone number below</legend>
<h3>Use format: (000)000-0000</h3>
<form action="" method="post">
    <input type="text" placeholder="(000)000-0000" name="phone" />
    <input type="submit" />
</form>
</fieldset>

<?php // Include the footer template
include('includes/footer.html'); ?>