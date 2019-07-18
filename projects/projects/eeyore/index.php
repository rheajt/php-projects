<?php 
ob_start();

include('quotes.inc.php');

$random_quote = rand(1, 18);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oh, Eeyore...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <blockquote>
        <h3><?php print $eeyore[$random_quote]; ?></h3>
        <footer>Eeyore, <i>Winnie the Pooh</i></footer>
    </blockquote>
    <br><br><br>
    <img class="img-responsive" src="eeyore_img.jpg" />
</div>    
<footer>
    <div class="footer navbar-fixed-bottom text-right" style="padding-right: 30px;">
        <p class="text-muted">Quotes sourced from <a href="http://www.winnie-pooh.org/eeyore-quotes.htm">Winnie-Pooh.org</a></p>
    </div>
</footer>
</body>
</html>

<?php ob_flush(); ?>