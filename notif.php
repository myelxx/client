<?php
include('db/connection.php');
include('db/auth.php');

if (isset($_POST['btnsubmit'])){

      $notif = $_POST['announcement_what'];
      $notif_from = $_POST['announcement_who'];

      $sql = "INSERT into  notify VALUES ('','$notif','$notif_from')";

  if ($con->query($sql) === TRUE) {
 $message ="Register Successfully Post!";
 echo "<script type='text/javascript'>alert('$message');</script>";
  header("Refresh:0; url=notif.php");
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
          <div class="card-header"style="background-color:#4385C7">
            <i class="fas fa-table "></i>
            Send Reports</div>
             <div class="container">
      <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">
        <!-- <div class="card-header" style="background-color:#4385C7">
        <h3 class="panel-title" style="color: #fff;"><center>Input Announcement</center></h3>-->
      </div>
        <form action="" method="post" enctype="multipart/form-data">
          <br>
              <div class="form-group">
                <label for="exampleInputEmail">Notify Residents</label>
                <input type="username" class="form-control" placeholder="Title" id="exampleInputEmail"  name="announcement_what" required="required">
              </div>  
              
              
              <div class="form-group">
                <label for="telephone">Description</label>
                <input type="username" class="form-control" id="telephone" placeholder="Description" name="announcement_who" required="required">
                <br>
              
                   </div>
              <center><button class="btn-lg btn-primary" type="submit" name="btnsubmit">Submit</button></center></form>
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
