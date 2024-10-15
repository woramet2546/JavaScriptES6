<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadOption = $_POST['uploadOption'];

    // เพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO options (option_value) VALUES ('$uploadOption')";
    if ($conn->query($sql) === TRUE) {
        echo "ข้อมูลถูกบันทึกเรียบร้อย";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }
}

$conn->close();
?>
