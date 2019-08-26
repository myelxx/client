<?php

include('db/connection.php');
if(isset($_POST['btnSubmit'])){
    $tips = $_POST['tips_tips'];
    $title = $_POST['tips_title'];
    $source = $_POST['tips_source'];

    mysqli_query($conn,"INSERT INTO `health_tips` (`ID`, `Title`, `health_tips`, `source`, `date_created`) VALUES (NULL, '$title', '$tips', '$source', CURRENT_TIMESTAMP)");
    $message ="Health tips Successfully Post!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:healthtips.php');

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

  <!--added ckeditor -->
  <script src="healthtips/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top"style="background-color:#4385C7">

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
      <h6 style="padding-top: 2px; color: #fff;">Log out</h6>
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
          <span>Registered Users</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admin.index.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dashboard</span></a>
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
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="healthtips.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Health tips</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admincrowd.php">
          <i class="fa fa-tasks"></i>
          <span>Crowdsourcing</span></a>
        </li>
      </li>
      </li>
      </li>
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">
    	<h2><i class="fas fa-plus-square"></i> Health Tips</h2>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="healthtips.php">Health Tips</a>
          </li>
          <li class="breadcrumb-item">
          <a href="viewtips.php">View Health Tips</a>
          </a>
        </ol>
         </div>

         <form action="" method="post" enctype="multipart/form-data">
     <section id="main">
    <div class="container">
      <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">
        <div class="card-header" style="background-color:#4385C7">
        <h3 class="panel-title"style="color: #fff;"><center>Input Health Tips</center></h3>
      </div>

      <div class="panel-body">
        <div class="col-md-12 form-line">
        <form method="post" action="">
              <div class="form-group">
                <label for="exampleInputEmail">Title</label>
                <input type="text" class="form-control" placeholder="Enter health tips title..." name="tips_title" required="required">
              </div>  
               <div class="form-group">
                <label for="telephone">Health Tips</label>
                <textarea rows="4" cols="50" name="tips_tips" placeholder="Type your health tips here..." class="form-control form = usrform ckeditor"  required="required"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Source</label>
                <input type="text" class="form-control" placeholder="Enter the health tips source..." id="exampleInputEmail"  name="tips_source" required="required">
              </div> 
              <center><button class="btn-lg btn-primary" type="sumbmit" name="btnSubmit"> Submit</button></center>
                 </div>
            </div>
          </form>
      </div>

</div>
</div>
</div>
</section>
</form>
<footer class="sticky-footer" style="background-color: #ffcc5c">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><h2 style="color: #fff;">Mandaluyong Health Center<h2></span>
          </div>
        </div>
      </footer>
       </li>
     </body>
     </html>