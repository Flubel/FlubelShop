<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    header("Location: dashboard.php");
    exit();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Flubel-Shop</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div id="navbradmn"> <span id="maintxtnvbradmn" onclick="window.location.href = '../'">F</span> </div>
    <div id="mainbdyadmnpnllgin">
        <div id="mainttlabtstraccadmn">FLUBEL-SHOP ADMIN</div>
        <form action="auth.php" method="POST">
            <div id="loginaccmngradmn">
                <div id="inputbgcntnr">
                    <div id="ttlinptfld">Email Address</div>
                    <input type="text" name="adminemail" id="maininptfremallgin" placeholder="Enter Email Address">
                    <span id="errtxteml">Email is Incorrect</span>
                </div>
                <div id="inputbgcntnrpass">
                    <div id="ttlinptfld">Password</div>
                    <input type="text" name="adminpass" id="maininptfrpasslgin" placeholder="Enter password">
                    <span id="errtxtpass">Password is Incorrect</span>
                </div>
                <div id="mainlgincntnbtnbgcntnradmn">
                    <button id="mainlginbtnadmnauth" type="submit">
                        <svg id="loadersthbtnmn" xmlns="http://www.w3.org/2000/svg" width="45px" height="45px"
                            viewBox="0 0 24 24">
                            <circle cx="18" cy="12" r="0" fill="white">
                                <animate attributeName="r" begin=".67" calcMode="spline" dur="1.5s"
                                    keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                    repeatCount="indefinite" values="0;2;0;0" />
                            </circle>
                            <circle cx="12" cy="12" r="0" fill="white">
                                <animate attributeName="r" begin=".33" calcMode="spline" dur="1.5s"
                                    keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                    repeatCount="indefinite" values="0;2;0;0" />
                            </circle>
                            <circle cx="6" cy="12" r="0" fill="white">
                                <animate attributeName="r" begin="0" calcMode="spline" dur="1.5s"
                                    keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8"
                                    repeatCount="indefinite" values="0;2;0;0" />
                            </circle>
                        </svg>
                        <span id="atutxt">AUTH</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    document.getElementById('mainlginbtnadmnauth').addEventListener('click', () => {

        document.getElementById('loadersthbtnmn').style.display = 'flex';
        atutxt.style.display = 'none'
    });


    function getQueryParams() {
        const queryParams = new URLSearchParams(window.location.search);
        return queryParams;
    }

    window.onload = () => {
        const params = getQueryParams();
        const emailInput = document.getElementById('maininptfremallgin');
        const passInput = document.getElementById('maininptfrpasslgin');
        const wreml = params.get('wreml');
        if (wreml) {
            console.log("Email parameter: " + wreml);
        }


        if (params.get('error') === 'wrongemail') {
            const inputElement = document.getElementById('maininptfremallgin');
            inputElement.style.border = '1px solid #ff5555';
            inputElement.value = wreml
            errtxteml.style.display = 'flex'
            inputElement.addEventListener('focus', () => {
                inputElement.style.outline = '1px solid #ff5555';
            });
            inputElement.addEventListener('blur', () => {
                inputElement.style.outline = 'none';
            });
            setTimeout(() => {
                errtxteml.style.display = 'none'
                inputElement.style.border = '1px solid #c0c0c0';

                inputElement.addEventListener('focus', () => {
                    inputElement.style.border = '1px solid #000';
                    inputElement.style.outline = '1px solid #000';
                });
                inputElement.addEventListener('blur', () => {
                    inputElement.style.outline = 'none';
                    inputElement.style.border = '1px solid #c0c0c0';
                });
            }, 5000);
        } else if (params.get('error') === 'wrongpass') {
            const inputElement = document.getElementById('maininptfrpasslgin');
            const inputElementeml = document.getElementById('maininptfremallgin');
            inputElement.style.border = '1px solid #ff5555';
            errtxtpass.style.display = 'flex'
            inputElementeml.value = wreml
            inputElement.addEventListener('focus', () => {
                inputElement.style.outline = '1px solid #ff5555';
            });
            inputElement.addEventListener('blur', () => {
                inputElement.style.outline = 'none';
            });
            setTimeout(() => {
                errtxtpass.style.display = 'none'
                inputElement.style.border = '1px solid #c0c0c0';

                inputElement.addEventListener('focus', () => {
                    inputElement.style.border = '1px solid #000';
                    inputElement.style.outline = '1px solid #000';
                });
                inputElement.addEventListener('blur', () => {
                    inputElement.style.outline = 'none';
                    inputElement.style.border = '1px solid #c0c0c0';
                });
            }, 5000);
        }
    };
</script>

</html>