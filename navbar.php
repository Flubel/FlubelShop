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