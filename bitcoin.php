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

  // echo "<pre>";
  // print_r($data);
  // foreach ($data['data']['coins'] as $coin) {
  //     echo "Symbol: " . $coin['symbol'] . "<br>";
  // }
}

// ปิด cURL session
curl_close($ch);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
  <style>
    .my_custom {
      width: 25%;
      border: 1 solid black;
    }

    .my_custom2 {
      width: 15%;
    }

    .my_custom_chang {
      width: 5%;
    }

    /*  */
    html body {
      color: white;
    }

    .dt-length .dt-input option {
      color: white;
      background: black;
    }

    /*  */
  </style>
</head>

<body class="bg-dark bg-gradient">
  <!--  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">เปลี่ยนสกุลเงิน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Weather.html">ตรวจสภาพอากาศ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Gold.php">ราคาทอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Oil.php">เช็คราคาน้ำมัน</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="bitcoin.php">ราคาเหรียญBTC</a>

        </li>
      </ul>
    </div>
  </nav>
  <!--  -->
  <div class="container-sm">
    <?php
    echo "<table class='table table-bordered text-wrap display' id='myTable'>";
    ?>

    <thead>
      <h2 class="alert bg-warning bg-gradient text-center text-light">
        <?php
        $date2 = new DateTime();
        $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
        echo $date2->format('d M Y H:i:s'); // แสดงวันที่ เดือน ปี เวลา ชั่วโมง นาที วินาที
        ?>

      </h2>
      <tr class="text-center bg-secondary bg-gradient">
        <td>Rank</td>
        <td>NameCoin</td>
        <th scope="col">Total</th>
        <th scope="col">MarketCap</th>
        <th scope="col">Volume</th>
        <th scope="col">totalExchanges</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'function_img_btc.php';
      foreach ($data['data']['coins'] as $coin) {
        //ราคาของเหรียญ
        $price_coin = $coin['price'];
        //รูปภาพทั้งหมด
        $img_url = $coin['iconUrl'];
        //ลำดับ
        $rank = $coin['rank'];
        //ยังไม่รู้ว่าคืออะไร
        $margetCap = $coin['marketCap'];
        //ราคาการเปลี่ยนแปลง
        $chang = $coin['change'];
        //
        $volume = $coin['24hVolume'];


        echo "<tr class='text-center'>";
        echo "<th class='my_custom_chang'>";
        echo $rank;
        echo "</th>";
        echo "<th class='my_custom text-center'>";
        echo $coin['name'];
        echo "(" . $coin['symbol'] . ") ";
        echo '<img src="' . htmlspecialchars($coin['iconUrl'],) . '" width="30px" ."height="30px">';
        echo "</th>";

        echo "<td class='my_custom2'>";
        echo number_format($price_coin, 2) . "$";
        echo "</td>";


        echo "<td>";
        echo number_format($margetCap, 2) . "";
        echo "</td>";

        echo "<td>";

        echo number_format($volume, 2) . "";
        echo "</td>";

        echo "<td class='my_custom_chang'>";
        echo displayImageBasedOnChange($coin['change']);
        echo "</td>";


        echo "</tr>";
      }
      ?>

    </tbody>

    <?php
    echo "</table>";
    ?>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
</body>

</html>