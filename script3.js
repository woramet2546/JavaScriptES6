let coinsData = []; // ตัวแปรเก็บข้อมูลเหรียญทั้งหมด

    const options = {
      headers: {
        'x-access-token': 'coinrankingb51aea1c4c9ce04fdd2418e18aa382a4a869a8d74b20522a',
      },
    };

    // ดึงข้อมูลจาก API และเพิ่มลงใน select
    fetch('https://api.coinranking.com/v2/coins', options)
      .then((response) => response.json())
      .then((data) => {
        const coins = data.data.coins;
        coinsData = coins; // เก็บข้อมูลเหรียญในตัวแปร coinsData
        console.log(data);

        const select = document.getElementById('coinSelect');

        coins.forEach((coin) => {
          const option = document.createElement('option');
          option.value = coin.uuid; // ใช้ uuid เป็น value
          option.textContent = `${coin.name} (${coin.symbol})`;
          select.appendChild(option);
        });

         // เลือกเหรียญเริ่มต้นเป็นเหรียญแรกในลิสต์
         select.selectedIndex = 1; // ตั้งค่าให้เหรียญแรกถูกเลือก (Index 1 เพราะ Index 0 เป็น placeholder)
         showSelectedCoin(); // แสดงข้อมูลเหรียญเริ่มต้น
      })
      .catch((error) => {
        console.error('Error fetching coins:', error);
      });

    function showSelectedCoin() {
      const select = document.getElementById('coinSelect');
      const result = document.getElementById('result');
      const priceElement = document.getElementById('price');
      
      const selectedUuid = select.value; // uuid ของเหรียญที่เลือก

      if (selectedUuid) {
        const selectedCoin = coinsData.find(coin => coin.uuid === selectedUuid); // ค้นหาเหรียญจาก uuid

        result.textContent = `คุณได้ทำการเลือกเหรียญ: ${selectedCoin.name} (${selectedCoin.symbol})`;
        priceElement.textContent = `ราคาปัจจุบัน: $${parseFloat(selectedCoin.price).toFixed(2)}`;
      } else {
        result.textContent = 'Please select a coin.';
        priceElement.textContent = ''; // ลบข้อมูลราคาเมื่อไม่ได้เลือกเหรียญ
      }
    }