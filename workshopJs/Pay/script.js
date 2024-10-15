// อ้างอิงจาก index.html
const balance = document.getElementById("balance");
const money_plus = document.getElementById("money-plus");
const money_minus = document.getElementById("money-minus");
const list = document.getElementById("list");
const form = document.getElementById("form");
const text = document.getElementById("text");
const amount = document.getElementById("amount");

//การสร้างตัวแปร แบบ object
const dataTransaction = [
  { id: 1, text: "ค่าน้ำมัน", amount: -100 },
  { id: 2, text: "เงินเดือน", amount: +10000 },
  { id: 3, text: "ค่าไฟ", amount: -2000 },
];

const transactions = dataTransaction;
function init() {
  // เรียกใช้ function ในฟังก์ชั่น
  transactions.forEach(addDataToList);
  calculateMoney();
}

function addDataToList(transactions) {
  // ถ้า amount น้อยกว่า 0 แสดง - else มากกว่า 0 แสดง +
  const symbol = transactions.amount < 0 ? "-" : "+";
  const status = transactions.amount < 0 ? "minus" : "plus";
  // สร้างแท๊ก li
  const item = document.createElement("li");
  // เป็นการกำหนด คลาสให้กับ li
  item.classList.add(status);
  const result = formatNumber(Math.abs(transactions.amount));
  // console.log(Math.abs(-5)); // คืนค่า 5
  item.innerHTML = `${transactions.text}<span>${symbol}${result}</span><button class="btn-delete">X</button>`;
  list.appendChild(item);
  // console.log(transactions);
}
function formatNumber(number) {
  return number
    .toString()
    .replace(/(?<!(\.\d*|^.{0}))(?=(\d{3})+(?!\d))/g, ",");
}

function calculateMoney() {
  const amounts = transactions.map((transactions) => transactions.amount);
  //กำหนดค่า total = 0
  //เมื่อมาถึง element แรกใน array เราก็บอกว่า ให้ค่าก่อนหน้าซึ่งในที่นี้คือ 0
  //ที่มาจากค่าเริ่มต้น บวกกับค่า element ปัจจุบันซึ่งคือ amount=[-100,+10000,-2000]
  //แล้วเราก็ return ผลรวมนั้นออกมา ซึ่งเป็นการเซ็ตค่า result นั่นเอง ทำให้ตอนนี้ result มีค่า -100
  // ต่อมาเมื่อมาถึง element ตัวถัดมาใน array ก็จะทำแบบเดิมคือ return ผลรวมของ result
  // ซึ่งตอนนี้คือ -100 บวกกับ element ปัจจุบันซึ่งคือ 10000 เราก็จะได้ค่าใหม่ของ prev เป็น 9900
  // -2000 = 7900
  const total = amounts
    .reduce((result, item) => (result += item), 0)
    .toFixed(2);
  // console.log(total);
  // กรองเอาค่า ใน amount มาเก็บ ในitem ที่ละตัว เฉพาะค่าที่มากกกว่า 0
  const income = amounts
    .filter((item) => item > 0)
    .reduce((result, item) => (result += item), 0)
    .toFixed(2);
  // income คือ รายรับ
  const pay = (
    amounts
      .filter((item) => item < 0)
      .reduce((result, item) => (result += item), 0) * -1
  ).toFixed(2);
  // pay คือ รายจ่าย

  // แสดงผลทางจอภาพ
  balance.innerHTML = `฿` + formatNumber(total);
  money_plus.innerHTML = `฿` + formatNumber(income);
  money_minus.innerHTML = `฿` + formatNumber(pay);
}
function addTransaction(e) {
  e.preventDefault();
  // เช็คค่า textตัดช่องว่างออกแล้ว === ค่าว่างใหม
  if (text.value.trim() === "" && amount.value.trim() === "") {
    Swal.fire({
      position: "center",
      icon: "warning",
      title: "กรุณากรอกข้อมูลให้ครบถ้วน",
    });
  }else{
    const data={
        id:autoID(),
        text:text.value,
        amount:+amount.value,
    }
    transactions.push(data);
    addDataToList(data);
    calculateMoney();
    text.value ='';
    amount.value = '';
    Swal.fire({
        position: "center",
        title: "เพิ่มธุรกรรมสำเร็จ",
        icon: "success",
    })
}
}
function autoID(){
    return Math.floor(Math.random()*1000000)
}

// สร้าง function addTransaction มี form มีการกด Submit จะให้เกิดอะไรขึ้น
form.addEventListener("submit", addTransaction);

init();
