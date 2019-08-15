<?php
include('db/connection.php');
include('db/auth.php');
echo $_SESSION['sid'];
if (isset($_POST['btnsubmit'])){

      $target =basename("images/".$_FILES['image']['name']);

      $images = "images/". $_FILES['image']['name'];
      $what = $_POST['announcement_what'];
      $when = date("M d, Y", strtotime($_POST['announcement_when']));
      $where = $_POST['announcement_where'];
      $who = $_POST['announcement_who'];
      $date_created = date('M d, Y');

      if (move_uploaded_file("images/".$_FILES['image']['tmp_name'],$target)) {
          $msg = "success";
     }
    
     $sql = "INSERT INTO announcements (a_what,a_when,a_where,a_who,image,date_created) VALUES ('$what','$when','$where','$who','$images','$date_created')";
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
  <!-- include the header -->
  <?php include('navigation/header.php'); ?>
  <div id="wrapper">
  <!-- include the side nav -->
  <?php include('navigation/side-nav.php'); ?>
    <div id="content-wrapper">
      <div class="container-fluid">
    	<h2>  <i class="fa fa-bullhorn"></i> Announcement</h2>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="Announcement.php">Announcements</a>
          </li>
          <li class="breadcrumb-item">
          <a href="anouncementview.php">Announcement list</a>
          </a>
        </ol>
         </div>
      <div class="container">
      <div class="col-md-12">
      <div class="panel panel-default">
        <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail">What</label>
                <input type="username" class="form-control" placeholder="Enter what is the announcement..." id="exampleInputEmail"  name="announcement_what" required="required">
              </div>  
              
               <div class="form-group">
                <label for="telephone">When</label>
                <input type="date" class="form-control" id="when" name="announcement_when" required="required">
              </div>

               <div class="form-group">
                <label for="telephone">Where</label>
                <input type="username" class="form-control" id="telephone" placeholder="Enter when.." name="announcement_where" required="required">
              </div>
              <div class="form-group">
                <label for="telephone">Who</label>
                <input type="username" class="form-control" id="telephone" placeholder="Enter who are involve..." name="announcement_who" required="required">
                <br>
                <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div>
                <input type="hidden" name="size" value="1000000">
              </div>
              </div>
              <div class="form-group">
                <label for="telephone">Image attachment: </label>
                <input type="file" name="image">
              </div>
          </div>
                   </div>
              <center><button class="btn-lg btn-primary" type="submit" name="btnsubmit">Submit</button></center></form>
          	</div>
            </div>
          </div>


      </div>
      
      <!-- /.container-fluid -->


      <!-- <footer class="sticky-footer" style="background-color: #ffcc5c">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2 style="color: #fff;">Mandaluyong Health Center<h2></span>
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

    <!--disable previous date -->
    <script>
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
      $('#when').attr('min', maxDate);
    });
    </script>
</body>

</html>
