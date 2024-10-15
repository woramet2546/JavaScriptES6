<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหารูปภาพ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
        }

        .results {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>ค้นหารูปภาพ</h1>
    <form action="">
        <input type="text" id="keyword" name="img" placeholder="ค้นหา...">

        <div class="results" id="results"></div>
        <input type="submit" value="ส่ง">
    </form>

    <script>
        // ข้อมูลรูปภาพตัวอย่าง
        const images = [
            './image/แมว.png',
            'image/แมวน่ารัก.png',
            'image/สุนัข1.jpg',
            'image/แมว2.jpg',
            'image/ปลา.png',
            'image/กระต่าย.png'
        ];

        // ฟังก์ชันค้นหารูปภาพ
        function searchImages(keyword) {
            return images.filter(image => image.includes(keyword));
        }

        // จัดการกับการพิมพ์ในช่องค้นหา
        document.getElementById('keyword').addEventListener('input', function() {
            const keyword = this.value;
            const foundImages = searchImages(keyword);
            const resultsDiv = document.getElementById('results');

            // แสดงผลลัพธ์
            resultsDiv.innerHTML = ''; // ล้างผลลัพธ์ก่อนหน้า
            if (foundImages.length > 0) {
                resultsDiv.innerHTML = '<h2>พบรูปภาพ:</h2>';
                foundImages.forEach(image => {
                    const imgElement = document.createElement('img');
                    imgElement.src = image;
                    imgElement.alt = image;
                    imgElement.style.width = '150px'; // ปรับขนาดรูป
                    imgElement.style.marginRight = '10px';
                    resultsDiv.appendChild(imgElement);
                });
            } else {
                resultsDiv.innerHTML = '<p>ไม่พบรูปภาพที่ตรงกับชื่อที่ค้นหา</p>';
            }
        });
    </script>

</body>

</html>


<!-- ทำให้สามารถเลือก แล้วแสดงได้เลยไม่ต้อง submit -->
<!-- <form id="factoryForm">
    <label for="factory">เลือกโรงงาน:</label>
    <select id="factory" name="factory" onchange="checkFactory()">
        <option value="">-- กรุณาเลือก --</option>
        <option value="โรงงาน1">โรงงาน1</option>
        <option value="โรงงาน2">โรงงาน2</option>
        <option value="โรงงาน3">โรงงาน3</option>
        <option value="โรงงาน4">โรงงาน4</option>
    </select>

    <div id="includeSection" style="display: none;"></div>
</form>

<script>
    function checkFactory() {
        const factorySelect = document.getElementById('factory');
        const includeSection = document.getElementById('includeSection');
        includeSection.style.display = 'none'; // ซ่อนเนื้อหาก่อน

        if (factorySelect.value === 'โรงงาน1') {
            loadContent('a.php');
        } else if (factorySelect.value === 'โรงงาน2') {
            loadContent('d.php');
        } else {
            includeSection.innerHTML = ''; // หากไม่เลือกโรงงานให้ล้างเนื้อหา
        }
    }

    function loadContent(file) {
        const includeSection = document.getElementById('includeSection');
        includeSection.style.display = 'block'; // แสดงเนื้อหาหลังโหลด

        fetch(file)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                includeSection.innerHTML = data;
            })
            .catch(error => console.error('Error loading content:', error));
    }
</script> -->




<!-- <form id="conditionForm">
    <label>
        <input type="checkbox" name="condition" value="ดี" onchange="checkCondition()"> ดี
    </label><br>
    <label>
        <input type="checkbox" name="condition" value="ปานกลาง" onchange="checkCondition()"> ปานกลาง
    </label><br>
    <label>
        <input type="checkbox" name="condition" value="เสียหาย" onchange="checkCondition()"> เสียหาย
    </label><br>

    <div id="additionalInput" style="display: none;">
        <label for="de">โปรดระบุรายละเอียด:</label>
        <input type="text" name="de" id="de">
    </div>

    <input type="submit" value="ส่งข้อมูล">
</form> -->


<!-- เงื่อนไขเช็ค เสียหาย -->
<!-- <script>
    function checkCondition() {
        const checkboxes = document.querySelectorAll('input[name="condition"]');
        const additionalInput = document.getElementById('additionalInput');
        
        // ตรวจสอบว่า "เสียหาย" ถูกเลือกหรือไม่
        const isFaultyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked && checkbox.value === 'เสียหาย');

        // แสดงหรือซ่อน input ตามเงื่อนไข
        additionalInput.style.display = isFaultyChecked ? 'block' : 'none';
    }
</script> -->