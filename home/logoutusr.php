<?php

session_start();


unset($_SESSION['UserEmail']);
unset($_SESSION['loggedInUser']);

header("Location: ../account");
exit();

