<?php
require '../config/db.php';

// $sql = "insert into Question(question,upvote,flag,roll_no) values('How is Windows better than Mac',60,0,80)";
$sql2 = "insert into Question(question,upvote,flag,roll_no) values('What is the Windows architecture',70,0,81)";
$sql3= "insert into Question(question,upvote,flag,roll_no) values('Is Node better than PHP',81,0,79)";
$sql4 = "insert into Question(question,upvote,flag,roll_no) values('How to decrypt a code word',65,0,81)";
$sql5 = "insert into Question(question,upvote,flag,roll_no) values('What are Block Codes',90,0,80)";
$sql6 = "insert into Question(question,upvote,flag,roll_no) values('Is Midpoint Line drawing algo better than Cyrus Beck',64,0,79)";
$sql7 = "insert into Question(question,upvote,flag,roll_no) values('What are the different methods of Polygon Clipping',90,0,80)";
$sql8 = "insert into Question(question,upvote,flag,roll_no) values('What is data Warehouse',97,0,79)";
$sql9 = "insert into Question(question,upvote,flag,roll_no) values('what is ETL',65,0,80)";
$sql10 = "insert into Question(question,upvote,flag,roll_no) values('How is MOLAP better than ROLAP',97,0,80)";
$sql11 = "insert into Question(question,upvote,flag,roll_no) values('What is RDBMS',86,0,80)";
$sql12 = "insert into Question(question,upvote,flag,roll_no) values('How to make your C code more affective',90,0,81)";
$sql13 = "insert into Question(question,upvote,flag,roll_no) values('What are the different methods to make a Warehouse organised',100,0,80)";


// $conn->query($sql);
$conn->query($sql2);
$conn->query($sql3);
$conn->query($sql4);
$conn->query($sql5);
$conn->query($sql6);
$conn->query($sql7);
$conn->query($sql8);
$conn->query($sql9);
$conn->query($sql10);
$conn->query($sql11);
$conn->query($sql12);
$conn->query($sql13);
?>
