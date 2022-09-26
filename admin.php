<?php
require "connection.php";
require "loginCheck.php";
require "template.php";

$template = $twig->load('admin.htm');

$sql = "SELECT id,name FROM notes WHERE owner='" . $_SESSION['user'] . "'";
$result = $conn->query($sql);
echo $template->render(['user' => $_SESSION['user'], 'notes' => $result->fetch_all()]);

?>
