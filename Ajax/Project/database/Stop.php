<?php
include './dbconnect.php'; // เชื่อมต่อฐานข้อมูล
if (isset($_GET['id'])) {
    $id = $_GET['id']; // 
    $sql = "UPDATE employee SET status = 0 WHERE id = $id"; // 

    if ($conn->query($sql) === TRUE) {
        // ถ้าการอัปเดตสำเร็จ
        header("Location: ../index.php"); // เปลี่ยนเป็นหน้ารีไดเร็คที่คุณต้องการ
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
