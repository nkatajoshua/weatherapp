<!DOCTYPE html>
<html>
  <head>
    <style>
      #weather-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Arial, sans-serif;
      }

      input[type="text"] {
        font-size: 16px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin: 10px 0;
      }

      button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin: 10px 0;
        cursor: pointer;
      }

      .weather-data {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        margin: 20px 0;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div id="weather-container">
      <h1>Weather App</h1>
      <input type="text" id="city" placeholder="Enter a city">
      <button id="get-weather">Get Weather</button>
      <div id="weather-data" class="weather-data"></div>
    </div>

    <script>
      const getWeather = document.querySelector("#get-weather");
      const city = document.querySelector("#city");
      const weatherData = document.querySelector("#weather-data");

      getWeather.addEventListener("click", function() {
        const cityName = city.value;
        if (cityName) {
          const apiKey = "your-api-key";
          const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=${apiKey}`;

          fetch(apiUrl)
            .then(function(response) {
              return response.json();
            })
            .then(function(data) {
              const weather = data.weather[0].description;
              const temp = data.main.temp;
              const icon = data.weather[0].icon;
              const imageUrl = `https://openweathermap.org/img/wn/${icon}@2x.png`;

              weatherData.innerHTML = `
                <p><strong>Weather:</strong> ${weather}</p>
                <p><strong>Temperature:</strong> ${temp} &#8451;</p>
                <img src="${imageUrl}" alt="Weather Icon">
              `;
            })
            .catch(function(error) {
              console.error(error);
            });
        }
      });
    </script>
  </body>
</html>
