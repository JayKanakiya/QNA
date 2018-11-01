<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require '../config/db.php';
      $ques = $_POST['ans'];
      $sql = "SELECT id FROM question WHERE question='$ques' " ;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {

              $q_id  = $row['id'];
          }
      }


    ?>

    <h1 style="text-align: center;"><?php echo $ques;?></h1>
    <h2>Available Answers</h2>
    <?php
        $disp_ans = "SELECT ans FROM answer WHERE qid='$q_id' ";
        $result = $conn->query($disp_ans);
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo "<h3>" . $row['ans'] . "</h3>";
            }
        }

    ?>

  </body>
</html>
