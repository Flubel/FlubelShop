<?php


include("db_config.php");
session_start();
$prodId = trim($_POST['prodid']);
$size = trim($_POST['size']);
$color = trim($_POST['color']); 

$userEmail = $_SESSION['UserEmail'];

$sql = "SELECT id, cart FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("User not found");
}

$userId = $row['id'];
$cart = json_decode($row['cart'], true);

$found = false;

foreach ($cart as &$item) {
    $itemSize = trim($item['size']);
    $itemColor = trim($item['color']);
    
    if ($item['id'] == $prodId && $itemSize == $size && $itemColor == $color) {
        $item['count'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    $cart[] = [
        'id' => $prodId,
        'size' => $size,
        'color' => $color,
        'count' => 1
    ];
}

$newCart = json_encode($cart);
$sql = "UPDATE user SET cart = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newCart, $userId);
$stmt->execute();

$stmt->close();
$conn->close();


header("Location: cart.php");
