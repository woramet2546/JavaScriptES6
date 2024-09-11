<?php
// ส่วนที่ใช้อ้างอิงข้อมูล
$api = "./city.json";
$json = file_get_contents($api);
$data = json_decode($json, true);
// ส่วนที่ใช้อ้างอิงข้อมูล


if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
    $id = $_POST['id'];
    // $sql = "SELECT * FROM amphures WHERE province_id='$id'";
    // $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
    foreach ($data as $provinces) {
        if ($provinces['id'] == $id) {
            foreach ($provinces['amphure'] as $amphure) {
                echo '<option value="' . $amphure['id'] . '">' . $amphure['name_th'] . '</option>';
            }
        }
    }
}

if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    // $sql = "SELECT * FROM districts WHERE amphure_id='$id'";
    // $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($data as $provinces) {
        foreach ($provinces['amphure'] as $amphure) {
            if ($amphure['id'] == $id) {
                foreach ($amphure['tambon'] as $tambon) {
                    echo '<option value="' . $tambon['id'] . '">' . $tambon['name_th'] . '</option>';
                }
            }
        }
    }
}

if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    // $sql = "SELECT * FROM districts WHERE id='$id'";
    // $query3 = mysqli_query($con, $sql);
    // $result = mysqli_fetch_assoc($query3);
    // echo $result['zip_code'];
    foreach ($data as $provinces) {
        foreach ($provinces['amphure'] as $amphure) {
            foreach ($amphure['tambon'] as $tambon) {
                if ($tambon['id'] == $id) {
                    echo $tambon['zip_code'];
                }
            }
        }
    }
}
