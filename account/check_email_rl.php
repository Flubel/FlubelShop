<?php

include(__DIR__ . "/../db_config.php");

$email = $_POST['email'];

// Check if the email exists
$sql = "SELECT email FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "exists";
} else {
    echo "available";
}

$stmt->close();
$conn->close();
?>
