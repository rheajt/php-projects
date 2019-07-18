<?php 
$page_title = "Teacher Profile";
include('includes/header.html');

if (!isset($_SESSION['first_name'])){
    include 'includes/kwl_functions.inc.php';
    redirect_user();
}

echo '<h1>Welcome, '.$_SESSION['first_name'].'!</h1>';

echo '<p>1. Click on NEW KWL above</p>
      <p>1. Give your KWL chart a name</p>
      <p>3. Select a text file. Each concept you want to go into your KWL chart should be on a new line.</p>
      <p>4. Click on OPEN KWL to see the charts you have created. It will also show you a link that you can share with anyone.</p>
      <p>5. Create your chart and print it out!</p>';




include('includes/footer.html');


 ?>