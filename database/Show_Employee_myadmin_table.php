<?php
include 'Showdata_fetch_assoc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลพนักงาน</title>
  <link rel="stylesheet" href="/boostrap5/cdn_boostrap5.css">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body class="d-flex">
  <?php
  include 'Slidebar.php';
  ?>
  <div class="container">
    <a href="insertForm_phpmyadmin.php" class="btn btn-success mb-2">เพิ่มข้อมูลพนักงาน</a>
    <input type="text" class="form-control mb-2 w-25" value="">
    <div class="">
      <table class="table text-center border">
        <thead class="table-dark">
          <tr>
            <th style="width:10%;">รหัสพนักงาน</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ทักษะ/ความสามารถ</th>
            <th>เพศ</th>
            <th>ลบข้อมูลพนักงาน</th>
          </tr>
        </thead>
        <tbody>

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['lname']; ?></td>
              <td><?php echo $row['skill']; ?></td>

              <td>
                <?php
                if ($row['gender'] == "male") { ?>
                  ชาย
                <?php } elseif ($row['gender'] == "female") { ?>
                  หญิง
                <?php } else {?>
                  อื่น ๆ
                <?php }?>
              </td>
              <td>
                <a href="delete_phpmyadmin.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">ลบข้อมูล</a>
              </td>
            </tr>
        </tbody>
      <?php
          }
      ?>
      </table>

    </div>
  </div>


</body>

</html>