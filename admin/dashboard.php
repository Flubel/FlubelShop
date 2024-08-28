<!DOCTYPE html>
<html lang="en">

<?php

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: ./");
    exit();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Flubel-Shop</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <script defer src="./dash.js"></script>
</head>

<body>
    <div id="successmsg" class="success-message">
        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="40px" height="40px"
            viewBox="0 0 1024 1024">
            <path fill="white"
                d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0m0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01m204.336-636.352L415.935 626.944l-135.28-135.28c-12.496-12.496-32.752-12.496-45.264 0c-12.496 12.496-12.496 32.752 0 45.248l158.384 158.4c12.496 12.48 32.752 12.48 45.264 0c1.44-1.44 2.673-3.009 3.793-4.64l318.784-320.753c12.48-12.496 12.48-32.752 0-45.263c-12.512-12.496-32.768-12.496-45.28 0" />
        </svg>
        Product added successfully!
    </div>
    <div id="miainbdyadmnpnl">
        <div id="lftbrcntnradmn">
            <div id="maintpsmbl">F</div>
            <div id="mnothrbtns">
                <div id="hpmecntnrmn">
                    <div id="mnsdpnllft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1" />
                        </svg>
                    </div>
                    <span>Home</span>
                </div>
                <div id="prodttl">Products</div>
                <div id="prodcntnrmn">
                    <div id="mnsdpnllft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M22 3H2v6h1v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9h1zM4 5h16v2H4zm15 15H5V9h14zM9 11h6a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2" />
                        </svg>
                    </div>
                    <span>Add Product</span>
                </div>
                <div id="prodlstcntnrmn">
                    <div id="mnsdpnllft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 2048 2048">
                            <path fill="black"
                                d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354zm0 640l177-89l-463-265l-211 106zm315-157l182-91l-497-249l-149 75zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288zm-640 710v-455l-384-192v454zm64-566l369-184l-369-185l-369 185zm576-1l448-224l448 224v527l-448 224l-448-224zm384 576v-305l-256-128v305zm384-128v-305l-256 128v305zm-320-288l241-121l-241-120l-241 120z" />
                        </svg>
                    </div>
                    <span>List Products</span>
                </div>
            </div>
        </div>
        <?php

        include(__DIR__ . "/../db_config.php");
        $adminEmail = $_SESSION["adminEmail"];
        $query = $conn->prepare('SELECT * FROM admin WHERE email = ?');
        $query->bind_param('s', $adminEmail);
        $query->execute();
        $result = $query->get_result();


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $adminname = $row["username"];
            $adminemail = $row["email"];
            $adminid = $row["id"];
        }
        ?>
        <div id="rgtbrcntnrmnadmn">
            <div id="navbrcv">
                <div id="mnsrchbrcntnr">
                    <div id="mnsbmntsrchicn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" viewBox="0 0 24 26">
                            <path fill="rgb(58,58,58)"
                                d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0s.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </div>
                    <input placeholder="Search Admin Dashboard" type="text" name="maintxtsrchadmn" id="admnpnlmnsrchbr">
                </div>
                <div id="mnutiltscntnrrgtsd">
                    <div id="mainadmnpfpshwr">
                        <?php
                        $chars = str_split($adminname);
                        $firstChar = $chars[0];
                        $secondLastChar = $chars[count($chars) - 2];

                        echo strtoupper($firstChar . $secondLastChar);
                        ?>
                    </div>
                </div>
            </div>
            <div id="mnscrlablpn">
                <div id="dshbrdprflmnpnl">
                    <div id="mnprfladmninf">
                        <div id="bgcntnradmnpfpinf">
                            <div id="lftsdmnlgobg">
                                <?php
                                $chars = str_split($adminname);
                                $firstChar = $chars[0];
                                $secondLastChar = $chars[count($chars) - 2];

                                echo strtoupper($firstChar . $secondLastChar);
                                ?>
                            </div>
                        </div>
                        <div id="othrutltsfradmninf">
                            <div id="mnadmnshwusrnm"> <?php echo $adminname; ?>
                            </div>
                            <div id="mnadmnshweml"> <?php echo $adminemail; ?> </div>
                            <div id="mnadmnshwid">id: <?php echo $adminid; ?> </div>
                        </div>
                        <div id="lftsdmnbtnlgout">
                            <form action="logout.php" method="post">
                                <button id="logoutadmnmnbtn" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>

                    <div id="admnsmnlst">
                        <div id="admnlstttlmn">Admin's</div>
                        <div id="mnadmnbtlcntnt">
                            <div id="tableoutrcntnrttls">
                                <div id="idttl">ID</div>
                                <div id="namttl">Name</div>
                                <div id="emlttl">Email</div>
                                <div id="passttl">Password</div>
                            </div>

                            <?php

                            $query = $conn->prepare('SELECT * FROM admin');
                            $query->execute();
                            $result = $query->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $admnid = $row["id"];
                                    $admnnam = $row["username"];
                                    $admneml = $row["email"];
                                    $passwordLength = strlen($row["password"]);
                                    $maskedPassword = str_repeat('*', $passwordLength);
                                    echo "
        <div id='tableoutrcntnrcntnt'>
            <div id='idcntnt'>$admnid</div>
            <div id='namcntnt'>$admnnam</div>
            <div id='emlcntnt'>$admneml</div>
            <div id='passcntnt'>$maskedPassword</div>
        </div>";
                                }
                            } else {
                                echo "<div>No entries found.</div>";
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <div id="mnproductcntnr">
                    <div id="maininnrcntnrfraddprdcts">
                        <form id="mainfrmprdct" enctype="multipart/form-data" action="add_product.php" method="POST">
                            <div id="mnuprlblfrprdcts">Add Product</div>
                            <div id="imgaddrbg">
                                <div id="mnimgaddrprodttl">Images*</div>
                                <div id="mnimgaddrprodwrkbg">
                                    <div id="tpbrimgshwr">
                                        <div id="img1upld" onclick="triggerFileInput('fileInput1')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                        <div id="img2upld" onclick="triggerFileInput('fileInput2')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                        <div id="img3upld" onclick="triggerFileInput('fileInput3')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                    </div>

                                    <input name="img1" type="file" id="fileInput1" style="display:none"
                                        onchange="displayImage(this, 'img1upld')" accept="image/*">
                                    <input name="img2" type="file" id="fileInput2" style="display:none"
                                        onchange="displayImage(this, 'img2upld')" accept="image/*">
                                    <input name="img3" type="file" id="fileInput3" style="display:none"
                                        onchange="displayImage(this, 'img3upld')" accept="image/*">

                                    <div id="tpbrimgshwr">
                                        <div id="img4upld" onclick="triggerFileInput('fileInput4')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                        <div id="img5upld" onclick="triggerFileInput('fileInput5')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                        <div id="img6upld" onclick="triggerFileInput('fileInput6')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="30%"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#6b6b6b"
                                                        d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                                </g>
                                            </svg>
                                            Add Image
                                        </div>
                                    </div>
                                    <input name="img4" type="file" id="fileInput4" style="display:none"
                                        onchange="displayImage(this, 'img4upld')" accept="image/*">
                                    <input name="img5" type="file" id="fileInput5" style="display:none"
                                        onchange="displayImage(this, 'img5upld')" accept="image/*">
                                    <input name="img6" type="file" id="fileInput6" style="display:none"
                                        onchange="displayImage(this, 'img6upld')" accept="image/*">
                                </div>
                            </div>
                            <div id="namaddrfrprdctbg">
                                <div id="mnimgaddrprodttl">Title*</div>
                                <div id="maininptbgfrnmprdct">
                                    <input type="text" id="product_title" name="product_title">
                                </div>
                            </div>

                            <div id="namaddrfrprdctbgprc">
                                <div id="mnimgaddrprodttl">Supplier</div>
                                <div id="maininptbgfrnmprdct">
                                    <input type="text" value="Flubel-Shop" id="product_supplier"
                                        name="product_supplier">
                                </div>
                            </div>
                            <div id="namaddrfrprdctbg">
                                <div id="mnimgaddrprodttl">Tag*</div>
                                <div id="maininptbgfrnmprdct">
                                    <input type="text" id="product_tag" name="product_tag">
                                </div>
                            </div>
                            <div id="descaddrfrprdctbg">
                                <div id="mnimgaddrprodttldesc">Description*</div>
                                <div id="maininptbgfrnmprdctdesc">
                                    <div id="tpbrfroptns">
                                        <div id="edtbtnmndesc">Edit</div>
                                        <div id="prwbtnmndesc">Preview</div>
                                    </div>
                                    <div id="btntxtareamnbgcntnr">
                                        <div id="topcntrlsmn">
                                            <div data-format="bold">BOLD</div>
                                            <div data-format="italic">ITALICIZED</div>
                                            <div data-format="underline">UNDERLINE</div>
                                            <div data-format="strike">STRIKE</div>
                                        </div>
                                        <textarea id="dynamic-textarea" name="product_desc"
                                            placeholder="Description"></textarea>
                                    </div>
                                    <div id="mrdwnprwvr">
                                        <div id="preview" class="preview">
                                            Nothing to Preview
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="namaddrfrprdctbgprc">
                                <div id="mnimgaddrprodttl">Category*</div>
                                <div id="maininptbgfrnmprdctctgry">
                                    <div id="unsx">UNISEX</div>
                                    <div id="ml">MALE</div>
                                    <div id="fml">FEMALE</div>
                                </div>
                                <input type="hidden" name="product_category" id="category" value="unisex">
                            </div>

                            <div id="descaddrfrprdctbg">
                                <div id="mnimgaddrprodttldesc">Variations*</div>
                                <div id="maininptbgfrnmprdctctgryvars">
                                    <div id="mnvartnsfrprdct">
                                        <div id="ctgry1">
                                            <div id="tpbrctgrym">
                                                <div id="clrbgcntnr">
                                                    <div id="colorttlmn">COLOR &nbsp; <div id="color-display"></div>
                                                    </div>
                                                    <div id="colormninpt">
                                                        <input type="text" name="variations[0][color]"
                                                            class="color-input">
                                                    </div>
                                                </div>
                                                <div id="szclrbgcntnr">
                                                    <div id="colorttlmn">SIZE</div>
                                                    <div id="colormninpt">
                                                        <div id="contanervarsszs">
                                                            <div class="size-option" data-size="XS">XS</div>
                                                            <div class="size-option" data-size="S">S</div>
                                                            <div class="size-option" data-size="M">M</div>
                                                            <div class="size-option" data-size="L">L</div>
                                                            <div class="size-option" data-size="XL">XL</div>
                                                            <div class="size-option" data-size="2XL">2XL</div>
                                                        </div>
                                                        <!-- Hidden input to store selected sizes -->

                                                        <input type="hidden" name="variations[0][xs]" value="0">
                                                        <input type="hidden" name="variations[0][s]" value="0">
                                                        <input type="hidden" name="variations[0][m]" value="0">
                                                        <input type="hidden" name="variations[0][l]" value="0">
                                                        <input type="hidden" name="variations[0][xl]" value="0">
                                                        <input type="hidden" name="variations[0][2xl]" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tpbrctgrym">
                                                <div id="clrbgcntnr">
                                                    <div id="colorttlmn">QUANTITY</div>
                                                    <div id="colormninpt">
                                                        <input type="number" name="variations[0][quantity]">
                                                    </div>
                                                </div>
                                                <div id="clrbgcntnr">
                                                    <div id="colorttlmn">PRICE($)</div>
                                                    <div id="colormninpt">
                                                        <input type="text" name="variations[0][price]"
                                                            id="currency-input" placeholder="Enter amount">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="addvarmncntnr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path
                                                    d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="#6b6b6b"
                                                    d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                            </g>
                                        </svg>
                                        Add Variation
                                    </div>
                                </div>
                            </div>
                            <div id="mnsvbtn">
                                <button type="submit" id="mnsvbtnfrprdcts">Add Product</button>
                            </div>

                        </form>
                    </div>

                </div>
                <div id="mnproductlstcntnr">
                    <div id="maininnrcntnrfraddprdctslstprdcts">
                        <div id="mnuprlblfrprdctslst">Product List</div>
                        <div id="mainprdsctsshwrcntnr">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<!-- Jquery for FUN ;> -->
<script>
    $(document).ready(function(){
            $('#prodlstcntnrmn').click(function() {
                console.log('ok')
                $.ajax({
                    url: 'fetch_products.php',
                    type: 'GET',
                    success: function(response) {
                        $('#mainprdsctsshwrcntnr').html(response);
                    },
                    error: function() {
                        $('#mainprdsctsshwrcntnr').html('Error loading products.');
                    }
                });
            });
        });
</script>


<script>
    <?php if (isset($_SESSION['upload_success']) && $_SESSION['upload_success'] === true): ?>
        document.getElementById('successmsg').style.display = 'flex';

        setTimeout(function () {
            document.getElementById('successmsg').style.display = 'none';
        }, 5000);

        <?php unset($_SESSION['upload_success']); ?>
    <?php endif; ?>
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/14.0.0/marked.min.js"></script>

</html>