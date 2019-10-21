<?php
if (isset($_POST['submit'])){
  if(!isset($_GET['id'])){
    header("Location: index.php?no-topic-id");
    exit();
  }

        require 'connect.php';

        $comment = $_POST['inputComment'];

        //write comment into the database
        $sql = "INSERT INTO comments(comment,message_id) VALUES (?,?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../commentCompose.php?error=dbwrite");
            exit();
        }else{
          mysqli_stmt_bind_param($stmt, "si", $comment,$_GET['id']);
          mysqli_stmt_execute($stmt);
          header("Location: ../message.php?id=" . $_GET['id']);
          exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

  }else{
    header("Location: index.php");
    exit();
  }
?>
