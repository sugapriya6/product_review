<?php
$host = "localhost";
$user = "root";
$pass = "Suga@2004";
$dbname = "review_system";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
