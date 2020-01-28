<?php

require 'constant.php';

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connection->connect_error) {
    die('Database error:' . $connection->connect_error);
}

?>