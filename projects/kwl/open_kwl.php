<?php 
$page_title = "Open KWL Chart";
include('includes/header.html');


if (!isset($_SESSION['first_name'])){
    include 'includes/kwl_functions.inc.php';
    redirect_user();
}


include('kwldb_conn.php');

$query_files = "SELECT chart_id, chart_name, chart_file FROM charts WHERE teacher_id=$_SESSION[teacher_id]";
$r = mysqli_query($dbc, $query_files);

echo mysqli_error($dbc);
echo '<div class="row">
        <div class="col-md-4"><h1>Files</h1></div>
        <div class="col-md-8"><h1>Link for your students</h1></div>
      </div>';


while($row = mysqli_fetch_assoc($r)) {
    echo '<div class="row">
            <div class="col-md-4">    
              <h2><a href="kwl.php?cid='.$row['chart_id'].'">'.$row['chart_name'].'</h2>
            </div>
            <div class="col-md-8">
              <h2><i>http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/kwl.php?cid='.$row['chart_id'].'</i></h2>
            </div>
          </div>';

}

include('includes/footer.html');
 ?>