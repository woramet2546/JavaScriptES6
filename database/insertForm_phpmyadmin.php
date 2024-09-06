<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container block justify-contact-center col-sm-5">
        <div class="container">
            <h2 class="text-center">แบบฟอร์มบันทึกข้อมูล</h2>
            <form action="insertdata_phpmyadmin.php" method="POST" class="">
                <div class="form-group">
                    <label for="">ชื่อพนักงาน</label>
                    <input type="text" name="fname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">นามสกุล</label>
                    <input type="text" name="lname" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">ทักษะ/ความสามารถพิเศษ</label>
                    <textarea name="skill" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">เพศ</label>
                    <input type="radio" name="gender" value="male">ชาย
                    <input type="radio" name="gender" value="female">หญิง
                    <input type="radio" name="gender" value="other">อื่น ๆ
                </div>
                <br>
                
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                <input type="reset" value="ล้างข้อมูล" class="btn btn-warning">
                <a href="Show_Employee_myadmin_table.php" class="btn btn-primary">หน้าแรก</a>
            </form>
        </div>
    </div>

  
</body>

</html>