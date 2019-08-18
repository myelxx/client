<?php $get_address = "";
   $fromDate = "";
   $endDate = "";

   
	include 'connection.php';
?>
 <?php if(isset($_POST['submit']))
 {
  $get_address =  $_POST["address"]; 
  $fromDate = $_POST['fromDate'];
 $endDate = $_POST['endDate'];
echo '<input class=hidden id=Date1 value=' . $fromDate . '/>';
echo '<input class=hidden id=Date2 value=' . $endDate . '/>';

 echo '<script> 
 $(document).ready(function(){
	 $("#Date1").on("input", function(){
		 $("#fDate").val($(this).val());
	 });
	 
	 $("#Date2").on("input", function(){
		 $("#eDate").val($(this).val());
	 });
 });
 </script>';
 } ?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/googlemap.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
	<style type="text/css">
		#data, #allData {
			display: none;
		}

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

		.filterMap{
			bottom: 0; 
			width: 100%;
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
			#btnFilterDate{
				margin: 2%;
				width: 80%;
			}
			.col-xs-6{
				width: 100%;
			}
			#pinpoint {
				padding-left: 10%;
			}
			#btnPinpoint{
				width: 40%;
			}
			.btnFilter
			.filterMap {
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
			.btnDisease{
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
		<form action="heatmap.php" method="post">
		<?php
			//select distinct disease and its count
			$sqlDisease = "SELECT d.disease_name as disease, count(d.disease_name) as count FROM patient p INNER JOIN disease d ON p.disease_id = d.disease_id GROUP BY d.disease_name";
			$result = $con->query($sqlDisease);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$valueDisease = $row["disease"];
					$count = $row["count"];
			?>
			<button id="btn" type="submit" name="btnIndex2" value="<?=$valueDisease?>" id="btnDisease" class="btnDisease" >
				<?=$valueDisease?>
					<span class="badge"><span class="badge-count"><?=$count?></span></span>
			</button>
			<?php }} ?>
			</form>
	</div>

<div class="filterMap">
<div class="col-xs-12">
  <div class="col-xs-6">
  <form method='post' action='heatmap.php' style="margin-left:15px;" autocomplete="off">
		<label>Filter Date: &nbsp;</label>
		<br>
		<input type='date' style="width:40%" placeholder="Start Date" class='dateFilter' name='fromDate' onchange="getValue()" id="fromDate" value='<?php if(isset($fromDate)){echo $fromDate; }?>' required> 				
		<input type='date' style="width:40%" placeholder="End Date" class='dateFilter' name='endDate' onchange="getValue()" id="endDate" value='<?php if(isset($endDate)) echo $endDate; ?>' required>
		<input id="diseaseClick" value="<?=$selectedDisease?>">
		<input type='submit' name='but_search' value='Filter Date' class='btn btn-primary' onclick="refreshMap()">
	</form>
  </div>
  <div class="col-xs-6" id="pinpoint">
  <label>Filter Pinpoint: &nbsp;</label><br>
  <form action="pinmap.php" method="post">
<input type='date' placeholder="Start Date" class='dateFilter hidden' name='fromDate' onchange="getValue()" id="fDate" value='<?php if(isset($fromDate)){echo $fromDate; }?>' > 
<input type='date' placeholder="End Date" class='dateFilter hidden' name='endDate' onchange="getValue()" id="eDate" value='<?php if(isset($endDate)) echo $endDate; ?>' >
<select style="width:40%" class="btn btn-primary dropdown-toggle" name="address">
<?php
include 'db/DbConnect.php';
$sql = "SELECT distinct(address) FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

?>

  <option <?php if ($get_address == $row["address"] ) echo 'selected' ; ?> value="<?php echo $row["address"];?>"><?php echo $row["address"];?></option>
<?php }
}
else {
    echo "0 results";
}
$conn->close();
  ?>
</select>
 <input type="submit"  class="btn btn-primary" name="submit">
</form>

  </div>
</div>
</div>
		<?php 
			require 'map.php';
			$edu = new map;
			$coll = $edu->getAddressBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';

			$allData = $edu->getAllAddress($get_address,$fromDate,$endDate);
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<div id="map"></div>
</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkSS53KhnNS33AVefRSHbqGi6vj8_ieXA&callback=loadMap">
</script>
</html>