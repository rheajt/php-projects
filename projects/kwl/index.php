<?php 
include('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include('kwldb_conn.php');
    
    include('includes/login.inc.php');
}


if (isset($errors)) {
    foreach($errors as $error) {
        echo '<h3 class="bg-warning">'.$error.'</h3>';
    }
}


?>
<div class="jumbotron">
    <h1>KNOW-WANT-LEARN</h1>
    <h2>Create KWL charts interactively with your students!</h2>
</div>
<div class="col-md-4">

</div>
<div class="col-md-4">

</div>
<div class="col-md-4">

</div>
<?php
include('includes/footer.html');
 ?>