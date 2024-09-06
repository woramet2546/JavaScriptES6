<?php
// ทำการเชื่อมต่อ DataBase
include 'ConnectDatabase.php';

//รับค่าจากฟอร์มที่ส่งมาแล้วเก็บในตัวแปร (ต้องเรียงตามลำดับหน้าฟอร์ม)
$fname = $_POST["fname"];
$lname=$_POST["lname"];
$skill=$_POST["skill"];
$gender=$_POST["gender"];



$sql = "INSERT INTO employee (fname, lname, skill, gender) VALUES ('$fname', '$lname', '$skill', '$gender')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "บันทึกข้อมูลเรียบร้อย";
    header("Location: insertForm_phpmyadmin.php");

}else{
    echo mysqli_error($conn);
}




?>
