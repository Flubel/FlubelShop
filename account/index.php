<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['loggedInUser']) && $_SESSION['loggedInUser'] === true) {
    header("Location: ../home");
    exit();
}

?>
<?php
include("../loader.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Flubel-Shop</title>
    <link rel="stylesheet" href="../style.css">
    <script defer src="./switcher.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div id="errormsg" class="success-message">
        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="50px" height="50px"
            viewBox="0 0 24 24">
            <path fill="white"
                d="M12 17q.425 0 .713-.288T13 16t-.288-.712T12 15t-.712.288T11 16t.288.713T12 17m-1-4h2V7h-2zm1 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
        </svg>
        Error Signing UP!
    </div>
    <div id="mainaccbodylgsg">
        <div id="lftsdmndvcntntr">
            <div id="pausplybtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24">
                    <path fill="white" d="M14 19V5h4v14zm-8 0V5h4v14z" />
                </svg>

            </div>
            <div id="mainquotetxt">
                Power is the beauty of men; beauty is the power of women.
            </div>
        </div>
        <div id="rgtsdmndvcntntr">
            <div id="mainfrmfrlgin">
                <div id="mainrgtcntnt">
                    <div id="mainlgocntnr">F</div>
                    <div id="mainttlabtstracc">MY FLUBEL-SHOP</div>
                    <div id="lginorsgnupswtchrbg">
                        <div class="toggle-container">
                            <input type="checkbox" id="toggle-switch" class="toggle-switch">
                            <label for="toggle-switch" class="toggle-label">
                                <div class="toggle-option" id="login-option">LOG IN</div>
                                <div class="toggle-option" id="signup-option">SIGN UP</div>
                                <div class="toggle-button"></div>
                            </label>
                        </div>
                    </div>
                    <form id="frmsgbupmn1" action="login.php" method="post">
                        <div id="loginaccmngr">
                            <div id="inputbgcntnr">
                                <div id="ttlinptfld">Email Address</div>
                                <input type="text" name="userlgnemail" id="maininptfremallgin" placeholder="Enter Email Address">
                            </div>
                            <div id="inputbgcntnrpass">
                                <div id="ttlinptfld">Password</div>
                                <input type="text" name="userlgnpass" id="maininptfrpasslgin" placeholder="Enter password">
                            </div>
                            <div id="forgotpasscntnrbg">
                                <a href="">Forgot Password?</a>
                            </div>
                            <div id="mainlgincntnbtnbgcntnr">
                                <button type="submit" id="mainlginbtn" class="disabled">
                                    LOG IN
                                </button>
                            </div>
                        </div>
                    </form>

                    <form id="frmsgbupmn" action="signup.php" method="post">
                        <div id="signupaccmngr">
                            <div id="inputbgcntnr">
                                <div id="ttlinptfld">First Name</div>
                                <input type="text" name="first_name" id="maininptfrfrstnmsgnup"
                                    placeholder="Enter first name">
                            </div>
                            <div id="inputbgcntnrbtm">
                                <div id="ttlinptfld">Last Name</div>
                                <input type="text" name="last_name" id="maininptfrlstnmsgnup"
                                    placeholder="Enter last name">
                            </div>
                            <div id="inputbgcntnrbtm">
                                <div id="ttlinptfld">Date of Birth</div>
                                <input type="date" name="dob" id="maininptfrdobsgnup" placeholder="Enter date of birth">
                            </div>
                            <div id="inputbgcntnrbtm">
                                <div id="ttlinptfld">Email Address</div>
                                <input type="text" name="email" id="maininptfremalsgnup"
                                    placeholder="Enter Email Address">
                            </div>
                            <div id="inputbgcntnrbtm">
                                <div id="ttlinptfld">Password</div>
                                <input type="text" name="password" id="maininptfrpasssgnup"
                                    placeholder="Enter password">
                            </div>
                            <div id="usertocaccptbgcntnr">
                                <div class="toggler">
                                    <input id="toggler-1" name="toggler" type="checkbox" value="1">
                                    <label for="toggler-1">
                                        <svg class="toggler-on" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 130.2 130.2">
                                            <polyline class="path check" points="100.2,40.2 51.5,88.8 29.8,67.5">
                                            </polyline>
                                        </svg>
                                        <svg class="toggler-off" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 130.2 130.2">
                                            <line class="path line" x1="34.4" y1="34.4" x2="95.8" y2="95.8"></line>
                                            <line class="path line" x1="95.8" y1="34.4" x2="34.4" y2="95.8"></line>
                                        </svg>
                                    </label>
                                </div>
                                <div id="scceptocstat">Agree to our&nbsp;<a href="">Terms and Condition</a></div>
                            </div>

                            <div id="mainlgincntnbtnbgcntnr">
                                <button type="submit" id="mainsginbtn" class="disabled">
                                    SIGN UP
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- 
    <div id="navbar-acc">
        <div id="mainwebttlflb">FLUBEL SHOP</div>
    </div>
        <div id="mainbdyacc">
            <div id="maincntnraccinfdtls">
                <div id="lftsdmnimgsgnin">
                    <div id="mainquotetxt">
                        Power is the beauty of men; beauty is the power of women.
                    </div>
                </div>
                <div id="rgtsdmnimgsgnin">
                    <div id="accmnttl">Log In</div>
                    <div id="inptfldbgacc">
                        <div id="inptfldmnttl">Email</div>
                        <div id="maininptfld">
                            <input type="email" id="emaillogin">
                        </div>
                    </div>
                    <div id="inptfldbgacc">
                        <div id="inptfldmnttl">Password</div>
                        <div id="maininptfld">
                            <input type="password" id="passwordlogin">
                            <div id="passshwbgcntnr">
                            <svg id="eyeshwpass" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24"><path fill="black" d="M2 12c0 1.64.425 2.191 1.275 3.296C4.972 17.5 7.818 20 12 20c4.182 0 7.028-2.5 8.725-4.704C21.575 14.192 22 13.639 22 12c0-1.64-.425-2.191-1.275-3.296C19.028 6.5 16.182 4 12 4C7.818 4 4.972 6.5 3.275 8.704C2.425 9.81 2 10.361 2 12" opacity="0.5"/><path fill="black" fill-rule="evenodd" d="M8.25 12a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0m1.5 0a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0" clip-rule="evenodd"/></svg>
                            <svg id="eyehidepass" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"><path fill="black" d="M12 17.5c-3.8 0-7.2-2.1-8.8-5.5H1c1.7 4.4 6 7.5 11 7.5s9.3-3.1 11-7.5h-2.2c-1.6 3.4-5 5.5-8.8 5.5"/></svg>
                        </div>
                    </div>                        
                    </div>
                    <div id="captchamnbg">
                        <div id="capthcamn">
                            Verified
                        </div>
                    </div>
                    <div id="inptfldbgacc2">
                        <div id="loginmnbtn">Log In</div>
                    </div>   
                </div>
            </div>
        </div> -->
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const form = document.getElementById('frmsgbupmn');
    const signUpBtn = document.getElementById('mainsginbtn');
    let isEmailValid = false;

    function checkFormFields() {
        const inputs = form.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], input[type="password"], input[type="checkbox"]');
        let allFilled = true;

        inputs.forEach(input => {
            if (input.type === 'checkbox') {
                if (!input.checked) {
                    allFilled = false;
                }
            } else if (!input.value) {
                allFilled = false;
            }
        });

        if (allFilled && isEmailValid) {
            signUpBtn.classList.remove('disabled');
            signUpBtn.classList.add('enabled');
        } else {
            signUpBtn.classList.remove('enabled');
            signUpBtn.classList.add('disabled');
        }
    }

    form.addEventListener('input', checkFormFields);


    // Declare form1 and loginUpBtn variables first
    const form1 = document.getElementById('frmsgbupmn1');
    const loginUpBtn = document.getElementById('mainlginbtn');

    function checkFormFields1() {
        const inputs = form1.querySelectorAll('input[type="text"]');
        let allFilled = true;

        inputs.forEach(input => {
            if (!input.value) {
                allFilled = false;
            }
        });

        if (allFilled) {
            loginUpBtn.classList.remove('disabled');
            loginUpBtn.classList.add('enabled');
        } else {
            loginUpBtn.classList.remove('enabled');
            loginUpBtn.classList.add('disabled');
        }
    }

    // Attach the event listener after declaring variables
    form1.addEventListener('input', checkFormFields1);


    $(document).ready(function () {
        $("#maininptfremalsgnup").on("input", function () {
            var email = $(this).val();

            $.ajax({
                url: "check_email_rl.php",
                type: "POST",
                data: { email: email },
                success: function (response) {
                    if (response === "exists") {
                        $("#maininptfremalsgnup").css("backgroundColor", "#ff555588");
                        isEmailValid = false;
                    } else {
                        $("#maininptfremalsgnup").css("backgroundColor", "transparent");
                        isEmailValid = true;
                    }
                    checkFormFields();
                }
            });
        });
    });
</script>


</html>