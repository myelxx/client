	<?php

	if(isset($_POST['btnIndex2'])){
		
		$valueDisease = $_POST['btnIndex2'];
		echo "<script>",
		"window.onload = function() {",
		"	document.getElementById('disease').click();}; ",
		"</script>";
		echo "<button class='hidden' id=disease onClick=filterDisease('".$valueDisease."')></button>";

	
	}

	include 'map/connection.php';
	$selectedDisease = "";

	$sql = "SELECT * FROM heatmap  WHERE validate=1 AND disease LIKE '%$selectedDisease%'";
	// Date filter
	if(isset($_POST['but_search'])){
		$fromDate = $_POST['fromDate'];
		$endDate = $_POST['endDate'];

		if(!empty($fromDate) && !empty($endDate)){ $sql .= " AND date  between '".$fromDate."' and '".$endDate."' "; }
	}
	// Sort
	$sql .= "  ORDER BY id";
	$query = mysqli_query($con, $sql);
	
	//Pin Point
	$get_address = ""; 
 
 	?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/googlemap.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<style type="text/css">
		#floating-panel {
			background-color: #fff;
			border: 1px solid #999;
			left: 80%;
			right: 2%;
			padding: 5px;
			position: absolute;
			top: 8%;
			z-index: 15;
			width: 17%;
		}

		.filterMap {
			bottom: 12%;
			width: 90%;
			padding: 1%;
			position: absolute;
			z-index: 5;
			background-color: #132747;
		}

		.badge-count {
			padding: 1%;
			font-size: 0.9em;
		}

		.badge {
			float: right;
			background-color: #132747;
			color: white;
			border-radius: 20%;
			width: 15%;
		}

		label {
			color: white;
		}

		@media only screen and (max-width: 600px) {
			#btnFilterDate {
				margin: 2%;
				width: 80%;
			}
			.col-xs-6 {
				width: 100%;
			}
			#pinpoint {
				padding-left: 10%;
			}
			#btnPinpoint {
				width: 40%;
			}
			.btnFilter .filterMap {
				/* background-color: rgba(255, 0, 0, 0.3); */
			}
			input[type=date] {
				border: 2px solid #3b4b7d;
				border-radius: 4px;
				padding: 1px;
				width: 50%;
			}
			h3.title {
				float: left;
				margin: 1%;
				font-size: 1em;
			}
			#floating-panel {
				background-color: #fff;
				border: 1px solid #999;
				left: 65%;
				right: 2%;
				padding: 5px;
				position: absolute;
				top: 12%;
				z-index: 20;
				width: 30%;
			}
			.btnDisease {
				font-size: 1em;
			}
			.badge-count {
				font-size: 0.5em;
				float: left;
			}
			.badge {
				font-size: 1.2em;
				width: 25%;
			}
		}
	</style>
	</head>

	<body>
	<div id="floating-panel">
		<h3 class="title">Disease</h3>
		<?php
			//select distinct disease and its count
			$sqlDisease = "SELECT disease, count(disease) count FROM heatmap GROUP BY disease";
			$result = $con->query($sqlDisease);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$valueDisease = $row["disease"];
					$count = $row["count"];
			?>
			<button value="<?=$valueDisease?>" id="btnDisease" class="btnDisease" onClick="filterDisease('<?=$valueDisease?>')">
				<?=$valueDisease?>
					<span class="badge"><span class="badge-count">&nbsp;&nbsp;<?=$count?></span></span>
			</button>
		<?php }} ?>
	</div>

	<div class="filterMap">		
	<div class="col-xs-12">
	<div class="col-xs-6">
		<!--  filter heatmap -->
		<form method='post' action='' style="margin-left:15px;" autocomplete="off">
			<label>Filter Date: &nbsp;</label>
			<br>
			<input style="width:40%" type='date' placeholder="Start Date" class='dateFilter' name='fromDate' onchange="getValue()" id="fromDate" value='<?php if(isset($fromDate)){echo $fromDate; }?>' required>
			<input style="width:40%" type='date' placeholder="End Date" class='dateFilter' name='endDate' onchange="getValue()" id="endDate" value='<?php if(isset($endDate)) echo $endDate; ?>' required>
			<input id="diseaseClick" value="<?=$selectedDisease?>">
			<input type='submit' id="btnFilterDate" name='but_search' value='Filter Date' class='btn btn-primary' onclick="refreshMap()">
		</form>
	</div>
	<div class="col-xs-6" id="pinpoint"> 	
	&nbsp; &nbsp;<label>Filter Pinpoint: &nbsp;</label>
		<br>		
		<form action="pinmap2.php" name="pinpointForm" method="post">
			<input class="hidden" type="text" id="fDate" name="fromDate">
			<input class="hidden" type="text" id="eDate" name="endDate">
			&nbsp; &nbsp;
			<select  style="width:40%" class="btn btn-primary dropdown-toggle" name="address">
			<?php
			$sql = "SELECT distinct(address) FROM heatmap";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
			?>
			<option <?php if ($get_address == $row["address"] ) echo 'selected' ; ?> value="<?php echo $row["address"];?>"><?php echo $row["address"];?></option>
			<?php }}?>
			</select>
			<input type="submit" class='btn btn-primary'id="btnPinpoint" name="submit">
		</form>
	</div>	
	<script>
		function getValue() {
			document.getElementById("start").value = document.getElementById("fromDate").value;
			document.getElementById("end").value = document.getElementById("endDate").value;
		}
	</script>
	</div>
	</div>

	<div id="map"> </div>

	</body>
	<!-- <script src="js/heatmap.js"> </script> -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkSS53KhnNS33AVefRSHbqGi6vj8_ieXA&libraries=visualization&callback=initMap"> </script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
		
	<script>
	$(document).ready(function(){
		$("#fromDate").on("input", function(){
			$("#fDate").val($(this).val());
		});
		
		$("#endDate").on("input", function(){
			$("#eDate").val($(this).val());
		});
	});
	</script>
	<script>
	var map, heatmap;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: new google.maps.LatLng(14.5794, 121.0359),
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		heatmap = new google.maps.visualization.HeatmapLayer({
			data: getData(),
			map: map
		});
	}

	function refreshMap() {
		toggleHeatmap();
		heatmap = new google.maps.visualization.HeatmapLayer({
			data: getData(),
			map: map
		});

	}

	function toggleHeatmap() {
		heatmap.setMap(heatmap.getMap() ? null : map);
	}

	function changeToBlueGradient() {
		var gradient = [
			'rgba(0, 255, 255, 0)',
			'rgba(0, 255, 255, 1)',
			'rgba(0, 191, 255, 1)',
			'rgba(0, 127, 255, 1)',
			'rgba(0, 63, 255, 1)',
			'rgba(0, 0, 255, 1)',
			'rgba(0, 0, 223, 1)',
			'rgba(0, 0, 191, 1)',
			'rgba(0, 0, 159, 1)',
			'rgba(0, 0, 127, 1)',
			'rgba(63, 0, 91, 1)',
			'rgba(127, 0, 63, 1)',
			'rgba(191, 0, 31, 1)',
			'rgba(255, 0, 0, 1)'
		]
		heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
	}

	function filterDisease(diseaseValue) {
		let disease = document.getElementsByClassName("btnDisease");
		var value = disease[0].value;

		var classCount = document.querySelectorAll('.btnDisease').length;
		var classArr = [];

		for (let i = 0; i < classCount; i++) {
			classArr.push(disease[i].value);
		}

		for (let i = 0; i < classCount; i++) {
			if (classArr[i] == diseaseValue) {
				let disease = document.getElementById("diseaseClick").value = diseaseValue
				refreshMap()
			
			}
		}
        
	}

	function getData() {
		var startDate = document.getElementById("fromDate").value != "" ? document.getElementById("fromDate").value : null;
		var endDate = document.getElementById("endDate").value != "" ? document.getElementById("endDate").value : null;
		var selectedDisease = document.getElementById("diseaseClick").value != "" ? document.getElementById("diseaseClick").value : null;

		var dataResult = [];
		$.ajax({
			url: 'map/GetLongLat.php',
			data: {
				action: 'getData',
				fDate: startDate,
				tDate: endDate,
				sDisease: selectedDisease
			},
			type: 'POST',
			async: false,
			success: function(output) {
				for (var ctr = 0; ctr < output.length; ctr++) {
					dataResult.push(new google.maps.LatLng(output[ctr].lat, output[ctr].long));
					console.log("Lat: " + output[ctr].lat + ", Long: " + output[ctr].long);
				}
			}
		});

		return dataResult;
	}
	</script>
	</html>