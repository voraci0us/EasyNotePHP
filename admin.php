<?php session_start(); ?>

<?php
if (isset($_SESSION['login'])) {
  echo "Hello logged in person! <br>";
}
else {
  header("Location: /index.php");
}
?>

<form action="logout.php" method="POST">
<button type="submit">Log Out</button>
</form>
