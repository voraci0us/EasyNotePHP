<?php
require "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['user'] and  $_POST['password']) {
    echo $_POST['user'] . "<br />" . $_POST['password'];
    $sql = "INSERT INTO users (username,password) VALUES ('$_POST[user]','$_POST[password]')";
    $result = $conn->query($sql);
    header("Location: /index.php");
  }
}
?>

<html>
<head>
</head>
<body>
  <form action="register.php" method="POST">
    Username: <input type="text" name="user"><br>
    Password: <input type="text" name="password"><br>
    <button type="submit">Create Account</button>
  </form>
</body>
</html>
