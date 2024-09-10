<html>

<head>
  <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
  <script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
  <script src="/CDN/Jquery/jquery.js"></script>
  <title>ThaiCreate.Com Tutorials</title>
  <style>
    .custom {
      height: 50px;
      padding-top: 10px;
    }

    body {
      padding-top: 10%;
      background: rgb(2, 0, 36);
      background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 183, 171, 1) 100%);
    }

    .alert {
      margin: 0;
    }

    #togglePassword {
      float: right;
      margin-left: -25px;
      margin-top: -30;
      right: 10px;
      position: relative;
      z-index: 2;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center">
    <form name="form1" method="POST" action="check_login.php" class="form-group shadow rounded pb-2 text-center bg-light">
      <p class="custom text-center bg-success bg-gradient text-light">Login</p>
      <table class="table">
        <tbody>
          <tr>
            <td>ชื่อผู้ใช้</td>
            <td>
              <input name="txtUsername" type="text" id="txtUsername" class="form-control">
            </td>
          </tr>
          <tr>
            <td>รหัสผ่าน</td>
            <td><input name="txtPassword" type="password" id="txtPassword" class="form-control">
              <i class="bi bi-eye-slash" id="togglePassword"></i>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="submit" name="Submit" value="Login" class="btn btn-success">
    </form>
   
    <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#txtPassword');
      togglePassword.addEventListener('click', (e) => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        e.target.classList.toggle('bi-eye');
      })
    </script>
    
  </div>
</body>

</html>