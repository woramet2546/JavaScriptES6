<?php
include "./database/dbconnect.php";
date_default_timezone_set("Asia/Bangkok");
$date = date('d-m-Y H:i:s');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/CDN/Font_Awesome/brands.min.css">
    <link rel="stylesheet" href="/CDN/Font_Awesome/fontawesome_min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css">
    <link rel="stylesheet" href="/CDN/Font_Awesome/js_min.css">
    <!--  -->
</head>

<body>
    <?php include "./Menu/menu.php"; ?>
    <div class="container-custom">
        <div class="Navbar-custom w-auto justify-content-center p-3">
            <p>จำนวนที่กำลังใช้งาน</p>
            <ul class="">
                <li class="item-box bg-dark ms-5" style="width:200px">WEBVIEW = ?</li>
                <li class="item-box bg-success ms-5" style="width:200px">UPLOADFILE = ?</li>
                <li class="item-box bg-danger ms-5" style="width:200px">TOWEB = ?</li>
            </ul>
        </div>


        <!-- MODAL Upload -->
        <?php include "./database/select2.php"; ?>
        <div class="container-head mt-4">
            <div class="container-customer col-sm-12 px-4">
                <h4 class="text-secondary">Banner</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Upload
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- body -->
                            <div class="modal-body">
                                <form action="./database/insert.php" method="post" id="myForm" enctype="multipart/form-data" class="row g-3">
                                    <div class="form-group col-sm-6">
                                        <!-- Upload -->
                                        <label for="" class="form-label">ชื่อ(Branner)</label>
                                        <input type="text" name="name" id="name_re" class="form-control">
                                    </div>

                                    <!-- Upload -->
                                    <div class="form-group col-sm-3">
                                        <label for="" class="form-label">เวลาที่อัพโหลด</label>
                                        <input type="text" name="date" id="date_re" class="form-control" value="<?php echo $date; ?>">
                                    </div>

                                    <!-- Upload -->
                                    <div class="form-group col-sm-3">
                                        <label for="" class="form-label">สิ้นสุดวันที่</label>
                                        <input type="datetime-local" id="datetime" name="datetime" class="form-control">
                                    </div>

                                    <!-- Upload -->
                                    <div class="form-group col-sm-6">
                                        <label for="image" class="form-label">เลือกภาพ:จากไฟล์</label>
                                        <input class="form-control" type="file" id="file" name="file" accept="image/gif, image/jpeg, image/jpg, image/png" required>
                                        <img src="" id="preview" style="display:none; max-width:100%; height:auto" class="mt-3">
                                    </div>

                                    <!-- Upload -->
                                    <div class="col-sm-6">
                                        <label for="imageURLG" class="form-label">เลือกภาพ: URL</label>
                                        <input type="text" id="imageURLG" name="image_url" class="form-control">
                                        <img id="imageG" src="" style="display:none; width:100%; height:auto" class="mt-3">
                                    </div>

                                    <!-- Upload -->
                                    <div class="col-sm-6">
                                        <label for="" class="form-label">ลักษณะ</label>
                                        <select name="work" id="work" class="form-control">
                                            <?php
                                            $sql = "SELECT * FROM work";
                                            $result3 = $conn->query($sql);
                                            foreach ($result3 as $row3) { ?>
                                                <option value="<?php echo $row3['work'] ?>"><?php echo $row3['work'] ?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Upload -->
                                    <div class="form-group col-sm-6">
                                        <label for="" class="form-label">กำหนดสิทธิ์มองเห็น</label>
                                        <select class="form-control" name="status_employee" style="width: 200px;">
                                            <?php
                                            if ($result2->num_rows > 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row2['status_employee']; ?>"><?php echo $row2['status_employee']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <!-- Upload -->
                                    <div class="form-check form-switch form-switch-sm col-sm-6 ms-2">
                                        <label class="form-check-label fst-normal text-body" for="toggleSwitch">เปิด/เปิดการทำงาน ปิดข้อมูล/หยุดการทำงาน</label>
                                        <input class="form-check-input" type="checkbox" id="status" name="toggleSwitch">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Accept" name="submit" class="btn btn-success">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Upload -->

        <!-- container table -->
        <div class="container d-flex justify-content-center">
            <div class="container-custom-to">
                <div class="d-flex justify-content-between align-items-center pb-2">
                    <h5>Banner</h5>
                    <div class="input-with-icon">
                        <form method="GET" action="">
                            <select name="statusFilter" id="statusFilter" class="form-control">
                                <option value="">เลือกสถานะ</option>
                                <?php
                                $sql = "SELECT * FROM status_employee";
                                $result = $conn->query($sql);
                                foreach ($result as $row) {
                                ?>
                                    <option value="<?php echo $row['status_employee'] ?>"><?php echo $row['status_employee'] ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-primary">กรอง</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive row">
                    <!-- Table -->
                    <table class="table table-hover table-bordered">
                        <thead class="">

                            <tr>
                                <th style="width: 150px;">Banner</th>
                                <th style="width: 80px;">ลำดับ</th>
                                <th>แก้ไข(ล่าสุด)</th>
                                <th style="width: 100px;">อัปเดต(ล่าสุด)</th>
                                <th>ผู้ใช้งาน</th>
                                <th>ลักษณะ</th>
                                <th style="width: 80px;">สถานะ</th>
                                <th style="text-align: start; width:120px">จัดการข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $statusFilter = isset($_GET['statusFilter']) ? $_GET['statusFilter'] : '';

                            $statusFilter = isset($_GET['statusFilter']) ? $_GET['statusFilter'] : '';

                            // สร้างคำสั่ง SQL
                            $sql = "SELECT * FROM employee";
                            if ($statusFilter) {
                                $sql .= " WHERE status_employee = '" . $conn->real_escape_string($statusFilter) . "'";
                            }

                            // ทำการ query
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("Query failed: " . $conn->error);
                            }

                            // แสดงผลลัพธ์
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td class="name-container">
                                        <?php echo $row['name'] ?>
                                        <img src="<?php echo $row['image'] ?>" class="img-in-table">
                                    </td>
                                    <td>
                                        <div class="form-group d-flex">
                                            <a href="" class="">
                                                <i class="fa-solid fa-floppy-disk fs-3"></i>
                                            </a>
                                            <input type="text" class="form-control" style="width: 40px;" value="">
                                        </div>
                                    </td>
                                    <td>ชื่อ Userที่Edit</td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['status_employee'] ?></td>
                                    <td><?php echo $row['work'] ?></td>
                                    <td class="icon text-center">
                                        <?php if ($row['status'] == 1) { ?>
                                            <img src="/ProjectJs/containerIMG/poweron.png" class="img">
                                            <p>ทำงาน</p>
                                        <?php } else { ?>
                                            <img src="/ProjectJs/containerIMG/poweroff.png" class="img">
                                            <p>หยุดทำงาน</p>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                ตัวเลือก <i class="fa-solid fa-bars"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark text-center">
                                                <button type="button" class="btn btn-dark edit-btn dropdown-item"
                                                    data-id="<?php echo $row['id']; ?>"
                                                    data-name="<?php echo $row['name']; ?>"
                                                    data-date="<?php echo $row['date']; ?>"
                                                    data-image="<?php echo $row['image']; ?>"
                                                    data-work="<?php echo $row['work']; ?>"
                                                    data-status_employee="<?php echo $row['status_employee']; ?>"
                                                    data-status="<?php echo $row['status']; ?>"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalToggle">แก้ไขข้อมูล</button>

                                                <?php if ($row['status'] == 1) { ?>
                                                    <a href="./database/Stop.php?id=<?php echo $row['id']; ?>" class="dropdown-item">ปิดใช้งาน</a>
                                                <?php } else { ?>
                                                    <a href="./database/Start.php?id=<?php echo $row['id']; ?>" class="dropdown-item">เปิดใช้งาน</a>
                                                <?php } ?>
                                                <a href="#?id=<?php echo $row['id']; ?>" class="dropdown-item delete-button"
                                                    data-id="<?php echo $row['id']; ?>">ลบข้อมูล</a>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- MODAL Edit -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-xl row text-start">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <!-- Form ส่งค่าไปที่ get_data.php -->
                    <form action="./database/get_data.php" method="post" id="editForm" enctype="multipart/form-data" class="row">
                        <div class="form-group col-sm-6">
                            <input type="hidden" id="id" name="id">
                            <!-- Edit -->
                            <label for="name" class="form-label">ชื่อ (Banner)</label>
                            <input type="text" id="name" name="nameEdit" class="form-control" required>
                        </div>

                        <!-- Edit -->
                        <div class="form-group col-sm-6">
                            <label for="date" class="form-label">ตั้งเวลา</label>
                            <input type="text" name="dateEdit" class="form-control" value="<?php echo $date; ?>" required>
                        </div>

                        <!-- Edit -->
                        <div class="form-group col-sm-6 mt-1">
                            <label for="file" class="form-label">เลือกภาพ: จากไฟล์</label>

                            <input class="form-control" type="file" id="file" name="fileEdit" accept="image/gif, image/jpeg, image/png">
                            <img src="" id="image" style="width:100%; height:300px" class="mt-3">
                            <P class="mt-1"><span class="fw-bold">โปรดทราบ : </span>อนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG, PNG และ GIF เท่านั้น</P>
                        </div>

                        <!-- Edit -->
                        <div class="form-group col-sm-6 mt-1">
                            <label for="imageURL" class="form-label">เลือกภาพ: URL</label>
                            <input type="text" id="imageURL" name="imageURLEdit" class="form-control">
                        </div>

                        <!-- Edit -->
                        <div class="col-sm-6 mt-2">
                            <label for="" class="form-label">ลักษณะ</label>
                            <select id="workEdit" name="workEdit" class="form-control">
                                <?php
                                $sql = "SELECT * FROM work";
                                $result3 = $conn->query($sql);
                                foreach ($result3 as $row3) { ?>
                                    <option value="<?php echo $row3['work'] ?>"><?php echo $row3['work'] ?></option>
                                <?php   }   ?>
                            </select>
                        </div>


                        <!-- Edit -->
                        <div class="form-group col-sm-6 mt-2">
                            <label for="" class="form-label">กำหนดสิทธิ์มองเห็น</label>
                            <select class="form-control" name="status_employee" id="status_employee" style="width: 200px;">
                                <?php $sql = "SELECT * FROM status_employee";
                                $result2 = $conn->query($sql);
                                foreach ($result2 as $row2) {
                                    $statusEm = $row2['status_employee']
                                ?>

                                    <option value="<?php echo $statusEm ?>"><?php echo $statusEm ?></option>

                                <?php    } ?>
                            </select>

                        </div>

                        <!-- Edit -->
                        <div class="form-check form-switch form-switch-sm col-sm-6 ms-2">
                            <label class="form-check-label fst-normal text-body" for="status">เปิด/ปิดการทำงาน</label>
                            <!-- เรียกใช้ status วิธีแก้ไข เพิ่ม Class status-->
                            <input class="form-check-input status" type="checkbox" id="status" name="toggleSwitch" value="">
                        </div>




                        <div class=" modal-footer">
                            <label for="" class="form-label">อัพเดทล่าสุดเมื่อ</label>
                            <div class="form-group col-sm-2">
                                <input type="text" id="date" class="form-control col-sm-3 text-center" disabled>
                            </div>
                            <input type="submit" value="Accept" name="submit" class="btn btn-success">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
    <!-- สิ้นสุด -->

    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <!-- ขอบเขตEdit -->

                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <!-- จุด 3 -->

</body>
<!-- CDN ที่จำเป็น -->
<script src="/CDN/bootstrap5/js/bootstrap.min.js"></script>
<script src="/CDN/bootstrap5/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="./Js/script.js"></script>

<script>
    $(document).ready(function() {
        // function Reset Value in FORM
        $('#exampleModal').on('hidden.bs.modal', function() {
            window.location.href = 'index.php'; // รีไดเร็กไปที่ index.php
        });

        $(document).on('click', '.edit-btn', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const date = $(this).data('date');
            const image = $(this).data('image');
            const work = $(this).data('work');
            const status_employee = $(this).data('status_employee');
            const status = $(this).data('status');


            // $('#status').trigger('change'); // กระตุ้นเหตุการณ์ change

            console.log(name, date, image, work, status_employee, status);
            // ตั้งค่าในฟิลด์ต่าง ๆ

            $('#id').val(id);
            $('#name').val(name);
            $('#date').val(date);
            $('#name_img').val(image);
            $('#image').attr("src", image); // แสดงรูปภาพเก่า
            $('#workEdit').val(work);
            $('#status_employee').val(status_employee);

            console.log(typeof(status));
            console.log();

            // วิธีแก้ไข เปลี่ยนจาก ID #status เป็น Class .status
            if (status == 1) {
                $('.status').prop('checked', true);
            } else {
                $('.status').prop('checked', false);
            }

            // ตั้งค่าให้ checkbox checked หรือไม่
            if ($('#status').is(':checked')) {
                console.log("Checkbox is checked."); // ถ้าเช็ค
            } else {
                console.log("Checkbox is unchecked."); // ถ้าไม่เช็ค
            }




            // ล้างค่า input file และ image URL
            $('#file').val(''); // ล้าง input file
            $('#imageURL').val(''); // ล้าง input สำหรับ URL ของภาพ

        });



        $(document).on('change', '#file', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result); // แสดงตัวอย่างรูปภาพใหม่
                }
                reader.readAsDataURL(file);
            }
        });

        // หากมีการอัปโหลดจาก URL
        $('#imageURL').on('input', function() {
            const url = $(this).val();
            if (url) {
                $('#image').attr('src', url); // แสดงรูปภาพจาก URL
            }
        });
    });
