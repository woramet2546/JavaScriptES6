<?php 
$api = "./database/city_name.json";
$json = file_get_contents($api,true);
$result = json_decode($json);

echo "<pre>";


$data = array_column($result, 'amphure');
$data1 = array_column($data, 'province');
$data2 = array_column($data1, 'name_th');
// print_r($data1);
print_r($data2);
// foreach($data as $key => $amphure){
    
// }

?>