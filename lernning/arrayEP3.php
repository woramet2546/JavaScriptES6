<?php
$color =["Red"=>"แดง","Yellow"=>"เหลือง","Pink"=>"ชมพู","Orange"=>"ส้ม"];
echo "Array_keys = แสดงแค่ Key<br>";
$key = array_keys($color);
print_r($key);
echo "<hr>";

echo "Array_value = แสดงแค่ value<br>";
$value = array_values($color);
print_r($value);
echo "<hr>";

echo "array_flip = สลับค่าindexกลับValue<br>";
$swith = array_flip($color);
print_r($swith);
echo "<hr>";
echo "array_unique = ลบค่าซ้ำในArray<br>";
$arrayU = array_unique($color);
print_r($arrayU);
echo "<hr>";

echo "<h4>ฟังก์ชั่นการค้นหาข้อมูลใน Array</h4>";
echo "array_key_exists = ตรวจสอบว่ามี indexหรือ(Key)นี้ในArray<br>";
echo "in_array = ตรวจสอบว่ามี value นี้ในArray ใหม";
echo "<hr>";

if(array_key_exists("Red",$color)){
    echo "พบ key [Red]";
    echo "<hr>";
}else{
    echo "ไม่พบ key [Red]";
    echo "<hr>";
}

if(in_array("แดง",$color)){
    echo "พบ value [แดง]";
    echo "<hr>";
}else{
    echo "ไม่พบ value [แดง]";
    echo "<hr>";
}



?>