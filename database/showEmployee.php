<?php
$dsn = "odbc:DSN=EmployeeDB_DSN"; // ใช้ชื่อ DSN ที่คุณตั้งไว้
$username = ""; // ชื่อผู้ใช้
$password = ""; // รหัสผ่าน

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // สร้าง SQL query เพื่อดึงข้อมูลจากตาราง Employee
    $sql = "SELECT ID, Firstname, Lastname, Department FROM Employee";

    // เตรียมและรันคำสั่ง SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // ดึงข้อมูลและแสดงผล
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}

// ปิดการเชื่อมต่อ
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="conatainer d-flex">
        <!-- ดึงเอาไฟล์ Slidebar.php มาโชว์ในไฟล์นี้ -->
    <?php  include 'Slidebar.php';?>
    <div class="">
        <a href='show_insert.php'>เพิ่มข้อมูลพนักงาน</a>
           


    <div class="card-container" style="display: flex; flex-wrap: wrap;">
<?php
    if ($result) {
    $order = 1; // เริ่มต้นค่าลำดับ
    foreach ($result as $row) {
        echo "<div class='card' style='border: 1px solid #ddd; padding: 15px; margin: 10px; width: 200px; text-align: center;'>";
        
        // รูปภาพที่ใช้ในแต่ละการ์ด
        echo "<img src='path_to_image/{$row['ID']}.jpg' alt='Profile Picture' style='width: 100%; height: auto;'>";
        echo "<p>ID: {$row['ID']}</p>";

        // ข้อมูลจากแต่ละแถวที่ต้องการแสดงในรูปแบบแท็ก <P>
        echo "<p><strong>ลำดับ: </strong>{$order}</p>";
        echo "<p><strong>ชื่อ: </strong>{$row['Firstname']}</p>";
        echo "<p><strong>นามสกุล: </strong>{$row['Lastname']}</p>";
        echo "<p><strong>แผนก: </strong>{$row['Department']}</p>";
        
        // ลิงก์สำหรับการลบข้อมูล
        echo "<a href='Delete.php?id=" . $row['ID'] . "' style='color: red;'>ลบข้อมูล</a>";
        
        echo "</div>";
        
        $order++; // เพิ่มค่า $order ขึ้นทีละ 1
    }
   


} else {
    echo "ไม่มีข้อมูลในตาราง Employee";
}

            ?>
            </div>

    </div>


    </div>
</body>

</html>