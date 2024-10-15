<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือก Input</title>
</head>
<body>

    <input type="text" id="input1" placeholder="Input 1">
    <input type="text" id="input2" placeholder="Input 2">
    
    <select id="inputSelector">
        <option value="input1">Input 1</option>
        <option value="input2">Input 2</option>
    </select>
    
    <button id="selectButton">เลือก</button>
    
    <p id="result"></p>

    <script>
        document.getElementById('selectButton').addEventListener('click', function() {
            const selectedInput = document.getElementById('inputSelector').value;
            const inputValue = document.getElementById(selectedInput).value;
            document.getElementById('result').innerText = `คุณเลือก: ${inputValue}`;
        });
    </script>

</body>
</html>