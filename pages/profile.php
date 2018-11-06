<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../styles/profile.css">
</head>
<?php
	session_start();
	include '../config/db.php';

	$roll =  $_SESSION['roll'];
	if($roll[0]=='t'){

		$sql1 = "SELECT * from Question where roll_no = '$roll' ";
		$res = $conn->query($sql1);
		$q_asked = $res->num_rows;

		$sql2 = "SELECT * from Answer where roll = '$roll' ";
		$res1 = $conn->query($sql2);
		$q_ans = $res1->num_rows;

		$sql3 = "SELECT * FROM Teacher where roll_no = '$roll' ";
		$res2 = $conn->query($sql3);
		if ($res2->num_rows > 0) {

				while($row = $res2->fetch_assoc()) {
					$email = $row['email'];
					$branch = $row['branch'];


				}
		}
		$year = "-";
	}
	else{
		$sql1 = "SELECT * from Question where roll_no = '$roll' ";
		$res = $conn->query($sql1);
		$q_asked = $res->num_rows;

		$sql2 = "SELECT * from Answer where roll = '$roll' ";
		$res1 = $conn->query($sql2);
		$q_ans = $res1->num_rows;

		$sql3 = "SELECT * FROM Student where roll_no = '$roll' ";
		$res2 = $conn->query($sql3);
		if ($res2->num_rows > 0) {

				while($row = $res2->fetch_assoc()) {
					$email = $row['email'];
					$branch = $row['branch'];
					$year = $row['year'];

				}
		}

}
?>
<style>

</style>
<body style="background-color: #067afc">
	<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="../images/profile-card.png" alt=""/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                  <strong>  <h2 style="font-size: 2vw;font-family:'Raleway'">
                                        <?php echo $_SESSION['name'];?>
                                    </h2></strong>
																			<br>


                                    <h4 style="font-family: Raleway;"><a style="margin-left: 50px;">About</a></h4>


                            </ul>
                        </div>
                    </div>
                </div>

                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="position:relative;bottom: 27vw;left: 6vw">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Roll Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['roll'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?php echo ''. $email .' @somaiya.edu' ;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Branch</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $branch;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Year of Study</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $year;?></p>
                                            </div>
                                        </div>
																				<div class="row">
                                            <div class="col-md-6">
                                                <label>Questions Asked</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $q_asked;?></p>
                                            </div>
                                        </div>
																				<div class="row">
                                            <div class="col-md-6">
                                                <label>Questions Answered</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $q_ans;?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">



                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</body>
