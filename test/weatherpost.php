<?php
$main = $description = $icon = $img ='';

// รับค่าจาก Method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST['city'];
    $apiKey = "fb6c5ee212d2e88b344fc8267b61397b";

    // เรียก API เพื่อนำข้อมูลสภาพอากาศของเมืองที่กำหนด
    $url = "https://api.openweathermap.org/data/2.5/weather?q=Bangkok&appid=$apiKey";
    $response = file_get_contents($url);

        $data = json_decode($response, true);
    
        if($data['weather'][0] && $data['main'] && $data['sys']){
            $weather = $data['weather'][0];
            //สภาพอากาศ
            $main =  $weather['main'];
            //บรรยากาศ
            $description = $weather['description'];
            $icon = $weather['icon'];
            //รูป Icon
            $img = "<img src = 'http://openweathermap.org/img/wn/$icon.png'width='100px'height='100px'>";

            $container_temp = $data['main'];
            
            $temp = $container_temp['temp'];
            $temp_min = $container_temp['temp_min'];
            $temp_max = $container_temp['temp_max'];
            $container_sys = $data['sys'];

            $country = $container_sys['country'];
         
            $namecity = $data['name'];
            $timezone = $data['timezone'];

        }
    
}
?>