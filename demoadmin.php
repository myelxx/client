<?php
include('db/connection.php');
include('db/auth.php');

$result = mysqli_query($con,"SELECT COUNT(*) as total from admin");
$row = mysqli_fetch_array($result);

$result = mysqli_query($con,"SELECT COUNT(*) as total2 from announcements");
$row2 = mysqli_fetch_array($result);

$result = mysqli_query($con,"SELECT COUNT(*) as total3 from patient");
$row3 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

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

</head>


<body id="page-top">
  <!-- include the header -->
  <?php include('navigation/header.php'); ?>
    <div id="wrapper">   
    <!-- include the side nav -->
    <?php include('navigation/side-nav.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!--<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>-->
           <!--<li class="breadcrumb-item active">Overview</li>-->
        </ol>

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
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo($row3['total3']);?> Crowdsourcing </div>
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
                <div class="mr-5">Patients records Validated</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              
              </a>
            </div>
          </div>
        </div>
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header "style="background-color:#4385C7">
            <i class="fas fa-table"></i>
            Gender</div>
             <div id="chartdiv1" style="width: 100%; height: 400px;"></div>
             <div class="card mb-3">
          <div class="card-header "style="background-color:#4385C7">
            <i class="fas fa-table"></i>
          Symptoms</div>
             <div id="chartdiv2" style="width: 100%; height: 400px;"></div>
              <div class="card-body">

               <!--  <canvas class="my-4 w-100" id="myChart" style="height:40vh; width:80vw"></canvas>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="js/bootstrap.min.js"></script>
                
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
                <script>

                  var ctx = document.getElementById("myChart");
                  var myChart = new Chart(ctx,
                  {
                    type: 'bar', //chart type
                    data:
                    {
                      labels: ['Gender'], //title of the chart
                      datasets:
                      [
                      {
                        label: 'Male', //title of the data
                        backgroundColor: "#000080", //Bg color of the graph
                        data: [5] //Number of males or yung php data
                      },
                      {
                        label: 'Female', //title of the data
                        backgroundColor: "#55eb9b", //Bg color of the graph
                        data: [10] //Number of Females or yung php data
                      },
                      // {
                      //   label: 'Female', //title of the data
                      //   backgroundColor: "#55eb9b", //Bg color of the graph  //to add another graph just
                      //   data: [10] //Number of Females or yung php data      // this pattern
                      // }
                      ]
                    },

                    options: 
                    {
                      legend: 
                      {
                        display: false,
                        position: 'bottom',
                        labels: 
                        {
                          fontColor: "#000080",
                        }
                      },
                      scales: 
                      {
                        yAxes: 
                        [{
                          ticks: 
                          {
                            beginAtZero: true
                          }
                        }]
                      }
                    }
                  });
                </script> -->
      
         <script type="text/javascript">
       AmCharts.makeChart( "chartdiv1", {
       "type": "serial",
        "theme": "light",
       "dataLoader":{
       "url":"json_encode1.php",
       "format":"json"
  },

        "categoryField":"Gender",
        "rotate": false,

        "categoryAxis": {
        "gridPosition": "start",
        "axisColor": "#DADADA"
  },
         "valueAxes": [ {
         "axisAlpha": 0.2

  } ],
            "graphs": [ {
            "type": "column",   
            "title": "Completed", 
            "valueField": "count", 
            "lineAlpha": 0, 
            "fillAlphas": 0.8,
    "balloonText":"Count: <b>[[value]]</b>"
  }]
});
</script>
 
  <script type="text/javascript">
       AmCharts.makeChart( "chartdiv2", {
       "type": "serial",
        "theme": "light",
       "dataLoader":{
       "url":"json_encode1.php",
       "format":"json"
  },

        "categoryField":"Gender",
        "rotate": false,

        "categoryAxis": {
        "gridPosition": "start",
        "axisColor": "#DADADA"
  },
         "valueAxes": [ {
         "axisAlpha": 0.2

  } ],
            "graphs": [ {
            "type": "column",   
            "title": "Completed", 
            "valueField": "count", 
            "lineAlpha": 0, 
            "fillAlphas": 0.8,
    "balloonText":"Count: <b>[[value]]</b>"
  }]
});
</script>




          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br><br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <!--
          <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            
            <span><h2>Communicable disease Reduction & Environmental awareness</h2></span>
          </div>
        </div>
      </div>
      </footer>
        -->
       <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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