</script>

<script>
    const fileInput = document.getElementById('file');
    const imageURLInput = document.getElementById('imageURL');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            imageURLInput.disabled = true; // ปิดช่อง URL
        } else {
            imageURLInput.disabled = false; // เปิดช่อง URL
        }
    });

    imageURLInput.addEventListener('input', function() {
        if (imageURLInput.value) {
            fileInput.disabled = true; // ปิดช่องไฟล์
        } else {
            fileInput.disabled = false; // เปิดช่องไฟล์
        }
    });
</script>

<script>
    $(document).on('click', '.delete-button', function(event) {
        event.preventDefault(); // ป้องกันการทำงานของลิงก์

        const id = $(this).data('id'); // ดึงค่า id จาก attribute data-id
        const url = `./database/delete.php?id=${id}`; // สร้าง URL สำหรับลบข้อมูล

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#39cb27",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ไปยัง delete.php
                window.location.href = url; // เปลี่ยนเส้นทางไปยัง delete.php
            }
        });
    });
</script>

<!-- Edit -->
<script>
    $(document).on('change', '#file', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result); // แสดงตัวอย่างรูปภาพ
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<script>
    $(document).ready(function() {
        // ฟังก์ชันเพื่อเปิด/ปิดฟิลด์ตามค่าที่มีอยู่
        function toggleFields() {
            const fileInput = $('#file').val();
            const imageURLInput = $('#imageURLG').val();

            if (fileInput) {
                $('#imageURLG').prop('disabled', true); // ปิดการใช้งาน URL input
            } else {
                $('#imageURLG').prop('disabled', false); // เปิดการใช้งาน URL input
            }

            if (imageURLInput) {
                $('#file').prop('disabled', true); // ปิดการใช้งาน file input
            } else {
                $('#file').prop('disabled', false); // เปิดการใช้งาน file input
            }
        }

        // ตรวจสอบค่าเมื่อมีการเปลี่ยนแปลงในฟิลด์
        $('#file').on('change', function() {
            toggleFields();
        });

        $('#imageURLG').on('input', function() {
            toggleFields();
        });

        // เรียกฟังก์ชันเพื่อกำหนดสถานะเริ่มต้น
        toggleFields();
    });
</script>

</html>