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

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
	die("Connection failed");
}

$query = "
CREATE DATABASE IF NOT EXISTS " . $dbname . ";";
$conn->query($query);

$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "
CREATE TABLE IF NOT EXISTS users ( 
	username text DEFAULT NULL, 
	password text DEFAULT NULL, 
	id int(11) AUTO_INCREMENT, 
	name text DEFAULT NULL, 
	PRIMARY KEY (id)
);";
$conn->query($query);
$query = "
CREATE TABLE IF NOT EXISTS notes ( 
	id int(11) AUTO_INCREMENT, 
	owner text DEFAULT NULL,	
	name text DEFAULT NULL,	
	body text DEFAULT NULL,	
	PRIMARY KEY (id)
);";
$conn->query($query);
?>
