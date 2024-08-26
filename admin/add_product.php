<?php

session_start();

print_r($_POST);
print_r($_FILES);

include(__DIR__ . "/../db_config.php");

// Get product details from POST data
$productttl = $_POST['product_title'] ?? '';
$productsplr = $_POST['product_supplier'] ?? '';
$productdesc = $_POST['product_desc'] ?? '';
$productctgry = $_POST['product_category'] ?? '';

// Insert the product into the `products` table
$stmt = $conn->prepare("INSERT INTO `products` (`title`, `supplier`, `description`, `category`, `added_by`) VALUES (?, ?, ?, ?, ?)");

if ($stmt) {
    $stmt->bind_param("sssss", $productttl, $productsplr, $productdesc, $productctgry, $_SESSION['adminEmail']);

    if ($stmt->execute()) {
        $product_id = $stmt->insert_id;
        echo "Product added successfully with ID: " . $product_id;

        $stmt->close();

        $image1_data = isset($_FILES["img1"]) && $_FILES["img1"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img1"]["tmp_name"]) : null;
        $image2_data = isset($_FILES["img2"]) && $_FILES["img2"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img2"]["tmp_name"]) : null;
        $image3_data = isset($_FILES["img3"]) && $_FILES["img3"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img3"]["tmp_name"]) : null;
        $image4_data = isset($_FILES["img4"]) && $_FILES["img4"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img4"]["tmp_name"]) : null;
        $image5_data = isset($_FILES["img5"]) && $_FILES["img5"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img5"]["tmp_name"]) : null;
        $image6_data = isset($_FILES["img6"]) && $_FILES["img6"]["error"] === UPLOAD_ERR_OK ? file_get_contents($_FILES["img6"]["tmp_name"]) : null;

        $image1_type = isset($_FILES["img1"]) ? $_FILES["img1"]["type"] : null;
        $image2_type = isset($_FILES["img2"]) ? $_FILES["img2"]["type"] : null;
        $image3_type = isset($_FILES["img3"]) ? $_FILES["img3"]["type"] : null;
        $image4_type = isset($_FILES["img4"]) ? $_FILES["img4"]["type"] : null;
        $image5_type = isset($_FILES["img5"]) ? $_FILES["img5"]["type"] : null;
        $image6_type = isset($_FILES["img6"]) ? $_FILES["img6"]["type"] : null;
        $images = [];
        $types = [];

        if ($image1_type && substr($image1_type, 0, 5) == "image") {
            $images['pic_1'] = $image1_data;
            $types[] = "b";
        }
        if ($image2_type && substr($image2_type, 0, 5) == "image") {
            $images['pic_2'] = $image2_data;
            $types[] = "b";
        }
        if ($image3_type && substr($image3_type, 0, 5) == "image") {
            $images['pic_3'] = $image3_data;
            $types[] = "b";
        }
        if ($image4_type && substr($image4_type, 0, 5) == "image") {
            $images['pic_4'] = $image4_data;
            $types[] = "b";
        }
        if ($image5_type && substr($image5_type, 0, 5) == "image") {
            $images['pic_5'] = $image5_data;
            $types[] = "b";
        }
        if ($image6_type && substr($image6_type, 0, 5) == "image") {
            $images['pic_6'] = $image6_data;
            $types[] = "b";
        }

        if (!empty($images)) {
            $sql = "INSERT INTO product_img (product_id";
            $placeholders = ") VALUES (?";

            foreach (array_keys($images) as $pic) {
                $sql .= ", $pic";
                $placeholders .= ", ?";
            }
            $sql .= $placeholders . ")";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $param_types = "i" . implode("", $types);
                $params = array_merge([$product_id], array_values($images));
                $stmt->bind_param($param_types, ...$params);

                foreach ($images as $index => $data) {
                    $stmt->send_long_data(array_search($index, array_keys($images)) + 1, $data);
                }

                if ($stmt->execute()) {
                    echo "Image uploaded successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        } else {
            echo "Please upload at least one valid image file.";
            $_SESSION['upload_success'] = false;
        }

        

        $variations = $_POST['variations'] ?? [];

        if (!empty($variations)) {
            $stmt = $conn->prepare("INSERT INTO product_variants (product_id, color, quantity, price, xs, s, m, l, xl, 2xl) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                foreach ($variations as $variant) {
                    $color = $variant['color'] ?? '';
                    $quantity = $variant['quantity'] ?? 0;
                    $price = $variant['price'] ?? 0.00;
                    $xs = $variant['xs'] ?? 0;
                    $s = $variant['s'] ?? 0;
                    $m = $variant['m'] ?? 0;
                    $l = $variant['l'] ?? 0;
                    $xl = $variant['xl'] ?? 0;
                    $two_xl = $variant['2xl'] ?? 0;

                    $stmt->bind_param("isiddddddd", $product_id, $color, $quantity, $price, $xs, $s, $m, $l, $xl, $two_xl);

                    if (!$stmt->execute()) {
                        echo "Error inserting variant: " . $stmt->error;
                    }
                }   

                $stmt->close();
            } else {
                echo "Error preparing variant statement: " . $conn->error;
                $_SESSION['upload_success'] = false;
            }
        }

    } else {
        echo "Error inserting product: " . $stmt->error;
        $_SESSION['upload_success'] = false;
    }
} else {
    echo "Error preparing product statement: " . $conn->error;
    $_SESSION['upload_success'] = false;
}
unset($_FILES);
unset($_POST);
$_SESSION['upload_success'] = true;

header("Location: dashboard.php?tab=product_list");

$conn->close();
exit();
