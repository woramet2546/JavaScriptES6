<?php 
   $url = 'city_name.json';
   $json = file_get_contents($url);
   $data = json_decode($json, true);
   
   // สมมุติว่าข้อมูลมีรูปแบบดังนี้: [['name' => 'ชื่ออำเภอ'], ...]
   $tambon = [];
   
   foreach ($data as $item) {
       $tambon[] = $item['name_th']; // เก็บชื่ออำเภอในอาเรย์
   }
   echo "<pre>";
   print_r($tambon);
?>