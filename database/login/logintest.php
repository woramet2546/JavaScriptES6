<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <script src="/CDN/Jquery/jquery.js"></script>

    <style>
        #togglePassword {
            float: right;
            margin-left: -25px;
            margin-top: -30;
            right: 10px;
            position: relative;
            z-index: 2;
        }

        .img {
            width: 40px;
            height: 40px;
        }

        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(0, 183, 171, 1) 100%);
            color: white;
            height: 100vh;
        }
    </style>

</head>

<body class="d-flex align-items-center">
    <div class="container d-flex justify-content-center">
        <div class="login-container shadow text-center col-sm-4 bg-dark bg-gradient p-3 custom rounded">
            <img src="/img/Login/user.png" class="img">
            <h2 class="">Login</h2>
            <form id="loginForm" class="mt-3">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="txtUsername" required class="form-control">
                </div>
                <div class="">
                    <label for="password" class="form-label">Password:</label>
                    <div class="input-group">
                        <input type="password" id="password" name="txtPassword" required class="form-control">
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="bi bi-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Login</button>

        </div>

        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password'); // แก้เป็น id ที่ถูกต้อง
            togglePassword.addEventListener('click', (e) => {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                e.target.classList.toggle('bi-eye');
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#loginForm').submit(function(e) {
                    e.preventDefault(); // ป้องกันการรีเฟรชหน้าเมื่อกด submit

                    let username = $('#username').val();
                    let password = $('#password').val();

                    $.ajax({
                        url: "check_logintest.php",
                        method: "POST",
                        data: {
                            txtUsername: username,
                            txtPassword: password
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.title,
                                    text: response.message,
                                    showConfirmButton: false,
                                });
                                setTimeout(() => {
                                    window.location.href = './web/index.php';
                                }, 2000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.title,
                                    text: response.message,
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'An error occurred',
                                text: 'Unable to process the request. Please try again.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                });
            });
        </script>
</body>

</html>