<?php
$servername = "20.199.78.168";
$username = "fiend";
$password = "jobsnaz";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SHOW DATABASES");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["Database"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
