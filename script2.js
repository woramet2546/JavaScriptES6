let city ="Tokyo";//สร้างตัวแปร city เก็บ String Bangkok
const apiKey="fb6c5ee212d2e88b344fc8267b61397b";//สร้างตัวแปรค่าคงที่ มาเก็บ

//รับค่าจากฟอร์ม
const form=document.getElementById('form');
const search=document.getElementById('search');


function setData(){
    showWeather();
}

async function showWeather(){
    try {
        const url=`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;
        const response = await fetch(url);
        const data = await response.json();//response แปลงข้อมูลเป็น Json
        showDataToUI(data);
    } catch (error) {
        console.log(error);
    }
}


function showDataToUI(data){
    console.log(data)
    const city = document.getElementById(`city`);
    const state = document.getElementById(`state`);
    const weather = document.getElementById(`weather`);
    const status = document.getElementById(`status`);
    const humidity = document.getElementById(`humidity`);
    const wind = document.getElementById(`wind`);

    city.innerText=data.name;
    state.innerText=data.sys.country;
    weather.children[0].innerHTML=calculate(parseInt(data.main.temp))+"C&deg;";
    weather.children[1].innerHTML="min :"+calculate(parseInt(data.main.temp_min))+"C&deg;"+" max :"+calculate(parseInt(data.main.temp_max))+"C&deg;";

    //status
    status.innerText=data.weather[0].main;
    humidity.innerText="Humidity:"+data.main.humidity;
    wind.innerText="Wind Speed:"+data.wind.speed;



}

    function calculate(k){
    return k-273;

    }

    //preventDefault กันการรีเฟลสหน้าจอ
    function callDataAPI(e){
        e.preventDefault();
        city=search.value;
        showWeather();
    }


    //สร้าง Event Submit เมื่อมีการคลิ๊กฟอร์มจะให้ทำอะไร
    form.addEventListener('submit',callDataAPI)

    setData();