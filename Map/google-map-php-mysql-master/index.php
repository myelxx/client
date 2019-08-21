<!DOCTYPE html>
<html>
<head>
	<title>Access Google Maps API in PHP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allData {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<center><h1>Access Google Maps API in PHP</h1></center>
		<?php 
			require 'education.php';
			$edu = new map;
			$coll = $edu->getAddressBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';

			//$getaddress = "doghak";
			//$allData = $edu->getAllAddress($getaddress,"","");
			
			$allData = $edu->getAllMarker("","");
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';	
			

		 ?>
		<div id="map"></div>
	</div>
</body>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkSS53KhnNS33AVefRSHbqGi6vj8_ieXA&callback=loadMap">
</script>
</html>