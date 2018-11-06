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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <script src="../js/typeahead.bundle.js"></script>
  <script type="text/javascript" src="../scripts.js"></script>
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
i{
  margin-top: 6px;
}

input{
  margin-top: 50px;
}
</style>

  <body>
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
      <a class="nav-link" href="#" style="color: #000000"><strong>About</strong></a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#" style="color: #000000">Link 3</a>
    </li> -->
  </ul>
  <ul class="nav navbar-nav ml-auto">
  <strong><span><p class="user-name"><?php  echo $name; ?></p></span></strong><a href="../pages/profile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
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
          <input type="text" class="form-control" placeholder="Search Questions" id="search">
          <div id="display" style="border: 1px solid black"></div>
      </div>
      <h1>Trending Questions</h1>
      <?php
      include '../config/db.php';
      $sql = "SELECT qid,question,roll_no FROM Question";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
              $qid = $row['question'];
              if($roll[0]=='t'){
                $assign = $row['roll_no'];
              }
              echo "<div class='card-body bg-primary' '>" . $row['question'] . " &nbsp&nbsp&nbsp&nbsp -by  $assign </div><span><form action='answer.php' method='post'><span><button class='btn' type='submit' value='$qid' name='ans' >View Question</button></span></form></span>";
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
  <p></p>
</footer>

  </body>
</html>
