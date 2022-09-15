<?php
session_start();

include "connection.php";
$sql = "SELECT * FROM notes WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){
  echo "<h3>" . $row["name"] . "</h3>";
  echo "<p>" . $row["body"] . "</p>";
}
?>

<form action="delete.php" method="POST">

<?php
echo "<input type='hidden' name='id' value='" . $_GET['id'] . "'/>";
?>

<button type="submit">Delete</button>
</form>

<a href="admin.php">Return to admin page.</a>
