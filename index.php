<?php session_start(); ?>

<?php

include "connection.php";

// if user is already logged in, send them to the admin page
if (isset($_SESSION['login'])) {
  header("Location: /admin.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['user'] and  $_POST['password']) {
    $sql = "SELECT * FROM users WHERE username=\"" . $_POST['user'] . "\" and password=\"" . $_POST['password'] . "\"";
    $result = $conn->query($sql);
    // if the user exsits in the database with this password, log them in
    if ($result->num_rows) {
      $_SESSION['login'] = true;
      header("Location: /admin.php");
    }
  }
  else {
    echo "Bad request";
  }
}

$conn->close();
?>

<html>
<head>
</head>
<body>
  <form action="index.php" method="POST">
    Username: <input type="text" name="user"><br>
    Password: <input type="text" name="password"><br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>
