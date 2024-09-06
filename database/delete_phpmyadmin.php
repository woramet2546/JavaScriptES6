<?php
include 'ConnectDatabase.php';
//รับค่า
$id = $_GET['id'];

$sql = "DELETE FROM employee WHERE id = $id";

$result=mysqli_query($conn,$sql);

if($result){
    echo "ลบข้อมูลเรียบร้อย";
    header("Location: Show_Employee_myadmin_table.php");
}else{
    echo "เกิดข้อผิดพลาด";
}

?>