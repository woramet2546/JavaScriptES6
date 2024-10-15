<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/CDN/Jquery/jquery.js"></script>
    <script src="/CDN/Jquery/ajax_Jquery.js"></script>
    <script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <form id="login">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit">submit</button>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>username</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>user</td>
                <td>123456</td>
            </tr>
            <tr>
                <td>admin</td>
                <td>123456</td>
            </tr>
        </tbody>
    </table>



    <script>
        $(document).ready(function() {
            $("#login").submit(function(parameter) {
                parameter.preventDefault();

                $.ajax({
                    method: "POST",
                    url: "back.php",
                    data: $(this).serialize(),
                    success: function(response) {

                        let data = JSON.parse(response);

                        if (data.success == 1) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "เข้าสู่ระบบสำเร็จ",
                                timer: 1500
                            }).then(() => {
                                window.location.href = "index.php";
                            })
                        } else {
                            Swal.fire({
                                position: "center",
                                title: "รหัสผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง",
                                icon: "error",
                                timer: 1500
                            })
                        }


                    }
                })
            })
        })
    </script>

</body>

</html>