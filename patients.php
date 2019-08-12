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
if (isset($_POST['firstname'])){
      $firstname = $_POST['firstname'];
      $address = $_POST['address'];
      $birthdate = $_POST['bdate'];
      $contact = $_POST['contact_no'];
      $symptoms1 = $_POST['symptoms1'];
      $symptoms2 = $_POST['symptoms2'];
      $date_chck_up = $_POST['date_chk'];
      $gender    = $_POST['gender'];
      

      
       $sql = "INSERT into patients VALUES ('ID','$firstname','$address','$birthdate','$contact','$symptoms1','$symptoms2','$date_chck_up','$gender')"; 
     $result = mysqli_query($con,$sql);

  if ($con->query($sql) === TRUE) {
 $message ="Patients records Successfully Post!";
 echo "<script type='text/javascript'>alert('$message');</script>";
  header("Refresh:0; url=patients.php");
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

  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#4385C7">

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
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="patients.php">
          <i class="fa fa-male"></i>
          <span>Patients Validation</span></a>
        </li>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="healthtips.php">
          <i class="fa fa-male"></i>
          <span>health tips</span></a>
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
    	<h2><i class="fas fa-user-injured"></i>Patients Validation</h2>
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
        <div class="card-header "style="background-color:#4385C7">
        <h3 class="panel-title"><center>Input Patients Records</center></h3>
      </div>
        <form action="" method="post">
          <div class="row">

        <div class="col-sm-6">
        <p>Full Name</p>
        <input type="text" name="firstname" class="form-control"placeholder="Enter name" required>
       </div>

        <div class="col-sm-6">
        <p>Address</p>
        <input type="text" name="address" class="form-control"placeholder="Enter Address" required>
       <br>
        </div>
       <div class="col-sm-6">
        <p>Birthdate</p>
       <input type="date" name="bdate" class="form-control"placeholder="Enter birthdate" required>
    <br>
       </div>
      <div class="col-sm-6">
        <p>Contact no.</p>
        <input type="text" name="contact_no" class="form-control"placeholder="Enter contact number" required>
       <br>
       </div>
       <div class="col-sm-6">
        <table style="border: 2px solid black">
        <p>Symptoms</p>
    <tr>
        <td>
        <input type="checkbox" name="vehicle1"  value="Bike">Headache<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Nausea<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Pain behind the eyes<br>
        </td>
    </tr>
        <td>
        <input type="checkbox" name="vehicle2"  value="Car">Rushes<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Fever<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Swollen glands<br>
        </td>
    </tr>
        <td>
        <input type="checkbox" name="vehicle3" value="Boat">Diarrhea<br>
         </td>
         <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Jaundice(yellow skin and eyes)<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Muscle aches<br>
        </td>
    </tr>
        <td>
        <input type="checkbox" name="vehicle2"  value="Car">Vomiting<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Abdominal pain<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Chills<br>
        </td>
    </tr>
        <td>
        <input  type="checkbox" name="vehicle3" value="Boat" >Chest or abdominal pain<br>
        </td>
          <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Sweating<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Cough<br>
        </td>
    </tr>
        <td>
        <input type="checkbox" name="vehicle2"  value="Car">Seizures<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle2"  value="Car">Dehydration<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Sore throat<br>
        </td>
    </tr>
        <td>
        <input  type="checkbox" name="vehicle3" value="Boat" >Dry cough<br>
        </td>
        <td>
          <input  type="checkbox" name="vehicle3" value="Boat">skin rash<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Inflamed eyes (conjunctivitis)<br>
        </td>
    </tr>
        <td>
        <input  type="checkbox" name="vehicle3" value="Boat" >Muscle pain<br>
        </td>
        <td>
          <input  type="checkbox" name="vehicle3" value="Boat">Muscle pain<br>
        </td>
        <td>
          <input type="checkbox" name="vehicle1"  value="Bike">Fever<br>
        </td>
        </tr>
      </tr>
        </table>
       </div>
       <br>
       <div class="col-sm-6">
        <p>Assesment/Prescription</p>
        <input type="text" name="symptoms1" class="form-control"  placeholder="" required>
        <br>
       </div>
       <br>
       <br>
        <div class="col-sm-6">
        <p>Possible Disease</p>
        <input type="text" name="Possible_Diseases" disabled  class="form-control"required>
       </div>
       <div class="col-sm-6">
        <p>Date  up</p>
        <input type="date" name="date_chk" class="form-control"  placeholder="Enter date checke up" required>
       </div>
       <div class="container">
       	<br>
       	<center><span id="">Male </span><input type="radio" name="gender" value="male"></center>
        <center> <span id=""> Female </span><input type="radio" name="gender" value="female"></center>
          <center><button class="btn-lg btn-primary" type="submit" name="btnsubmit">Submit</button></center>
         

      </div>
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