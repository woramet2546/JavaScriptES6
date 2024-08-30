// ค่าทุกค่าจะมาจากการกำหนด ID หน้า index.html
//ด้านหน้าให้สร้างตัวแปรเก็บค่า = ด้านหลังของ getElementByid จะเป็นชื่อ ID

const currency_one = document.getElementById("currency-one");
const currency_two = document.getElementById("currency-two");

const amount_one = document.getElementById("amount-one");
const amount_two = document.getElementById("amount-two");

const rateText = document.getElementById("rate");
const swap = document.getElementById("btn");
const date = document.getElementById("date");

currency_one.addEventListener("change", calculateMoney);
currency_two.addEventListener("change", calculateMoney);

amount_one.addEventListener("input", calculateMoney);
amount_two.addEventListener("input", calculateMoney);

function calculateMoney() {
  const one = currency_one.value;
  const two = currency_two.value;
  fetch(`https://api.exchangerate-api.com/v4/latest/${one}`)
    .then((res) => res.json())
    .then((data) => {
      const rate = data.rates[two];
      rateText.innerText = `1 ${one} = ${rate}${two}`;
      amount_two.value = (amount_one.value * rate).toFixed(2);
      const date = data.date;
      //เป็นการดึงตัวแปร จาก Api ออกไปแสดงผ่าน id หน้าHTML
      document.getElementById("date").innerHTML = 
      `<span style="color: yellow; font-weight: bold;">
        อัพเดทล่าสุดเมื่อวันที่ ${date}
  </span>`;
    });

  // ขั้นตอนการส้รางสลับสกุลเงิน
}

function reverseCalculateMoney() {
  const one = currency_one.value;
  const two = currency_two.value;
  fetch(`https://api.exchangerate-api.com/v4/latest/${two}`)
    .then((res) => res.json())
    .then((data) => {
      const rate = data.rates[one];
      rateText.innerText = `1 ${two} = ${rate} ${one}`;
      amount_one.value = (amount_two.value * rate).toFixed(2);
    });
  calculateMoney();
}
swap.addEventListener("click", () => {
  // สลับค่าสกุลเงิน
  const tempCurrency = currency_one.value;
  currency_one.value = currency_two.value;
  currency_two.value = tempCurrency;

  // สลับค่าของจำนวนเงินในช่อง input โดยใช้การคำนวณย้อนกลับ
  reverseCalculateMoney();
});

calculateMoney();
