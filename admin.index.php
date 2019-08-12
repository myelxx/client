<?php
include('db/connection.php');
include('db/auth.php');

$result = mysqli_query($con,"SELECT * FROM admin");
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- modal extensions -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="page-top">
  <!-- include the header -->
  <?php include('navigation/header.php'); ?>
  <div id="wrapper">   
  <!-- include the side nav -->
  <?php include('navigation/side-nav.php'); ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        </div>
     <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="background-color:#4385C7; color:white;">
            <i class="fas fa-table"></i> Registered Users
            </div>
          <div class="card-body">
            <div class="panel-body">
            <table id="table_id" class="display">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                     <th>Email Address</th>
                    <th>Name</th>
                    <th>Birth date</th>
                    <th>Address</th>
                    <th>Barangay</th>
                    <th>Contact number</th>
                    <th>function</th>
                  </tr>
                </thead>
               
                <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Name</th>
                    <th>Birth date</th>
                    <th>Address</th>
                    <th>Barangay</th>
                    <th>Contact number</th>
                    <th>Action</th>
                    </div>
             
                  </tr>
               
                </tfoot>
               
                  <?php
                  while($row = mysqli_fetch_array($result))
                  {
                  $id = $row['ID'];
                  echo "<tr>";
                  echo "<td>" . $row['ID'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['email_address'] . "</td>";
                  echo "<td>" . $row['first_name'] . " " . $row['last_name']  . "</td>";
                  echo "<td>" . $row['birth_date'] . "</td>";
                  echo "<td>" . $row['address'] . "</td>";
                  echo "<td>" . $row['brgy'] . "</td>";
                  echo "<td>" . $row['contact_no'] . "</td>";
                  echo "<td> <a href='#edit$id' data-toggle='modal'>Update</a> | <a href=\"delete.php?id=$row[ID]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                  include('modal/button.php');
                  //echo "<td> <a href=\"edit.php?id=$row[ID]\">Update</a> | <a href=\"delete.php?id=$row[ID]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                  echo "</tr>";
                  }
                  ?> 
               
              </table>
            </div>
          </div>
      
        </div>

      </div>

      <!-- Sticky Footer -->
      <footer class="sticky-footer" style="background-color: #ffcc5c">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2 style="color: #fff;">Mandaluyong Health Center</h2></span>
          </div>
        </div>
      </footer>

    </div>

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
