<?php 
$page_title = "Do you know this word?";
include('includes/header.html');

// Include some required stuff
include('includes/vocab_functions.inc.php');
include('vocab_mysql_conn.php');

//Validate the student being sent to the page
if (isset($_GET['id']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['cls'])) {
    $id = mysqli_real_escape_string($dbc, $_GET['id']);
    $fname = mysqli_real_escape_string($dbc, trim($_GET['fname']));
    $lname = mysqli_real_escape_string($dbc, trim($_GET['lname']));
    $class = mysqli_real_escape_string($dbc, trim($_GET['cls']));
    $class = str_replace("/", "-", $class);
} elseif (isset($_GET['fname']) && isset($_GET['lname'])) {
    $q = "SELECT MAX(school_id) FROM students";
    $r = mysqli_query($dbc, $q);
    $result = mysqli_fetch_row($r);
    
    $id = $result[0] + 1;
    $fname = mysqli_real_escape_string($dbc, trim($_GET['fname']));
    $lname = mysqli_real_escape_string($dbc, trim($_GET['lname']));
    $class = "X-X";
} elseif (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbc, $_GET['id']);
    $q = "SELECT school_id FROM students WHERE school_id='$id'";
    $r = mysqli_query($dbc, $q);
    
    // Make sure that the student is in the database and if not, kick them back to the index
    if (mysqli_num_rows($r) == 0) {
        redirect_user();
    }
} else {
    redirect_user();
}

//Are they registered?
$q = "SELECT school_id FROM students WHERE school_id='$id'";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 0) {
    //Create new user

    $cur_and_start = rand(1, 1527);
    $q = "INSERT INTO students (school_id, first_name, last_name, class, curr_level, start_level) VALUES ('$id', '$fname', '$lname', '$class', '$cur_and_start', '$cur_and_start')";
    $r = mysqli_query($dbc, $q);
} 

$q = "SELECT * FROM students WHERE school_id='$id'";
$r = mysqli_query($dbc, $q);

$_SESSION = @mysqli_fetch_array($r, MYSQLI_ASSOC);
redirect_user('vocab_challenge.php');

include('includes/footer.html');
 ?>