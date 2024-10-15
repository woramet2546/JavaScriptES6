<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "employee";

// สร้างการเชื่อมต่อ Database
$conn = new mysqli($servername,$username,$password,$dbname);

// เช็คการเชื่อมต่อ Database 
if($conn->connect_error){
    die("เชื่อมต่อไม่สำเร็จ".$conn->connect_error);
}
// echo "เชื่อมต่อDatabase สำเร็จ";


?>