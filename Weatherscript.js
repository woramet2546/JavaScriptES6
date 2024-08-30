
const apiKey = "fb6c5ee212d2e88b344fc8267b61397b";
const form = document.getElementById('form');
const search = document.getElementById('search');
const cityElement = document.getElementById('city');
const stateElement = document.getElementById('state');
const weatherElement = document.getElementById('weather');
const statusElement = document.getElementById('status');
const humidityElement = document.getElementById('humidity');
const windElement = document.getElementById('wind');
const weatherIconElement = document.getElementById('weatherIcon');

async function getWeatherData(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        return data;
    } catch (error) {
        console.log(error);
        return null;
    }
}

async function showWeather() {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;
    const data = await getWeatherData(url);
    if (data) {
        showDataToUI(data);
    }
}

function showDataToUI(data) {
    cityElement.innerText = data.name || "Unknown City";
    stateElement.innerText = data.sys.country || "Unknown Country";
    weatherElement.children[0].innerHTML = calculate(data.main.temp) + " &deg;C";
    weatherElement.children[1].innerHTML = "อุณหภูมิต่ำสุด: " + calculate(data.main.temp_min) + " &deg;C อุณหภูมิสูงสุด: " + calculate(data.main.temp_max) + " &deg;C";
    statusElement.innerText = data.weather[0].main || "Unknown Weather";
    humidityElement.innerText = "ค่าความชื้น: " + (data.main.humidity || "Unknown");
    windElement.innerText = "ความเร็วลม: " + (data.wind.speed || "Unknown");

    // กำหนด URL ของไอคอนสภาพอากาศ
    const iconCode = data.weather[0].icon;
    const iconUrl = `http://openweathermap.org/img/wn/${iconCode}.png`;
    weatherIconElement.src = iconUrl;
}

function calculate(k) {
    return Math.round(k - 273.15); // Convert Kelvin to Celsius and round
}

function callDataAPI(e) {
    e.preventDefault();
    city = search.value;
    showWeather();
}

async function setCurrentLocationWeather() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(async (position) => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}`;
            const data = await getWeatherData(url);
            if (data) {
                city = data.name;
                showWeather();
            }
        });
    } else {
        showWeather(); // Fallback to default city if Geolocation is not supported
    }
}

form.addEventListener('submit', callDataAPI);
setCurrentLocationWeather();

