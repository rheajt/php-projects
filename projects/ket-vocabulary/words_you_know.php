<?php 
$page_title = "Words you know!";
include('includes/header.html');
include('includes/vocab_functions.inc.php');
include('../vocab_mysql_conn.php');

if(!isset($_SESSION['school_id'])) {
    redirect_user();
}

$id = $_SESSION['school_id'];

$q = "SELECT vocab_word, example_sentence FROM vocab WHERE school_id='$id' AND status='known'";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 0) {
    echo "You haven't played the game yet!";
} else {
    $known_words = mysqli_fetch_all($r, MYSQLI_ASSOC);
    
    foreach($known_words as $key => $kw) {
        echo "<p class=\"text-center\">$kw[vocab_word] - $kw[example_sentence]</p>";
    }

}

// Add footer to the page
include('includes/footer.html'); 
?>