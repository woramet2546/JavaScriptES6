<?php
// URL ของ API
$apiUrl = 'https://api.coinranking.com/v2/coins';
$apiToken = 'coinrankingb51aea1c4c9ce04fdd2418e18aa382a4a869a8d74b20522a';

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => ['x-access-token: ' . $apiToken],
  CURLOPT_CAINFO => 'C:/PHP/cacert.pem',  // ใส่ที่อยู่ของไฟล์ cacert.pem
]);

$response = curl_exec($ch);

if (!$response) {
  echo 'cURL Error: ' . curl_error($ch);
} else {
  print_r(json_decode($response, true));
}

curl_close($ch);


// ดึงข้อมูลจาก API
$response = curl_exec($ch);

// ตรวจสอบว่ามีข้อผิดพลาดหรือไม่
if (curl_errno($ch)) {
  echo 'cURL Error: ' . curl_error($ch);
} else {
  // แปลงข้อมูล JSON เป็น array
  $data = json_decode($response, true);

  // echo "<pre>";
  // print_r($data);
  // foreach ($data['data']['coins'] as $coin) {
  //     echo "Symbol: " . $coin['symbol'] . "<br>";
  // }
}

// ปิด cURL session
curl_close($ch);


?>