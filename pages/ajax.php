
<style>
.btn {
    border: none;
    background-color: inherit;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
    display: inline-block;
}

.btn:hover {background: #eee;}

.success {color: black;}

li {
  list-style-type: none;
}

</style>
<?php

//Including Database configuration file.

include "../config/db.php";

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.

   $Name = $_POST['search'];

//Search query.

   $Query = "SELECT question FROM Question WHERE question LIKE '%$Name%' LIMIT 5";

//Query execution

   $ExecQuery = $conn->query($Query);

//Creating unordered list to display result.

   echo '



   ';

   //Fetching result from database.

   while ($Result = $ExecQuery->fetch_assoc()) {
        $question = $Result['question'];

       ?>

   <!-- Creating unordered list items.

        Calling javascript function named as "fill" found in "script.js" file.

        By passing fetched result as parameter. -->

   <li  onclick='fill("<?php echo $Result['question']; ?>")'>

   <a>

   <!-- Assigning searched result in "Search box" in "search.php" file. -->

       <?php echo "<form action='answer.php' method='post'><button class='btn success' type='submit' value='$question' name='ans' >$question</button></form> "; ?>

   </li></a>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->

   <?php

}}


?>
