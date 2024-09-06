<?php
    include 'insert.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/boostrap5/cdn_boostrap5.css">
</head>
<body>
    <a href="showEmployee.php">กลับหน้าหลัก</a>
    <div class="container-sm d-flex justify-content-center">
        <!-- ฟอร์มสำหรับกรอกข้อมูลและอัปโหลดไฟล์ -->
        <form method="POST" action="" enctype="multipart/form-data" class="col-sm-4">
            Firstname: <input type="text" name="Firstname" required class="form-control"><br>
            Lastname: <input type="text" name="Lastname" required class="form-control"><br>
            Department: <input type="text" name="Department" required class="form-control"><br>
            IMG: <input type="file" name="IMG" class="form-control"><br> <!-- เพิ่มฟิลด์สำหรับอัปโหลดไฟล์ -->
            <input type="submit" value="Insert" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
