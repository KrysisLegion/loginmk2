<?php
  session_start();
  if(!isset($_SESSION['userID'])){
    header("Location: index.php?no-login");
    exit();
  }

  if(!isset($_GET['id'])){
    header("Location: index.php?no-topic-id");
    exit();
  }
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/messageBoard.css">
<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
<title>KOH Topics</title>
</head>
<body>
  <div id="header">
    <ul>
      <form action="PHP/termSession.php" method="post">
        <li><h1>KOH Message Board</h1></li>
        <li style="float: right;"><button id="logout" type="submit" name="logout">Log Out</a></li>
      </form>
    </ul>
  </div>

  <div>
    <ul>
        <li><a href="commentCompose.php?id=<?php echo $_GET['id']; ?>" name="compose-comment">Reply</a></li>
        <li style="float: right;"><a href="topics.php" name="back">Back</a></li>
    </ul>
  </div>

  <?php
    require('PHP/connect.php');
      $sql = "SELECT * FROM messages WHERE message_id = ?";
      $sql2 = "SELECT * FROM comments WHERE message_id = ?";
      $stmt = mysqli_stmt_init($connection);
      $stmt2 = mysqli_stmt_init($connection);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: index.php?error=mysqliprep");
          exit();
      } else {
        // Sets the subject name as original post
        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
          echo '<table class="roundedCorners">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
              echo '<th>' . $row['subject'] . '</th>';
            echo '</tr>';
            echo '<tr>';
              echo '<td><b>Original Post: </b>' . $row['message_text'] . '</td>';
            echo '</tr>';
        }
      }
        //Second statement for display
        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("Location: index.php?error=mysqliprep");
            exit();
        } else {
          // Displays the replies to the original post
          mysqli_stmt_bind_param($stmt2, "i", $_GET['id']);
          mysqli_stmt_execute($stmt2);
          $result2 = mysqli_stmt_get_result($stmt2);
          while ($row = mysqli_fetch_assoc($result2)) {
              echo '<tr>';
                echo '<td><b>Reply: </b>' . $row['comment'] . '</td>';
              echo '</tr>';
          }
        }

          //Close table
          echo '</table>';

   ?>


</body>
</html>
