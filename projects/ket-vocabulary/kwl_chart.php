<?php 
$page_title = "KWL Chart";
include('includes/header.html');
include('includes/vocab_functions.inc.php');
include('vocab_mysql_conn.php');


if (isset($_GET['id'])) {
    $id = $_SESSION['school_id'];

    $q = "SELECT vocab_word, example_sentence, status FROM vocab WHERE school_id='$id'";
    $r = mysqli_query($dbc, $q);

    $learned = array();
    $not_learned = array();
    $ex_sent = array();
    while($res = mysqli_fetch_assoc($r)){
        if ($res['status'] == 'known') {
            $learned[] = $res['vocab_word'];
        } else {
            $not_learned[] = $res['vocab_word'];
            $ex_sent[] = $res['example_sentence'];
        }
    }
} else {
    redirect_user();
}

 ?>
<table class="table">
    <div class="col-md-4 text-center">
        <h3>KNOW</h3>
        <p>
        <?php foreach($learned as $l) {echo $l.', ';} ?>
        </p>
    </div>
    <div class="col-md-4 text-center">
        <h3>WANT to know</h3>
        <p>
        <?php foreach($not_learned as $nl) {echo $nl.', ';} ?>
        </p>
    </div>
    <div class="col-md-4 text-center">
        <h3>LEARNED</h3>
        <p>
        <?php foreach($ex_sent as $es) {echo $es.'<br>';} ?>
        </p>
    </div>

</table>

<?php include('includes/footer.html'); ?>