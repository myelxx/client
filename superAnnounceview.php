<?php

include('db/connection.php');
include('db/super-auth.php');

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

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-success static-top">

    <a class="navbar-brand mr-1" href="index.html">Super Admin - Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
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
        <a class="nav-link" href="admin.1index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="demographics.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Demographics</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="heatmapping.php">
          <i class="fa fa-map-marker"></i>
          <span>Heatmapping</span></a>
        </li>
          <li class="nav-item">
        <a class="nav-link" href="adminannouncement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Announcement</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="Announcement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Health tips</span></a>
        </li>
 
          <li class="nav-item">
        <a class="nav-link" href="Patients.php">
          <i class="fa fa-male"></i>
          <span>Patients</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="admincrowd.php">
          <i class="fa fa-tasks"></i>
          <span>Crowdsourcing</span></a>
      </li>
        
         <li class="nav-item">
        <a class="nav-link" href="valid.php">
          <i class="fa fa-male"></i>
          <span>Valid Data</span></a>
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
            <a href="superAnnounce.php">Announcement</a>
          </li>
          <li class="breadcrumb-item">
          <a href="superAnnounceview.php">Announcement list</a>
          </a>
        </ol>
    <form method="post" action="">
     <div class="container">
      <div class="col-md-12">
      <div class="panel-warning">
      <div class="panel-heading">
      <h3 class="panel-title">Announcements</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
        <div class="row">
        <form action="anouncementview.php" method="post">
          <table class="table table-striped">
               <div class="col-md-3">  
               <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br><br>  
              </form>
      <table id="mytable" class="table table-striped table-hover">
        <tr>
          <th>When</th>
          <th>What</th>
          <th>Where</th>
          <th>Who</th>
          <th>Status</th>
          <th></th>

        </tr>
    </table>
 </table>
</table>
</div>
</div>
</div>
</div>
</body>
</html>