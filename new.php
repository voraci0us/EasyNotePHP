<?php
require "loginCheck.php";
require "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['name'] and $_POST['body']) {
    $sql = "INSERT INTO notes (owner, name, body) VALUES ('" . $_SESSION['user'] . "', '" . $_POST['name']  . "', '" . $_POST['body'] . "')";
    $result = $conn->query($sql);
    header("Location: /index.php");
  }
  else {
    echo "Bad request";
  }
}
?>

<html>
<head>
</head>
<body>
  <form action="new.php" method="POST">
    Name: <input type="text" name="name"><br>
    <textarea name="body" rows="5" cols="40"></textarea>
    <button type="submit">Create Note</button>
  </form>
</body>
</html>
