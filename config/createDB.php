<?php
$servername = "localhost";
$username = "root";
$password = "jaymk";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
//
// $sql = "CREATE DATABASE QNA";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

mysqli_select_db($conn,"QNA");

$sql = "CREATE TABLE Student (
roll_no varchar(100),
name varchar(100),
year int(10),
branch varchar(10),
email varchar(20),
password varchar(50)
)";

$sql3 = "CREATE TABLE Teacher (
username varchar(100),
name varchar(100),
branch varchar(10),
email varchar(20),
password varchar(50)
)";

$sql1 = "CREATE TABLE Question (
qid int(200),
question varchar(1000),
upvote int(200),
flag int(200),
roll_no int(20),
)";

$sql2 ="CREATE TABLE Answer (
aid int(200),
answer varchar(1500),
upvote int(200),
flag int(200),
qid int(200),
roll varchar(20)
)";

$conn->query($sql);
// $conn->query($sql1);
// $conn->query($sql3);
// $conn->query($sql2);
echo "Tables Created";
$conn->close();
?>
