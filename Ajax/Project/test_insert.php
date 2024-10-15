<?php
$host = 'localhost'; // หรือที่อยู่เซิร์ฟเวอร์ฐานข้อมูลของคุณ
$db = 'database'; // ชื่อฐานข้อมูล
$user = 'root'; // ชื่อผู้ใช้ฐานข้อมูล
$pass = 'password'; // รหัสผ่าน

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $user, $pass, $db);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // รับค่าจากฟอร์ม
    $type = $_POST['type'] ?? null;
    $detail1 = $_POST['detail1'] ?? null;
    $detail2 = $_POST['detail2'] ?? null;
    $detail3 = $_POST['detail3'] ?? null;
    $detail4 = $_POST['detail4'] ?? null;
    $detail5 = $_POST['detail5'] ?? null;

    // ตรวจสอบค่าก่อนทำการแทรก
   
        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare("INSERT INTO checklist (equipment_id, detail1, detail2, detail3, detail4, detail5) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $type, $detail1, $detail2, $detail3, $detail4, $detail5);

        // ตรวจสอบการดำเนินการ
        if ($stmt->execute()) {
            header("Location: ./t.php");
            exit; // ควรใช้ exit หลังจาก header
        } else {
            echo "บันทึกข้อมูลไม่สำเร็จ: " . $stmt->error;
        }

        // ปิด statement
        $stmt->close();
   
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
