<?php
include "dbconnect.php";
$id = $_REQUEST['id'];
$sql = "DELETE FROM employee WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result == true){
    echo "ลบฐานข้อมูลสำเร็จ";
    header('location:../index.php');

}
