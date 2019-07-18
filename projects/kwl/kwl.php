<?php 
$page_title = "K - W - L";
include('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // if (isset($_POST['know'])) {
    //     $_SESSION['know'][] = $_SESSION['kwl'][$_SESSION['key']];
    // } elseif (isset($_POST['want'])) {
    //     $_SESSION['want'][] = $_SESSION['kwl'][$_SESSION['key']];
    // } elseif (isset($_POST['learn'])) {
    //     $_SESSION['learn'][] = $_SESSION['kwl'][$_SESSION['key']];
    // }

    // if ($_SESSION['key'] < count($_SESSION['kwl'])) {
    //     $_SESSION['key']++;
    // } else {
    //     $_SESSION['key'] = 1;
    // }

    // This will be replaced with some sort of ajax call in the javascript
} else {
    
    // Open the selected KWL chart
    require('kwldb_conn.php');
    $concept = mysqli_real_escape_string($dbc, $_GET['cid']);

    // Prepare sql query
    $query_kwl = "SELECT chart_name, chart_file FROM charts WHERE chart_id=$concept";
    $r = mysqli_query($dbc, $query_kwl);

    if (mysqli_num_rows($r) == 0) {
        echo "You did not select a KWL file.";
    } else {

        $file_name = mysqli_fetch_assoc($r);

        $kwl_file = "uploads/".$file_name['chart_file'];
        $kwl_array = file($kwl_file, FILE_IGNORE_NEW_LINES);

    }


}
 ?>
 <!-- get the php data -->
<script>
  <?php echo 'var words = '.$word_array.';'; ?>
</script>

<div class="text-center" id="word box" style="border: 1px solid black;">
  <h1></h1>
</div>
<div class="col-md-4">
 <div class="panel panel-warning">
  <div class="panel-heading" id="know">
    <h3 class="panel-title"><button class="btn btn-warning" name="know" value="KNOW" style="width: 100%;">I <em>KNOW</em> this concept</button></h3>
  </div>
  <div class="panel-body">
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="panel panel-success" id="want">
    <div class="panel-heading">
      <h3 class="panel-title"><button class="btn btn-success" type="submit" name="want" value="WANT" style="width: 100%;">I <em>WANT</em> to know this concept</button></h3>
    </div>
    <div class="panel-body">
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading" id="learn">
      <h3 class="panel-title"><button class="btn btn-info" type="submit" name="learn" value="LEARN" style="width: 100%;">I want to <em>LEARN</em> this concept</button></h3>
    </div>
    <div class="panel-body">
  </div>
  <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><button class="btn btn-info" type="submit" name="learn" value="LEARN" style="width: 100%;">I <em>LEARNED</em> this concept</button></h3>
      </div>
      <div class="panel-body">
        <h1></h1>
      </div>
    </div>
  </div>
</div>

<?php 
$js_file = "includes/js/kwl.js";
include('includes/footer.html'); 
 ?>
