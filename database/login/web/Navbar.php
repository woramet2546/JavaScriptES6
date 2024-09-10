<?php include '../check_login.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">เปลี่ยนสกุลเงิน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Weather.php">ตรวจสภาพอากาศ</a>
      </li>

      <?php
      // ตรวจสอบว่าเป็น ADMIN หรือไม่
      if ($_SESSION["Status"] == "ADMIN") {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="Gold.php">ราคาทอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Oil.php">เช็คราคาน้ำมัน</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="bitcoin.php">ราคาเหรียญBTC</a>
        </li>
      <?php } // สิ้นสุดการตรวจสอบสถานะ ADMIN 
      ?>
      <li class="nav-item btn btn-danger">
        <a class="text-light" href="/ProjectJs/database/login/logintest.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>