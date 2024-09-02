<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if (!isset($_SESSION['loggedInUser']) || $_SESSION['loggedInUser'] !== true) {
    header("Location: ../account");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Flubel-Shop</title>
    <script defer src="./script1.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("loader.php");
    ?>

    <?php
    // session_start();
    include("navbar.php");


    if (!isset($_SESSION['UserEmail'])) {
        header("Location: account");
        exit();
    }

    ?>


    <div id="mnuprlblfrprdcts2">My Cart</div>

    <div id="mnprdtshwrcntnr">
        <?php

        $totalCartPrice = 0;
        $user_eml = $_SESSION['UserEmail'];

        $sql = "SELECT cart FROM user WHERE email = '$user_eml'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cart = $row['cart'];

            $cartArray = json_decode($cart, true);

            if (is_array($cartArray)) {
                foreach ($cartArray as $item) {
                    $mnprdctid = $item['id'];
                    $size = strtolower($item['size']); // Convert size to lowercase
                    $color = $item['color'];
                    $quantity = $item['count'];

                    // Fetch product title and title_pic
                    $prdctnmttlqry = "SELECT title, title_pic FROM products WHERE id = ?";
                    $stmt = $conn->prepare($prdctnmttlqry);
                    $stmt->bind_param('i', $mnprdctid);
                    $stmt->execute();
                    $stmt->bind_result($title, $title_pic);
                    $stmt->fetch();
                    $stmt->close();

                    $price_sql = "SELECT price FROM product_variants 
                    WHERE product_id = ? AND color = ? AND $size = 1";
                    $stmt = $conn->prepare($price_sql);

                    if ($stmt) {
                        $stmt->bind_param('is', $mnprdctid, $color);
                        $stmt->execute();
                        $stmt->bind_result($price);
                        $stmt->fetch();
                        $stmt->close();
                    } else {
                        // Handle errors if prepare fails
                        echo "Failed to prepare SQL statement.";
                        $price = 0;
                    }

                    $totalAmount = number_format($price, 2) * $quantity;

                    // Update total cart price
                    $totalCartPrice += $totalAmount;



                    $base64Image = base64_encode($title_pic);
                    $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                    $incrementDisabled = $item['count'] >= 3 ? 'disabled' : '';

                    // Disable decrement if count is 1
                    $decrementDisabled = $item['count'] <= 1 ? 'disabled' : '';

                    // Print the product details
                    echo '<div id="prdctthaddedincrt">';
                    echo '    <div id="mnprdctincrtimg">';
                    echo '        <img id="imgfrprdctinnrcntntslmn" src="' . htmlspecialchars($imageSrc) . '" alt="' . htmlspecialchars($title) . '" />';
                    echo '    </div>';
                    echo '    <div id="mnprdctinf">';
                    echo '        <div id="mnttlfrpdchkout">' . htmlspecialchars($title) . '</div>';
                    echo '        <div id="szfrprdctchkout">Size: ' . htmlspecialchars($item['size']) . '</div>';
                    echo '        <div id="mncrlpfrprdctchkout">Color: ' . htmlspecialchars($item['color']) . '</div>';
                    echo '        <div id="mnprcfrprdctchkout">$' . htmlspecialchars(number_format($price, 2)) . '</div>'; // Update price dynamically
                    echo '    </div>';
                    echo '    <div id="qunttyfrpdctchkot">';
                    echo '        <div id="mnqunttytxt">Quantity</div>';
                    echo '        <div id="mnqunttytxtbtnsndcntnt">';
                    echo '<div id="mntpsvg">';
                    echo '    <svg onclick="increment(' . htmlspecialchars(json_encode($mnprdctid), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['size']), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['color']), ENT_QUOTES, 'UTF-8') . ')" '
                        . ($incrementDisabled ? 'style="pointer-events: none; opacity: 0.5;"' : '') // Disable pointer events and reduce opacity
                        . ' xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24">';
                    echo '        <path fill="black" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />';
                    echo '    </svg>';
                    echo '</div>';

                    echo '<div id="cntnrmnqunttyfrprdctchngr">' . htmlspecialchars($item['count']) . '</div>';

                    echo '<div id="mnbtmsvg">';
                    echo '    <svg onclick="decrement(' . htmlspecialchars(json_encode($mnprdctid), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['size']), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['color']), ENT_QUOTES, 'UTF-8') . ')" '
                        . ($decrementDisabled ? 'style="pointer-events: none; opacity: 0.5;"' : '') // Disable pointer events and reduce opacity
                        . ' xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 16 16">';
                    echo '        <path fill="black" d="M3 8a.75.75 0 0 1 .75-.75h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 3 8" />';
                    echo '    </svg>';
                    echo '</div>';

                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div id="mnrmvoptnfrprdctchkot">';
                    echo '        <svg onclick="removeItem(' . htmlspecialchars(json_encode($mnprdctid), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['size']), ENT_QUOTES, 'UTF-8') . ', '
                        . htmlspecialchars(json_encode($item['color']), ENT_QUOTES, 'UTF-8') . ')" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 256 256">';
                    echo '            <path fill="#ff5555" d="M216 48h-40v-8a24 24 0 0 0-24-24h-48a24 24 0 0 0-24 24v8H40a8 8 0 0 0 0 16h8v144a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16V64h8a8 8 0 0 0 0-16M112 168a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0Zm48 0a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0Zm0-120H96v-8a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8Z" />';
                    echo '        </svg>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Cart is not an array.</p>";
            }

        } else {
            echo "<p>User not found.</p>";
        }

        $conn->close();

        ?>
    </div>

    <div id="mnclcltrftrfrprdcts">
        <div id="mncntntsfrprc">
            <div id="mnttl">Total Amount</div>
            <div id="mnttlprcfrprdcts">$<?php echo $totalCartPrice ?></div>
        </div>
        <div id="mnchkoutbtncntnr">
            <div id="mnbtnfrprchsgds">Checkout Securely</div>
        </div>
    </div>


