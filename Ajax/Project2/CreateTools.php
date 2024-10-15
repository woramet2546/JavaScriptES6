<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/CDN/Font_Awesome/brands.min.css">
    <link rel="stylesheet" href="/CDN/Font_Awesome/fontawesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css">
    <link rel="stylesheet" href="/CDN/Font_Awesome/js_min.css">
</head>

<body>
    <div class="body d-flex">

        <?php include "./Menu/Navbar.php"; ?>

        <!-- กล่องฝั่งขวา -->
        <div class="container">
            <div class="custom shadow">
                <div class="box-1">
                    <i class="fa-solid fa-hammer logo"></i>

                    <p>รายการส่งซ่อม</p>
                </div>
            </div>

            <div class="bg-custom bg-light shadow">
                <div class="container d-flex justify-content-end mb-1">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                </div>
                <table class="table table-bordered">
                    <tr class="table-dark">
                        <th style="width: 5%;">รหัสงาน</th>
                        <th style="">วันที่ตรวจเช็ค</th>
                        <th style="width: 8%;">วันที่แก้ไข</th>
                        <th style="">รายละเอียดผู้ตรวจเช็ค</th>
                        <th style="width: 17%;">ข้อมูลอุปกรณ์</th>
                        <th style="width: 13%;">รายการตรวจเช็ค</th>
                        <th>สถานะ</th>
                    </tr>

                    <tr>
                        <!-- รหัส -->
                        <td>C0000001</td>
                        <!-- เริ่มเช็ค -->
                        <td>เริ่มเช็ค<br> 10/10/256715:30:00
                            <br>
                            เช็คเสร็จ<br>10/10/2567 16:30:00
                        </td>
                        <!-- แก้ไขล่าสุด -->
                        <td>แก้ไขล่าสุด<br>10/10/2567</td>
                        <!-- ผู้ตรวจเช็ค -->
                        <td>ผู้ตรวจ: วรเมธ ศรีสว่าง<br>
                            แผนก: ประกอบตู้BS<br>
                            ฝ่าย: ผลิตงานโลหะ<br>
                            โรงงาน: 2<br>
                            ติดต่อ: 0815509012
                        </td>
                        <!-- รายละเอียดอุปกรณ์ -->
                        <td>
                            ชื่อ : เครื่องพ่นสี<br>
                            ประเภท : อุปกรณ์<br>
                            รหัสประจำเครื่อง : B001<br>
                        </td>
                        <td>
                            <div class="container-s d-flex justify-content-center mt-1">
                                <a href="#" class="btn-detail">รายละเอียด</a>
                            </div>
                        </td>
                        <td>
                            <p class="text-custom">ปกติ</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <script src="/CDN/bootstrap5/js/bootstrap.bundle.min.js"></script>


    <!-- modal -->
    <?php include "modal.php"; ?>

    <script src="./js/script.js"></script>
</body>

</html>