<?php

include(__DIR__ . "/../db_config.php");


session_start();

print_r($_POST);


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];
$toc_agreement = $_POST['toggler'];
$ip = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$sql = "INSERT INTO user (first_name, last_name, dob, email, password, toc_agreement, ip) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssis", $first_name, $last_name, $dob, $email, $password, $toc_agreement, $ip);

if ($stmt->execute()) {
    echo "New record created successfully";
    $_SESSION['signup_error'] = false;
    $_SESSION['UserEmail'] = $email;
    $_SESSION['loggedInUser'] = true;
    print_r($_SESSION);
    header('Location: ../home');
} else {
    echo "Error: " . $stmt->error;
    $_SESSION['signup_error'] = true;
    $_SESSION['loggedInUser'] = false;
    header('Location: index.html?method=signup');
}

$stmt->close();


exit();


