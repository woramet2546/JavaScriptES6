<?php
session_start(); // เริ่มต้น session

$status = null; //ค่าพื้นฐานคือค่าว่าง

if(isset($_SESSION['status'])){ //เงื่อนไข เช็คค่าว่างใน $_SESSION['status']
    $status = $_SESSION['status']; //เก็บ $_SESSION['status'] ลงใน status
}
?>
