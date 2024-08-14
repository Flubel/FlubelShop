<?php
$servername = "89.168.46.176";
$username = "fiend";
$password = "jobsnaz";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$conn->close();
