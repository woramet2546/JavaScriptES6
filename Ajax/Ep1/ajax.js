document.getElementById("loadDataBtn").addEventListener("click", function() {
    
    // สร้าง XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // กำหนดสิ่งที่จะเกิดขึ้นเมื่อเซิร์ฟเวอร์ตอบกลับ
    xhttp.onreadystatechange = function() {
        // เช็คว่า request เสร็จสมบูรณ์และได้รับการตอบสนองจากเซิร์ฟเวอร์แล้ว (readyState 4 และ status 200)
        if (this.readyState == 4 && this.status == 200) {
            // แสดงผลข้อมูลที่ได้รับจากเซิร์ฟเวอร์
            document.getElementById("result").innerHTML = this.responseText;
        }
    };

    // สร้างการ request ไปยังเซิร์ฟเวอร์
    xhttp.open("GET", "server.php", true);
    // ส่ง request
    xhttp.send();
});
