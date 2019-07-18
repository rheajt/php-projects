<?php 
$page_title = "Class Scores";
include('includes/header.html');
include('vocab_mysql_conn.php');

$class = mysqli_real_escape_string($dbc, trim($_GET['cls']));
$class = str_replace("/", "-", $class);

$q = "SELECT first_name, last_name, class, score FROM students WHERE class='$class' ORDER BY score desc";
$r = mysqli_query($dbc, $q);

echo "<h4>Progress for $class</h4>";
while($res = mysqli_fetch_assoc($r)) {
    $score_percentage = ($res['score'] / 3000) * 100;

    echo "
        
        <div class=\"progress\">
          $res[first_name] $res[last_name]
          <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"$score_percentage\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"min-width: 2em; width: $score_percentage%;\">
            $score_percentage%
          </div>
        </div>
        ";
}

include('includes/footer.html');
 ?>
