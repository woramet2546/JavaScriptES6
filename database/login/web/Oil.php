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
    <title>API Oil</title>
    <link rel="stylesheet" href="Oli.css">
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        * {
            font-family: "Sarabun", sans-serif;
            font-weight: 100;
            font-style: normal;
        } */

        .alert {
            margin: 0;
        }

        body {
            color: black;
        }

        .dt-column-order {
            color: black;
        }

        #dt-search-0,
        #example_info {
            color: white;
        }

        label {
            color: white;
        }

        nav {
            color: white;
        }
    </style>


</head>

<?php 
    include 'Navbar.php';
?>

<body class="bg-dark bg-gradient">
    <div class="container-sm">
        <?php
        // echo "<pre>";
        // print_r($data);
        // Associative array ที่เก็บ URL รูปภาพ
        $companyImages = [
            'ptt' => '/ProjectJs/img/ptt.png',
            'bcp' => '/ProjectJs/img/bangjak.png',
            'shell' => '/ProjectJs/img/shell.png',
            'esso' => '/ProjectJs/img/esso.png',
            'caltex' => '/ProjectJs/img/Caltex.png',
            'irpc' => '/ProjectJs/img/irpc.png',
            'pt' => '/ProjectJs/img/pt.png',
            'susco' => '/ProjectJs/img/susco.png',
            'pure' => '/ProjectJs/img/pure.png',
            'susco_dealers' => '/ProjectJs/img/susco.png'
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


        <table class="table table-bordered text-center bg-light bg-gradient" id="example">
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
                                    <?php echo $nickname; ?>
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
                                        fontSize: 18 // ขนาดฟอนต์ (สามารถเปลี่ยนแปลงตามความต้องการ)
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