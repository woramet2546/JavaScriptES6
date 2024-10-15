<?php
$total1 =null;
$total2 ="";
$total3 =0;
$total4 ="woramet";

$array =['woramet','Srisawang','Asefa',10];



// unset การคืนค่าที่กำหนดไว้ให้เป็น null
// unset($total4);


// isset คือการตรวจสอบค่าตัวแปร แล้วตอบกลับเป็น True=1/False=ไม่แสดง
// ใช้สำหรับป้องกันค่าว่างหรือ แจ้งเตือน undefined หรือ Error


echo "total1 = ".isset($total1);
echo "<br>";
echo "total2 = ".isset($total2);
echo "<br>";
echo "total3 = ".isset($total3);
echo "<br>";
echo "total4 = ".isset($total4);

echo "<hr>";


// empty ตรวจสอบว่าตัวแปรมีค่าว่างหรือค่าเป็น0หรือไม่ ถ้าว่างจะเป็นTrue=1/False=ไม่แสดง

echo "total1 = ".empty($total1);
echo "<br>";
echo "total2 = ".empty($total2);
echo "<br>";
echo "total3 = ".empty($total3);
echo "<br>";
echo "total4 = ".empty($total4);

echo "<hr>";

// is_null ตรวจสอบว่า ตัวแปร มีค่าว่างหรือไม่ ถ้าว่าง = 1 ไม่ว่าง = ไม่แสดง

echo "total1 = ".is_null($total1);
echo "<br>";
echo "total2 = ".is_null($total2);
echo "<br>";
echo "total3 = ".is_null($total3);
echo "<br>";
echo "total4 = ".is_null($total4);

echo "<hr>";
// เช็คชนิดตัวแปร
echo gettype($array);
echo "<br>";
// แสดงรายการใน array 
print_r($array);
echo "<br>";
// แสดงรายละเอียดทั้งหมด var_dump รายละเอียดทั้งหมดเช่น ชนิดข้อมูล ความยาวข้อมูล
var_dump($array);



?>