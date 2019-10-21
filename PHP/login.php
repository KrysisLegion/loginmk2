<?php
// if(isset($_POST['submit'])){
// require 'connect.php';

// $username = $_POST['inputUsername'];
// $password = $_POST['inputPassword'];

//   // ensure only allowed characters are entered for the username
//   // if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
//   //   header("Location: ../index.php?error=invalidusername");
//   //   exit();
//   // }

//   //check login credentials
//   else {
//     $sql = "SELECT * FROM users WHERE username = ?";
//     $stmt = mysqli_stmt_init($connection);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//         header("Location: ../index.php?error=mysqliprep");
//         exit();
//     } else {
//       mysqli_stmt_bind_param($stmt, "s", $username);
//       mysqli_stmt_execute($stmt);
//       $result = mysqli_stmt_get_result($stmt);

//       if($row = mysqli_fetch_assoc($result)){
//         //verify password is correct for username
//         $passwordCheck = password_verify($password, $row['password']);
//         if($passwordCheck == false){
//           header("Location: ../index.php?error=incorrect-password");
//           exit();
//         }

//         else if($passwordCheck == true){
//           session_start();
//           $_SESSION['userID'] = $row['user_id'];
//           $_SESSION['username'] = $row['username'];

//           header("Location: ../topics.php?login-success");
//           exit();

//         }
//       } else {
//         header("Location: ../index.php?error=nomatch");
//         exit();
//       }

//     }
//   }

// } else {
//   header("Location: ../index.php?");
//   exit();
// }
?>

<?php
session_start();
// checks cunt boops the button

if(isset($_SESSION['user'])){
  header("Location: ../index.php");
}

if(isset($_POST['submit'])){
  require 'connect.php';
  
  $username = $_POST['inputUsername'];
  $password = $_POST['inputPassword'];

  if($username != ""){
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :user");
    $stmt->execute(["user" => $username]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($results) != 0){
      foreach($results as $row){
        if(password_verify($password, $row['password'])){
          $_SESSION['user'] = $username;
          header("Location: ../index.php");
        }else{
          header("Location: ../login.php?err=Failed login");
        }
      }
    }

  }

}
?>
