<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Questions</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <script src="../js/typeahead.bundle.js"></script>
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
    <div class="container-fluid text-center">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <p></p>
          <p></p>
          <p></p>
        </div>
        <div class="col-sm-6 text-left">

          <h1>Your Questions</h1>
          <?php
          session_start();
          include '../config/db.php';
          $roll  = $_SESSION['roll'];
          $sql = "SELECT qid,question FROM Question where roll_no = $roll";

          $result = $conn->query($sql);
          if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                  $qid = $row['question'];
                  if($roll[0]=='t'){
                    $assign = $row['roll_no'];
                  }
                  echo "<div class='card-body bg-primary' '>" . $row['question'] . " </div><span><form action='answer.php' method='post'><span><button class='btn' type='submit' value='$qid' name='ans' >View Question</button></span></form></span>";
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
  </body>
</html>
