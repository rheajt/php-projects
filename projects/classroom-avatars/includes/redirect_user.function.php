<?php

// Redirect the user based on login
function redirect_user($page = 'index.php') {
    // Build the absolute url to redirect the user to the correct page
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    $url = rtrim($url, '/\\');

    $url .= '/'.$page;

    header ("Location: $url");
    exit();
}