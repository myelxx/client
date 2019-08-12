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

$result = mysqli_query($con,"SELECT * FROM patients");

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

  <nav class="navbar navbar-expand navbar-dark static-top"  style="background-color:#4385C7">

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
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admin.index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admin.index.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Demographics</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="heatmapping.php">
          <i class="fa fa-map-marker"></i>
          <span>Heatmapping</span></a>
        </li>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="Announcement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Announcement</span></a>
        </li>
         <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="Patients.php">
          <i class="fa fa-male"></i>
          <span>Patients Validation</span></a>
        </li>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="healthtips.php">
          <i class="fa fa-male"></i>
          <span>Health tips</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admincrowd.php">
          <i class="fa fa-tasks"></i>
          <span>Crowdsourcing</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="valid.php">
          <i class="fa fa-male"></i>
          <span>Valid Data</span></a>
        </li>
      </li>
      </li>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
      <h2><i class="fa fa-bullhorn"></i>Patients Validation</h2>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="patients.php">Patients</a>
          </li>
          <li class="breadcrumb-item">
          <a href="patientslist.php">Patients list</a>
          </a>
        </ol>
         </div>
      <div class="container">
      <div class="panel panel-default">
      <div class="panel-heading">
        <form action="" method="post">
          <div class="card mb-12">
          <div class="card-header" style="background-color:#4385C7">
            <i class="fas fa-table "></i>Patients Records
          </div>
          <div class="card-body">
            <div class="panel-body">
            <table id="table_id" class="display ">
            <div class="table-responsive">
              <table class="table-responsive table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Contact number</th>
                    <th>Symptom1</th>
                    <th>Symptom2</th>
                    <th>Date checked up</th>
                    <th>Gender</th>
                   <th>Function</th>

                  </tr>
                 
                </thead>
               
                <tfoot>
                   <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Contact number</th>
                    <th>Symptom1</th>
                    <th>Symptom2</th>
                    <th>Date checked up</th>
                    <th>Gender</th>
                    <th>Function</th>
                   

        
                     </td></tr>
                    </div>
             
                  </tr>
               
                </tfoot>
                                     <?php
              while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['birthdate'] . "</td>";
echo "<td>" . $row['contact_no'] . "</td>";
echo "<td>" . $row['symp1'] . "</td>";
echo "<td>" . $row['symp2'] . "</td>";
echo "<td>" . $row['datechk'] . "</td>";
echo "<td>" . $row['Gender'] . "</td>";
echo "<td> <a href=\"delete.php?patient_ID=$row[ID]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "</tr>";

}
?>
</table>
</div>
</div>
</div>
      <!-- /.container-fluid -->
          </form>
            </div>
            </div>
          </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer" style="background-color: #ffcc5c">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2>Mandaluyong Health Center<h2></span>
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