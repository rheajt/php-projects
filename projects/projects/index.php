<?php 
// A simple script to automatically display my projects folder.

$dir = opendir('.');
$notread = array('.', '..', 'index.php', 'css', 'readme.md');
while($file = readdir($dir)) {
    if(!in_array($file, $notread)) {
        $readme = file($file.'/readme.md', FILE_IGNORE_NEW_LINES);
        $folders[] = array($file => $readme);
    }
}


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP Projects</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <h1>Programming Projects</h1><hr>
  <h2>Below are some simple PHP scripts I created while trying to teach myself the magic of coding</h2><br>
<?php 
foreach($folders as $folder) {
    foreach ($folder as $key => $val) {
        echo '<div class="list-group">
                <a href="'.$key.'" class="list-group-item">
                  <h4 class="list-group-item-heading">'.$val[0].'</h4>
                  <p class="list-group-item-text">';
                    for($i = 1; $i < count($val); $i++) {
                        echo $val[$i];
                    }
        echo '    </p>
                </a>
              </div>';
    }
} 
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </body>
</html>