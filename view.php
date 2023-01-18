<?php
require "connection.php";
require "loginCheck.php";
require "template.php";

$template = $twig->load('view.htm');

$stmt = $conn->prepare("SELECT name,body FROM notes WHERE id=?");
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();

$result = $stmt->get_result()->fetch_row();
echo $template->render(['id' => $_GET['id'], 'user' => $_SESSION['user'], 'name' => $result[0], 'body' => $result[1]]);

?>
