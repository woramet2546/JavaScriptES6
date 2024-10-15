<?php 
echo "stripos — ค้นหาตำแหน่งการเกิดขึ้นครั้งแรกของสตริงย่อยที่ไม่คำนึงถึงตัวพิมพ์ใหญ่เล็กในสตริง";
echo "<hr>";
// $number = [];
// for ($i = 0; $i < 100; $i++){
//     $number[] = range(1,100);
    
// }



// for($i = 0; $i < 1; $i++){
//     echo "<pre>";
//     // print_r($number[$i]);
//     $numberall = $number[$i];
//     print_r($numberall);
//     "<hr>";
//     echo "ค่าที่เลือกจาก Array = ".$numberall[80];
// }

$url = "https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_revert_tambon_with_amphure_province.json";
$json = file_get_contents($url);
$data = json_decode($json , true);

// echo "<pre>";
// print_r($data);


// foreach($data as $key1 => $values1){
//     foreach($values1 as $amphure['amphure'] => $values2){
//         echo "<pre>";
//         print_r($values2);
//         foreach()
//     }
    // echo "<pre>";
    // $tambon = $values1['name_th'];
    // print_r($tambon);
// }

?>