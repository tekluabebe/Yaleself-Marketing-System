
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="weather.css">
    
</head>
<body>
<div class="api">
  <div class="container">
 This demo needs an OpenWeather API key to work. <a target="_blank" href="https://home.openweathermap.org/users/sign_up">Get yours here for free!</a>
  </div>
</div>
<section class="top-banner">
  <div class="container">
    <h1 class="heading">Simple Weather App</h1>
    <form>
      <input type="text" placeholder="Search for a city" autofocus>
      <button type="submit">SUBMIT</button>
      <span class="msg"></span>
    </form>
  </div>
</section>
<section class="ajax-section">
  <div class="container">
    <ul class="cities"></ul>
  </div>
</section>
<footer class="page-footer">
  <div class="container">
    <small>Made with <span>
    </span> 
     <a href="http://georgemartsoukos.com/" target="_blank">George Martsoukos</a>
    </small>
  </div>
</footer>
</body>
</html>

