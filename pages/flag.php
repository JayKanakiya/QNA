<?php
session_start();
$aid = $_POST['ansid'];
include '../config/db.php';
$sql = "UPDATE Answer SET flag=flag + 1 WHERE aid=$aid";

if ($conn->query($sql) === TRUE) {
    header('location: ./welcome.php');
} else {
    echo "Error updating record: " . $conn->error;
}


?>
