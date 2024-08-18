<?php
session_start();

include(__DIR__ . "/../db_config.php");

$result = $conn->query('SELECT email FROM admin');

$adminEmail = $_POST["adminemail"];
$adminPass = $_POST["adminpass"];

$query = $conn->prepare('SELECT email, password FROM admin WHERE email = ?');
$query->bind_param('s', $adminEmail);
$query->execute();
$result = $query->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($adminPass === $row['password']) {
        $_SESSION['adminEmail'] = $row['email'];
        $_SESSION['loggedIn'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: index.php?error=wrongpass&wreml=$adminEmail");
        exit();
    }
} else {
    header("Location: index.php?error=wrongemail&wreml=$adminEmail");
    exit();
}
