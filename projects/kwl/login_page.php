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
<h1 class="text-center"><i class="fa fa-user-plus fa-3x"></i></h1><br>

<div class="col-md-4">

</div>
<div class="col-md-4">
    <form action="" method="post">
        <div class="input-group margin-bottom-sm">
          <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
          <input class="form-control" type="text" name="email" placeholder="Email address">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
          <input class="form-control" type="password" name="pass" placeholder="Password">
        </div>
        <input class="form-control" type="submit" name="login" value="Login" />
    </form>
</div>
<div class="col-md-4">

</div>
<?php
include('includes/footer.html');
 ?>