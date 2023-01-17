<?php
$env = getenv();
if (!array_key_exists('EASYNOTE_DB_IP', $env)) {
	echo "<p>Please set the EASYNOTE_DB_IP environment variable.</p>";
}
else { $servername = $env["EASYNOTE_DB_IP"]; }


if (!array_key_exists('EASYNOTE_DB_USER', $env)) {
	echo "<p>Please set the EASYNOTE_DB_USER environment variable.</p>";
}
else { $username = $env["EASYNOTE_DB_USER"]; }

if (!array_key_exists('EASYNOTE_DB_PASS', $env)) {
	echo "<p>Please set the EASYNOTE_DB_PASS environment variable.</p>";
}
else { $password = $env["EASYNOTE_DB_PASS"]; }

if (!array_key_exists('EASYNOTE_DB_NAME', $env)) {
	echo "<p>Please set the EASYNOTE_DB_NAME environment variable.</p>";
}
else { $dbname = $env["EASYNOTE_DB_NAME"]; }

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
