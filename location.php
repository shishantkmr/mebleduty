<!DOCTYPE html>
<html>
<head>
<title>Geolocation API by vishAcademy.com</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Hello, Lets trace your location.</h1>
<!-- <button onclick="getLocation()">Get Location</button> -->
<!-- Output will go here -->
 <div id="output"></div>
<p>
  Your location is <span id="latitude">0.00</span>° latitude by
  <span id="longitude">0.00</span>° longitude.
</p>
<button id="get-location">Get My Location</button>
<link src="http://code.jquery.com/jquery-2.2.4.min.js"/>


<script>
let button = document.getElementById("get-location");
let latText = document.getElementById("latitude");
let longText = document.getElementById("longitude");

button.addEventListener("click", () => {
  navigator.geolocation.getCurrentPosition((position) => {
    let lat = position.coords.latitude;
    let long = position.coords.longitude;

    latText.innerText = lat;
    longText.innerText = long;
  });
});
</script>
</body>
</html>