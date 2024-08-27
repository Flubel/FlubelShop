<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if (!isset($_SESSION['loggedInUser']) || $_SESSION['loggedInUser'] !== true) {
    header("Location: ../account");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Flubel-Shop</title>
    <link rel="stylesheet" href="../style.css">
    <script defer src="../script1.js"></script>
</head>

<body>
    <?php
    include("../navbar.php");
    ?>

    <div id="mainbodyfracchmpg">
        <?php

        // include(__DIR__ . "/../db_config.php");
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
            $frstnm = $row['first_name'];
            $lstnm = $row['last_name'];
            $eml = $row['email'];
            $dob = $row['dob'];
            $actvstts = $row['active'];


            function calculateAge($birthDate)
            {
                $birthDate = new DateTime($birthDate);

                $today = new DateTime('today');

                $age = $today->diff($birthDate)->y;

                return $age;
            }

            $age = calculateAge($row['dob']);

            $usrprflpc = strtoupper($firstChar . $secondLastChar);
        }
        ?>
        <div id="mnprfltpbnnrusrdtls">
            <div id="mnusrprflpc"><?php echo $usrprflpc ?></div>
            <div id="mncntnrfrusrdtls">
                <div id="mnttlfrnm"><?php echo "$frstnm $lstnm" ?>
                    <?php
                    if ($actvstts === "yes") {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" style="margin-left:5px;" width="30px" height="30px" viewBox="0 0 24 24">
                                <path fill="#178ad6"
                                    d="M9.592 3.2a6 6 0 0 1-.495.399c-.298.2-.633.338-.985.408c-.153.03-.313.043-.632.068c-.801.064-1.202.096-1.536.214a2.71 2.71 0 0 0-1.655 1.655c-.118.334-.15.735-.214 1.536a6 6 0 0 1-.068.632c-.07.352-.208.687-.408.985c-.087.13-.191.252-.399.495c-.521.612-.782.918-.935 1.238c-.353.74-.353 1.6 0 2.34c.153.32.414.626.935 1.238c.208.243.312.365.399.495c.2.298.338.633.408.985c.03.153.043.313.068.632c.064.801.096 1.202.214 1.536a2.71 2.71 0 0 0 1.655 1.655c.334.118.735.15 1.536.214c.319.025.479.038.632.068c.352.07.687.209.985.408c.13.087.252.191.495.399c.612.521.918.782 1.238.935c.74.353 1.6.353 2.34 0c.32-.153.626-.414 1.238-.935c.243-.208.365-.312.495-.399c.298-.2.633-.338.985-.408c.153-.03.313-.043.632-.068c.801-.064 1.202-.096 1.536-.214a2.71 2.71 0 0 0 1.655-1.655c.118-.334.15-.735.214-1.536c.025-.319.038-.479.068-.632c.07-.352.209-.687.408-.985c.087-.13.191-.252.399-.495c.521-.612.782-.918.935-1.238c.353-.74.353-1.6 0-2.34c-.153-.32-.414-.626-.935-1.238a6 6 0 0 1-.399-.495a2.7 2.7 0 0 1-.408-.985a6 6 0 0 1-.068-.632c-.064-.801-.096-1.202-.214-1.536a2.71 2.71 0 0 0-1.655-1.655c-.334-.118-.735-.15-1.536-.214a6 6 0 0 1-.632-.068a2.7 2.7 0 0 1-.985-.408a6 6 0 0 1-.495-.399c-.612-.521-.918-.782-1.238-.935a2.71 2.71 0 0 0-2.34 0c-.32.153-.626.414-1.238.935"
                                    opacity="0.5" />
                                <path fill="#178ad6"
                                    d="M16.374 9.863a.814.814 0 0 0-1.151-1.151l-4.85 4.85l-1.595-1.595a.814.814 0 0 0-1.151 1.151l2.17 2.17a.814.814 0 0 0 1.15 0z" />
                            </svg>';
                    }else{
                        echo '<svg xmlns="http://www.w3.org/2000/svg" style="margin-left:5px;" width="30px" height="30px" viewBox="0 0 24 24">
                                <path fill="#ff5555"
                                    d="M9.592 3.2a6 6 0 0 1-.495.399c-.298.2-.633.338-.985.408c-.153.03-.313.043-.632.068c-.801.064-1.202.096-1.536.214a2.71 2.71 0 0 0-1.655 1.655c-.118.334-.15.735-.214 1.536a6 6 0 0 1-.068.632c-.07.352-.208.687-.408.985c-.087.13-.191.252-.399.495c-.521.612-.782.918-.935 1.238c-.353.74-.353 1.6 0 2.34c.153.32.414.626.935 1.238c.208.243.312.365.399.495c.2.298.338.633.408.985c.03.153.043.313.068.632c.064.801.096 1.202.214 1.536a2.71 2.71 0 0 0 1.655 1.655c.334.118.735.15 1.536.214c.319.025.479.038.632.068c.352.07.687.209.985.408c.13.087.252.191.495.399c.612.521.918.782 1.238.935c.74.353 1.6.353 2.34 0c.32-.153.626-.414 1.238-.935c.243-.208.365-.312.495-.399c.298-.2.633-.338.985-.408c.153-.03.313-.043.632-.068c.801-.064 1.202-.096 1.536-.214a2.71 2.71 0 0 0 1.655-1.655c.118-.334.15-.735.214-1.536c.025-.319.038-.479.068-.632c.07-.352.209-.687.408-.985c.087-.13.191-.252.399-.495c.521-.612.782-.918.935-1.238c.353-.74.353-1.6 0-2.34c-.153-.32-.414-.626-.935-1.238a6 6 0 0 1-.399-.495a2.7 2.7 0 0 1-.408-.985a6 6 0 0 1-.068-.632c-.064-.801-.096-1.202-.214-1.536a2.71 2.71 0 0 0-1.655-1.655c-.334-.118-.735-.15-1.536-.214a6 6 0 0 1-.632-.068a2.7 2.7 0 0 1-.985-.408a6 6 0 0 1-.495-.399c-.612-.521-.918-.782-1.238-.935a2.71 2.71 0 0 0-2.34 0c-.32.153-.626.414-1.238.935"
                                    opacity="0.5" />
                                <path fill="#ff5555"
                                    d="M16.374 9.863a.814.814 0 0 0-1.151-1.151l-4.85 4.85l-1.595-1.595a.814.814 0 0 0-1.151 1.151l2.17 2.17a.814.814 0 0 0 1.15 0z" />
                            </svg>';
                    }
                    ?>
                </div>
                <div id="emlandlctn"><?php echo $eml ?></div>
                <div id="emlandlctn1"><?php echo $dob ?> | <?php echo $age ?></div>
                <div id="slrsclgoutbrn">
                    <form action="logoutusr.php" method="post">
                        <button id="logoutadmnmnbtnlng" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>