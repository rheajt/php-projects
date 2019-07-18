<?php 
$page_title = 'Index';
include 'includes/header.html';

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require 'includes/schoolyear.class.php';

    $year = new SchoolYear($_POST['start'], $_POST['end']);

    $year->printYear();

    echo '

        <form action="" method="get">
            <input type="submit" name="reset" value="Reload">
        </form>

        ';

} else {

    echo '

        <form action="" method="post">
            Start: <input type="text" id="start" name="start">
            End: <input type="text" id="end" name="end">
            <input type="submit" name="submit">
        </form>

        '; 
}


include 'includes/footer.html';
 ?>


