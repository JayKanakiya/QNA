<?php

require '../config/db.php';
$sql = "insert into question (qid,question,upvote,flag,roll_no) values(1,'".$_POST["question"]."',0,0,1614081)";
$conn->query($sql);


$conn->close();


?>
