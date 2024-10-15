<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มคำนวณจำนวนครั้ง</title>
    <script>
        let occurrences = 0;
        let intervalId = null;

        function calculateOccurrences() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            
            if (isNaN(startDate) || isNaN(endDate)) {
                document.getElementById('result').innerText = '';
                return;
            }

            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            const timeDifference = endDate - startDate;
            const daysDifference = timeDifference / (1000 * 60 * 60 * 24);
            
            occurrences = Math.floor(daysDifference);
            document.getElementById('result').innerText = `จำนวนครั้ง: ${occurrences}`;
            clearInterval(intervalId); // หยุดการทำงานที่มีอยู่แล้ว
        }

        function startSendingMessages() {
            if (occurrences <= 0) {
                document.getElementById('resultMessages').innerHTML = '';
                return;
            }

            let currentCount = 0;

            const hours = parseInt(document.getElementById('hours').value) || 0;
            const minutes = parseInt(document.getElementById('minutes').value) || 0;
            const seconds = parseInt(document.getElementById('seconds').value) || 0;

            const totalInterval = (hours * 3600 + minutes * 60 + seconds) * 1000; // แปลงเป็น milliseconds

            intervalId = setInterval(() => {
                if (currentCount < occurrences) {
                    const message = document.createElement('p');
                    message.textContent = `ส่งข้อความครั้งที่ ${currentCount + 1}`;
                    document.getElementById('resultMessages').appendChild(message);
                    currentCount++;
                } else {
                    clearInterval(intervalId); // หยุดการส่งข้อความเมื่อครบจำนวนครั้ง
                }
            }, totalInterval); // ส่งข้อความตามเวลาที่กำหนด
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
    
    <h2>กำหนดเวลาส่งข้อความ</h2>
    <label for="hours">ชั่วโมง:</label>
    <input type="number" id="hours" value="0">
    <br>
    <label for="minutes">นาที:</label>
    <input type="number" id="minutes" value="0">
    <br>
    <label for="seconds">วินาที:</label>
    <input type="number" id="seconds" value="0">
    <br>

    <p id="result"></p>
    <button onclick="startSendingMessages()">เริ่มส่งข้อความ</button>
    <div id="resultMessages"></div>
</body>
</html>
