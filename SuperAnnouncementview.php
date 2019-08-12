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

$result = mysqli_query($con,"SELECT * FROM announcements");

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

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#008080">

    <a class="navbar-brand mr-1" href="admin.index.php">Super Admin - Panel</a>

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
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="demographics.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Demographics</span></a>
      </li>
      <br>
      <br>
      <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="heatmapping.php">
          <i class="fa fa-map-marker"></i>
          <span>Heatmapping</span></a>
        </li>
        <br>
      <br>
          <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="adminannouncement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Announcement</span></a>
        </li>
        <br>
      <br>
        <li class="nav-item">
        <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="Announcement.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Health tips</span></a>
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
          <a class="nav-link w3-bar-item w3-button w3-border-bottom" href="admincrowd.php">
          <i class="fa fa-tasks"></i>
          <span>Crowdsource Symptoms</span></a>
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
          <a href="SuperAnnouncementview.php">Announcement list</a>
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
    <?php
              while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['when'] . "</td>";
echo "<td>" . $row['what'] . "</td>";
echo "<td>" . $row['where'] . "</td>";
echo "<td>" . $row['who'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "</tr>";

}
?> </table>
</div>
</div>
</div>
</div>
</body>
</html>