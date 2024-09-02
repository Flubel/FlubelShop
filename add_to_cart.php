<?php
include("db_config.php");

session_start();
if (!isset($_SESSION['UserEmail'])) {
    header("Location: account");
    exit();
}

$user_eml = $_SESSION['UserEmail'];
$product_id = intval($_POST['product_id']);
$product_color = $_POST['product_color'];
$product_size = $_POST['product_size'];

$sql = "SELECT id, cart FROM user WHERE email = '$user_eml'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $cart = $row['cart'];

    $cartArray = json_decode($cart, true);

    if ($cartArray === null) {
        $cartArray = [];
    }

    $found = false;
    foreach ($cartArray as &$item) {
        if (is_array($item) && isset($item['id']) && isset($item['color']) && isset($item['size']) && $item['id'] == $product_id && $item['color'] == $product_color && $item['size'] == $product_size) {
            $item['count'] = isset($item['count']) ? $item['count'] + 1 : 2;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $cartArray[] = [
            'id' => $product_id,
            'color' => $product_color,
            'size' => $product_size,
            'count' => 1
        ];
    }

    $newCart = json_encode($cartArray);

    $updateSql = "UPDATE user SET cart = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param('si', $newCart, $user_id);

    if ($stmt->execute()) {
        echo "Product added to cart successfully.";
        header("Location: product.php?id=$product_id");
    } else {
        echo "Error updating cart: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "User not found.";
    header("Location: account");
}

$conn->close();
