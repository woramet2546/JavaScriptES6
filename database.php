<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "employee";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die($conn->connect_error);
}


// Step 1
// เช็คค่าที่กรอกในฟอร์มหลังกด Submit
if (isset($_POST['submit']) && isset($_FILES['image'])) {
    // Step 2
    // tmp_name คือการสร้างไฟล์เก็บรูปภาพชั่วคราว
    $targetDir = "image/";
    $target_main = "http://localhost/projectjs/image/";
    $fileName = basename($_FILES["image"]["name"]);
    $filemain = $targetDir.$fileName;
    $file_main = $target_main.$fileName;

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Step 4 คำสั่งในการเพิ่ม SQL ? คือค่าตัวแรก $imageS ตามจำนวน ฟิลด์
    $sql = "INSERT INTO file(image) VALUES(?)";
    // Step 5 prepare เป็นการตรวจสอบข้อความก่อนส่งไป SQL
    $statement = $conn->prepare($sql);
    // Step 6 เมื่อเรียกใช้ bind_param() จะทำการผูกค่าจากตัวแปร $imageS 
    // กับพารามิเตอร์ใน SQL statement ที่ใช้เครื่องหมาย ?
    $statement->bind_param('s', $file_main);
    // Step 7 ฟังก์ชันนี้จะทำการรัน SQL ที่เตรียมไว้ ซึ่งอาจจะเป็น
    //  INSERT, UPDATE, DELETE, หรือ SELECT และคืนค่าเป็น true
    $execute_result = $statement->execute();
    
    // Step 8 สร้างเงื่อนไขเพื่อเช็ค ว่าสำเร็จหรือไม่
    if($execute_result){
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$filemain)){
            echo "Image uploaded successfully : $file_main";
            header("location:file.php");
        } 
    }else{
        echo "Image uploaded failed";
    }
}
} else {
    echo "Please select an image file to upload";
}
// สิ้นสุดเงื่อนไข
$conn->close();
