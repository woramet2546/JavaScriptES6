<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <link rel="stylesheet" href="/boostrap5/cdn_boostrap5.css">
</head>

<body>
    <a href="insertForm_phpmyadmin.php" class="btn btn-success">เพิ่มข้อมูลพนักงาน</a>
    <div class="d-flex justify-content-center">
        <div class="row col-sm-12 ">
            <?php
            include 'Showdata_fetch_assoc.php';
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='col-sm-3 text-center'>"; // 6 คอลัมน์จาก 12 (ครึ่งหนึ่งของ row)
                echo "<div class='card mb-3'>"; // เพิ่ม mb-3 สำหรับ margin ล่าง
                echo  "<div class='card-body'>";
                //ส่วนหัว
                echo  "<p class='card-title'>" . $row['id'] . "</p>";
                echo "<img src='$'>";
                //ส่วนข้อความภายใน
                echo "<p class='card-text'>". $row['fname']."</p>";
                echo "<p class='card-text'>". $row['lname']."</p>";
                echo "<p class='card-text'>". $row['skill']."</p>";
                echo "<p class='card-text'>". $row['gender']."</p>";
                echo "<a href='#' class='btn btn-primary ms-1'>Read more</a>";
                echo "<a href='#' class='btn btn-warning ms-1'>Edit</a>";
                echo "<a href='#' class='btn btn-danger ms-1'>Delete</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>
