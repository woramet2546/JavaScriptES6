<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="index.php">หน้าหลัก</a>
</body>
</html>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "employee";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "เชื่อมต่อ Database สำเร็จ";
  
?>