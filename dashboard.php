<?php
include('db/connection.php');
include('db/auth.php');

$sql = 'SELECT * FROM admin WHERE status=1';
$sth = $conPDO->prepare($sql);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_OBJ);

?> 

<!DOCTYPE html>
<html style="overflow: hidden;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Script -->
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

	<script src='jquery-3.3.1.js' type='text/javascript'></script>
	<script src='jquery-ui.min.js' type='text/javascript'></script>
	<script type='text/javascript'>
	   $(document).ready(function(){
		 $('.dateFilter').datepicker({
			dateFormat: "yy-mm-dd"
		 });
	   });
	</script>
</head>   
<body>

<div class="app-content"> 



<!-- Example Pie Chart Card-->
<div class="card mb-3" id="sentAdvisoryDiv" >
	<div class="card-header">
		<i class="fa fa-bar-chart"></i> Bar Graph for Sent Advisories & Alert per Area</div>
		<div class="card-body">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			
			<form name="filter" method="POST" action="dashboard.php#sentAdvisoryDiv">
					<div class="d-inline-block">
					<p>Filter the dashboard:</p>
					</div>
					<div class="d-inline-block">
					<select id="filter_date" name="filter_date">
						<?php
						$filter_date_arr = array("Yearly","Monthly","Daily");
						foreach($filter_date_arr as $frow){
							if(isset($_POST['filter_date']) && $_POST['filter_date'] == $frow){
								echo '<option value="'.$frow.'" selected="selected" id="'.$frow.'">'.$frow.'</option>';
							}else{
								echo '<option value="'.$frow.'">'.$frow.'</option>';
							}
						}
						?>
					</select>
					</div>
					<div class="d-inline-block">
					<select name='month' id='month' style="display:none;">
					  <option value='1' <?php if(!empty($_POST['month'])){if($_POST['month'] == '1'){echo 'selected="selected"';}}?>>January </option>
					  <option value='2' <?php if(!empty($_POST['month'])){if($_POST['month'] == '2'){echo 'selected="selected"';}}?>>February </option>
					  <option value='3' <?php if(!empty($_POST['month'])){if($_POST['month'] == '3'){echo 'selected="selected"';}}?>>March</option>
					  <option value='4' <?php if(!empty($_POST['month'])){if($_POST['month'] == '4'){echo 'selected="selected"';}}?>>April</option>
					  <option value='5' <?php if(!empty($_POST['month'])){if($_POST['month'] == '5'){echo 'selected="selected"';}}?>>May</option>
					  <option value='6' <?php if(!empty($_POST['month'])){if($_POST['month'] == '6'){echo 'selected="selected"';}}?>>June</option>
					  <option value='7' <?php if(!empty($_POST['month'])){if($_POST['month'] == '7'){echo 'selected="selected"';}}?>>July</option>
					  <option value='8' <?php if(!empty($_POST['month'])){if($_POST['month'] == '8'){echo 'selected="selected"';}}?>>August</option>
					  <option value='9' <?php if(!empty($_POST['month'])){if($_POST['month'] == '9'){echo 'selected="selected"';}}?>>September</option>
					  <option value='10' <?php if(!empty($_POST['month'])){if($_POST['month'] == '10'){echo 'selected="selected"';}}?>>October</option>
					  <option value='11' <?php if(!empty($_POST['month'])){if($_POST['month'] == '11'){echo 'selected="selected"';}}?>>November</option>
					  <option value='12' <?php if(!empty($_POST['month'])){if($_POST['month'] == '12'){echo 'selected="selected"';}}?>>December</option>
					</select>
					</div>
					<div class="d-inline-block">
					<input type="submit" name="btnFilterDate" id="btnFilterDate" value="Filter">
					</div>
			</form>
			<script src="jquery-3.3.1.min.js"></script>
			<script>
					$(function() {
					  //show month combox if monthly
					$(document).ready(function() {
						$("#filter_date").change(function() {
							if ($("#Monthly").is(":selected")) {
							  $("#month").css("display", "block");
							} else {
							  $("#month").css("display", "none");
							}
						}).trigger('change');
					});
					 
					  //submit form
					$(document).ready(function() {
						$('#month').on('change', function() {
							var $form = $(this).closest('form');
							$form.find('input[type=submit]').click();
						});
					});
					});
			</script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
			<input id="save-pdf" type="button" value="Save as PDF" />
			<div id="chart_flood_advisory_per_area" style="width: 100%; height: 70%;"></div>
			<?php
				
				$yearly = 'WHERE date_created > DATE_SUB(NOW(), INTERVAL 1 YEAR)';
				
				if(isset($_POST['btnFilterDate'])){
					if(isset($_POST['filter_date'])){
						$month = $_POST['month'];
						$selectDate = $_POST['filter_date'];
						$daily = 'WHERE date_created > DATE_SUB(NOW(), INTERVAL 1 DAY)';
						$monthly = 'WHERE month(date_created) = "'.$month.'" ';
						if($selectDate=='Daily'){ $filterDate = $daily;}
						if($selectDate=='Monthly'){ $filterDate = $monthly;}
						if($selectDate=='Yearly'){ $filterDate = $yearly;}
						
						//convert numeric month to word month
						if($month=="1"){$word_month="January";}
						if($month=="2"){$word_month="February";}
						if($month=="3"){$word_month="March";}
						if($month=="4"){$word_month="April";}
						if($month=="5"){$word_month="May";}
						if($month=="6"){$word_month="June";}
						if($month=="7"){$word_month="July";}
						if($month=="8"){$word_month="August";}
						if($month=="9"){$word_month="September";}
						if($month=="10"){$word_month="October";}
						if($month=="11"){$word_month="November";}
						if($month=="12"){$word_month="December";}
					}
				} else {$filterDate = $yearly;}

				//current year
				$current_year = date("Y");
				//current day
				$current_date = date("M-d-Y");
				
				$data = array( 
					array('Disease', 'Count')
				);

				$disease_sql = "SELECT d.disease_name as disease, count(d.disease_name) as disease_count FROM patient p INNER JOIN disease d ON p.disease_id = d.disease_id ".$filterDate." GROUP BY d.disease_name ";
				$disease_result = $conn->query($disease_sql);
					if ($disease_result->num_rows > 0) {
						// output data of each row
						while($row = $disease_result->fetch_assoc()) {
						array_push($data, array($row['disease'], (int)$row['disease_count']));
						}
					}
					else {
						array_push($data, array('no result', 0));
					}
				
				$chartDataInJson = json_encode($data);
				

			?>
			<script>
				  google.charts.load('current', {'packages':['corechart']});
				  google.charts.setOnLoadCallback(drawVisualization);

				  function drawVisualization() {
					// Some raw data (not necessarily accurate)
					var data = google.visualization.arrayToDataTable(<?php echo $chartDataInJson; ?>);
				 //save command
				  var container = document.getElementById('chart_flood_advisory_per_area');
				  var chart = new google.visualization.LineChart(container);
				  //var btnSave = document.getElementById('four-save-pdf');
				  var btnSave = document.getElementById('save-pdf');

				  //DECLATE TEXTARE VALUE
				  var header = document.getElementById('dashboardHeader');
				  var header1 = document.getElementById('dashboardHeader1');			

				  google.visualization.events.addListener(chart, 'ready', function () {
					btnSave.disabled = false;
				  });

				  
				btnSave.addEventListener('click', function () {
					var doc = new jsPDF();
					var doc = new jsPDF('Landscape');
					doc.setFontType("bold");
					doc.setFontSize(11);
					doc.text(20, 10, header.value);	
					doc.setFontType("normal");
					doc.text(20, 20, header1.value);
					doc.setFontType("normal");
					doc.addImage(chart.getImageURI(), -35, 25);	
					//doc.addImage(chart.getImageURI(), 15, 25);	
					doc.setFontType("bold");	
					doc.setFontSize(12);
					doc.text(120, 30, 'BAR GRAPH');	
					doc.setFontType("normal");	
					doc.text(250, 200, 'Date by: <?php echo date('M-d-Y'); ?>');
					
					doc.save('chart.pdf');
				}, false);

				var options = {
				  title : '<?php if(isset($_POST['filter_date'])){
					  $filterHolder=$_POST['filter_date']; 
					  if($filterHolder=='Monthly'){echo "Monthly Report - Month of " . $word_month;} 
					  if($filterHolder=='Daily'){echo "Daily Report of " . $current_date;}
					  if($filterHolder=='Yearly'){echo "Yearly Report - Year ". $current_year;}
					} else {echo "Yearly - Year " . $current_year;}?>',
				  is3D:true,
				  vAxis: {title: 'Number of Advisory and Alert'},
				  hAxis: {title: 'Area'
				  },
				  colors: ['#800000','#e6194b','#3cb44b'],
				  seriesType: 'bars',
				  series: {4: {type: 'line'}}
				};

				var chart = new google.visualization.ComboChart(document.getElementById('chart_flood_advisory_per_area'));
				chart.draw(data, options);
			  }
			</script>
			</div>
