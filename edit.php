<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editOption = $_POST['editOption'];

    // ตัวอย่างการอัปเดตข้อมูล (ต้องมีการระบุ ID หรือข้อมูลที่ชัดเจนสำหรับการอัปเดต)
    $sql = "UPDATE options SET option_value = '$editOption' WHERE id = ?"; // แก้ไขให้เหมาะสมกับ ID ที่คุณต้องการอัปเดต
    // ต้องใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // ID ที่คุณต้องการอัปเดต
    if ($stmt->execute()) {
        echo "ข้อมูลถูกอัปเดตเรียบร้อย";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }
}

$conn->close();
?>
