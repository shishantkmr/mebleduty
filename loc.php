<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>location</title>
	<link rel="stylesheet" href="">
	<link src="http://code.jquery.com/jquery-2.2.4.min.js"/>
</head>
<body>
	<div class="container">
		<div class="box">
			<div class="card">
				<div class="header">
					Location
				</div>
				<span class="text">
					<p> here is goes location information</p>
					<button onclick="getLocation()">Get Location</button>

					<div id="output">hello</div>
				</span>
			</div>
		</div>
	</div>
	<style>
		body{font-family: "Open Sans", sans-serif;}
		.container{background-color: lavender;}
		.box{width: 100%;}
		.card{ width:20%; height:250px; border: 1px solid blue; border-radius: 4px;}
		.header{width: 100%;background-color: red; height: 25px; text-align: center;}
		.text{width: 100%;	font-size: 15px; padding-left: 25px;}
	</style>
	
	<script>
		var x= document.getElementById('output');
		function getLocation(){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition);
				x.innerHTML = "Browser supported ";
			}
			else{
				x.innerHTML = "Browser is not supported";
			}
		}
		function showPosition(position){
			x.innerHTML = "Latitude = "+position.coords.latitude
			x.innerHMTL += "<br />"
			x.innerHTML += "logngitude = "+position.coords.longitude

		}
	</script>
</body>
</html>