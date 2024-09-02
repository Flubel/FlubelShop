<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Flubel-Shop</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="./script1.js"></script>
</head>

<body>
    <?php
    //   include("loader.php");
    ?>

    <?php
    session_start();
    include("navbar.php");
    ?>

    <?php

    $product_idq = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT id, title,supplier,category,price,title_pic,description,tag FROM products WHERE id = $product_idq";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $product_id = $row['id'];
            $supplrmn = $row['supplier'];
            $prdcttagg = $row['tag'];
            $ttlmn = $row['title'];
            $tagDisplayStyle = empty($prdcttagg) ? 'style="display: none;"' : '';
            $categorymn = $row['category'];
            $pricemn = $row['price'];
            $img_result = $row['title_pic'];
            $mnprdctdesc = $row['description'];
            if ($img_result) {
                $base64Image = base64_encode($img_result);

                $mimeType = 'image/jpeg';

                $imgSrc = 'data:' . $mimeType . ';base64,' . $base64Image;

            } else {
                $imgSrc = "./assets/sadasdcvxc-removebg-preview.png";
            }

            $variant_sql = "SELECT xs, s, m, l, xl, 2xl, quantity, color FROM product_variants WHERE product_id = $product_id";
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
            $colors = [];

            while ($variant_row = $variant_result->fetch_assoc()) {
                // Check and update availability based on quantity
                foreach ($availability as $size => &$isAvailable) {
                    // Convert size to lowercase for comparison
                    $sizeLower = strtolower($size);
                    // Check if size column exists and has a value of 1
                    if (isset($variant_row[$sizeLower]) && $variant_row[$sizeLower] == 1) {
                        // If quantity is more than 2, mark as available
                        if ($variant_row['quantity'] > 2) {
                            $isAvailable = true;
                        } else {
                            $isAvailable = false;
                        }
                    }
                }

                $total_quantity += $variant_row['quantity'];
                $color = $variant_row['color'];
                if (!in_array($color, $colors)) {
                    $colors[] = $color;
                }
            }

            // Remove the reference to the last array element
            unset($isAvailable);

        }
    } else {
        header('Location : /');
    }
    ?>
    <div id="mnbdyfrprdctshwr">
        <div id="mntpcntnr">
            <div id="lftsdfrimgmn">
                <div id="obsrvrcntnr2"></div>
                <div id="mnimgfrmtfrprdcts">
                    <div id="tpfrsmlimga">
                        <div id="imgcntnrsml"></div>
                        <div id="imgcntnrsml"></div>
                    </div>
                    <div id="mnimgfrcntnr">
                        <div id="mnimgbgfrprdct"></div>
                    </div>
                    <div id="tpfrsmlimga">
                        <div id="imgcntnrsml"></div>
                        <div id="imgcntnrsml"></div>
                    </div>
                    <div id="mnimgfrcntnr">
                        <div id="mnimgbgfrprdct"></div>
                    </div>
                </div>
            </div>
            <div id="rgtsdfrimgmn">
                <!-- <div id="othrcntnrs1"></div> -->
                <div id="mncntnrfinf">
                    <div id="ifanytgsfrprdct">
                        <?php echo '<div id="mnprdcttgs" ' . $tagDisplayStyle . '>' . htmlspecialchars($prdcttagg) . '</div>';?>
                    </div>
                    <div id="mnprdctcmpnynmttl"><?php echo $supplrmn ?></div>
                    <div id="mnprdctnmttl"><?php echo $ttlmn ?></div>
                    <div id="mnprdctctgryttl"><?php echo $categorymn ?></div>
                    <div id="mnprdctorcsttl"><?php echo $pricemn ?></div>
                    <div id="mnprdctctgryttl"><?php echo $total_quantity ?> Pieces in Stock</div>
                    <div id="shroradtwshlst">
                        <div id="wshlstbtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 256 256">
                                <path fill="black"
                                    d="M178 40c-20.65 0-38.73 8.88-50 23.89C116.73 48.88 98.65 40 78 40a62.07 62.07 0 0 0-62 62c0 70 103.79 126.66 108.21 129a8 8 0 0 0 7.58 0C136.21 228.66 240 172 240 102a62.07 62.07 0 0 0-62-62m-50 174.8c-18.26-10.64-96-59.11-96-112.8a46.06 46.06 0 0 1 46-46c19.45 0 35.78 10.36 42.6 27a8 8 0 0 0 14.8 0c6.82-16.67 23.15-27 42.6-27a46.06 46.06 0 0 1 46 46c0 53.61-77.76 102.15-96 112.8" />
                            </svg>
                        </div>
                        <div id="shrlnkbtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 15 15">
                                <path fill="black" fill-rule="evenodd"
                                    d="M3.5 5a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1.25a.5.5 0 0 1 0-1h1.25A1.5 1.5 0 0 1 13 5.5v6a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 2 11.5v-6A1.5 1.5 0 0 1 3.5 4h1.25a.5.5 0 0 1 0 1zM7 1.636L5.568 3.068a.45.45 0 0 1-.636-.636l2.25-2.25a.45.45 0 0 1 .636 0l2.25 2.25a.45.45 0 0 1-.636.636L8 1.636V8.5a.5.5 0 0 1-1 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div id="clrcrntsfrpdct">
                        <?php
                        foreach ($colors as $color) {
                            echo '<div id="clr1m"  style="background-color: ' . $color . ';"></div>';
                        }
                        ?>
                    </div>
                    <div id="infabtclr"></div>
                    <div id="mnszcntnrfrprdct">
                        <div id="txtfrszinf">Select Size</div>
                        <div id="mnszcnntnrfrprdct">
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['XS'] ? 'line-through' : 'none'; ?>;">
                                XS</div>
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['S'] ? 'line-through' : 'none'; ?>;">
                                S</div>
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['M'] ? 'line-through' : 'none'; ?>;">
                                M</div>
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['L'] ? 'line-through' : 'none'; ?>;">
                                L</div>
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['XL'] ? 'line-through' : 'none'; ?>;">
                                XL</div>
                            <div id="cntrfrsza"
                                style="text-decoration: <?php echo !$availability['2XL'] ? 'line-through' : 'none'; ?>;">
                                2XL</div>
                        </div>
                    </div>
                    <div id="mnoptnfradprdcttcr">
                        <div id="mnbtnfraddprdcttcrt">Buy Now</div>
                    </div>
                    <div id="mnoptnfradprdcttcr2">
                        <form id="mnfrmcntnrs" action="add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product_idq ?>">
                            <input type="hidden" id="product_color" name="product_color">
                            <input type="hidden" id="product_size" name="product_size">

                            <?php

                            if (!isset($_SESSION['UserEmail'])) {
                                echo '<button type="submit" id="mnbtnfraddprdcttcrt2" disabled>Add to Cart</button>';
                            } else {
                                $user_eml = $_SESSION['UserEmail'];
                                $sql = "SELECT cart FROM user WHERE email = '$user_eml'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $cart = $row['cart'];
                                    $cartArray = json_decode($cart, true);

                                    $inCart = false;

                                    foreach ($cartArray as $item) {
                                        if (is_array($item) && isset($item['id'], $item['color'], $item['size'])) {
                                            if ($item['id'] == $product_id) {
                                                $inCart = true;
                                                break;
                                            }
                                        }
                                    }

                                    if ($inCart) {
                                        echo '<button type="submit" id="mnbtnfraddprdcttcrt2" disabled>Add to Cart*</button>';
                                    } else {
                                        echo '<button type="submit" id="mnbtnfraddprdcttcrt2" disabled>Add to Cart</button>';
                                    }
                                } else {
                                    echo '<button type="submit" id="mnbtnfraddprdcttcrt2" disabled>Add to Cart</button>';
                                }
                            }
                            ?>


                        </form>
                    </div>
                    <div id="mnoptnfradprdcttcrshpnginf">
                        <div id="mncntnrfrshpnginf">
                            <div id="shppngmninf">Shipping Info</div>
                            <div id="shpngmninf">Shipping cost is not included in the price of product listed above,
                                orders above 75$ qualify for free shipping</div>

                        </div>
                    </div>
                </div>
                <div id="obsrvrcntnr"></div>
            </div>
        </div>
        <div id="othrcntnrs">
            <?php $safeValue = htmlspecialchars($mnprdctdesc, ENT_QUOTES, 'UTF-8'); ?>
            <input type="hidden" id="mainasdasd" name="" value="<?php echo $safeValue ?>">
            <div id="mncntnrfrpdctdescprdctpg">
            </div>
        </div>
        <div id="ttlfrctgry">You May Like</div>
        <div id="mntrndngcntnr121">



            <?php
            $sql = "SELECT id, title, supplier, description, price, discount, category, title_pic FROM products
           WHERE category = '$categorymn'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $products = [];
                while ($row = $result->fetch_assoc()) {
                    // Exclude the product with the specific ID
                    if ($row['id'] != $product_idq) {
                        $products[] = $row;
                    }
                }

                // Shuffle the array to randomize the order
                shuffle($products);

                // Slice the array to get only the first 3 elements
                $randomProducts = array_slice($products, 0, 3);

                // Display the selected products
                foreach ($randomProducts as $row) {
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
                    echo '<div id="prdctspplrndctgry">' . htmlspecialchars($row['supplier']) . ' | ' .
                        htmlspecialchars($row['category']) . '</div>';
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/14.0.0/marked.min.js"></script>

<script>




    // const addToCartButton = document.getElementById('mnbtnfraddprdcttcrt2');
    // addToCartButton.style.textDecoration = 'line-through'

    //     function updateButtonState() {
    //     setTimeout(() => {
    //         const productId = document.querySelector('input[name="product_id"]').value;
    //         const color = productColorInput.value;
    //         const size = productSizeInput.value;
    //         const addToCartButton = document.getElementById('mnbtnfraddprdcttcrt2');

    //         if (!addToCartButton.disabled) { // Check if button is not disabled by PHP
    //             if (productId && color && size) {
    //                 addToCartButton.disabled = false;
    //                 addToCartButton.style.textDecoration = 'none';
    //             } else {
    //                 addToCartButton.disabled = true;
    //                 addToCartButton.style.textDecoration = 'line-through';
    //             }
    //         }
    //     }, 1000);
    // }
    // const colorDivs = document.querySelectorAll('#clr1m');
    // const productColorInput = document.getElementById('product_color');

    // colorDivs.forEach(div => {
    //     div.addEventListener('click', function () {
    //         colorDivs.forEach(d => d.style.boxShadow = 'none');

    //         this.style.boxShadow = '0px 0px 0px 2px black';

    //         const color = this.style.backgroundColor;
    //         updateButtonState();

    //         document.getElementById('infabtclr').textContent = color;
    //         productColorInput.value = color;
    //     });
    // });
    // const colorDivs1 = document.querySelectorAll('#cntrfrsza');
    // const productSizeInput = document.getElementById('product_size');

    // colorDivs1.forEach(div => {
    //     div.addEventListener('click', function () {
    //         if (this.style.textDecoration === 'line-through') {
    //             return;
    //         }

    //         colorDivs1.forEach(d => {
    //             d.style.backgroundColor = 'white';
    //             d.style.color = 'black';
    //         });

    //         this.style.backgroundColor = 'black';
    //         this.style.color = 'white';
    //         updateButtonState();

    //         productSizeInput.value = this.textContent;
    //     });
    // });

    document.addEventListener('DOMContentLoaded', (event) => {
        const addToCartButton = document.getElementById('mnbtnfraddprdcttcrt2');
        const productColorInput = document.getElementById('product_color');
        const productSizeInput = document.getElementById('product_size');
        const colorDivs = document.querySelectorAll('#clr1m');
        const sizeDivs = document.querySelectorAll('#cntrfrsza');

        // Function to update button state
        function updateButtonState() {
            setTimeout(() => {
                const productId = document.querySelector('input[name="product_id"]').value;
                const color = productColorInput.value;
                const size = productSizeInput.value;

                if (productId && color && size) {
                    addToCartButton.disabled = false;
                    addToCartButton.style.textDecoration = 'none';
                } else {
                    addToCartButton.disabled = true;
                    addToCartButton.style.textDecoration = 'line-through';
                }
            }, 1000);
        }

        // Handle color selection
        colorDivs.forEach(div => {
            div.addEventListener('click', function () {
                colorDivs.forEach(d => d.style.boxShadow = 'none');
                this.style.boxShadow = '0px 0px 0px 2px black';

                const color = this.style.backgroundColor;
                productColorInput.value = color;
                updateButtonState();
                document.getElementById('infabtclr').textContent = color;

            });
        });

        // Handle size selection
        sizeDivs.forEach(div => {
            div.addEventListener('click', function () {
                if (this.style.textDecoration === 'line-through') {
                    return;
                }

                sizeDivs.forEach(d => {
                    d.style.backgroundColor = 'white';
                    d.style.color = 'black';
                });

                this.style.backgroundColor = 'black';
                this.style.color = 'white';
                productSizeInput.value = this.textContent;
                updateButtonState();
            });
        });

        // Handle button click
        addToCartButton.addEventListener('click', (event) => {
            if (addToCartButton.disabled) {
                // Prevent the default action of the button
                event.preventDefault();

                // Redirect to the account page if not logged in or if button is disabled
                if (!document.querySelector('input[name="product_id"]').value || addToCartButton.style.textDecoration === 'line-through') {
                    window.location.href = '/account';
                }
            }
        });
    });

    function resizeimgs() {
        var lftsdfrimgmn = document.getElementById('lftsdfrimgmn');
        var mnimgfrmtfrprdcts = document.getElementById('mnimgfrmtfrprdcts');

        var width = lftsdfrimgmn.offsetWidth;
        mnimgfrmtfrprdcts.style.width = width + 'px';
    } function setheight() {
        var lftsdfrimgmn1 = document.getElementById('lftsdfrimgmn');
        var rgtsdfrimgmn1 = document.getElementById('rgtsdfrimgmn');
        setTimeout(function () {
            var height = rgtsdfrimgmn1.offsetHeight;
            lftsdfrimgmn1.style.height = height + 'px';
        }, 0);
    }
    window.addEventListener('load', function () {
        resizeimgs()
        setheight()
    });
    window.addEventListener('resize', function () {
        resizeimgs()
        setheight()
    });
    window.addEventListener('DOMContentLoaded', () => {

        const markdownInput = document.getElementById('mainasdasd');
        const preview = document.getElementById('mncntnrfrpdctdescprdctpg');

        function updatePreview() {
            const markdownText = markdownInput.value;
            preview.innerHTML = marked.marked(markdownText);
        }

        updatePreview()

        const target = document.getElementById('obsrvrcntnr');
        const target1 = document.getElementById('obsrvrcntnr2');
        function handleIntersection(entries) {
            // alert('obser')
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const mnimgfrmtfrprdcts = document.getElementById('mnimgfrmtfrprdcts');
                    if (mnimgfrmtfrprdcts) {
                        mnimgfrmtfrprdcts.style.position = 'relative';
                        mnimgfrmtfrprdcts.style.top = '0px';
                        target1.style.marginBottom = '0px'
                    }
                }
            });
        }

        function handleIntersection1(entries) {
            // alert('obser1')
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const mnimgfrmtfrprdcts = document.getElementById('mnimgfrmtfrprdcts');
                    if (mnimgfrmtfrprdcts) {
                        mnimgfrmtfrprdcts.style.position = 'fixed';
                        mnimgfrmtfrprdcts.style.top = '70px';
                        // mnimgfrmtfrprdcts.style.height = '70px';
                        target1.style.marginBottom = '100vh'
                    }
                }
            });
        }

        const observerOptions = {
            threshold: 0.1
        };

        setTimeout(() => {
            if (target) {
                target1.style.display = 'flex';
                const observer = new IntersectionObserver(handleIntersection, observerOptions);
                observer.observe(target);
            } else {
                console.error('Element with id "obsrvrcntnr" not found.');
            }

            if (target1) {
                const observer1 = new IntersectionObserver(handleIntersection1, observerOptions);
                observer1.observe(target1);
            } else {
                console.error('Element with id "obsrvrcntnr2" not found.');
            }
        }, 100);

    })

</script>


</html>