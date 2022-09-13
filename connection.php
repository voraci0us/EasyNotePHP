<?php
$vars = explode("\n", file_get_contents("connection.txt"));
$servername = trim($vars[0]);
$username = trim($vars[1]);
$password = trim($vars[2]);
$dbname = trim($vars[3]);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
