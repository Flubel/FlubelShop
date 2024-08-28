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
        $sql = "SELECT id, title, supplier, description, price, discount, category,title_pic FROM products 
        WHERE tag = 'trending'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {


            $img_result = $row['title_pic'];
            if ($img_result) {
              $base64Image = base64_encode($img_result);
        
              $mimeType = 'image/jpeg';
        
              $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;
        
            } else {
              $imgSrc = './assets/sadasdcvxc-removebg-preview.png';
            }
        
            $productUrl = './product.php?id=' . urlencode($row['id']);


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
    <div id="malesctncprdcts">
      <span id="herolbl">MEN'S</span>
      <span id="deschero">Elegance is the hallmark of a distinguished gentleman</span>
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