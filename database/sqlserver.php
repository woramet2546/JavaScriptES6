<?php
$dsn = "odbc:DSN=EmployeeDB_DSN"; // ใช้ชื่อ DSN ที่คุณตั้งไว้
$username = ""; // ชื่อผู้ใช้
$password = ""; // รหัสผ่าน

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
} catch (PDOException $e) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}
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
