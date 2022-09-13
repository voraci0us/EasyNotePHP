<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: /index.php");
}
?>

<html>
<head>
</head>
<body>
  <form action="create.php" method="POST">
    Name: <input type="text" name="name"><br>
    <textarea name="body" rows="5" cols="40"></textarea>
    <button type="submit">Create Note</button>
  </form>
</body>
</html>
