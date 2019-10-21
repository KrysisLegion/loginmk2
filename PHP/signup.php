<?php
if (isset($_POST['submit'])){

  require 'connect.php';

  $username = $_POST['inputUsername'];
  $password = $_POST['inputPassword'];
  $repeatedPassword =$_POST['inputPasswordRepeated'];

  //ensure only allowed characters are entered for the username
  if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../registration.php?error=invalidusername");
    exit();
  }

  //ensure both passwords match each other
  else if ($password !== $repeatedPassword){
  header("Location: ../registration.php?error=passwordmismatch");
  exit();
  }

  //check if user already exists
  else {
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../registration.php?error=mysqliprep");
        exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if($resultcheck > 0){
        header("Location: ../registration.php?error=usernameTaken");
        exit();
      }
      else{
        //write account details into the database
        $sql = "INSERT INTO users(username, password) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../registration.php?error=dbwrite");
            exit();
        }
        else{
          $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $username, $hashedpassword);
          mysqli_stmt_execute($stmt);
          header("Location: ../registration.php?signup=success");
          exit();
        }
      }

    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($connection);

}
else{
  header("Location: ../registration.php?");
  exit();
}
?>
