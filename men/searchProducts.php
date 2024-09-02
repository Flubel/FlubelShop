<?php

include("../db_config.php");

$query = isset($_POST['query']) ? $conn->real_escape_string($_POST['query']) : '';

if ($query !== '') {
    $sql = "SELECT id, title, supplier, description, price, discount, category,title_pic FROM products 
            WHERE title LIKE '%$query%' OR supplier LIKE '%$query%' OR category LIKE '%$query%' OR tag LIKE '%$query%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productUrl = '../product.php?id=' . urlencode($row['id']);


            $img_result = $row['title_pic'];
            if ($img_result) {
                $base64Image = base64_encode($img_result);

                $mimeType = 'image/jpeg';

                $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

            } else {
                $imgSrc = "./assets/sadasdcvxc-removebg-preview.png";
            }


            // echo '<a href="' . $productUrl . '" id="mncntnrfrsrcrprdcts">';
            echo '<div onclick="window.location.href=\'' . $productUrl . '\'" id="mncntnrfrsrcrprdcts">';

            echo '<div id="mningfrprdctssrch">';
            echo '<img id="mnprdctsrchimg" src="' . $imgSrc . '" alt="">';
            echo '</div>';
            echo '<div id="mnprdctsttlcntnr">';
            echo '<div id="titleprdctsrch">' . htmlspecialchars($row['title']) . '</div>';
            echo '<div id="spplrfrprdctndctgry">' . htmlspecialchars($row['supplier']) . ' | ' . htmlspecialchars($row['category']) . '</div>';
            echo '<div id="pricefrprdc">' . $row['price'] . '</div>';
            echo '</div>';
            echo '</div>';
            // echo '</a>';

        }
    } else {
        echo "<p>No products found.</p>";
    }
}