<?php
if (isset($_POST['submit'])){

  require 'connect.php';

  $topicName = $_POST['inputTopic'];

  //check if topic already exists
    $sql = "SELECT topic FROM topics WHERE topic=?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../topicCompose.php?error=mysqliprep");
        exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $topicName);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0){
        header("Location: ../topicCompose.php?error=topic-alreadyexists");
        exit();
      }else{
        //write topic into the database
        $sql = "INSERT INTO topics(topic) VALUES (?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../topics.php?error=dbwrite");
            exit();
        }else{
          mysqli_stmt_bind_param($stmt, "s", $topicName);
          mysqli_stmt_execute($stmt);
          header("Location: ../topics.php?post=success");
          exit();
        }
      }

    }


  mysqli_stmt_close($stmt);
  mysqli_close($connection);

}else{
  header("Location: ../topics.php?");
  exit();
}
?>
