<html>
  <head>
  <link rel="stylesheet" type="text/css" href="CSS/index.css">
  <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <title>Message Board</title>
  </head>
    <body>

      <div id="header">
        <ul>
            <li><h1>Message Board</h1></li>
            <li style="float: right;"><a href="login.php" name="compose-topic">Log In</a></li>
        </ul>
      </div>


      <div>
        <ul>
            <li><a href="topicCompose.php" name="compose-topic">New Topic</a></li>
        </ul>
      </div>


      <!-- populate table with topics -->
      <?php
        // require('PHP/connect.php');
        //   $sql = "SELECT * FROM topics";
        //   $stmt = mysqli_stmt_init($connection);
        //   if(!mysqli_stmt_prepare($stmt, $sql)){
        //       header("Location: ../index.php?error=mysqliprep");
        //       exit();
        //   } else {
        //     mysqli_stmt_execute($stmt);
        //     $result = mysqli_stmt_get_result($stmt);
        //
        //     while ($row = mysqli_fetch_assoc($result)) {
        //       $id = $row["topic_id"];
        //       $topic =  $row["topic"];
        //
        //       echo '<table class="roundedCorners">';
        //         echo '<tr>';
        //           echo '<th>'.$topic.'</th>';
        //         echo '</tr>';
        //         echo '<tr>';
        //           echo '<td><a href="topicMessages.php?id='. $id .'">Click here to view all posts about '. $topic .'</a></td>';
        //         echo '</tr>';
        //       echo '</table>';
        //     }
        // }
      ?>


    </body>
</html>
