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
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
<title>KOH Message Board</title>
</head>
<body>
  <div id="header">
    <h1>KOH Message Board</h1>
  </div>

  <div id="container">
    <form action="PHP/createComment.php?id=<?php echo $_GET['id']; ?>" method="post">
    <div class="container">
      <label for="comment"><b>New Comment</b></label>
      <textarea type="textarea" placeholder="Enter the comment here..." name="inputComment" required></textarea>
      <button type="submit" name="submit">Post Comment</button>
      <a href="message.php">Cancel Post</a>
    </div>
    </form>
  </div>

</body>
</html>
