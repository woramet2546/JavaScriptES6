<?php
session_start(); // เริ่มต้นเซสชัน

// ทำลายเซสชันทั้งหมด
session_unset();
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าล็อกอินหรือหน้าอื่น ๆ
header("Location: /ProjectJs/database/login/logintest.php");
exit();
?>
