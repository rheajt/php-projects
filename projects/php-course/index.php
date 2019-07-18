<?php // Script to show what assignments I have available

    $page_title = "PHP Assignments";

    // Include the bootstrap header file
    include('includes/header.html');

    $open = opendir ("assignments");
    while ($files = readdir ($open)) {
        #if (is_file($files)) {
            echo '<h2 class="text-center"><a href="assignments/'. $files .'">' . $files . '</a></h2><br>';
        #}
    }
    closedir ($open);
   
    // include the bootstrap footer file
    include('includes/footer.html');
 ?>