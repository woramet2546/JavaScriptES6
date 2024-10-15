<?php
include "./ShoppingCart/databaseShop.php";

// ตรวจสอบการส่งข้อมูล
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $price = isset($_POST['price']) ? trim($_POST['price']) : '';
    $detail = isset($_POST['detail']) ? trim($_POST['detail']) : '';

    // รูปภาพจะใช้เป็น $_FILES
    $image_name = isset($_FILES['profile_image']['name']) ? $_FILES['profile_image']['name'] : '';
    $image_tmp = isset($_FILES['profile_image']['tmp_name']) ? $_FILES['profile_image']['tmp_name'] : '';
    $folder = 'upload_image/';
    $image_location = $folder . $image_name;

    // เพิ่มข้อมูลในฐานข้อมูล
    if ($product_name !== '' && $price !== '' && $detail !== '' && $image_name !== '') {
        $sql = mysqli_query($conn, "INSERT INTO products (product_name, price, profile_image, detail) VALUES 
        ('$product_name', '$price', '$image_name', '$detail')");

        if ($sql) {
            move_uploaded_file($image_tmp, $image_location);
            echo json_encode(array('success' => 1, 'message' => 'บันทึกสำเร็จ'));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'ไม่สามารถบันทึกข้อมูลได้'));
        }
    } else {
        echo json_encode(array('success' => 0, 'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'));
    }
} 
?>
