<!DOCTYPE html>
<html>

<head>
    <?php
    date_default_timezone_set("Asia/Bangkok");
    $date = date('d/m/Y');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 14px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            padding: 0;
            margin: 0;
        }

        .mobile-container {
            width: 100%;
            height: 500px;
            color: white;
            border-radius: 10px;
        }

        .topnav {
            overflow: hidden;

            position: relative;
        }

        .topnav #myLinks {
            position: fixed;
            /* เปลี่ยนเป็น fixed เพื่อให้เคลื่อนที่ได้ */
            top: 0;
            right: -1300px;
            /* เริ่มนอกหน้าจอ */
            width: 100%;
            /* กำหนดความกว้างของเมนู */
            height: 100%;
            /* ทำให้เมนูเต็มความสูงของหน้าจอ */
            background-color: black;
            /* สีพื้นหลังของเมนู */
            transition: right 0.8s ease;
            /* เอฟเฟกต์การสไลด์ */
        }

        .topnav #myLinks.show {
            right: 0;
            /* แสดงเมนูเมื่อมีคลาส 'show' */
        }

        .topnav a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }


        .topnav a.icon {
            background: black;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .active {
            color: white;
        }
    </style>

    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
</head>

<body>



    <!-- Simulate a smartphone / tablet -->
    <div class="mobile-container">

        <!-- Top Navigation Menu -->
        <div class="topnav bg-success bg-gradient">
            <a href="#home" class="active">หน้าแรก</a>
            <div id="myLinks">
                <a href="#news">หน้าแรก</a>
                <a href="#contact">ประวัติการตรวจสอบ</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>


        <div class="container-sm">
            <h4 style="font-size:14px" class="text-dark mt-1">รายการตรวจเช็คประจำวันที่ <?php echo $date ?></h4>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>รูป</th>
                        <th style="width:70px">ประเภท</th>
                        <th>หมายเลข</th>
                        <th>ชื่อ</th>

                        <th style="width:80px;">ตรวจสอบ</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://image.made-in-china.com/202f0j00DvCWcHpZknzw/Offshore-Nuclear-Power-Platform-Generating-Steam-Turbine.webp" style="width:60px; height:auto"></td>

                        <td>เครื่องจักร</td>
                        <td>A0001</td>
                        <td>เครื่องพ่นสี</td>
                        <td class=""><button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                เช็ค
                            </button>
                        </td>

                    </tr>
                </tbody>
            </table>

            <h4 style="font-size:14px" class="text-dark mt-1">รายการที่ตรวจเช็คแล้ว ปกติ</h4>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ประเภท</th>
                        <th>หมายเลข</th>
                        <th>ชื่อ</th>
                        <th>แก้ไข</th>
                        <th>สถานะ</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>เครื่องจักร</td>
                        <td>A0001</td>
                        <td>เครื่องพ่นสี</td>
                        <td class=""><button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                แก้ไข
                            </button>
                        </td>
                        <td class="text-success">ปกติ</td>

                    </tr>
                </tbody>
            </table>
        </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog text-dark modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">รายการตรวจเช็ค</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="">
                        <div class="modal-body modal-dialog-scrollable">
                            <div class="">
                                <label for="">1.เครื่องจักรไม่มีสนิมใช่หรือไม่</label>
                                <br>
                                <input type="Checkbox" value="ใช่">
                                <label for="">ใช่</label>
                                <input type="Checkbox" value="ไม่ใช่">
                                <label for="">ไม่ใช่</label>

                            </div>
                            <div class="">
                                <label for="">2.เครื่องจักรไม่มีรอยรั่วใช่หรือไม่</label>
                                <br>
                                <input type="Checkbox" value="ใช่">
                                <label for="">ใช่</label>
                                <input type="Checkbox" value="ไม่ใช่">
                                <label for="">ไม่ใช่</label>
                            </div>

                            <div class="">
                                <label for="">3.เครื่องจักรอยู่ในสภาพมั่นคง<br>ไม่เอนเอียงใช่หรือไม่</label>
                                <br>
                                <input type="Checkbox" value="ใช่">
                                <label for="">ใช่</label>
                                <input type="Checkbox" value="ไม่ใช่">
                                <label for="">ไม่ใช่</label>
                            </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sed laborum aut sequi officiis excepturi animi! Provident unde ipsam numquam?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End smartphone / tablet look -->
    </div>
    <script src="/CDN/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            x.classList.toggle("show"); // สลับคลาส 'show' เพื่อแสดง/ซ่อนเมนู
        }
    </script>

</body>

</html>