</body>
<script>
    function increment(prodid, size, color) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'cart_updater.php';

        var inputProdId = document.createElement('input');
        inputProdId.type = 'hidden';
        inputProdId.name = 'prodid';
        inputProdId.value = prodid;
        form.appendChild(inputProdId);

        var inputSize = document.createElement('input');
        inputSize.type = 'hidden';
        inputSize.name = 'size';
        inputSize.value = size;
        form.appendChild(inputSize);

        var inputColor = document.createElement('input');
        inputColor.type = 'hidden';
        inputColor.name = 'color';
        inputColor.value = color;
        form.appendChild(inputColor);

        document.body.appendChild(form);
        form.submit();
    }

    function decrement(prodid, size, color) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'cart_updater_d.php';

        var inputProdId = document.createElement('input');
        inputProdId.type = 'hidden';
        inputProdId.name = 'prodid';
        inputProdId.value = prodid;
        form.appendChild(inputProdId);

        var inputSize = document.createElement('input');
        inputSize.type = 'hidden';
        inputSize.name = 'size';
        inputSize.value = size;
        form.appendChild(inputSize);

        var inputColor = document.createElement('input');
        inputColor.type = 'hidden';
        inputColor.name = 'color';
        inputColor.value = color;
        form.appendChild(inputColor);

        document.body.appendChild(form);
        form.submit();

    }
    function removeItem(prodid, size, color) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'cart_updater_dltr.php';

        var inputProdId = document.createElement('input');
        inputProdId.type = 'hidden';
        inputProdId.name = 'prodid';
        inputProdId.value = prodid;
        form.appendChild(inputProdId);

        var inputSize = document.createElement('input');
        inputSize.type = 'hidden';
        inputSize.name = 'size';
        inputSize.value = size;
        form.appendChild(inputSize);

        var inputColor = document.createElement('input');
        inputColor.type = 'hidden';
        inputColor.name = 'color';
        inputColor.value = color;
        form.appendChild(inputColor);

        document.body.appendChild(form);
        form.submit();
    }
</script>

</html>