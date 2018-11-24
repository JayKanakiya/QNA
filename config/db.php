<?php
require 'config.php';

$conn = new mysqli(DBHOST,DBUSER,DBPWD,DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
