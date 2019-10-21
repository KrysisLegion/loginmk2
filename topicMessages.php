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
        <li><a href="messageCompose.php?id=<?php echo $_GET['id']; ?>" name="compose-message">New Message</a></li>
        <li style="float: right;"><a href="topics.php" name="back">Back</a></li>
    </ul>
  </div>

  <?php
    require('PHP/connect.php');
      $sql = "SELECT * FROM messages WHERE topic_id = ?";
      $stmt = mysqli_stmt_init($connection);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: index.php?error=mysqliprep");
          exit();
      } else {
        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo '<table class="roundedCorners">';
          echo '<tr>';
            echo '<th>Posts</th>';
          echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row["message_id"];
          $topic =  $row["subject"];
          $timestamp =  $row["created"];


            echo '<tr>';
              echo '<td><a href="message.php?id='. $id .'">' . $topic . '</a><p>' . $timestamp . '</p></td>';
            echo '</tr>';


        }
          echo '</table>';
      }
   ?>



</body>
</html>
