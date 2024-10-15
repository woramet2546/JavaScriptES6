<?php
include './database/dbconnect.php';

$id = $_GET['id']; // รับ ID จาก AJAX

$sql = "SELECT * FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Log ค่าที่ดึงจากฐานข้อมูล
    error_log(print_r($row, true)); // ใช้ error_log เพื่อบันทึกข้อมูลในไฟล์ log

    echo json_encode($row);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
