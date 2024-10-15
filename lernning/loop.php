<?php
// SuperGlobal

// $GLOBALS = เป็นการประกาศให้เป็นตัวแปร global เพื่อให้ทุกส่วนสามารถเรียกใช้งานได้
// $_SERVER = เก็บค่าต่างๆของ Web server ที่กำลังทำงานอยู่
// $_GET = เป็นตัวแปรแบบ Array ใช้เก็บค่าที่ส่งมาจาก URL
// $_POST = ใช้เก็บค่าที่ส่งมากับ Form ผ่าน Method POST
// $ENV = ตัวแปรที่จัดเก็บสภาพแวดล้อมทั่วไปและสภาพแวดล้อมของServer




  $t = 1;
    $tt = 10;
    while ($t < $tt) {
        echo " t = $t > $tt ";
        $t++;
    }
    echo "<hr>";


$l = 20;
$count_by = 2;

while ($l >= 0){
    $l -= $count_by;
    echo $l."\n";
}
echo "ข้อความจะแสดงเมื่อ ไม่มีการทำเงื่อนไขแล้ว<hr>";

    echo str_repeat("*",5);
    echo "<br>";
    echo str_repeat("*",4);
    echo "<br>";
    echo str_repeat("*",3);
    echo "<br>";
    echo str_repeat("*",2);
    echo "<br>";
    echo str_repeat("*",1);

    echo "<hr>";

// rand(0,8) จะดึงค่าจากสุ่มค่าตั้งแต่เลข 0 ถึง 8 เลือกมา1ตัวแล้วทำการLoop
$number_one = rand(0,8);
echo "ใช้randสุ่มตัวเลข $number_one\n";

while($number_one != 0) {
    $number_one = rand(0,8);
    echo "number_one = $number_one ";
}
echo "<hr>";

$number_test = [10,20,30,40,50];
// $numbers as $el คือการเปลี่ยนชื่อ numbers ให้เป็น $el
foreach ($number_test as $el){
    echo "ทดสอบ$el<hr>";
}








function bubble($arr)
{
    // count เป็นการนับ Array ในตัว แปร $arr
    $n = count($arr);
    // $i เท่ากับ 0 $i น้อยกว่า $noti ให้ลดค่าที่ละ1 แล้ว บวก ค่า$i ที่ละ1
    for ($i = 0; $i < $n - 1; $i++) {
        // $j = 0 | $j น้อยกว่า $n - $i -1 | เพิ่ม ค่าตัวแปร $j ที่1
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // เอาค่าของตัวแปร $j
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}
$arr = [1, 10, 0, 20, 15, 5, 12, 8, 25, 30];
$sortedArray = bubble($arr);

echo "น้อยไปมาก = "
    // implode คือการแทรก String ไปในArray
    . implode(",", $sortedArray);


echo "<br>";
// count คือการนับจำนวนในArray ว่ามีทั้งหมดกี่ตัว
$number = array(10, 20, 30, 40, 50);
echo "จำนวนข้อมูลใน array คือ " . count($number);
echo "<br>";


function bubblemin($array)
{
    $noti = count($array);
    
    for ($i = 0; $i < $noti - 1; $i++) {

        for ($j = 0; $j < $noti - $i - 1; $j++) {

            if ($array[$j] < $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}
$array = [1, 10, 0, 20, 15, 5, 12, 8, 25, 30];
$sortedArray = bubblemin($array);

echo "มากไปน้อย = "
    // implode คือการแทรก String ไปในArray
    . implode(",", $sortedArray);
echo "<hr>";


$size = 10;
// iเท่ากับ0 ; iน้อยกว่า size; เพิ่มค่า iไปเลือยๆจนกว่าจะมากกว่า 10
for($i = 0; $i < $size; $i++){
    for($j = 0; $j < $size *2; $j++){
        if($i >= $size - $j - 1 &&
        $size - $i <=2* $size - $j - 1){
            echo "*";
        }else
        echo " . "; 
    }
    echo "<br>";
}
//  i น้อยกว่า 2 ถ้าเงื่อนไขยังเป็นจริงให้ แสดง echo "<br>" โดย i++ จะเพิ่มค่า รอบแรกเป็น i = 1>2 จบเงื่อนไข
for($i = 0; $i < 2; $i++) {
    // J น้อยกว่า $size(10) *2 = 20; เมื่อ J ยังน้อยกว่า 20 ก็จะ แสดง . ไปจนกว่า ตัวแปร j++ จะเพิ่มค่าให้ j = 20
    // จบเงื่อนไข
    for($j = 0; $j < $size * 2; $j++){
        // เงื่อนไข 1 ค่าJ จะเริ่มนับจาก 0 ถ้าเป็นเท็จ จะใส่ .ตามจำนวนที่เป็นเท็จก็คือ 0 - 8 
        // เงื่อนไข 2 ค่าJ = [8] มากกว่าหรือเท่ากับ $size = 10
        if($j >= $size - 2 && $j <= $size){
            echo "*";
        }else
        echo " .";
    }
    echo "<br>";
}

for($j = 0; $j < $size * 2; $j++){
   
    if($j >= $size - 2 && $j <= $size){
        echo "ค่าของ J(if) = $j,";
    }else
    echo "ค่าของ J(for) = $j,";
}


?>