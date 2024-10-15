<?php
session_start(); // เริ่มต้น session
include "database.php";

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$user = $_POST['username'];
$pass = $_POST['password'];

// ตรวจสอบ username และ password
$sql = "SELECT * FROM login WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass); //ตรง String ถ้า parameter 1 ตัว ใช่ s 1 ตัว ถ้า parameter 2 ใช่ s 2
// ในค่าแรกที่กำหนดจะเป็น string type i = จำนวนเต็ม d = เลขทศนิยม s = ข้อความ ในBinary
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row['status']; // รับค่า status จากฐานข้อมูล
    
    // เก็บค่า status ลงใน session
    $_SESSION['status'] = $status;

    echo json_encode(array('success' => 1, 'status' => $status)); // ส่ง status กลับไป
} else {
    echo json_encode(array('success' => 0));
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
