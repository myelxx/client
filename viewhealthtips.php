<?php
include('db/connection.php');
include('db/auth.php');

$sql = "SELECT * FROM health_tips WHERE id=" . $id;
$result = mysqli_query($con,$sql);


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
  
  <style>
  body {
    background-color: #f5f5f5;
  }
  #announcements th {
    border: 1px solid #ddd;
    padding: 8px;
  }
    #announcements th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    color: white;
  }

  #announcements {
    border: 1px solid #ddd;
    border-collapse: collapse;
    width:70%; 
      margin-left:15%; 
      margin-right:15%;
  }

  .newspaper {
    margin: 2% 2% 2% 2%;
    background-color: #fff;
    border-style: outset;
  }

  .title {
    padding: 0.2%;
    background-color: #35a7db;
    color: white;
    padding-bottom: 1%;
  }

  .article {
      display: inline-block;
    }

  .article
  {
    margin: 3%;
    width: 90%;
    font-size: 1em;
    /* word-wrap: break-word; */
  }

  #float_img {
    margin-right: 1%;
    float:right;
    width: 15%;
    max-width: 500px;
    max-height: 500px;
  }

  .article_footer{
    height: 10px;
    background-color: #35a7db;
    color: white;
  }

  </style>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark  static-top" style="background-color:#4385C7">

    <a href="viewtips.php" class="navbar-brand mr-1" href="admin.index.php">Admin - Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <div class="input-group-append">
          </button>
        </div>

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
      
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          <?= $_SESSION['admin'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          &nbsp;<?= $_SESSION['admin'] ?>
          <br>
          &nbsp;<?= $_SESSION['location'] ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>


  </nav>

<div id="content-wrapper">
      <div class="container-fluid">
      <h2>  <i class="fa fa-bullhorn"></i> Health Tips</h2>

</div>
<?php 
while($row = mysqli_fetch_array($result)){
    $title = $row['Title'];
    $date_Created = date("D F d,Y h:s A", strtotime($row['date_created']));
    $tips = $row['health_tips'];
    $source = $row['source'];
    $image = $row['images'];
?>
<div class="newspaper">
<!-- title -->
<div class="title"><center>
  <h4><b> <?= $title ?> </b></h4>
  <small> Posted: <?= $date_Created ?></small>
</center></div>
<div class="body">
<div class="article"> 
<img id="float_img" src="<?= $image ?>" alt="embedded_image">
<p>These are the health tips for <?= $title ?>:</p>
<p>
<?= $tips ?>
</p>
</div>
</div>

<div class="article_footer"></div>
</div>
<?php } ?>
</body>
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

</html>