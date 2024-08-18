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
    <link rel="stylesheet" href="../style.css">
</head>

<body>

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
                    Products RAHHHH
                </div>
                <div id="mnproductlstcntnr">
                    Product List RAHHHH
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    function gotohome() {
        dshbrdprflmnpnl.style.display = 'flex'
        mnproductcntnr.style.display = 'none'
        mnproductlstcntnr.style.display = 'none'

        hpmecntnrmn.style.backgroundColor = 'rgb(226,226,226)'
        prodcntnrmn.style.backgroundColor = 'transparent'
        prodlstcntnrmn.style.backgroundColor = 'transparent'
    }
    function gotoproducts() {

        dshbrdprflmnpnl.style.display = 'none'
        mnproductcntnr.style.display = 'flex'
        mnproductlstcntnr.style.display = 'none'

        hpmecntnrmn.style.backgroundColor = 'transparent'
        prodcntnrmn.style.backgroundColor = 'rgb(226,226,226)'
        prodlstcntnrmn.style.backgroundColor = 'transparent'
    }
    function gotoproductslist() {
        dshbrdprflmnpnl.style.display = 'none'
        mnproductcntnr.style.display = 'none'
        mnproductlstcntnr.style.display = 'flex'

        hpmecntnrmn.style.backgroundColor = 'transparent'
        prodcntnrmn.style.backgroundColor = 'transparent'
        prodlstcntnrmn.style.backgroundColor = 'rgb(226,226,226)'
    }
    hpmecntnrmn.addEventListener('click', () => {
        gotohome()
    })
    prodcntnrmn.addEventListener('click', () => {
        gotoproducts()
    })
    prodlstcntnrmn.addEventListener('click', () => {
        gotoproductslist()
    })


    function getQueryParams() {
        const queryParams = new URLSearchParams(window.location.search);
        return queryParams;
    }

    window.onload = () => {
        const params = getQueryParams();
        if (params.get('tab') === "home") {
            gotohome()
        } else if(params.get('tab') === "products"){
            gotoproducts()
        } else if(params.get('tab') === "product_list"){
            gotoproductslist()
        }else{
            gotohome()
        }
    }
</script>

</html>