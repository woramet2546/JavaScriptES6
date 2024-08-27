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
            foreach ($value as $sesstion => $subSessions) {
                if (is_array($subSessions)) { // ตรวจสอบว่าตัวแปร $subSessions เป็น array
                    foreach ($subSessions as $CompanyName => $brand) {
                        if (is_array($brand)) { // ตรวจสอบว่าตัวแปร $brand เป็น array
                            foreach ($brand as $gas => $detail) {
                                if (is_array($detail) && isset($detail['price'])) { // ตรวจสอบว่า $detail เป็น array และมี key 'price'
                                    $data_array[$gas][$CompanyName] = $detail['price'];
                                } 
                            }
                        } 
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
    <style>
        .alert{
            margin: 0;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

<div class="alert alert-success d-flex justify-content-center align-items-center">
<h4 class="d-flex">ราคา ณ วันที่ ( 
    <p>
        <?php 
        foreach($data as $response => $Values){
            if(is_array($Values)){
            foreach($Values as $d =>$date){
                //การดักจับArray $d == "date
                if($d == "date"){
                    print_r($date);
                }

            }
            }
        }
?>
    </p>
)</h4>
</div>
 

    <table class="table text-center">
        <thead class="table-dark">
            <tr id="table-headers">
                <td></td>
                <?php

                
                foreach ($data as $key => $values) {
                    if(is_array($values)){
                        foreach ($value as $sesstions => $subSessions) {
                            if(is_array($subSessions)){
                                foreach ($subSessions as $CompanyName => $l){
                                    echo "<th>".htmlspecialchars($CompanyName)."</th>";
                                    //// ใช้ htmlspecialchars ป้องกันปัญหาด้านความปลอดภัย
                                }
                            }
                        }
                    }
                }

                // foreach ($data as $key => $values) {
                //     foreach ($values as $sesstions => $subSessions) {
                //         foreach ($subSessions as $CompanyName => $l) {
                //             echo "<th>" . $CompanyName . "</th>";
                //         }
                //     }
                // }

                ?>
            </tr>
        </thead>
        <tbody id="oil-table-body">
        <?php 
        include 'function.php';
        // สร้างแถวข้อมูลราคาน้ำมันสำหรับแต่ละบริษัท
        foreach($data_array as $brand => $Price){
            echo "<tr>";
            echo "<td>".convertBrandName($brand)."</td>"; // ชื่อแบรนด์ในแนวตั้ง

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
                    foreach ($values as $sessions => $subSessions) {
                        if (is_array($subSessions)) { // ตรวจสอบว่า $subSessions เป็น array หรือไม่
                            foreach ($subSessions as $CompanyName => $l) {
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

</body>

</html>