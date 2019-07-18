<?php 
$page_title = 'Login';
include ('includes/header.html');

// This prints any error messages that need to be handled
if(isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1>
        <p class="bg-danger">The following error(s) occurred: <br>';

    foreach ($errors as $msg) {
        echo "$msg<br>";
    }
    echo '</p><p>Do you need to register? <a href="register.php">Click here to register!</a></p><p>Please try again.</p>';
}
 ?>

<h1>Login</h1>
<form action="login.php" method="post">
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60" /></p>
    <p>Password: <input type="password" name="pass" size="20" maxlength="60" /></p>
    <p><input type="submit" name="submit" value="login" /></p>
</form>

<?php include('includes/footer.html'); ?>
