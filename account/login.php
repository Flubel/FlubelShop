<?php


session_start();

include(__DIR__ . "/../db_config.php");

$result = $conn->query('SELECT email FROM admin');

$UserEmail = $_POST["userlgnemail"];
$UserPass = $_POST["userlgnpass"];

$query = $conn->prepare('SELECT email, password FROM user WHERE email = ?');
$query->bind_param('s', $UserEmail);
$query->execute();
$result = $query->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($UserPass === $row['password']) {
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['loggedInUser'] = true;
        header("Location: ../home");
        echo "ok";
        exit();
    } else {
        // header("Location: index.php?error=wrongpass&wreml=$adminEmail");
        echo "no 1";
        exit();
    }
} else {
    // header("Location: index.php?error=wrongemail&wreml=$adminEmail");
        echo "no 2";
    exit();
}
