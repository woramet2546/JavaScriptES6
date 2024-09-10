<?php
// URL ของ API
$apiUrl = 'https://api.coinranking.com/v2/coins';
$apiToken = 'coinrankingb51aea1c4c9ce04fdd2418e18aa382a4a869a8d74b20522a';

// สร้าง cURL session
$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => ['x-access-token: ' . $apiToken],
  CURLOPT_CAINFO => 'C:/PHP/cacert.pem',  // ใส่ที่อยู่ของไฟล์ cacert.pem
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
  <title>API Coin</title>
  
  <link rel="stylesheet" href="style.css">
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
    html body{
      color: white;
    }

    .dt-length .dt-input option {
      color: white;
      background: black;
    }
    /*  */
  </style>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">

   <!-- Jquery -->
   <script src="/CDN/Data_table_Export/jquery_371.js"></script>
    <!-- Data_table Js -->
    <script src="/CDN/Data_table_Export/dataTables.js"></script>
    <script src="/CDN/Data_table_Export/dataTables_buttons.js"></script>
    <script src="/CDN/Data_table_Export/buttons_dataTables.js"></script>
    <script src="/CDN/Data_table_Export/jszip_min.js"></script>
    <script src="/CDN/Data_table_Export/pdfmake_min.js"></script>
    <script src="/CDN/Data_table_Export/buttons_html5_min.js"></script>
    <script src="/CDN/Data_table_Export/buttons_print_min.js"></script>
    <!-- Font Thai -->
    <script src="/ProjectJs/node_modules/pdfmake/th-sarabun.js"></script>
    <!-- Data_table Css -->
    <link rel="stylesheet" href="/CDN/Data_table_Export/dataTables_dataTables.css">
    <link rel="stylesheet" href="/CDN/Data_table_Export/buttons_dataTables.css">

</head>
<body class="bg-dark bg-gradient">
  <!--  -->
 <?php 
  include 'Navbar.php';
 ?>
  <!--  -->
  <div class="container-sm">

    <table class='table table-bordered text-wrap' id='example'>
   

    <thead>
      <h2 class="alert bg-warning bg-gradient text-center text-light">
        <?php
        $date2 = new DateTime();
        $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
        echo $date2->format('d M Y H:i:s'); // แสดงวันที่ เดือน ปี เวลา ชั่วโมง นาที วินาที
        ?>

      </h2>
      <tr class="text-center bg-light bg-gradient">
        <td>Rank</td>
        <td>NameCoin</td>
        <th scope="col">Total</th>
        <th scope="col">MarketCap</th>
        <th scope="col">Volume</th>
        <th scope="col">totalExchanges</th>
      </tr>
    </thead>
    <tbody class="bg-light bg-gradient">
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

   
  </table>
    

  </div>
  <script>
    // กำหนดฟอนต์ให้กับ pdfMake
    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.woff',
            bold: 'THSarabunBold.woff'
        }
    }

    $(document).ready(function() {
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: [
                        'copy',
                        'excel',
                        {
                                extend: 'pdf',
                                text: 'PDF',
                                customize: function(doc) {
                                    // ตั้งค่าให้ใช้ฟอนต์ THSarabun
                                    doc.defaultStyle = {
                                        font: 'THSarabun',
                                        fontSize: 16 // ขนาดฟอนต์ (สามารถเปลี่ยนแปลงตามความต้องการ)
                                    };
                                    // จัดหน้าให้เนื้อหากึ่งกลาง
                                    doc.content[1].alignment = 'center';
                                    // เพิ่ม margins เพื่อจัดให้อยู่กึ่งกลางหน้า
                                }
                            },'print',

                    ]
                }
            }
        });
    });
</script>
</body>

</html>