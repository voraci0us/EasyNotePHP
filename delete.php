<?php
session_start();

include "connection.php";
$sql = "DELETE FROM notes WHERE id='" . $_POST['id'] . "'";
$result = $conn->query($sql);

header("Location: /admin.php");
?>
