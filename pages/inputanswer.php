<?php
session_start();
require '../config/db.php';
$roll = $_SESSION['roll'];
$q = $_POST['answer'];
// echo $roll;
$qid = $_SESSION['qid'];
$sql = "insert into Answer(answer,upvote,flag,qid,roll) values('".$_POST['answer']."',0,0,$qid,'$roll')";
$conn->query($sql);
$conn->close();
header('location: welcome.php');
?>
