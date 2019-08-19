<?php
include('db/connection.php');
include('db/auth.php');
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
    <div class="container">
    <div clas="form-group">
  <div class="row">
    <div class="col-lg-6">
      <h1 class="pink"><span class="fas fa-bullhorn"></span>Symptoms</h1>
		</div>
		<div class="col-lg-6">      
      <a href='#add_symptoms' data-toggle='modal' class="btn btn-primary" style="margin-top: 2%; float:right;">Add Symptoms</a><br><br>
      <?php include('modal/disease-button.php');?>
    </div>
  </div>
   </div>

   <div class="card mb-3">
            <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="admindisease.php">Disease</a>
          </li>
          <li class="breadcrumb-item">
            Symptoms
          </li>
        </ol>
    </div>

<!--table -->
<div class="card-body">
            <div class="panel-body">
            <table id="table_id" class="display">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Symptoms Name</th>
                    <th>Function</th>
                  </tr>
                </thead>
               
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Symptoms Name</th>
                    <th>Function</th>
                  </tr>
                </tfoot>
                 <?php
                 $disease_query = "SELECT * FROM symptoms";
                $disease_result = mysqli_query($con,$disease_query);
                if(mysqli_num_rows($disease_result) > 0){
                  while($row = mysqli_fetch_array($disease_result))
                  {
                  echo "<tr>";
                  echo "<td>" . $row['symptoms_id'] . "</td>";
                  echo "<td>" . $row['symptoms_name'] . "</td>";
                  echo "<td> <a href='#edit_symptoms$row[symptoms_id]' data-toggle='modal'>Update</a>  |  <a href=\"delete-crowdpatient.php?s_id=$row[symptoms_id]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                  include('modal/disease_symptoms/s-edit-button.php');
                  echo "</tr>";
                  }
                }
                else 
                {
                    echo "<tr>";
                    echo "<td colspan=8'>No record found.</td>";
                    echo "</tr>";
                }
            ?> 
</table>
</div>
</div>
<!-- end table -->


</div>
      <!-- /.container-fluid -->
<!-- 
   <footer class="sticky-footer" style="background-color: #ffcc5c">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2>Mandaluyong Health Center<h2></span>
            </div>
        </div>
      </footer> -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
    
    <!-- /.content-wrapper -->

  
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
