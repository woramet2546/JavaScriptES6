<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกพนักงาน</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1>เลือกพนักงาน</h1>
        <form action="testpost.php" method="POST" id="employee-form">
            <select class="form-select" id="employee-select" name="employees[]" multiple="multiple" data-placeholder="เลือกพนักงาน">
                <optgroup label="ฝ่ายการตลาด">
                    <option value="จันทร์ - การตลาด">จันทร์ - การตลาด</option>
                    <option value="เดือน - การตลาด">เดือน - การตลาด</option>
                </optgroup>
                <optgroup label="ฝ่ายการเงิน">
                    <option value="เงิน - การเงิน">เงิน - การเงิน</option>
                    <option value="สมบัติ - การเงิน">สมบัติ - การเงิน</option>
                </optgroup>
                <optgroup label="ฝ่ายทรัพยากรมนุษย์">
                    <option value="ดีใจ - ทรัพยากรมนุษย์">ดีใจ - ทรัพยากรมนุษย์</option>
                    <option value="มีสุข - ทรัพยากรมนุษย์">มีสุข - ทรัพยากรมนุษย์</option>
                </optgroup>
                <optgroup label="ฝ่าย IT">
                    <option value="ไอที - IT">ไอที - IT</option>
                    <option value="ปอง - IT">ปอง - IT</option>
                </optgroup>
                <optgroup label="ฝ่ายบริการลูกค้า">
                    <option value="ช่วยเหลือ - บริการลูกค้า">ช่วยเหลือ - บริการลูกค้า</option>
                    <option value="ปรึกษา - บริการลูกค้า">ปรึกษา - บริการลูกค้า</option>
                </optgroup>
            </select>
            <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#employee-select').select2({
                theme: "bootstrap-5",
                placeholder: "เลือกพนักงาน",
                allowClear: true
            });
        });
    </script>
</body>

</html>
