<?php 
$page_title = "Sentence Grader";
include('includes/header.html');
include('includes/vocab_functions.inc.php');
include('vocab_mysql_conn.php');

if($_SESSION['school_id'] != 0) {
    redirect_user();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $score = $_POST['checked_score'];
    echo $score;
}

$q = "SELECT vocab_id, school_id, vocab_word, example_sentence FROM vocab WHERE example_sentence IS NOT NULL checked=0 AND LIMIT 1";
$r = mysqli_query($dbc, $q);


while($row = @mysqli_fetch_row($r)) {
    echo "<div class=\"well\">";
    echo "<form action=\"\" method=\"post\">";
    echo "<h3><B>$row[2]</B> - $row[3] - ";
    echo "
        <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
	  <button type=\"submit\" class=\"btn btn-default\" name=\"checked_score\" value=\"1\">Bad</button>
	  <button type=\"submit\" class=\"btn btn-default\" name=\"checked_score\" value=\"2\">OK</button>
	  <button type=\"submit\" class=\"btn btn-default\" name=\"checked_score\" value=\"3\">Good</button>
	  <button type=\"submit\" class=\"btn btn-default\" name=\"checked_score\" value=\"4\">Great</button>
	</div>
         ";
    echo "</form>";
    echo "</div>";
}


include('includes/footer.html');
 ?>