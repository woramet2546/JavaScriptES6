<?php
$dsn = "odbc:DSN=EmployeeDB_DSN"; // ใช้ชื่อ DSN ที่คุณตั้งไว้
$username = "woramet";
$password = "woramet";

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ตรวจสอบการเชื่อมต่อ
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
} catch (PDOException $e) {
    // แสดงข้อผิดพลาดหากไม่สามารถเชื่อมต่อได้
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}

// ปิดการเชื่อมต่อ
$pdo = null;
?>
