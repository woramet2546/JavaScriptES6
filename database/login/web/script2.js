<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        #form {
            margin-bottom: 20px;
        }
        #weather-info {
            text-align: center;
        }
    </style>
</head>
<body>
    <form id="form">
        <input type="text" id="search" placeholder="Enter city name" />
        <button type="submit">Get Weather</button>
    </form>
    <div id="weather-info">
        <h2 id="city">City</h2>
        <p id="state">State</p>
        <div id="weather">
            <p>Temperature: <span></span></p>
            <p>Min: <span></span> Max: <span></span></p>
        </div>
        <p id="status">Weather Status</p>
        <p id="humidity">Humidity</p>
        <p id="wind">Wind Speed</p>
    </div>

    <script>
        const apiKey = "fb6c5ee212d2e88b344fc8267b61397b"; // API key for OpenWeatherMap

        // Get elements from the form
        const form = document.getElementById('form');
        const search = document.getElementById('search');

        // Function to show weather based on city or current location
        function showWeather(city = null) {
            if (city) {
                // Use the city name provided in the form
                getWeatherDataByCity(city);
            } else if (navigator.geolocation) {
                // Use Geolocation API to get current position
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        // Function called when geolocation position is obtained
        function successCallback(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            getWeatherData(latitude, longitude);
        }

        // Function called when there's an error obtaining geolocation
        function errorCallback(error) {
            console.error("Error getting location: ", error);
        }

        // Function to fetch weather data using latitude and longitude
        function getWeatherData(latitude, longitude) {
            const url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    showDataToUI(data);
                })
                .catch(error => console.error('Error fetching weather data:', error));
        }

        // Function to fetch weather data using city name
        function getWeatherDataByCity(city) {
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    showDataToUI(data);
                })
                .catch(error => console.error('Error fetching weather data:', error));
        }

        // Function to display weather data on the UI
        function showDataToUI(data) {
            const city = document.getElementById('city');
            const state = document.getElementById('state');
            const weather = document.getElementById('weather');
            const status = document.getElementById('status');
            const humidity = document.getElementById('humidity');
            const wind = document.getElementById('wind');

            city.innerText = data.name;
            state.innerText = data.sys.country;
            weather.children[0].innerHTML = `${calculate(data.main.temp)}&deg;C`;
            weather.children[1].innerHTML = `min: ${calculate(data.main.temp_min)}&deg;C max: ${calculate(data.main.temp_max)}&deg;C`;
            status.innerText = data.weather[0].main;
            humidity.innerText = `Humidity: ${data.main.humidity}%`;
            wind.innerText = `Wind Speed: ${data.wind.speed} m/s`;
        }

        // Function to calculate temperature from Kelvin to Celsius
        function calculate(k) {
            return (k - 273.15).toFixed(1); // Convert Kelvin to Celsius
        }

        // Prevent form submission from refreshing the page
        function callDataAPI(e) {
            e.preventDefault();
            const city = search.value.trim();
            showWeather(city);
        }

        // Add event listener for form submission
        form.addEventListener('submit', callDataAPI);

        // Call showWeather to display weather data on page load
        showWeather();
    </script>
</body>
</html>
