<?php
// แบบปกติ (แบบเดี่ยว)
echo "การบวกในค่าArray<br>";
$array = array(10, 20, 30, 40);
//การเปลี่ยนค่าในArray
$array[0] = 100;
print_r($array);
echo "<br>";
$total = $array[0] + $array[2];
echo "ค่าArray ที่บวกกัน = " . $total;
echo "<hr>";


echo "<br>";


$student = ['woramet', 'Srisawang', 'tanathaw'];
print_r($student);
echo "<br>";
// การเลือกแบบเจาะจง value
echo $student[0];
echo "<hr>";



// วิธีเปลี่ยนค่าใหม่ให้Array
echo "การเปลี่ยนค่าใน Array<hr>";
$home = ['กรุงเทพมหานคร', 'สมุทรสาคร', 'สมุทรปราการ', 'อุบลราชธานี'];
echo "ก่อนเปลี่ยน<br>";
print_r($home);
echo "<br>";
$home[0] = 'จันทบุรี';
echo "หลังเปลี่ยน<br>";
print_r($home);
echo "<hr>";

// array แบบจับคู่ [Key]=>value การตั้งชื่อ Keyไม่จำเป็นต้องเป็นภาษาอังกฤษเสมอไป
$arrkey = ["province" => "กรุงเทพมหานคร"];
echo $arrkey['province'];
echo "<hr>";

echo "การใช้ range(Start/Stop/Step)<br>";
// หลัง 50 คือการกำหนด จำนวนว่างระหว่างตัวเลข ตัวอย่าง คือ ให้ นับ ที่ละ5 จาก 0 จนถึง 50
$rang_number = range(0, 50, 5);
print_r($rang_number);
echo "<hr>";
// จะแสดง ค่าที่นับได้ 3 เช่น A=1 B=2 C=3
$ABC = range("A", "X", 2);
print_r($ABC);
echo "<hr>";

// array_count_values(ตัวแปร) เช็คจำนวนที่ซ้ำกันในArray| count(ตัวแปร) = นับจำนวนสมาชิคใน Array

// for Loop จำนวนใน Array ทั้งหมด
$provin = ['กรุงเทพมหานคร', 'สมุทรสาคร', 'สมุทรปราการ', 'อุบลราชธานี', 'ทดสอบจังหวัด[1]', 'ทดสอบจังหวัด[2]'];
$Numcount = count($provin);
for ($index = 0; $index < $Numcount; $index++) {
    $program = $provin[$index];
    echo $provin[$index] . ",";
}
echo "<br>";
echo "การใช้ ดึงค่าที่อยู่ใน Array ออกมาทั้งหมดโดยใช้ for";
echo "<hr>";

print_r(array_count_values($provin));
echo "<hr>";

foreach ($provin as $items) {
    echo $items . ",";
}
echo "<hr>";

$array = ["color1" => "yellow", "color2" => "blue", "color3" => "red", "color4" => "green"];
foreach ($array as $key => $value) {

    echo " (ค่า Key = $key ค่า Value = $value) ";
}
echo "<hr>";
// array 2มิติ
$products = array(
    array("คีย์บอร์ด", "Keyboard", 900),
    array("เมาส์", "Mouse", 100),
    array("โต๊ะ", "Table", 1500),
    array("จอ", "Maniter", 2000),
);
for ($row = 0; $row < count($products); $row++) {
    for ($column = 0; $column < count($products[$row]); $column++) {
        // เปลี่ยนชื่อโดยใช้ if
        if ($products[1][0] == "เมาส์") {
            $products[1][0] = "เปลี่ยน";
        }
            echo $products[$row][$column];
    }
    echo "<hr>";
}

$products = array(
    array("key"=>"คีย์บอร์ด", "EN"=>"Keyboard", "price"=>900),
    array("key"=>"เมาส์", "EN"=>"Mouse", "price"=>100),
    array("key"=>"โต๊ะ", "EN"=>"Table", "price"=>1500),
    array("key"=>"จอ", "EN"=>"Maniter", "price"=>2000),
);
foreach($products as $product){
    echo "ชื่อสินค้า (TH) = ".$product['key'];
    echo "ชื่อสินค้า (EH) = ".$product['EN'];
    echo "ราคาสินค้า (price) = ".$product['price'];
    echo "<hr>";
}
