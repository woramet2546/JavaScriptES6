<?php 
$fruits = ["มะละกอ","กล้วย","มะม่วง","ส้ม"];
echo "ค่าปกติ = ";
print_r($fruits);

echo "<hr>";
// array_push เป็นการเพิ่มValueใหม่ ไปตำแหน่งสุดท้าย
array_push($fruits,"นารูโต๊ะ","โนบิตะ","โดเร่ม่อน");
// เปลี่ยน ค่า Key ที่ 6เป็น ชิซูกะ
$fruits[6] = "ชิซูกะ";
echo "ค่าหลังจากใช้ array_push = ";
print_r($fruits);
echo "<hr>";
echo "หลังใช้ array_pop";
// เป็นการลบValue ตัวสุดท้ายใน Array
for($i = 1; $i < count($fruits); $i++){
    array_pop($fruits);
}
print_r($fruits);
echo "<hr>";

echo "ใช้ array_unshift แทรกค่าตัวแรก = ";
array_unshift($fruits,"แทรกค่าตัวแรก");
print_r($fruits);
echo "<hr>";

echo "หลังใช้ array_shift(เพื่อลบค่าตัวแรกออก)";
array_shift($fruits);
print_r($fruits);
echo "<hr>";

// array_splice("ชื่อ array", "ตำแหน่ง index", "ตำแหน่งของ Value");
echo "Array ธรรมดา<br>";
$fruits = ["มะละกอ","กล้วย","มะม่วง","ส้ม"];
print_r($fruits);
echo "<hr>";
array_splice($fruits,1,1);
echo "array_splice ลบตำแหน่งที่ต้องการ<br>";
print_r($fruits);
echo "<hr>";

array_splice($fruits,1,1,array("ทุเรียน","องุ่น"));
echo "array_splice เพิ่มValueในตำแหน่งที่ต้องการ<br>";
print_r($fruits);
echo "<hr>";

$number = [10,5,3,1,6,8,15,50];
print_r($number);
echo "<hr>";

echo "<hr>";
echo "หลังใช้ sort";
sort($number);
print_r($number);

echo "<hr>";
echo "หลังใช้ rsort";
rsort($number);
print_r($number);

echo "<hr>";
$province = array(
    'กระบี่', 'กรุงเทพมหานคร', 'กาญจนบุรี', 'กาฬสินธุ์', 'กำแพงเพชร',
    'ขอนแก่น',
    'จันทบุรี',
    'ฉะเชิงเทรา',

);
echo "ค่าปกติ";
echo "<pre>";
print_r($province);
echo "</pre>";
echo "<hr>";
sort($province);
echo "หลังใช้ sort";
echo "<pre>";
print_r($province);
echo "</pre>";
echo "<hr>";
shuffle($province);
echo "หลังใช้ shuffle = สุ่มสลับค่าในข้อมูล โดยฟังก์ชั่นจะกำหนดค่า Index ใหม่";
echo "<pre>";
print_r($province);
echo "</pre>";
echo "<hr>";
$province=array_reverse($province);
echo "หลังใช้ reverse = เรียงค่าแบบย้อนกลับ";
echo "<pre>";
print_r($province);
echo "</pre>";

echo "asoft() เรียงข้อมูลจากน้อยไปมาก<br>";
echo "arsoft() เรียงข้อมูลจากมากไปน้อย<br>";
echo "ksoft() เรียงindexจากน้อยไปมาก<br>";
echo "krsoft() เรียงindexจากมากไปน้อย<br>";

?>