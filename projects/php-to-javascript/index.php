<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $old_sent = array_shift($_SESSION['sentences']);
    $_SESSION['sentences'][] = $old_sent;
} else {
    $_SESSION['sentences'] = file('sentences.txt', FILE_IGNORE_NEW_LINES);
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
        .wordbox {
            border: 1px solid black;
            float: left;
        }
    </style>

</head>
<body>
    <form action="" method="post">
        <h1><?= $_SESSION['sentences'][0]; ?></h1>
        <input class="btn btn-default" type="submit" name="submit">
    </form>
    <script>
        var sent_array = <?php echo json_encode($_SESSION['sentences']); ?>;
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="array.js"></script>
</body>
</html>