<?php
// รวมไฟล์เชื่อมต่อฐานข้อมูล
include 'sqlserver.php';

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบการมีอยู่ของคีย์ใน $_POST ก่อนการเข้าถึง
    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : null;
    $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : null;
    $Department = isset($_POST['Department']) ? $_POST['Department'] : null;
    
    // ตรวจสอบการมีอยู่ของไฟล์อัปโหลดใน $_FILES
    if (isset($_FILES['IMG']) && $_FILES['IMG']['error'] == UPLOAD_ERR_OK) {
        // ดึงข้อมูลไฟล์ที่อัปโหลด
        $IMG = file_get_contents($_FILES['IMG']['tmp_name']);
        echo "<p>ID: {$row['ID']}</p>";

    } else {
        $IMG = null;
    }

    // ตรวจสอบค่าที่ได้รับเพื่อป้องกันข้อผิดพลาด
    if ($Firstname && $Lastname && $Department && $IMG) {
        // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
        $sql = "INSERT INTO Employee (Firstname, Lastname, Department, IMG) VALUES (:Firstname, :Lastname, :Department, :IMG)";

        try {
            // เตรียมคำสั่ง SQL
            $stmt = $pdo->prepare($sql);
            // ผูกค่าพารามิเตอร์
            $stmt->bindParam(':Firstname', $Firstname);
            $stmt->bindParam(':Lastname', $Lastname);
            $stmt->bindParam(':Department', $Department);
            $stmt->bindParam(':IMG', $IMG, PDO::PARAM_LOB); // สำหรับข้อมูลแบบ binary
            // ดำเนินการเพิ่มข้อมูล
            $stmt->execute();

            echo "บันทึกข้อมูลสำเร็จ";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Missing form data.";
    }
}
?>
