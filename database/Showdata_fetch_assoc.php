<?php 
require('ConnectDatabase.php');

//เลือกตาราง Employee
$sql = "SELECT * FROM employee";

//รับข้อมูลจาก database แล้วเก็บลงใน ตัวแปร
$result = mysqli_query($conn,$sql);

//นับจำนวนแถวทั้งหมด
$count = mysqli_num_rows($result);


//gettype เป็นการเช็คชนิดก้อนข้อมูล
// echo gettype($row);


?>