<?php 
$page_title = "Words you know!";
include('includes/header.html');
include('includes/vocab_functions.inc.php');
include('vocab_mysql_conn.php');

if(!isset($_SESSION['school_id'])) {
    redirect_user();
}

$id = $_SESSION['school_id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $es = mysqli_real_escape_string($dbc, trim($_POST['example_sentence']));
    $vw = $_POST['voc_word'];
    $_SESSION['score'] += 8;

    $q = "UPDATE vocab SET example_sentence='$es' WHERE school_id='$id' AND vocab_word='$vw'";
    $q2 = "UPDATE students SET score='$_SESSION[score]' WHERE school_id='$id'";
    $r = mysqli_query($dbc, $q);
    $r2 = mysqli_query($dbc, $q2);
}

$q = "SELECT vocab_word FROM vocab WHERE school_id='$id' AND status='unknown' AND example_sentence IS NULL LIMIT 1";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 0) {
    echo "You haven't played the game yet!";
} else {
    
    echo "<form action=\"\" method=\"post\">";
    echo "<h1>Word</h1>";
    while($kw = mysqli_fetch_assoc($r)) {
        echo "<input type=\"hidden\" name=\"voc_word\" value=\"$kw[vocab_word]\" />";
        echo "<h2>$kw[vocab_word]: <input type=\"text\" name=\"example_sentence\" /></h2>";
    }
    echo "<input type=\"submit\" name=\"Submit\" value=\"Submit\" />";
    echo "</form><h3>$_SESSION[score]</h3>";
}

// Add footer to the page
include('includes/footer.html'); 
?>