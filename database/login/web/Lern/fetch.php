<?php
// ดึงข้อมูล JSON จาก API
$url = "./city_name.json";
$json = file_get_contents($url);
$data = json_decode($json, true);

// รับค่า input ที่ผู้ใช้พิมพ์จาก AJAX
$query = $_POST['query'];

// กรองข้อมูลที่ตรงกับการค้นหา
$suggestions = [];
foreach ($data as $item) {
    if (stripos($item['name_th'], $query) === 0 || 
        stripos($item['amphure']['name_th'], $query) === 0 || 
        stripos($item['amphure']['province']['name_th'], $query) === 0 ||
        stripos($item['zip_code'], $query) === 0) {

        // เก็บข้อมูลที่ตรงกัน (ตำบล, อำเภอ, จังหวัด, รหัสไปรษณีย์)
        $suggestions[] = [
            'subdistrict' => $item['name_th'],
            'district' => $item['amphure']['name_th'],
            'province' => $item['amphure']['province']['name_th'],
            'zipcode' => $item['zip_code']
        ];
    }
}

// ส่งผลลัพธ์กลับในรูปแบบ JSON
// echo json_encode($suggestions);
?>
