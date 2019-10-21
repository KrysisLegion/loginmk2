<?php
//when called terminates the active session, logging out the user
session_start();
if(isset($_POST['logout'])){
  session_destroy();
  header("Location: ../index.php?logout=success");
  exit();
}
?>
