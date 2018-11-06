<?php
session_start();
require '../config/db.php';
$roll = $_SESSION['roll'];
$q = $_POST['question'];
// echo $q;
$sql = "insert into Question(question,upvote,flag,roll_no) values('".$_POST['question']."',0,0,$roll)";
$conn->query($sql);
$conn->close();
header('location: welcome.php');
?>
