<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Open Weather API</title>
  <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
  <style>
    html {
      color: white;
    }

    .custom-bg {
      background-color: rgba(0, 0, 0, 0.5);
      /* สีดำโปร่งใส 50% */
      padding: 10px;
    }

    body {
      height: 100vh;
      background: rgb(157, 0, 138);
      background: linear-gradient(90deg, rgba(157, 0, 138, 1) 0%, rgba(0, 175, 170, 1) 50%, rgba(0, 120, 169, 1) 100%);
      color: white;
      height: 100vh;
    }

    .custom {
      width: 150px;
      margin: 0;
    }
  </style>
</head>

<body class="">
  <?php include 'Navbar.php'; ?>

  <div class="container d-flex justify-content-center text-light mt-4 p-2">
    <main class="rounded custom-bg text-center">
      <header>
        <h1>Weather API</h1>
        <form id="form" class="d-flex justify-content-center">
          <input type="text" placeholder="search city name" id="search" class="form-control custom" />
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
      </header>
      <section>
        <div id="location">
          <img width="100px" height="100px" id="weatherIcon" class="img" />
          <h1 id="city">Bangkok</h1>
          <p id="state">TH</p>
        </div>
        <div id="card">
          <div id="weather">
            <h1>35</h1>
            <small>max : 37, min : 21</small>
            <p>อ้างอิงจาก<a style="color: red;" href="https://openweathermap.org/current">https://openweathermap.org/current</a></p>
          </div>
          <table id="info" class="table table-dark">
            <tbody>
              <tr>
                <td>
                  <div id="status">Hot</div>
                </td>
                <td>
                  <div id="humidity">100</div>
                </td>
                <td>
                  <div id="wind">4.0</div>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
      </section>
    </main>

  </div>
  <script src="Weatherscript.js"></script>
</body>

</html>