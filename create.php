<?php session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['user'])) {
  header("Location: /index.php");
}

include "connection.php";

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
