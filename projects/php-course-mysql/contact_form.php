<?php 

//Set the page title and start the session
$page_title = "Contact Form";
session_start();

include('includes/header.html');

//Check to make sure the user is logged in
if (!$_SESSION['users_id']) {
    require ('includes/login_functions.inc.php');
    redirect_user('login.php');  
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //Send the email to the administrator NEEDS VALIDATION ON POST
    $to = "rheajt@gmail.com";
    $subject = $_POST['subject'];
    $body = $_POST['comments'];
    mail($to, $subject, $body, $_SESSION['email']);
}

 ?>

<div class="center">
    <form action="" method="post">
        <fieldset><legend>Send a message to the administrator: </legend>
        <div class="form-group">
            <label>Subject: </label><input class="form-control" type="text" name="subject" />
        </div>
        <div class="form-group">
            <label>Message Body: </label><textarea class="form-control" name="comments" rows="5" cols="30"></textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="submit" name="send_email" value="Send Message" /></fieldset>
        </div>
    </form>
</div>

<?php include('includes/footer.html'); ?>