<?php
$host = 'localhost';
$db = 'users';
$user = 'root';
$pass = 'Alli2002!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
