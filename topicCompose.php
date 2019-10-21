<?php
  session_start();
  if(!isset($_SESSION['userID'])){
    header("Location: index.php?no-login");
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
    <form action="PHP/createTopic.php" method="post">
    <div class="container">
      <label for="uname"><b>Topic Name</b></label>
      <input type="text" placeholder="Enter a name for the new Topic..." name="inputTopic" required>

      <button type="submit" name="submit">Post Topic</button>
      <a href="topics.php">Cancel Post</a>
    </div>
    </form>
  </div>

</body>
</html>
