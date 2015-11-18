<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'user1');
define('DB_PASSWORD', 'abc123');
define('DB_DATABASE', 'test');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>