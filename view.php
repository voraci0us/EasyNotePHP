<?php
require "connection.php";
require "loginCheck.php";
require "template.php";

$template = $twig->load('view.htm');

$sql = "SELECT name,body FROM notes WHERE id='" . $_GET['id'] . "'";
$result = $conn->query($sql)->fetch_row();
echo $template->render(['id' => $_GET['id'], 'user' => $_SESSION['user'], 'name' => $result[0], 'body' => $result[1]]);

?>
