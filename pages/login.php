
<?php
    session_start();
    require '../config/db.php';
    $username = $_POST['roll'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Student WHERE roll_no= '$username' AND password = '$password'";
    $res = $conn->query($sql);
    $count = $res->num_rows;
    $sql1 = "SELECT * FROM Teacher WHERE roll_no= '$username' AND password = '$password'";
    $res1 = $conn->query($sql1);
    $count1 = $res1->num_rows;
    if($count == 1){
        $_SESSION['roll'] = $username;
        $_SESSION['type'] = "student";
        header('location: ./welcome.php');
    }
    else if($count1 == 1){
      $_SESSION['roll'] = $username;
      $_SESSION['type'] = "teacher";
      header('location: ./welcome.php');
    }
    else{
        header( "refresh:5;url=../views/login.html" );
        echo '<h1 style="font-family:arial;text-align:center;margin-top: 50px;">Invalid Username or Password</h1>';
        echo '<h4 style="font-family:arial;text-align:center">You will be redirected to Login page</h4>';
        echo '<img style="display:block;margin-left: auto;margin-right:auto;width:15%;margin-top: 50px;" src="../assets/rolling.gif">';
    }
?>
