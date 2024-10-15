<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "employee";

// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL สำหรับเลือกข้อมูล
$sql = "SELECT id, image FROM file";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่


// ปิดการเชื่อมต่อ
// $conn->close();
?>