</div>

<!-- Example Pie Chart Card-->
<div class="card mb-3" id="colorCodeDiv">
	<div class="card-header">
		<i class="fa fa-area-chart"></i>Area Chart for disease indication per year</div>
		<div class="card-body">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
			
			<form name="filter" method="POST" action="dashboard.php">
					<div class="d-inline-block">
					<p>Filter the dashboard:</p>
					</div>
					<div class="d-inline-block">
					<select name="disease_list">
					<?php
					$displayed_disease = "mallaria";
					$disease_sql = "SELECT distinct(disease_name) FROM disease";
					$disease_result = $conn->query($disease_sql);
					if ($disease_result->num_rows > 0) {
						// output data of each row
						while($row = $disease_result->fetch_assoc()) {
					?>
					<option <?php if(!empty($_POST['disease_list'])){ echo 'selected' ;}  ?> value="<?php echo $row["disease_name"];?>"><?php echo $row["disease_name"];?></option>
					<?php }}?>
					</select>
					</div>
					<div class="d-inline-block">
					<input type="submit" name="btnChart2FilterDisease" id="btnChart2FilterDisease" value="Filter">
					</div>
			</form>
			<input id="one-save-pdf" type="button" value="Save as PDF" />
			<div id="chart_disease" style="width: 100%; height: 70%;"></div>
			<script src="https://www.gstatic.com/charts/loader.js"></script>

			<?php
				//filter per disease
				if(isset($_POST['btnChart2FilterDisease'])){
					$displayed_disease = $_POST['disease_list'];
				}

				//getting the 4 previous year
				$curdate = date("Y-m-d");
				$curyear = date("Y");
				$one = strtotime ( '-1 year' , strtotime ( $curdate ) ) ;
				$oneYearBefore = date ( 'Y' , $one );
				$two = strtotime ( '-2 years' , strtotime ( $curdate ) ) ;
				$twoYearBefore = date ( 'Y' , $two );
				$three = strtotime ( '-3 years' , strtotime ( $curdate ) ) ;
				$threeYearBefore = date ( 'Y' , $three );
			
				//disease cur app report
				$stmt = $conPDO->query('SELECT * FROM patient p INNER JOIN disease d ON p.disease_id = d.disease_id WHERE d.disease_name="'.$displayed_disease.'" AND year(date_created)='. $curyear); 
				$row_count = $stmt->rowCount();
				$disease_cur = $row_count;
				//disease one app report
				$stmt = $conPDO->query('SELECT * FROM `patient` p  INNER JOIN disease d ON p.disease_id = d.disease_id WHERE d.disease_name="'.$displayed_disease.'" AND year(date_created)='. $oneYearBefore); 
				$row_count = $stmt->rowCount();
				$disease_one = $row_count;
				//disease two app report
				$stmt = $conPDO->query('SELECT * FROM `patient`p INNER JOIN disease d ON p.disease_id = d.disease_id WHERE d.disease_name="'.$displayed_disease.'" AND year(date_created)='. $twoYearBefore); 
				$row_count = $stmt->rowCount();
				$disease_two = $row_count;
				//disease three app report
				$stmt = $conPDO->query('SELECT * FROM `patient` p  INNER JOIN disease d ON p.disease_id = d.disease_id WHERE d.disease_name="'.$displayed_disease.'	" AND year(date_created)='. $threeYearBefore); 
				$row_count = $stmt->rowCount();
				$disease_three = $row_count;
			?>
			<script>
			 google.charts.load('current', {'packages':['corechart']});
			  google.charts.setOnLoadCallback(drawChart);
			   
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Year', '<?=$displayed_disease?>'],
				  ['<?php echo $threeYearBefore; ?>',  <?php echo $disease_three; ?>],
				  ['<?php echo $twoYearBefore; ?>',  <?php echo $disease_two; ?>],
				  ['<?php echo $oneYearBefore; ?>',  <?php echo $disease_one; ?>],
				  ['<?php echo date("Y"); ?>',  <?php echo $disease_cur; ?>]
				]);
				
				
				//save command
				  var container = document.getElementById('chart_disease');
				  var chart = new google.visualization.LineChart(container);
				  var btnSave = document.getElementById('one-save-pdf');
				  //DECLATE TEXTARE VALUE
				  var header = document.getElementById('dashboardHeader');
				  var header1 = document.getElementById('dashboardHeader1');
				  google.visualization.events.addListener(chart, 'ready', function () {
					btnSave.disabled = false;
				  });

				  btnSave.addEventListener('click', function () {
					var doc = new jsPDF('Landscape');
					doc.setFontType("bold");
					doc.setFontSize(11);
					doc.text(20, 10, header.value);	
					doc.setFontType("normal");
					doc.text(20, 20, header1.value);
					doc.setFontType("normal");
					doc.addImage(chart.getImageURI(), -20, 25);	
					doc.setFontType("bold");	
					doc.setFontSize(12);
					doc.text(120, 35, 'FLOOD COLORCODE PER YEAR');	
					doc.setFontType("normal");	
					doc.text(250, 200, 'Date by: <?php echo date('M-d-Y'); ?>');

					doc.save('color-code-yearly.pdf');
				  }, false);
				  //end save command
				

				var options = {
				  title: 'Color Code Per Year',
				  is3D: true,
				  hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
				  vAxis: {minValue: 0},
				   series: {
					0: { color: '#e9f073' }
				  }
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_disease'));
				chart.draw(data, {
					  colors: ['#e9f073'],
					  is3D: true
					});
				  }
				</script>
			</div>
</div>	  
<!-- end -->
<!--para hindi mahide 'yung pinaka-sagad sa dulo na data-->
<div style="margin:40%;">
			<textarea id="dashboardHeader" cols="60" rows="2" readonly hidden>MMRL DASHBOARD REPORT
			</textarea>
			<textarea id="dashboardHeader1" cols="60" rows="2" readonly hidden>Tel. 642-9510/640-0138 
			</textarea>
</div>	
</div>	

</div></body>
</html>
