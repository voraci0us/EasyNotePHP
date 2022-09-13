<?php session_start(); ?>

<?php
if (!isset($_SESSION['login'])) {
  header("Location: /index.php");
}

include "connection.php";
?>

<html>
<head></head>
<body>

<?php
if (isset($_SESSION['user'])) {
  print "<h1>Welcome to the notes app, " . $_SESSION['user'] . "!</h1>";
}

$sql = "SELECT * FROM notes WHERE owner='" . $_SESSION['user'] . "'";
$result = $conn->query($sql);

while ($thisRow = $result->fetch_assoc()){
  $name = $thisRow["name"];
  $body = $thisRow["body"];
  echo "<h3>" . $name . "</h3>";
  echo "<p>" . $body . "</p>";
}

?>

<p><a href="new.php">Create a new note.</a></p>

<form action="logout.php" method="POST">
<button type="submit">Log Out</button>
</form>

</body>
</html>
