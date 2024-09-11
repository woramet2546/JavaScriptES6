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

        <li class="nav-item">
          <a class="nav-link" href="bitcoin.php">ราคาเหรียญ BTC</a>
        </li>

      <?php } // สิ้นสุดการตรวจสอบสถานะ ADMIN 
      ?>
      <li class="nav-item">
        <a class="nav-link" href="Form.php">Api เลือกจังหวัด</a>
      </li>

      <li class="nav-item">
        <a class="btn btn-danger text-light" href="../logout.php" id="logoutBtn">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
  document.getElementById('logoutBtn').addEventListener('click', function(event) {
    event.preventDefault(); // ป้องกันการเปลี่ยนเส้นทางทันที

    Swal.fire({
      title: 'คุณแน่ใจหรือไม่?',
      text: "คุณจะออกจากระบบ!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่, ออกจากระบบ!',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '../logout.php'; // เปลี่ยนเส้นทางไปยังไฟล์ logout.php
      }
    });
  });
</script>