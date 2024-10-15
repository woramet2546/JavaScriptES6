<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
</head>

<body>

    <button id="action-button">Ajax</button>
    <div id="info"></div>

    <!-- ขอบเขต Ajax -->
    <script src="/CDN/Jquery/ajax_Jquery.js"></script>
    <script src="/CDN/Sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        // $(document).ready(function() หมายความว่า ถ้า Document Object Model (DOM)
        //  พร้อมประมวลผล JavaScript แล้วจึงเข้าไปทำงานในโค้ดที่อยู่ในฟังก์ชัน ready ต่อไป
        $('#action-button').click(() => {
            $.ajax({
                // url ที่จะส่ง คำขอไป
                url: 'https://jsonplaceholder.typicode.com/users',
                data: {
                    format: 'json'
                },
                error() {
                    $('#info').html('<p>เกิดข้อผิดพลาดโปรลองใหม่อีกครั้ง</p>');
                },
                // 
                dataType: 'json',
                success(data) {
                    if (data) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "ดึงข้อมูลจาก API สำเร็จ",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                    // สร้างตัวแปรเก็บค่า ที่จะดึงจาก API 
                    let id = $('<p>').text(data[0].id)
                    let name = $('<p>').text(data[0].phone)
                    let username = $('<p>').text(data[0].username)
                    let description = $('<p>').text(data[0].name); 
                        // คำสั่งมีไว้สำหรับการแทรก Elements ไว้ภายในด้านล่าง Elements ที่ต้องการ
                        $('#info').append(id,name,username,description);
                        
                },
                type: 'GET'
            })
        })
    </script>
</body>

</html>
<?php


?>