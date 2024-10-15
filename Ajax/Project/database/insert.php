<?php
include "dbconnect.php";

// รับค่าจากฟอร์ม
$name = $_POST['name'];
$date = $_POST['date'];
$status_employee = $_POST['status_employee'];
if (isset($_POST['toggleSwitch'])) {
    $status = $_POST['toggleSwitch'] = 1;
} else {
    $status = $_POST['toggleSwitch'] = 0;
}
$work = $_POST['work'];

// กำหนดค่าเริ่มต้นสำหรับ imagePath
$imagePath = ''; // ใช้ image_url เป็นค่าตั้งต้น

// ตรวจสอบว่ามีไฟล์ถูกส่งเข้ามาหรือไม่
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $fileName = basename($_FILES['file']['name']);
    $targetDir = "uploads/";
    $targetUrl = "http://localhost/projectjs/ajax/project/database/uploads/";
    $targetFilePath = $targetDir . $fileName;
    $targetImagePath = $targetUrl . $fileName;

    // ใช้สำหรับย้ายไฟล์รูปภาพไปที่ตัวแปร $targetFilePath ก็คือ  "http://localhost/projectjs/ajax/project/database/uploads/"
    // $_FILES['file']['tmp_name'] ก็คือชื่อไฟล์ของรูปภาพ
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

        //ส่วนนี้คืออะไร
        $image = imagecreatefromstring(file_get_contents($targetFilePath));
        //ปรับความกว้างความสูง
        $newWidth = 568;
        $newHeight = 300;
        //ส่วนนี้คืออะไร
        
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        // ปรับขนาดภาพ
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($image), imagesy($image));
        // บันทึกรูปภาพใหม่
        imagejpeg($resizedImage, $targetFilePath, 100); // 75 คือคุณภาพของภาพ (0-100)

        $imagePath = $targetImagePath; // ถ้าสำเร็จให้ใช้ imagePath จากไฟล์ที่อัปโหลด
          // ล้างหน่วยความจำ
        imagedestroy($image);
        imagedestroy($resizedImage);
    } else {
        echo "ไม่สามารถย้ายไฟล์ได้";
    }
} else {
    $imagePath = $_POST['image_url'];
}

// บันทึกลงฐานข้อมูล
$stmt = $conn->prepare("INSERT INTO employee (name, date, image, status, status_employee, work)
            VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $name, $date, $imagePath, $status, $status_employee, $work);
if ($stmt->execute()) {
    header("location:../index.php");
    echo json_encode(array('success' => 1));
} else {
    echo "บันทึกข้อมูลไม่สำเร็จ: " . $stmt->error;
}
