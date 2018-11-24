<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>

    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <script src="../js/typeahead.bundle.js"></script>
  <script type="text/javascript" src="../scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../styles/util.css">
  <link rel="stylesheet" type="text/css" href="../styles/main.css">


<!-- jQuery -->
<!-- BS JavaScript -->



  </head>

<style>
.bg-primary{
  color: #FFFFFF;
  border-radius: 20px;
  margin-top: 25px;
}

form{
  margin-top: 20px;
}

body{
  font-family: Lato;

}

h1{
  text-align: center;
  margin-top: 50px;
}

.bg-company-red{
  background-color: white;
  color: white;
}

a{
  color:black;
}

.user-name{
  float: right;
  margin-right: 20px;
  margin-top: 5px;
  font-size: 25px;
  color: black;
}
.logout{
  float: right;
  margin-right: 20px;
  margin-top: 5px;
  font-size: 20px;
  color: black;
}
i{
  margin-top: 6px;
}

input{
  margin-top: 50px;
}

</style>

  <body>
    <script type="text/javascript">
        $(function() {
        $("#myModal").modal();
        });
    </script>

    <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Welcome to QNA!</h4>
        </div>
        <div class="modal-body" style="text-align: center">
          Search the question you want using search bar, if there isn't one, post a new question for others to answer.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>"; -->



    <?php
    include '../config/db.php';
    $roll =  $_SESSION['roll'];
    $assign = "Anonymuous";
    if($roll[0]==t){
      $sql1 = "SELECT name from Teacher where roll_no = '$roll' ";
      $res = $conn->query($sql1);
      if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
              // $qid = $row['question'];
              $name= $row['name'];
              $_SESSION['name'] = $name;
          }
      } else {
          echo "0 results";
      }

    }
    else{
      $sql1 = "SELECT name from Student where roll_no = '$roll' ";
      $res = $conn->query($sql1);
      if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
              // $qid = $row['question'];
              $name= $row['name'];
              $_SESSION['name'] = $name;
          }
      } else {
          echo "0 results";
      }
}

    $conn->close();

    ?>

    <nav class="navbar navbar-expand-sm navbar-dark bg-company-red">
  <ul class="navbar-nav">
    <li class="nav-item" >
      <a class="nav-link" href="#" style="color: #000000"><strong>Home</strong></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/about.html" style="color: #000000"><strong>About</strong></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userquestions.php" style="color: #000000"><strong>Your Questions</strong></a>
    </li>
  </ul>
  <ul class="nav navbar-nav ml-auto">

  <strong><span><p class="user-name"><?php  echo $name; ?></p></span></strong><a href="../pages/profile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a><a style="margin-left: 20px;" class="logout" href="./logout.php"><strong>Logout</strong> </a>

</ul>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <p></p>
      <p></p>
      <p></p>
    </div>
    <div class="col-sm-6 text-left">
      <div class="form-group">
          <input type="text" class="form-control" placeholder="Start Searching Your Favourite Topic" id="search">
          <div id="display" style="border: 1px solid black"></div>
      </div>
      <h1>Trending Questions</h1>
      <?php
      include '../config/db.php';
      $sql = "SELECT qid,question,roll_no FROM Question where upvote>50";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
              $qid = $row['question'];
              if($roll[0]=='t'){
                $assign = $row['roll_no'];
              }
              echo "<div class='card-body bg-primary' '>" . $row['question'] . " &nbsp&nbsp&nbsp&nbsp -by  $assign </div><span><form action='answer.php' method='post'><span><button class='btn' type='submit' value='$qid' name='ans' >View Answers</button></span></form></span>";
          }
      }
      ?>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p></p>
      </div>
      <div class="well">
        <p></p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <div class="col-sm-6" style="  position:relative;
  bottom:0;
  margin-left: 24vw;  position: fixed;
  z-index: 99;background-color: white">
<div style="margin-bottom:5vh;">
<form action="ask.php" method="post"><input type="text" class="form-control" placeholder="Type your Question" name="question"><input type="submit" class="login100-form-btn" style="background-color: #067afc" value="Ask"></form>
</div>
<div style="margin-bottom:25px;">
      <!-- <button class="login100-form-btn" style="background-color: #067afc">
              Ask -->
</div>
      </a>
      </div>
</footer>

  </body>
</html>
