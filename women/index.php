<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women | Flubel-Shop</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: #f8e0e0;">
  <?php
  include("loader.php");
  ?>
    <?php

    session_start();
    include("../navbar.php");
    ?>
    <div id="mainbodyfrsprtpgs">
        <div id="mntpbnnrfrmlsprdct2">
            <span id="herolbl1">WOMEN'S</span>
            <span id="deschero">Beauty is the hallmark of a distinguished women</span>
        </div>
        <div id="ttlfrctgry">TRENDING IN WOMEN</div>
        <div id="lftscrlndrgtbgbtn">
            <button id="scrollLeftBtn"><svg xmlns="http://www.w3.org/2000/svg" width="12.5px" height="25px"
                    viewBox="0 0 12 24">
                    <path fill="#fff" fill-rule="evenodd"
                        d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414" />
                </svg>
            </button>
            <button id="scrollRightBtn"><svg xmlns="http://www.w3.org/2000/svg" width="12.5px" height="25px"
                    viewBox="0 0 12 24">
                    <path fill="#fff" fill-rule="evenodd"
                        d="M10.157 12.711L4.5 18.368l-1.414-1.414l4.95-4.95l-4.95-4.95L4.5 5.64l5.657 5.657a1 1 0 0 1 0 1.414" />
                </svg></button>
        </div>
        <div id="mntrndngcntnr">


            <?php
            $sql = "SELECT id, title, supplier, description, price, discount, category, title_pic 
        FROM products 
        WHERE tag = 'trending' 
        AND category = 'female'";


            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {


                    $img_result = $row['title_pic'];
                    if ($img_result) {
                        $base64Image = base64_encode($img_result);

                        $mimeType = 'image/jpeg';

                        $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

                    } else {
                        $imgSrc = '../assets/sadasdcvxc-removebg-preview.png';
                    }

                    $productUrl = '../product.php?id=' . urlencode($row['id']);


                    echo '<a href="' . $productUrl . '" id="mnprdctcrd">';
                    echo '<img id="mnprdctimg" src="' . $imgSrc . '" loading="lazy"></img>';
                    echo '<div id="mnprdctttl">' . htmlspecialchars($row['title']) . '</div>';
                    echo '<div id="prdctspplrndctgry">' . htmlspecialchars($row['supplier']) . ' | ' . htmlspecialchars($row['category']) . '</div>';
                    echo '<div id="prdctpricemn">' . $row['price'] . '</div>';
                    echo '</a>';

                }
            } else {
                echo "<p>No products found.</p>";
            }


            ?>
        </div>
        <div id="ttlfrctgryw">BROWSE MORE</div>

        <div id="mnprdctsfrmencntnw">
            <?php
            $sql = "SELECT id, title, supplier, description, price, discount, category, title_pic 
        FROM products 
        WHERE  category = 'female'";


            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {


                    $img_result = $row['title_pic'];
                    if ($img_result) {
                        $base64Image = base64_encode($img_result);

                        $mimeType = 'image/jpeg';

                        $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

                    } else {
                        $imgSrc = '../assets/sadasdcvxc-removebg-preview.png';
                    }

                    $productUrl = '../product.php?id=' . urlencode($row['id']);


                    echo '<a href="' . $productUrl . '" id="mnprdctcrd2">';
                    echo '<img id="mnprdctimg" src="' . $imgSrc . '" loading="lazy"></img>';
                    echo '<div id="mnprdctttl">' . htmlspecialchars($row['title']) . '</div>';
                    echo '<div id="prdctspplrndctgry">' . htmlspecialchars($row['supplier']) . ' | ' . htmlspecialchars($row['category']) . '</div>';
                    echo '<div id="prdctpricemn">' . $row['price'] . '</div>';
                    echo '</a>';

                }
            } else {
                echo "<p>No products found.</p>";
            }


            ?>
        </div>

        <div id="ttlfrctgryw">UNISEX</div>
        <div id="mntrndngcntnr222125">


        <?php
$sql = "SELECT id, title, supplier, description, price, discount, category, title_pic 
        FROM products 
        WHERE category = 'unisex'
        LIMIT 4";  // Limit the results to 4 products

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $img_result = $row['title_pic'];
        if ($img_result) {
            $base64Image = base64_encode($img_result);
            $mimeType = 'image/jpeg';
            $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $imgSrc = '../assets/sadasdcvxc-removebg-preview.png';
        }

        $productUrl = '../product.php?id=' . urlencode($row['id']);

        echo '<a href="' . $productUrl . '" id="mnprdctcrd">';
        echo '<img id="mnprdctimg" src="' . $imgSrc . '" loading="lazy"></img>';
        echo '<div id="mnprdctttl">' . htmlspecialchars($row['title']) . '</div>';
        echo '<div id="prdctspplrndctgry">' . htmlspecialchars($row['supplier']) . ' | ' . htmlspecialchars($row['category']) . '</div>';
        echo '<div id="prdctpricemn">' . $row['price'] . '</div>';
        echo '</a>';
    }
} else {
    echo "<p>No products found.</p>";
}
?>

        </div>
    </div>
</body>
<script>
    document.getElementById('scrollLeftBtn').addEventListener('click', function () {
        document.getElementById('mntrndngcntnr').scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    });

    document.getElementById('scrollRightBtn').addEventListener('click', function () {
        document.getElementById('mntrndngcntnr').scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    });
</script>

</html>