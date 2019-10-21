<?php
if (isset($_POST['submit'])){

    if(!isset($_GET['id'])){
      header("Location: index.php?no-topic-id");
      exit();
    }

  require 'connect.php';
  $messageDescription = $_POST['inputMessDesc'];
  $messageText = $_POST['inputMessTxt'];
  $topicid = $_GET['id'];

        //write message into the database
        $sql = "INSERT INTO messages(subject, message_text, topic_id) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../messageCompose.php?error=dbwrite");
            exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, "ssi", $messageDescription,$messageText,$topicid);
          mysqli_stmt_execute($stmt);
          header("Location: ../topicMessages.php?post=success");
          exit();
        }


        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }


else{
  header("Location: ../topicMessages.php?");
  exit();
}
?>
