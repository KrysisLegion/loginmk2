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
    <form action="PHP/createMessage.php?id=<?php echo $_GET['id']; ?>" method="post">
    <div class="container">
      <label for="description"><b>Message Description</b></label>
      <textarea type="textarea" placeholder="Enter a description for the new emssage..." name="inputMessDesc" required></textarea>
      <br>
      <br>
      <div id="largeText">
      <label for="messageText"><b>Message Text</b></label>
      <textarea type="textarea" placeholder="Enter the new message..." name="inputMessTxt" required></textarea>
      </div>

      <button type="submit" name="submit">Post Message</button>
      <a href="topicMessages.php">Cancel Post</a>
    </div>
    </form>
  </div>

</body>
</html>
