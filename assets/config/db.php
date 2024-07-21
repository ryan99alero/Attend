<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "KnzudGNfJoiQgKv3nUNY37";
$dbname = "time_attendance_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
