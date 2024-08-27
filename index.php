<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Flubel-Shop</title>
  <script defer src="./script1.js"></script>
</head>

<body>
  <!-- <div id="navbar">



    <div id="lftsdmnnvbr">
      <div id="mainwebttlflb">FLUBEL SHOP</div>
    </div>
    <div id="middlebtnsmn">
      <div id="womennavbtn">WOMEN'S</div>
      <div id="mennavbtn">MEN'S</div>
      <div id="accsnavbtn">ACCESORIES</div>
      <div id="technavbtn">TECH</div>
    </div>
    <div id="rgtsdmnnvbr">
      <div id="iconnum1">
        <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24">
          <path fill="black" fill-rule="evenodd"
            d="M14.385 15.446a6.75 6.75 0 1 1 1.06-1.06l5.156 5.155a.75.75 0 1 1-1.06 1.06zm-7.926-1.562a5.25 5.25 0 1 1 7.43-.005l-.005.005l-.005.004a5.25 5.25 0 0 1-7.42-.004"
            clip-rule="evenodd" />
        </svg>
      </div>
      <div id="iconnum2">
        <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 256 256">
          <path fill="black"
            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
        </svg>
      </div>
      <div id="iconnum3">
        <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24">
          <path fill="black"
            d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
        </svg>
      </div>
      <div id="iconnum4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24">
          <g fill="none" stroke="black" stroke-width="1.5">
            <path
              d="M4.508 20h14.984a.6.6 0 0 0 .592-.501l1.8-10.8A.6.6 0 0 0 21.292 8H2.708a.6.6 0 0 0-.592.699l1.8 10.8a.6.6 0 0 0 .592.501Z" />
            <path d="M7 8V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
          </g>
        </svg>
      </div>
    </div>
  </div> -->

  <?php
  include("navbar.php");
  ?>
  <div id="discountbarifso">Free Shipping over 75$</div>
  <div id="mainbody">
    <div id="mainherovdplr">
      <div id="mnlftsdcntnr">
        <span id="herolbl"> FLUBEL SHOP </span>
        <span id="deschero">Luxury clothing crafted for men and women, blending timeless elegance with modern style,
          using the finest materials for unmatched comfort and sophistication.</span>
      </div>
      <div id="mnrgtsdfrbtns">
        <div id="btnmnfrml">SHOP MEN'S</div>
        <div id="btnmnfrfml">SHOP WOMEN'S</div>
      </div>
    </div>
    <div id="pplctgrymn">
      <div id="ttlfrctgry">TRENDING</div>
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
        // $sql = "SELECT * FROM products WHERE tag = 'trending'";
        // $result = $conn->query($sql);

        // if ($result) {

        //   while ($row = $result->fetch_assoc()) {

        //     $product_id = $row["id"];
        //     $variant_sql = "SELECT price FROM product_variants WHERE product_id = $product_id";
        //     $variant_result = $conn->query($variant_sql);
        //     $min_price = PHP_INT_MAX;
        //     $max_price = PHP_INT_MIN;

        //     while ($variant_row = $variant_result->fetch_assoc()) {

        //       if ($variant_row['price'] < $min_price) {
        //         $min_price = $variant_row['price'];
        //       }
        //       if ($variant_row['price'] > $max_price) {
        //         $max_price = $variant_row['price'];
        //       }
        //     }


        //     $img_sql = "SELECT pic_1 FROM product_img WHERE product_id = $product_id";
        //     $img_result = $conn->query($img_sql);




        //     if ($img_result && $img_result->num_rows > 0) {
        //       $img_row = $img_result->fetch_assoc();

        //       $blobData = $img_row['pic_1'];

        //       $base64Image = base64_encode($blobData);

        //       $mimeType = 'image/jpeg';

        //       $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

        //     } else {
        //       $imgSrc = "./assets/sadasdcvxc-removebg-preview.png";
        //     }

        //     echo '<div id="mnprdctcrd">';
        //     echo '<img id="mnprdctimg" src="' . $imgSrc . '"></img>';
        //     echo '<div id="mnprdctttl">' . $row['title'] . '</div>';
        //     echo '<div id="prdctspplrndctgry">' . $row['supplier'] . ' | ' . $row['category'] . '</div>';
        //     $price_range = ($min_price === $max_price) ? "$min_price$" : "$min_price$ - $max_price$";
        //     echo '<div id="prdctpricemn">' . $price_range . '</div>';
        //     echo '</div>';
        //   }
        //   $result->free();
        // } else {
        //   echo "Error: " . $conn->error;
        // }
        // Fetch products with their variants and images in a single query using JOINs
        $sql = "
            SELECT 
                p.id AS product_id,
                p.title,
                p.supplier,
                p.category,
                pv.price AS variant_price,
                pi.pic_1
            FROM products p
            LEFT JOIN product_variants pv ON p.id = pv.product_id
            LEFT JOIN product_img pi ON p.id = pi.product_id
            WHERE p.tag = 'trending'
        ";
        
        $result = $conn->query($sql);
        
        if ($result) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                if (!isset($products[$product_id])) {
                    $products[$product_id] = [
                        'title' => $row['title'],
                        'supplier' => $row['supplier'],
                        'category' => $row['category'],
                        'min_price' => PHP_INT_MAX,
                        'max_price' => PHP_INT_MIN,
                        'imgSrc' => $row['pic_1'] ? 'data:image/jpeg;base64,' . base64_encode($row['pic_1']) : './assets/sadasdcvxc-removebg-preview.png',
                    ];
                }
        
                if ($row['variant_price']) {
                    $products[$product_id]['min_price'] = min($products[$product_id]['min_price'], $row['variant_price']);
                    $products[$product_id]['max_price'] = max($products[$product_id]['max_price'], $row['variant_price']);
                }
            }
        
            // Output products
            foreach ($products as $product) {
                $price_range = ($product['min_price'] === $product['max_price']) ? "$" . $product['min_price'] : "$" . $product['min_price'] . " - $" . $product['max_price'];
                echo '<div id="mnprdctcrd">';
                echo '<img id="mnprdctimg" src="' . $product['imgSrc'] . '"></img>';
                echo '<div id="mnprdctttl">' . htmlspecialchars($product['title']) . '</div>';
                echo '<div id="prdctspplrndctgry">' . htmlspecialchars($product['supplier']) . ' | ' . htmlspecialchars($product['category']) . '</div>';
                echo '<div id="prdctpricemn">' . $price_range . '</div>';
                echo '</div>';
            }
        } else {
            echo "Error: " . $conn->error;
        }
        ?>
      </div>
    </div>
    <div id="malesctncprdcts">

    </div>
  </div>
  <div id="mnfooterfl">Made by Fiend at Flubel</div>
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