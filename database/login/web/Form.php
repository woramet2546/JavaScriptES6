<?php
$api = "./city.json";
$json = file_get_contents($api);
$data = json_decode($json, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>select by.devtai.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CDN -->
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <script src="/CDN/Jquery/ajax_Jquery.js"></script>
    <script src="/CDN/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: rgb(255, 197, 97);
            background: linear-gradient(90deg, rgba(255, 197, 97, 1) 0%, rgba(157, 255, 166, 1) 52%, rgba(110, 213, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <?php include 'Navbar.php'; ?>
    <div class="container d-flex justify-content-center mt-2">
        <div class="shadow p-3 rounded bg-light bg-gradient">
            <p class="alert alert-success">เลือกจังหวัด อำเภอ ตำบล (ในประเทศไทย) API</p>
            <form class="d-flex justify-content-center">
                <div class="form-group col-sm-10">
                    <label for="sel1">จังหวัด:</label>
                    <select class="form-control" name="Ref_prov_id" id="provinces">
                        <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                        <?php foreach ($data as $province) { ?>
                            <option value="<?= $province['id'] ?>"><?= $province['name_th'] ?></option>
                        <?php } ?>
                    </select>
                    <br>

                    <label for="sel1">อำเภอ:</label>
                    <select class="form-control" name="Ref_dist_id" id="amphures">
                    </select>
                    <br>

                    <label for="sel1">ตำบล:</label>
                    <select class="form-control" name="Ref_subdist_id" id="districts">
                    </select>
                    <br>

                    <label for="sel1">รหัสไปรษณีย์:</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control">
                    <br>
                    <a href="./Form.php" class="btn btn-success" id="test">บันทึกข้อมูล</a>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    document.getElementById('test').addEventListener('click', function(event) {
        event.preventDefault(); // ป้องกันการเปลี่ยนเส้นทางทันที

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
    });
</script>

</html>
<?php include('script.php'); ?>