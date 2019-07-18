<?php 
include('includes/header.html');
include('includes/vocab_functions.inc.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['login']) {
        $register_url = "register.php?id=$_POST[id]";
        redirect_user($register_url);
    } else {
        $register_url = "register.php?fname=$_POST[fname]&lname=$_POST[lname]";
        redirect_user($register_url); 
    }

}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">KET Practice</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--         <li><a href="#">Know</a></li>
        <li><a href="#">Want to Know</a></li>
        <li><a href="#">Learned</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Class Pages <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="./class_scores.php?cls=5-A">5-A</a></li>
            <li><a href="./class_scores.php?cls=5-B">5-B</a></li>
            <li><a href="./class_scores.php?cls=5-C">5-C</a></li>
            <li><a href="./class_scores.php?cls=5-D">5-D</a></li>
            <li><a href="./class_scores.php?cls=X-X">Not in a class?</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://jordanrhea.com">About</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<h1>This is the page I built to help our study of the KET vocabulary words.</h1>
<h2>It uses the K-W-L (what do you know? what do you want to know? What did you learn?) method to develop a list of words you should learn on the Cambridge KET exam.</h2>
<hr>
<table class="table">
    <div class="col-md-4 text-center">
        <h3>If you know your student number...</h3>

        <form action="" method="post">
            <p>Student Number: <input type="text" name="id" /></p>
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
    <div class="col-md-4 text-center">
        <h3>or...</h3>
    </div>
    <div class="col-md-4 text-center">
        <h3>If you are not a student in my class...</h3>
        <form action="" method="post">
            <p>First name: <input type="text" name="fname" /></p>
            <p>Last name: <input type="text" name="lname" /></p>
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>

</table>





<?php
include('includes/footer.html');
 ?>