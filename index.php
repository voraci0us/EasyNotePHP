<?php
session_start();
include "connection.php";
require "template.php";

// if user is already logged in, send them to the admin page
if (isset($_SESSION['login'])) {
  header("Location: /admin.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "we made it";
  if ($_POST['user'] and  $_POST['password']) {
    $sql = "SELECT * FROM users WHERE username=\"" . $_POST['user'] . "\" and password=\"" . md5($_POST['password']) . "\"";
    $result = $conn->query($sql);
    // if the user exsits in the database with this password, log them in
    if ($result->num_rows) {
      $_SESSION['login'] = true;
      $_SESSION['user'] = $_POST['user'];
      header("Location: /admin.php");
    }
    else {
      header("Location: /index.php");
    }
  }
  else {
    echo "Bad request";
  }
}
else {
  $template = $twig->load('index.htm');
  echo $template->render();
}
$conn->close();
?>
