<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['announcement_what'])){
      $what = $_POST['announcement_what'];
      $when = $_POST['announcement_when'];
      $where = $_POST['announcement_where'];
      $who = $_POST['announcement_who'];
      
       $sql = "INSERT into announcements VALUES ('','$what','$when','$where','$who','$status')";
     $result = mysqli_query($con,$sql);

  if ($con->query($sql) === TRUE) {
 $message ="Announcement Successfully Post!";
 echo "<script type='text/javascript'>alert('$message');</script>";
  header("Refresh:0; url=announcement.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

   }


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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#008080">

    <a class="navbar-brand mr-1" href="index.html">Admin-Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <div class="input-group-append">
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
       
      </li>
      <h6 style="padding-top: 2px">Log out</h6>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>


  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="superadmin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <br>
      <br>
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom"  href="admin.index.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Demographics</span></a>
      </li>
      <br>
      <br>
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="heatmap.php">
          <i class="fa fa-map-marker"></i>
          <span>Heatmapping</span></a>
        </li>
        <br>
      <br>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="Announcement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Announcement</span></a>
        </li>
        <br>
      <br>
         <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="patients.php">
          <i class="fa fa-male"></i>
          <span>Residents Validated Data</span></a>
        </li>
        <br>
      <br>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="healthtips.php">
          <i class="fa fa-male"></i>
          <span>Healtht tips</span></a>
        </li>
        <br>
      <br>
            <li class="nav-item">
          <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admincrowd.php">
          <i class="fa fa-tasks"></i>
          <span>Crowdsource Symptoms</span></a>
        </li>
      
      </li>
      </li>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
      <h2>  <i class="fa fa-bullhorn"></i> Announcement</h2>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="superAnnounce.php">Announcements</a>
          </li>
          <li class="breadcrumb-item">
          <a href="SuperAnnouncementview.php">Announcement list</a>
          </a>
        </ol>
         </div>
      <div class="container">
      <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">
         <div class="card-header" style="background-color:#008080">
        <h3 class="panel-title">Input Announcement</h3>
      </div>
        <form action="" method="post">
              <div class="form-group">
                <label for="exampleInputEmail">What</label>
                <input type="username" class="form-control" placeholder="What" id="exampleInputEmail"  name="announcement_what" required="required">
              </div>  
              
               <div class="form-group">
                <label for="telephone">When</label>
                <input type="date" class="form-control" name="announcement_when" required="required">
              </div>

               <div class="form-group">
                <label for="telephone">Where</label>
                <input type="username" class="form-control" id="telephone" placeholder="Where" name="announcement_where" required="required">
              </div>
              <div class="form-group">
                <label for="telephone">Who</label>
                <input type="username" class="form-control" id="telephone" placeholder="Who" name="announcement_who" required="required">
              </div>
              <center><button class="btn-lg btn-primary" type="submit" name="btnsubmit">Submit</button></center></form>
            </div>
            </div>
          </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2>Communicable disease Reduction & Environmental awareness<h2></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
          <a class="btn btn-primary" href="Create.php">Logout</a>
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
