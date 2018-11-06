<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="../js/typeahead.bundle.js"></script>
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
  .btn{
    margin-left: 20px;
  }
  </style>
  <body>
    <?php
      session_start();
      require '../config/db.php';
      $ques = $_POST['ans'];
      $sql = "SELECT qid FROM Question WHERE question='$ques' " ;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $q_id  = $row['qid'];
          }
      }
      $_SESSION['qid'] = $q_id;
      //echo $q_id;
      // echo $_SESSION['qid'];
    ?>

    <div class="container-fluid text-center">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <p></p>
          <p></p>
          <p></p>
        </div>
        <div class="col-sm-6 text-left">

          <h1 style="font-family: Lato"><?php echo $ques; ?></h1>

          <h3 style="font-family: Lato; margin-top: 50px;">Answers</h3>
          <?php
          session_start();
          include '../config/db.php';
          $roll  = $_SESSION['roll'];
          // echo $roll;
          $assign = "Anonymuous";
          $sql = "SELECT aid,answer,roll FROM Answer where qid = $q_id";

          $result = $conn->query($sql);
          if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                  $aid = $row['aid'];
                  if($roll[0]=='t'){
                    $assign = $row['roll'];
                  }
                  echo "<div class='card-body bg-primary' '>" . $row['answer'] . " &nbsp&nbsp&nbsp&nbsp -by  $assign </div><span><form action='upvote.php' method='post'><span><button class='btn' type='submit' value='$aid' name='ans' >Upvote</button></form><form action='flag.php' method='post'><button class='btn' type='submit' value='$aid' name='ansid' >Flag</button></span></form></span>";
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
      margin-left: 24vw;  position: relative;
      z-index: 99;background-color: white">
    <div style="margin-bottom:5vh;">
    <form action="inputanswer.php" method="post"><input type="text" class="form-control" placeholder="Type your Answer" name="answer"><input type="submit" class="login100-form-btn" style="background-color: #067afc"></form>
    </div>

          </a>
          </div>
    </footer>
  </body>
</html>
