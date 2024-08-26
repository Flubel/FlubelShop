<?php
include(__DIR__ . "/../db_config.php");


 $sql = "SELECT id, title, supplier, price, category, added_at, added_by FROM products";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {


         $product_id = $row['id'];

         $variant_sql = "SELECT xs, s, m, l, xl, 2xl, quantity,price FROM product_variants WHERE product_id = $product_id";
         $variant_result = $conn->query($variant_sql);
         $img_sql = "SELECT pic_1 FROM product_img WHERE product_id = $product_id";
         $img_result = $conn->query($img_sql);




         if ($img_result && $img_result->num_rows > 0) {
             $img_row = $img_result->fetch_assoc();
             
             $blobData = $img_row['pic_1'];
             
             $base64Image = base64_encode($blobData);
             
             $mimeType = 'image/jpeg';
             
             $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;
             
         } else {
             $imgSrc = "../assets/sadasdcvxc-removebg-preview.png";
         }
 
         $availability = [
             'XS' => false,
             'S' => false,
             'M' => false,
             'L' => false,
             'XL' => false,
             '2XL' => false
         ];
         $min_price = PHP_INT_MAX;
         $max_price = PHP_INT_MIN;
 
         $total_quantity = 0;
         while ($variant_row = $variant_result->fetch_assoc()) {
             foreach ($availability as $size => &$isAvailable) {
                 if ($variant_row[strtolower($size)] == 1) {
                     $isAvailable = true;
                 }
             }
             $total_quantity += $variant_row['quantity'];

             if ($variant_row['price'] < $min_price) {
                 $min_price = $variant_row['price'];
             }
             if ($variant_row['price'] > $max_price) {
                 $max_price = $variant_row['price'];
             }
         }
         $colorbg;
         if($row['category'] === "Male"){
            $colorbg = '#0044cc';
         }else if ($row['category'] === "Female"){
            $colorbg = '#e91e63 ';
         }else{
            $colorbg = '#9e9e9e';
         }

         echo '<div id="maincntnrfrprdct" style="box-shadow: 0px 0px 5px ' . $colorbg . '">';
         echo '    <div id="mncntnrffrimg">';
         echo '        <img id="mnimgcntnr" src="' . htmlspecialchars($imgSrc) . '" alt="product image">';
         echo '    </div>';
         echo '    <div id="mnttlfrprdctcntnr">';
         echo '        <div id="ttlfrprdct">' . htmlspecialchars($row["title"]) . '</div>';
         echo '        <div id="spplrnmfrprdct">' . htmlspecialchars($row["supplier"]) . " | Product id: " . htmlspecialchars($row["id"]) . '</div>';
         $price_range = ($min_price === $max_price) ? "$min_price$" : "$min_price$ - $max_price$";
         echo '        <div id="prcofprdct">' . htmlspecialchars($price_range) . '</div>';
         echo '        <div id="addedatdtls">Added at ' . htmlspecialchars($row["added_at"]) . ' by ' . htmlspecialchars($row["added_by"]) . '</div>';
         echo '    </div>';
         echo '    <div id="mnothroptns">';
         echo '        <div id="variantsdv">';
         echo '            Quantity: &nbsp;<span id="mnvrntstxt">' . htmlspecialchars($total_quantity) . '</span>';
         echo '        </div>';
         echo '        <div id="mnvrntsfrsza">';
         echo '            Size';
         echo '            <div id="mnvrntsfrsz">';
         echo '                <div id="smlvrnt" class="' . ($availability['XS'] ? 'available' : 'notavail') . '">XS</div>';
         echo '                <div id="smlvrnt" class="' . ($availability['S'] ? 'available' : 'notavail') . '">S</div>';
         echo '                <div id="smlvrnt" class="' . ($availability['M'] ? 'available' : 'notavail') . '">M</div>';
         echo '                <div id="smlvrnt" class="' . ($availability['L'] ? 'available' : 'notavail') . '">L</div>';
         echo '                <div id="smlvrnt" class="' . ($availability['XL'] ? 'available' : 'notavail') . '">XL</div>';
         echo '                <div id="smlvrnt" class="' . ($availability['2XL'] ? 'available' : 'notavail') . '">2XL</div>';
         echo '            </div>';
         echo '        </div>';
         echo '    </div>';
        //  echo '    <div id="mndltoptnfrprdct">';
        //  echo '        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 1024 1024"><path fill="#ff5555" fill-opacity="0.15" d="M292.7 840h438.6l24.2-512h-487z"/><path fill="#ff5555" d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32m-504-72h304v72H360zm371.3 656H292.7l-24.2-512h487z"/></svg>';
        //  echo '    </div>';
         echo '</div>';
     }
 } else {
     echo "No products found.";
 }