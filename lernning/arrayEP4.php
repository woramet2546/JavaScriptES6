<?php
$map = ["key1"=>"กรุงเทพ","key2"=>"อุบลราชธานี","key3"=>74000,];
$map2 = ["key1"=>"สมุทรสาคร","key2"=>10,"key3"=>34000,];

$result = array_merge($map,$map2);
echo "array_merge = รวม Array หากมีIndex ที่ซ้ำกัน จะนำค่า Array ชุดหลังมาทับค่า Array ชุดแรก<br>";
print_r($result);
echo "<hr>";

$map = ["key1"=>"กรุงเทพ","key2"=>"อุบลราชธานี","key3"=>74000,];
$map2 = ["key1"=>"สมุทรสาคร","key2"=>10,"key3"=>34000,];

$result = array_merge_recursive($map,$map2);
echo "array_merge_recursive = รวม Array หากมี index ที่ซ้ำกันจะนำค่าข้อมูลArrayชุดหลังมาต่อท้ายArrayชุดแรก<br>";
print_r($result);
echo "<hr>";

$animalEN = ["Cat","Dog","Pink","Moust"];
$animalTH = ["แมว","หมา","หมู","หนู"];
$result = array_combine($animalEN,$animalTH);
print_r($result);
echo "<hr>";
echo $result["Cat"];
?>