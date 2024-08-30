<?php
$url = "https://oil-api.vercel.app/latest";
$json = file_get_contents($url);
$data = json_decode($json, true);

//data ชื่อobject api



//brand คือชื่อน้ำมัน
$data_array = array(); // กำหนดค่าเริ่มต้นให้กับ $data_array

//is_array คือการตรวจสอบตัวแปรว่าเป็นค่า Array หรือใหม

if (is_array($data)) { // ตรวจสอบว่าตัวแปร $data เป็น array
    foreach ($data as $key => $value) {
        if (is_array($value)) { // ตรวจสอบว่าตัวแปร $value เป็น array
            foreach ($value as $sesstion => $subStation) {
                if (is_array($subStation)) { // ตรวจสอบว่าตัวแปร $subStation เป็น array
                    foreach ($subStation as $CompanyName => $brand) {

                        // if (is_array($brand)) { // ตรวจสอบว่าตัวแปร $brand เป็น array
                        foreach ($brand as $gas => $detail) {
                            if (is_array($detail) && isset($detail['price'])) { // ตรวจสอบว่า $detail เป็น array และมี key 'price'
                                $data_array[$gas][$CompanyName] = $detail['price'];
                            }
                        }
                        // }
                    }
                }
            }
        }
    }
}

// คุณสามารถทำการแสดงผลหรือใช้งาน $data_array ได้ที่นี่



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oil Prices</title>
    <link rel="stylesheet" href="Oli.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

    <style>
        .alert {
            margin: 0;
        }

        body {
            color: black;
        }
    </style>

</head>

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

<body class="">
    <div class="container-sm">
        <?php
        // echo "<pre>";
        // print_r($data);
        // Associative array ที่เก็บ URL รูปภาพ
        $companyImages = [
            'ptt' => 'img/ptt.png',
            'bcp' => 'img/bangjak.png',
            'shell' => 'img/shell.png',
            'esso' => 'img/esso.png',
            'caltex' => 'img/Caltex.png',
            'irpc' => 'img/irpc.png',
            'pt' => 'img/pt.png',
            'susco' => 'img/susco.png',
            'pure' => 'img/pure.png',
            'susco_dealers' => 'img/susco.png'
        ];

        ?>


        <div class="alert bg-success bg-gradient d-flex justify-content-center align-items-center text-light">
            ราคา ณ วันที่ (
            <?php

            if (isset($data['response']['date'])) {
                echo $data['response']['date'];
            } else {
                echo "-";
            }
            // foreach ($data as $response => $Values) {
            //     if (is_array($Values)) {
            //         foreach ($Values as $d => $date) {
            //             //การดักจับArray $d == "date
            //             if ($d == "date") {
            //                 print_r($date);
            //             }
            //         }
            //     }
            // }
            ?>
            )
        </div>


        <table class="table table-bordered text-center" id="myTable">
            <thead class="">
                <tr id="table-headers border">
                    <td class="col-sm-2"></td>
                    <?php
                    // ขั้นแรก ต้องมี การเก็บชื่อหรือตัวแปรที่จะเก็บไว้ในตัวแปร
                    if (isset($data['response']['stations'])) {
                        foreach ($data['response']['stations'] as $key => $values) {

                            // ขั้นตอนที่ 2ตรวจสอบและเปลี่ยนชื่อจาก 'susco_dealers' เป็น 'susco'
                            if ($key == 'susco_dealers') {
                                //ขั้นตอนที่ 3 สร้างตัวแปรเก็บชื่อที่ต้องการจะเปลี่ยน
                                $nickname = 'susco';
                            } else {
                                // ขั้นตอนที่ 4 เอาตัวแปร $nickname เก็บ  $key
                                $nickname = $key;
                            }

                            $errorimgurl = "https://erpapp.asefa.co.th/StampPic/no_img.png";
                            if (isset($companyImages[$key])) {
                                $imgurl = $companyImages[$key];
                            } else {
                                $imgurl = $errorimgurl;
                            }
                    ?>
                            <th class="">
                                <img src="<?php echo $imgurl; ?>" style="width:50px;height:50px;">
                                <br>
                                <!-- ขั้นตอนที่5 echo ออกมารูปในตาราง -->
                                <span style="color:black;">
                                    <?php echo $nickname;?> 
                                    <!-- แสดงชื่อที่ อัพเดท -->
                                </span>
                            </th>
                    <?php

                        }
                    } //ขั้นตอนสุดท้าย ปีกกาปิด if
                    ?>

                </tr>
            </thead>
            <tbody id="oil-table-body">
                <?php
                include 'function.php';
                // สร้างแถวข้อมูลราคาน้ำมันสำหรับแต่ละบริษัท
                foreach ($data_array as $brand => $Price) {
                    echo "<tr>";

                    echo "<td>" . convertBrandName($brand) . "</td>"; // ชื่อแบรนด์ในแนวตั้ง

                    // ตรวจสอบว่ามีข้อมูลราคาอยู่หรือไม่ หากไม่มีให้แสดง "-"
                    echo "<td>" . (isset($Price['ptt']) ? $Price['ptt'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['bcp']) ? $Price['bcp'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['shell']) ? $Price['shell'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['esso']) ? $Price['esso'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['caltex']) ? $Price['caltex'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['irpc']) ? $Price['irpc'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['pt']) ? $Price['pt'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['susco']) ? $Price['susco'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['pure']) ? $Price['pure'] : "-") . "</td>";
                    echo "<td>" . (isset($Price['susco_dealers']) ? $Price['susco_dealers'] : "-") . "</td>";

                    foreach ($data as $key => $values) {
                        if (is_array($values)) { // ตรวจสอบว่าค่า $values เป็น array หรือไม่
                            foreach ($values as $sessions => $subStation) {
                                if (is_array($subStation)) { // ตรวจสอบว่า $subStation เป็น array หรือไม่
                                    foreach ($subStation as $CompanyName => $l) {
                                        if (is_array($l)) { // ตรวจสอบว่า $l เป็น array หรือไม่
                                            foreach ($l as $detail) {
                                                echo $detail; // แสดงผลข้อมูล
                                            }
                                        } else {
                                            echo $l; // ถ้า $l ไม่ใช่ array แสดงผลตามปกติ
                                        }
                                    }
                                } else {
                                    echo "";
                                }
                            }
                        } else {
                            echo "";
                        }
                        break; // หยุดลูปหลังจากแสดงผลครั้งแรก (ถ้าจำเป็นต้องใช้)
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>