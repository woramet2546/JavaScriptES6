<?php 
require('ConnectDatabase.php');
echo "<br>";

//เลือกตาราง Employee
$sql = "SELECT * FROM employee";

//รับข้อมูลจาก database แล้วเก็บลงใน ตัวแปร
$result = mysqli_query($conn,$sql);

//นับจำนวนแถวทั้งหมด
$count = mysqli_num_rows($result);

//


//gettype เป็นการเช็คชนิดก้อนข้อมูล
// echo gettype($row);

//While loop (mysql_fetch_row)
// while($row = mysqli_fetch_row($result)){
//     echo "รหัสพนักงาน:" .$row[0]."<br>";
//     echo "ชื่อพนักงาน:".$row[1]."<br>";
//     echo "นามสกุล:".$row[2]."<br>";
//     echo "ทักษะ:".$row[3]."<br>";
//     echo "เพศ:".$row[4]."<br>";
//     echo "<hr>";
// }


//While Loop (mysqli_fetch_array)
while($row = mysqli_fetch_array($result)){
        echo "รหัสพนักงาน:" .$row['id']."<br>";
        echo "ชื่อพนักงาน:".$row['fname']."<br>";
        echo "นามสกุล:".$row['lname']."<br>";
        echo "ทักษะ:".$row['skill']."<br>";
        echo "เพศ:".$row['gender']."<br>";
        echo "<hr>";
}

//รูปแบบ For Loop
// for($i=0;$i<$count;$i++){
//     $row = mysqli_fetch_object($result);
//     echo "รหัสพนักงาน:" .$row->id."<br>";
//     echo "ชื่อพนักงาน:".$row->fname."<br>";
//     echo "นามสกุล:".$row->lname."<br>";
//     echo "ทักษะ:".$row->skill."<br>";
//     echo "เพศ:".$row->gender."<br>";
//     echo "<hr>";
// }   

?>