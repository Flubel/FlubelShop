<?php
include("../db_config.php");
session_start();

print_r($_POST);
print_r($_SESSION);

$useremailtgt = $_SESSION["UserEmail"];

$phone = $_POST['phone'];
$country = $_POST['country'];
$s_address = $_POST['s_address'];
$b_address = $_POST['b_address'];
$city_state = $_POST['city_state'];
$zip_code = $_POST['zip_code'];
$iso2 = $_POST['isofrcntry'];

$sql = "SELECT id FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $useremailtgt);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    $check_sql = "SELECT * FROM user_address WHERE user_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        $existing_data = $check_result->fetch_assoc();

        if ($existing_data['phone'] !== $phone ||
            $existing_data['country'] !== $country ||
            $existing_data['shipping_address'] !== $s_address ||
            $existing_data['billing_address'] !== $b_address ||
            $existing_data['city_state'] !== $city_state ||
            $existing_data['iso2'] !== $iso2 ||
            $existing_data['zip_code'] !== $zip_code) {

            $update_sql = "UPDATE user_address 
                           SET phone = ?, country = ?, shipping_address = ?, billing_address = ?, city_state = ?, zip_code = ?,iso2 = ?
                           WHERE user_id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("sssssssi", $phone, $country, $s_address, $b_address, $city_state, $zip_code,$iso2, $user_id);

            if ($stmt->execute()) {
                echo "Address updated successfully.";
                header("Location: ../home");
            } else {
                echo "Error updating address: " . $stmt->error;
                header("Location: ../home");
            }
        } else {
            echo "No changes to address data.";
            header("Location: ../home");
        }
    } else {
        $insert_sql = "INSERT INTO user_address (user_id, phone, country, shipping_address, billing_address, city_state, zip_code,iso2) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("isssssss", $user_id, $phone, $country, $s_address, $b_address, $city_state, $zip_code,$iso2);

        if ($stmt->execute()) {
            echo "Address inserted successfully.";
            header("Location: ../home");
        } else {
            echo "Error inserting address: " . $stmt->error;
            header("Location: ../home");
        }
    }
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
