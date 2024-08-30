<?php
// URL ของ API
$apiUrl = 'https://api.coinranking.com/v2/coins';
$apiToken = 'coinrankingb51aea1c4c9ce04fdd2418e18aa382a4a869a8d74b20522a';

// สร้าง cURL session
$ch = curl_init();

// ตั้งค่า cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-access-token: ' . $apiToken
]);

// ดึงข้อมูลจาก API
$response = curl_exec($ch);

// ตรวจสอบว่ามีข้อผิดพลาดหรือไม่
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // แปลงข้อมูล JSON เป็น array
    $data = json_decode($response, true);

    echo "<pre>";
    print_r($data);
    // foreach ($data['data']['coins'] as $coin) {
    //     echo "Symbol: " . $coin['symbol'] . "<br>";
    // }
}

// ปิด cURL session
curl_close($ch);
?>