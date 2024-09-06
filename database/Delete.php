<?php
// รวมไฟล์เชื่อมต่อฐานข้อมูล
include 'sqlserver.php';

// ตรวจสอบว่ามีการส่งค่า ID มาหรือไม่
if (isset($_GET['id'])) {
    $ID = $_GET['id'];

    // สร้างคำสั่ง SQL เพื่อทำการลบข้อมูล
    $sql = "DELETE FROM Employee WHERE ID = :ID";

    try {
        // เตรียมคำสั่ง SQL
        $stmt = $pdo->prepare($sql);
        // ผูกค่าพารามิเตอร์
        $stmt->bindParam(':ID', $ID);
        // ดำเนินการลบข้อมูล
        $stmt->execute();
        
        header("Location: showEmployee.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Missing ID.";
}
?>
<a href="showEmployee.php">กลับหน้าหลัก</a>

