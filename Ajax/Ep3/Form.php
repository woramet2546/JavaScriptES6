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
</head>

<body>
    <div class="container">
        <h2>Form control: select by.devtai.com</h2>
        <p>code เลือกจังหวัด อำเภอ ตำบล php + mysqli + ajax + jquery + bootstrap :</p>
        <form>
            <div class="form-group">
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
                <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php include('script.php'); ?>