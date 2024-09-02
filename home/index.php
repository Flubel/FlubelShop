<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if (!isset($_SESSION['loggedInUser']) || $_SESSION['loggedInUser'] !== true) {
    header("Location: ../account");
    exit();
}
?>
<?php
include("../loader.php");
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Flubel-Shop</title>
    <link rel="stylesheet" href="../style.css">
    <script defer src="../script1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>

<body>
    <?php
    include("../navbar.php");
    ?>

    <div id="mainbodyfracchmpg">
        <?php

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
            $user_idchk = $row['id'];


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
                    } else {
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
        <div id="mnprfltpbnnrusrdtls2">
            <div id="mncntnrfrusrdtls1">
                <div id="mnttlfrusrprfl">Personal Details</div>

                <?php

                $phone = "";
                $saddr = "";
                $baddr = "";
                $zipcd = "";
                $cntrstt = "";
                $iso2 = "";

                $check_sql = "SELECT * FROM user_address WHERE user_id = ?";
                $stmt = $conn->prepare($check_sql);
                $stmt->bind_param("i", $user_idchk);
                $stmt->execute();
                $check_result = $stmt->get_result();

                if ($check_result->num_rows > 0) {
                    $data = $check_result->fetch_assoc();

                    $phone = $data["phone"];
                    $saddr = $data["shipping_address"];
                    $baddr = $data["billing_address"];
                    $zipcd = $data["zip_code"];
                    $cntrstt = $data["city_state"];
                    $iso2 = $data["iso2"];
                }

                ?>
                <form id="svngisrinfrasjd" action="save_user_info.php" method="post">
                    <div id="inputbgcntnrbtm1">
                        <div id="ttlinptfld">Phone No | Country*</div>
                        <div id="phnmbrinptfldbgfrcntnr">
                            <input id="phone" type="tel" name="phone" value="<?php echo $phone ?>" />
                            <input type="hidden" id="country" name="country" />
                            <input type="hidden" id="isofrcntry" name="isofrcntry" />
                            <!-- <svg id="nokphnnosvg" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                            viewBox="0 0 16 16">
                            <path fill="#ff5555"
                                d="m8.746 8l3.1-3.1a.527.527 0 1 0-.746-.746L8 7.254l-3.1-3.1a.527.527 0 1 0-.746.746l3.1 3.1l-3.1 3.1a.527.527 0 1 0 .746.746l3.1-3.1l3.1 3.1a.527.527 0 1 0 .746-.746zM8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16" />
                        </svg>
                        <svg id="okphnnosvg" xmlns="http://www.w3.org/2000/svg" width="35px" height="35px"
                            viewBox="0 0 48 48">
                            <defs>
                                <mask id="ipTCheckOne0">
                                    <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                                        <path fill="#555"
                                            d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z" />
                                        <path stroke-linecap="round" d="m16 24l6 6l12-12" />
                                    </g>
                                </mask>
                            </defs>
                            <path fill="#50C878" d="M0 0h48v48H0z" mask="url(#ipTCheckOne0)" />
                        </svg> -->
                        </div>

                    </div>
                    <div id="inputbgcntnrbtm1">
                        <div id="ttlinptfld">Shipping Address*</div>
                        <div id="phnmbrinptfldbgfrcntnr">
                            <input id="inptfraddrs" type="tel" name="s_address" value="<?php echo $saddr ?>"/>
                        </div>

                    </div>

                    <div id="inputbgcntnrbtm1">
                        <div id="ttlinptfld">Billing Address*</div>
                        <div id="phnmbrinptfldbgfrcntnr">
                            <input id="inptfraddrs" type="tel" name="b_address" value="<?php echo $baddr ?>"/>

                        </div>

                    </div>

                    <div id="mnbtncmtnrfrpthrrinf">
                        <div id="inputbgcntnrbtm12">
                            <div id="ttlinptfld">City / State*</div>
                            <div id="phnmbrinptfldbgfrcntnr">
                                <input id="inptfrctystt" type="tel" name="city_state" value="<?php echo $cntrstt ?>"/>
                            </div>

                        </div>

                        <div id="inputbgcntnrbtm12">
                            <div id="ttlinptfld">ZIP Code*</div>
                            <div id="phnmbrinptfldbgfrcntnr">
                                <input id="inptfrzpcdmn" type="tel" name="zip_code" value="<?php echo $zipcd ?>"/>
                            </div>

                        </div>
                    </div>


                    <div id="mnbtmbtnfrsvnginffrusrpflpgmn">
                        <button id="mnbtnfrdsbfd" type="submit">Save</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

<script>
    // let typingTimer;  // Timer identifier
    // const typingInterval = 2000;  // 2 seconds delay
    // const apiKey = 'OLDH3SDgSO8XGlP35NRI9l9vTZfkxTRG';

    // phoneNumber12.addEventListener('input', () => {
    //     clearTimeout(typingTimer);  // Clear the previous timer
    //     typingTimer = setTimeout(() => {
    //         // Code to execute after the user has stopped typing
    //         const countryData = phoneInput.getSelectedCountryData();
    //         const phoneNumber = countryData.dialCode + phoneNumber12.value;

    //         fetch(`https://api.apilayer.com/number_verification/validate?number=${phoneNumber}`, {
    //             method: 'GET',
    //             headers: {
    //                 'apikey': apiKey
    //             }
    //         })
    //             .then(response => response.json())
    //             .then(data => {
    //                 console.log(data['valid']);
    //                 if (data['valid'] === true) {
    //                     okphnnosvg.style.display = 'flex';
    //                     nokphnnosvg.style.display = 'none';
    //                 } else {
    //                     okphnnosvg.style.display = 'none';
    //                     nokphnnosvg.style.display = 'flex';
    //                 }
    //             })
    //             .catch(error => {
    //                 console.error('Error:', error);
    //                 // Handle error, e.g., display error message
    //             });
    //     }, typingInterval);
    // });

    // // Optionally, clear the timer if the user exits the input field
    // phoneNumber12.addEventListener('blur', () => {
    //     clearTimeout(typingTimer);
    // });
    document.addEventListener('DOMContentLoaded', function () {
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            initialCountry: "<?php echo $iso2 ?>"
        });
        // When the form is submitted, set the country value
        document.querySelector("#svngisrinfrasjd").addEventListener("submit", function () {
            const countryData = phoneInput.getSelectedCountryData();
            document.querySelector("#isofrcntry").value = countryData.iso2;
            document.querySelector("#country").value = countryData.name; // or use countryData.iso2 for the country code
        });
    });


    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        // initialCountry: "pk"
    });

    phoneInputField.addEventListener('input', () => {
    });
</script>

</html>