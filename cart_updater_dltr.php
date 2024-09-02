<?php

include("db_config.php");
session_start();
$prodId = trim($_POST['prodid']);
$size = trim($_POST['size']);
$color = trim($_POST['color']);

// Fetch email from session
session_start();
$userEmail = $_SESSION['UserEmail'];

// Fetch user ID based on email
$sql = "SELECT id, cart FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit();
}

$userId = $row['id'];
$cart = json_decode($row['cart'], true);

// Flag to check if we found the product
$found = false;

// Remove item from cart
foreach ($cart as $key => $item) {
    $itemSize = trim($item['size']);
    $itemColor = trim($item['color']);
    
    if ($item['id'] == $prodId && $itemSize == $size && $itemColor == $color) {
        unset($cart[$key]); // Remove item from array
        $found = true;
        break;
    }
}

// Reindex array after removal
$cart = array_values($cart);

// Update cart in database
$newCart = json_encode($cart);
$sql = "UPDATE user SET cart = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newCart, $userId);
$stmt->execute();

// Close connection
$stmt->close();



header("Location: cart.php");