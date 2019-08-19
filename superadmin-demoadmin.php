<?php
include('db/connection.php');
include('db/super-auth.php');

$result = mysqli_query($con,"SELECT COUNT(*) as total from admin where status=1");
$row = mysqli_fetch_array($result);

$result = mysqli_query($con,"SELECT COUNT(*) as total2 from announcements");
$row2 = mysqli_fetch_array($result);

$result = mysqli_query($con,"SELECT COUNT(*) as total3 from patient where status=1");
$row3 = mysqli_fetch_array($result);

$result = mysqli_query($con,"SELECT COUNT(*) as total4 from health_tips");
$row4 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en" style="overflow-y: hidden;">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MMRL</title>
   
          <script type="text/javascript" src="Charts/amcharts/amcharts.js"></script>
          <script type="text/javascript" src="Charts/amcharts/serial.js"></script>
          <script type="text/javascript" src="Charts/dataloader.min.js"></script>
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="Charts/amcharts/themes/light.js"></script>

          <script src="https://www.amcharts.com/lib/4/core.js"></script>
          <script src="https://www.amcharts.com/lib/4/charts.js"></script>
          <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
        
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- url for the charts -->
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


<body id="page-top">
  <!-- include the header -->
  <?php include('navigation/super-header.php'); ?>
    <div id="wrapper">   
    <!-- include the side nav -->
    <?php include('navigation/super-nav.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <div class="mr-5"> <?php echo($row['total']);?> Registered Users</div>
              </div>
    
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo($row2['total2']);?> Announcements</div>
              </div>
              
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5"><?php echo($row3['total3']);?> Validated Crowdsourcing Data </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"> <?php echo($row2['total2']);?> Healt Tips </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              
              </a>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header "style="background-color:#4385C7; color: white;">
            <i class="fas fa-table"></i> Bar Graph for Total Count per 	Disease
          </div>
          <div  style="width: 100%; height: 400px;">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3" id="firstDiv" >
              <div class="card-body">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                
                <form name="filter" method="POST" action="dashboard.php#firstDiv">
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
                <input hidden id="save-pdf" type="button" value="Save as PDF" />
                <div id="chart_total_count_per_disease" style="width: 100%; height: 70%;"></div>
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

                  $disease_sql = "SELECT predicted_disease as disease, count(predicted_disease) as disease_count FROM patient ".$filterDate." GROUP BY  predicted_disease";
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
                    var container = document.getElementById('chart_total_count_per_disease');
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
                    vAxis: {title: 'Total Disease Count'},
                    hAxis: {title: 'Disease Type'
                    },
                    colors: ['#800000','#e6194b','#3cb44b'],
                    seriesType: 'bars',
                    series: {4: {type: 'line'}}
                  };

                  var chart = new google.visualization.ComboChart(document.getElementById('chart_total_count_per_disease'));
                  chart.draw(data, options);
                  }
                </script>
                </div>
          </div>
          <!-- end -->
          
        <div class="card mb-3">
          <div class="card-header "style="background-color:#4385C7; color: white;">
            <i class="fas fa-table"></i> Area Chart for Disease indication per year
          </div>
          <div style="width: 100%; height: 400px;">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3" id="secondDiv">
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
                    <option <?php if(!empty($displayed_disease)){ echo 'selected' ;}  ?> value="<?php echo $row["disease_name"];?>"><?php echo $row["disease_name"];?></option>
                    <?php }}?>
                    </select>
                    </div>
                    <div class="d-inline-block">
                    <input type="submit" name="btnChart2FilterDisease" id="btnChart2FilterDisease" value="Filter">
                    </div>
                </form>
                <input hidden id="one-save-pdf" type="button" value="Save as PDF" />
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
                  $stmt = $conPDO->query('SELECT * FROM patient WHERE predicted_disease="'.$displayed_disease.'" AND year(date_created)='. $curyear); 
                  $row_count = $stmt->rowCount();
                  $disease_cur = $row_count;
                  //disease one app report
                  $stmt = $conPDO->query('SELECT * FROM patient WHERE predicted_disease="'.$displayed_disease.'" AND year(date_created)='. $oneYearBefore); 
                  $row_count = $stmt->rowCount();
                  $disease_one = $row_count;
                  //disease two app report
                  $stmt = $conPDO->query('SELECT * FROM patient WHERE predicted_disease="'.$displayed_disease.'" AND year(date_created)='. $twoYearBefore); 
                  $row_count = $stmt->rowCount();
                  $disease_two = $row_count;
                  //disease three app report
                  $stmt = $conPDO->query('SELECT * FROM patient WHERE predicted_disease="'.$displayed_disease.'	" AND year(date_created)='. $threeYearBefore); 
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
                    title: 'Disease Count per year',
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

          <!-- start -->
          <div class="card mb-3">
            <div class="card-header "style="background-color:#4385C7">
              <i class="fas fa-table"></i>  Bar Graph for Disease and Total Symptoms
            </div>
            <div style="width: 100%; height: 400px;">
            <!-- Example Pie Chart Card-->
            <div class="card mb-3" id="chartThreeDiv" >
              <div class="card-header">
                <i class="fa fa-bar-chart"></i> Bar Graph for Disease and Total Symptoms</div>
                <div class="card-body">
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  
                  <form name="filter" method="POST" action="dashboard-2.php">
                      <div class="d-inline-block">
                      <p>Filter the dashboard:</p>
                      </div>
                      <select name="disease_list">
                      <?php
                      $disease_sql = "SELECT distinct(disease_name) FROM disease";
                      $disease_result = $conn->query($disease_sql);
                      if ($disease_result->num_rows > 0) {
                        // output data of each row
                        while($row = $disease_result->fetch_assoc()) {
                      ?>
                      <option <?php if(!empty($_POST['disease_list'])){ echo 'selected' ;}  ?> value="<?php echo $row["disease_name"];?>"><?php echo $row["disease_name"];?></option>
                      <?php }}?>
                      </select>
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
                  <input hidden id="save-pdf" type="button" value="Save as PDF" />
                  <div id="chart_disease_total_symptoms" style="width: 100%; height: 70%;"></div>
                  <?php
                    
                    $yearly = ' date_created > DATE_SUB(NOW(), INTERVAL 1 YEAR)';
                    
                    if(isset($_POST['btnFilterDate'])){
                      if(isset($_POST['filter_date'])){
                        $display_disease = $_POST['disease_list'];
                        $month = $_POST['month'];
                        $selectDate = $_POST['filter_date'];
                        $daily = ' date_created > DATE_SUB(NOW(), INTERVAL 1 DAY)';
                        $monthly = ' month(date_created) = "'.$month.'" ';
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
                      array('Symptoms', 'Count')
                    );
                    $disease_sql = "SELECT s.symptoms_name, count(s.symptoms_name) as count FROM disease_symptoms ds INNER JOIN disease d ON d.disease_id = ds.disease_id INNER JOIN symptoms s ON s.symptoms_id = ds.symptoms_id INNER JOIN patient p ON p.disease_id = ds.disease_id WHERE d.disease_name = '".$display_disease."' AND ".$filterDate."GROUP BY s.symptoms_name";
                    $disease_result = $conn->query($disease_sql);
                      if ($disease_result->num_rows > 0) {
                        // output data of each row
                        while($row = $disease_result->fetch_assoc()) {
                        array_push($data, array($row['symptoms_name'], (int)$row['count']));
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
                      var container = document.getElementById('chart_disease_total_symptoms');
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
                      doc.addImage(chart.getImageURI(), -25, 15);	
                      //doc.addImage(chart.getImageURI(), 15, 25);	
                      doc.setFontType("bold");		
                      doc.setFontSize(12);
                      doc.setFontType("normal");	
                      doc.text(250, 200, 'Date by: <?php echo date('M-d-Y'); ?>');
                      
                      doc.save('chart-disease-symptoms-total.pdf');
                    }, false);

                    var options = {
                      title : '<?php if(isset($_POST['filter_date'])){
                        $filterHolder=$_POST['filter_date']; 
                        if($filterHolder=='Monthly'){echo "Monthly Report - Month of " . $word_month;} 
                        if($filterHolder=='Daily'){echo "Daily Report of " . $current_date;}
                        if($filterHolder=='Yearly'){echo "Yearly Report - Year ". $current_year;}
                      } else {echo "Yearly - Year " . $current_year;}?>',
                      is3D:true,
                      vAxis: {title: 'Total number per symptoms'},
                      hAxis: {title: 'Disease: <?php echo $display_disease; ?>'
                      },
                      colors: ['#800000','#e6194b','#3cb44b'],
                      seriesType: 'bars',
                      series: {4: {type: 'line'}}
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_disease_total_symptoms'));
                    chart.draw(data, options);
                    }
                  </script>
                  </div>
            </div>
            <!-- end -->
            </div>
          </div>
          <!-- end -->
          </div>
          </div>
          </div>
        </div>

     
<!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="db/logout.php?id=$_SESSION['id']">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>