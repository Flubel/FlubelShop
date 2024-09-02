<div id="searchbrmn">
    <div id="mnsrchbrcntnr">
        <div id="mnsbmntsrchicn2nd">
            <svg xmlns="http://www.w3.org/2000/svg" width="26px" height="26px" viewBox="0 0 24 26">
                <path fill="rgb(58,58,58)"
                    d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0s.41-1.08 0-1.49zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
            </svg>
        </div>
        <input placeholder="Search whole Flubel-Shop" type="text" name="maintxtsrchadmn" id="admnpnlmnsrchbr">
    </div>
    <div id="navbrcls">
        <svg id="closebtnmn" xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
            <path fill="#ff5555"
                d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z" />
        </svg>
    </div>
</div>
<div id="searchResults">
    <!-- <div id="mncntnrfrsrcrprdcts">
        <div id="mningfrprdctssrch">
            <img  idsrc="" alt="">
        </div>
        <div id="mnprdctsttlcntnr">
            <div id="titleprdctsrch">T-Shirt Belarus</div>
            <div id="spplrfrprdctndctgry">Flubel-Shop | Unisex</div>
            <div id="pricefrprdc">65.00$</div>
        </div>

    </div>
     -->
</div>
<div id="fauxnavbr"></div>
<div id="navbar">
    <div id="lftsdmnnvbr">
        <div id="mainwebttlflb">
            FLUBEL SHOP
        </div>
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
            <?php
            include(__DIR__ . "/db_config.php");
            if (isset($_SESSION['loggedInUser']) && $_SESSION['loggedInUser'] === true) {
                $userEmail = $_SESSION["UserEmail"];
                $query = $conn->prepare('SELECT * FROM user WHERE email = ?');
                $query->bind_param('s', $userEmail);
                $query->execute();
                $result = $query->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $chars = str_split($row['first_name']);
                    $firstChar = $chars[0];
                    $secondLastChar = $chars[1];
                    $usrprflpc = strtoupper($firstChar . $secondLastChar);
                    echo "<div id='navbarprflpic'> " . $usrprflpc . " </div>";
                }
            } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24">
                <path fill="black"
                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
            </svg>';
            }
            ?>

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
</div>

<script>
    console.log('ok')
    iconnum2.addEventListener('click', () => {
        window.location.href = '/wishlist';
    });

    iconnum3.addEventListener('click', () => {
        window.location.href = '/account';
    });



    iconnum4.addEventListener('click', () => {
        window.location.href = '/cart.php';
    });
    mainwebttlflb.addEventListener('click', () => {
        window.location.href = '/';
    });

    iconnum1.addEventListener('click', () => {
        document.getElementById('searchbrmn').style.marginTop = '0px'
    })
    closebtnmn.addEventListener('click', () => {
        document.getElementById('searchbrmn').style.marginTop = '-70px'
        document.getElementById('searchResults').style.marginTop = 'calc(-60vh - 200px)'
    })


    document.getElementById('admnpnlmnsrchbr').addEventListener('input', function () {
        let query = this.value;

        if (query.length > 2) {
            fetch('searchProducts.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'query=' + encodeURIComponent(query)
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('searchResults').innerHTML = data;
                    document.getElementById('searchResults').style.marginTop = '0px'
                });
        } else {
            document.getElementById('searchResults').innerHTML = '';
            document.getElementById('searchResults').style.marginTop = 'calc(-60vh - 70px)' // Clear results if query is empty or too short
        }
    });

</script>