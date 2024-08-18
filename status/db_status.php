<?php
header('Content-Type: application/json');

include(__DIR__ . "/../db_config.php");

try {
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    echo json_encode(["dbstatus" => "Operational"]);
} catch (Exception $e) {
    // Output error message in JSON format
    echo json_encode(["dbstatus" => "Inactive"]);
}

$conn->close();
?>
