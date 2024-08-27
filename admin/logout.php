<?php
session_start();


unset($_SESSION['adminEmail']);
unset($_SESSION['loggedIn']);

header("Location: ./");
exit();
?>
