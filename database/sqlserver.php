<?php
$dsn = "odbc:DSN=EmployeeDB_DSN"; // ใช้ชื่อ DSN ที่คุณตั้งไว้
$username = ""; // ชื่อผู้ใช้
$password = ""; // รหัสผ่าน

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p class='alert alert-success text-center'>"."เชื่อมต่อฐานข้อมูลสำเร็จ!<br>"."</p>";

    // // สร้าง SQL query เพื่อดึงข้อมูลจากตาราง Employee
    // $sql = "SELECT ID, Firstname, Lastname, Department FROM Employee";
    
    // // เตรียมและรันคำสั่ง SQL
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    
    // // ดึงข้อมูลและแสดงผล
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // if ($result) {
    //     echo "<table border='1'>";
    //     echo "<tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Department</th></tr>";
    //     foreach ($result as $row) {
    //         echo "<tr>";
    //         echo "<td>{$row['ID']}</td>";
    //         echo "<td>{$row['Firstname']}</td>";
    //         echo "<td>{$row['Lastname']}</td>";
    //         echo "<td>{$row['Department']}</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "ไม่มีข้อมูลในตาราง Employee";
    // }

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
    <a href="index.php" class="btn btn-secondary">PHP INFO</a>
</body>
</html>
