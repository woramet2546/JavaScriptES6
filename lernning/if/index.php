<?php
include "./session.php";
include "./ShoppingCart/databaseShop.php";

if (!empty($_GET['id'])) {
    $query_product = mysqli_query($conn, "SELECT * FROM products WHERE id='{$_GET['id']}';");
    $row_product = mysqli_num_rows($query_product);
    $result = mysqli_fetch_assoc($query_product);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <script src="/CDN/bootstrap5/js/bootstrap.bundle.min.js"></script>

    <script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/CDN/Jquery/jquery.js"></script>
    <script src="/CDN/Jquery/ajax_Jquery.js"></script>
    <!-- <link rel="stylesheet" href="/CDN/Font_Awesome/fontawesome_min.css">
    <link rel="stylesheet" href="/CDN/Font_Awesome/brands.min.css">        
    <link rel="stylesheet" href="/CDN/Font_Awesome/solid.min.css">         -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css" integrity="sha512-EJp8vMVhYl7tBFE2rgNGb//drnr1+6XKMvTyamMS34YwOEFohhWkGq13tPWnK0FbjSS6D8YoA3n3bZmb3KiUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css" integrity="sha512-/r+0SvLvMMSIf41xiuy19aNkXxI+3zb/BN8K9lnDDWI09VM0dwgTMzK7Qi5vv5macJ3VH4XZXr60ip7v13QnmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "./menu/menu.php"; ?>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-8 col-sm-12 shadow p-3 rounded">
                <!-- form -->
                <form id="add_product" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="product_name" class="form-label">ชื่อสินค้า</label>
                            <input type="text" name="product_name" class="form-control" required placeholder="กรุณากรอกชื่อสินค้า">
                        </div>

                        <div class="col-sm-6">
                            <label for="price" class="form-label">ราคา</label>
                            <input type="number" name="price" class="form-control" required placeholder="กรุณากรอกราคา" min="0" step="0.01">
                        </div>

                        <div class="col-sm-6">
                            <label for="profile_image" class="form-label">รูปภาพ</label>
                            <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="detail" class="form-label">รายละเอียด</label>
                            <textarea name="detail" class="form-control" required placeholder="กรุณากรอกรายละเอียด"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="fa-regular fa-floppy-disk me-1"></i>
                        ส่งข้อมูล
                    </button>
                </form>


            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <div class="col-sm-9">

                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width:150px;">image</th>
                            <th>product_name</th>
                            <th style="width:100px;">price</th>
                            <th>detail</th>
                            <th style="width:245px;">Other</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include "Select_Shop.php";
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <tr>

                                <td>
                                    <?php if (!empty($row['profile_image'])): ?>
                                        <img src="/ProjectJs/lernning/if/upload_image/<?php echo $row['profile_image']; ?>" style="width:150px; height:100px;">
                                    <?php else: ?>
                                        <img src="https://service.sarawak.gov.my/web/web/web/web/res/no_image.png" style="width:150px; height:100px;">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo number_format($row['price'], 2); ?></td>

                                <td><?php echo $row['detail'] ?></td>
                                <td class="">
                                    <a id="confirm" href="product-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>ลบข้อมูล</a>
                                    <a href="product-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square me-1"></i>แก้ไขข้อมูล</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script>
        function name(e){
           e.preventDefault();
            $("#confirm").submit(function(con) {
                con.preventDefault(); // ป้องกันการส่งฟอร์มแบบปกติ

                $.ajax({
                    url: "product-delete.php",
                    method: "GET",
                    data: $(this).serialize(),
                    success: function(conn) {
                        let json = JSON.parse(conn); // แปลงการตอบกลับเป็น JSON
                        if (json.isConfirmed == 1) {
                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                }
                            });

                        } else {
                            Swal.fire({
                                title: "เกิดข้อผิดพลาด",
                                text: json.message,
                                icon: "error"
                            });
                        }
                    },
                });
            });
  
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#add_product").submit(function(event) {
                event.preventDefault(); // ป้องกันการส่งฟอร์มแบบปกติ

                $.ajax({
                    url: "product_from.php", // URL ที่จะส่งข้อมูลไป
                    method: "POST", // วิธีการส่งข้อมูล
                    data: new FormData(this), // ใช้ FormData เพื่อรวมข้อมูลและไฟล์
                    contentType: false, // ปิดการตั้งค่า contentType
                    processData: false, // ปิดการแปลงข้อมูล
                    success: function(response) {
                        let json = JSON.parse(response); // แปลงการตอบกลับเป็น JSON
                        if (json.success == 1) {
                            Swal.fire({
                                title: "บันทึกข้อมูลสำเร็จ",
                                icon: "success",
                                timer: 1500,
                                position: "center"
                            }).then(() => {
                                window.location.href = "index.php";
                            })

                        } else {
                            Swal.fire({
                                title: "เกิดข้อผิดพลาด",
                                text: json.message,
                                icon: "error"
                            });
                        }
                    },
                });
            });
        });
        // 

    </script>


</html>