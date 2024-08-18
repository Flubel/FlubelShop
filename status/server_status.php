<?php
header('Content-Type: application/json');

include(__DIR__ . "/../envloader.php");

$headers = @get_headers(getenv('SERVER_HOST'));

    if ($headers && strpos($headers[0], '200')) {
        echo json_encode(["srvrstatus" => "Operational"]);
    } else {
        echo json_encode(["srvrstatus" => "Inactive"]);
    }

?>
