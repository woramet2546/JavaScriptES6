<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "employee";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("การเชื่อมต่อล้มเหลว :".$conn->connect_error);
}else{
    // echo "เชื่อมต่อสำเร็จ";
}
?>