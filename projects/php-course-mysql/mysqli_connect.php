<?php //Database access information

define('DB_USER', 'username');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sitename');

// Make the connections
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to MySQL: '. mysqli_connect_error());

// Set encoding
mysqli_set_charset($dbc, 'utf8');
 ?>