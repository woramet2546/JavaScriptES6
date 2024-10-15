<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มคำนวณจำนวนครั้ง</title>
    <script>
        function calculateOccurrences() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            
            if (isNaN(startDate) || isNaN(endDate)) {
                document.getElementById('result').innerText = '';
                return;
            }

            // แปลงวันที่เป็นวันที่ 0:00 ของวัน
            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            const timeDifference = endDate - startDate; // คำนวณความต่างเวลา (milliseconds)
            const daysDifference = timeDifference / (1000 * 60 * 60 * 24); // แปลงเป็นวัน
            
            const occurrences = Math.floor(daysDifference); // แปลงเป็นจำนวนครั้ง
            
            document.getElementById('result').innerText = `จำนวนครั้ง: ${occurrences}`;
        }
    </script>
</head>
<body>
    <h1>คำนวณจำนวนครั้ง</h1>
    <label for="startDate">วันเริ่มต้น:</label>
    <input type="date" id="startDate" oninput="calculateOccurrences()" required>
    <br>
    <label for="endDate">วันสิ้นสุด:</label>
    <input type="date" id="endDate" oninput="calculateOccurrences()" required>
    <br>
    <p id="result"></p>
</body>
</html>
