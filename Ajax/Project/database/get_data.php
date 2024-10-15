<?php
include "dbconnect.php";

$idEdit = $_POST['id'];
$nameEdit = $_POST['nameEdit'];
$dateEdit = $_POST['dateEdit'];
$imageURLEdit = $_POST['imageURLEdit'];
$status_employee = $_POST['status_employee'];
if (isset($_POST['toggleSwitch'])) {
    $status = $_POST['toggleSwitch'] = 1;
} else {
    $status = $_POST['toggleSwitch'] = 0;
}
$workEdit = $_POST['workEdit'];

// print_r($_POST);

$imagePath = $imageURLEdit; // ใช้ URL ที่มีอยู่ถ้าไม่อัปโหลดใหม่

// ตรวจสอบการอัปโหลดไฟล์
if (isset($_FILES['fileEdit']) && $_FILES['fileEdit']['error'] == UPLOAD_ERR_OK) {
    // ปรับขนาดรูปภาพ
    list($width, $height) = getimagesize($_FILES['fileEdit']['tmp_name']);
    $newWidth = 500;
    $newHeight = 300;

    $src = imagecreatefromstring(file_get_contents($_FILES['fileEdit']['tmp_name']));
    $dst = imagecreatetruecolor($newWidth, $newHeight);

    // ปรับขนาดรูปภาพ
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // กำหนดเส้นทางและชื่อไฟล์สำหรับบันทึก
    $fileName = uniqid() . '.jpg'; // สร้างชื่อไฟล์ใหม่เพื่อหลีกเลี่ยงการซ้ำ
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;

    // บันทึกภาพที่ปรับขนาดลงในไฟล์
    imagejpeg($dst, $targetFilePath);
    imagedestroy($src);
    imagedestroy($dst);

    // ใช้ imagePath ที่อัปโหลดใหม่
    $imagePath = $targetFilePath;
}

// บันทึกข้อมูลในฐานข้อมูล
$stmt = $conn->prepare("UPDATE employee SET name=?, date=?, image=?, status=?, status_employee=?, work=? WHERE id=?");
$stmt->bind_param("sssissi", $nameEdit, $dateEdit, $imagePath, $status, $status_employee, $workEdit, $idEdit);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    echo "บันทึกข้อมูลไม่สำเร็จ: " . $stmt->error;
}
