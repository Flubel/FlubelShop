<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="./script1.js"></script>
</head>

<body>

    <?php
    session_start();
    include("navbar.php");
    ?>

    <?php

    $product_idq = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT id, title,supplier,category,price,title_pic FROM products WHERE id = $product_idq";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $product_id = $row['id'];
            $supplrmn = $row['supplier'];
            $ttlmn = $row['title'];
            $categorymn = $row['category'];
            $pricemn = $row['price'];
            $img_result = $row['title_pic'];
            if ($img_result) {
                $base64Image = base64_encode($img_result);

                $mimeType = 'image/jpeg';

                $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

            } else {
                $imgSrc = "./assets/sadasdcvxc-removebg-preview.png";
            }

            $variant_sql = "SELECT xs, s, m, l, xl, 2xl, quantity FROM product_variants WHERE product_id = $product_id";
            $variant_result = $conn->query($variant_sql);
            $availability = [
                'XS' => false,
                'S' => false,
                'M' => false,
                'L' => false,
                'XL' => false,
                '2XL' => false
            ];

            $total_quantity = 0;
            while ($variant_row = $variant_result->fetch_assoc()) {
                foreach ($availability as $size => &$isAvailable) {
                    if ($variant_row[strtolower($size)] == 1) {
                        $isAvailable = true;
                    }
                }
                $total_quantity += $variant_row['quantity'];
            }
        }
    } else {
        echo "No products found.";
    }
    ?>

    <div id="mnbdyfrprdctshwr">

        <div id="lftsdfrimgsg">
            <div id="mnimgcntnrfrshwprdcts" style="background-image: url(<?php echo $imgSrc; ?>);"></div>
            <div id="othrimgscntnr">
                <div id="prdctimgs"></div>
                <div id="prdctimgs"></div>
                <div id="prdctimgs"></div>
                <div id="prdctimgs"></div>
                <div id="prdctimgs"></div>
                <div id="prdctimgs"></div>
            </div>
        </div>
        <div id="rgtsdfrimg">
            <div id="suppliernmfrprdctshw"><?php echo $supplrmn ?></div>
            <div id="mnprdctttlfrprdctinf"><?php echo $ttlmn ?></div>
            <div id="szshwrfrprdctpg">
                <div id="tprwfrprdctsher12">
                    <div id="szfrprdct1" class="<?php echo $availability['XS'] ? 'available' : 'notavail'; ?>">XS</div>
                    <div id="szfrprdct1" class="<?php echo $availability['S'] ? 'available' : 'notavail'; ?>">S</div>
                    <div id="szfrprdct1" class="<?php echo $availability['M'] ? 'available' : 'notavail'; ?>">M</div>
                </div>
                <div id="tprwfrprdctsher12">
                    <div id="szfrprdct1" class="<?php echo $availability['L'] ? 'available' : 'notavail'; ?>">L</div>
                    <div id="szfrprdct1" class="<?php echo $availability['XL'] ? 'available' : 'notavail'; ?>">XL</div>
                    <div id="szfrprdct1" class="<?php echo $availability['2XL'] ? 'available' : 'notavail'; ?>">2XL
                    </div>
                </div>
            </div>
            <div id="qunttyfrprdct">Stock: <?php echo $total_quantity ?> | Category: <?php echo $categorymn ?></div>
            <div id="mnprdctttlfrprdctinf"><?php echo $pricemn ?></div>
            <div id="pymntprdctmnoffr">
                <div id="mnbtnfraddprdct">Buy Now</div>
            </div>
            <div id="pymntprdctmnoffr">
                <div id="mnbtnfraddprdct">Add to Cart</div>
            </div>
        </div>
    </div>
</body>

</html>