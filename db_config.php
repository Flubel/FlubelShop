<?php
include ("envloader.php");

loadEnv(__DIR__ . '/.env');

$servername = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$db = getenv('DB_NAME');

$conn = new mysqli($servername, $username, $password,$db);

?>