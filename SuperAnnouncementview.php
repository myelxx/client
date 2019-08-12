<?php
include('db/connection.php');
include('db/super-auth.php');

//for this query on top so the date filter will get the date pick

//query
$sql = "SELECT * FROM announcements";
// Date filter
if(isset($_POST['but_search'])){
  $fromDate = $_POST['fromDate'];
  $endDate = $_POST['endDate'];

  if(!empty($fromDate) && !empty($endDate)){ $sql .= " WHERE a_when  between '".$fromDate."' and '".$endDate."' "; }
}
// Sort
$sql .= "  ORDER BY a_when";

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

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- modal extensions -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
#content{
  width: 50%;
  margin: 20px auto;
  border: 1px solid #cbcbcb;
}
</style>
<body id="page-top">
  <!-- include the header -->
  <?php include('navigation/super-header.php'); ?>
  <div id="wrapper">   
  <!-- include the side nav -->
  <?php include('navigation/super-nav.php'); ?>
     <div id="content-wrapper">
      <div class="container-fluid">
        <div class="row">
						<div class="col-lg-6">
              <h2>  <i class="fa fa-bullhorn"></i> Announcement</h2>
						</div>
						<div class="col-lg-6">
              <a href='#add' data-toggle='modal' class="btn btn-primary" style="float:right;">Add New Announcement</a><br><br>
              <?php include('modal/announcement-button.php');?>
            </div>
					</div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="superAnnounce.php">Announcement</a>
          </li>
          <li class="breadcrumb-item">
          Announcement list
          </a>
        </ol>

        <!--  filter date -->
        <form method='post' action='' style="margin-left:15px;" autocomplete="off">
            <label>Filter Date: &nbsp;</label>
            <br>
            <input type='date' placeholder="Start Date" class='dateFilter' name='fromDate' id="fromDate" value='<?php if(isset($fromDate)){echo $fromDate; }?>' required>
			      <input type='date' placeholder="End Date" class='dateFilter' name='endDate' id="endDate" value='<?php if(isset($endDate)) echo $endDate; ?>' required>
			      <input type='submit' id="btnFilterDate" name='but_search' value='Filter Date' class='btn btn-primary'>
          </form>
          <br>

    <form method="post" action="">
     <div class="container">
      <div class="col-md-12">
      <div class="panel-warning">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
        <div class="form-group">
        <div class="row">

      <table id="mytable" class="table table-striped table-hover">
        <tr>
          <th>When</th>
          <th>What</th>
          <th>Where</th>
          <th>Who</th>
          <th>Image</th>
          <!-- <th>Date Created</th> -->
          <th>Function</th>
        </tr>
       
        <?php
        if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result))
              {
              $id = $row['ID'];
              echo "<tr>";
              echo "<td>" . $row['a_when'] . "</td>";
              echo "<td>" . $row['a_what'] . "</td>";
              echo "<td>" . $row['a_where'] . "</td>";
              echo "<td>" . $row['a_who'] . "</td>";
              echo "<td>";?> <img src="<?php echo $row["image"];?>" height="100" width="100"> <?php echo"</td>";
              // echo "<td>" . $row['date_created'] . "</td>";
              echo "<td> <a href=\"viewannounce.php?id=$row[ID]\">View</a> | <a href='#edit$id' data-toggle='modal'>Update</a>  |  <a href=\"delete.php?a_id=$row[ID]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
              include('modal/announcement-button.php');
              // echo "<td> <a href=\"viewannounce.php?id=$row[ID]\">View</a> | <a href=\"delete.php?a_id=$row[ID]\" onClick=\" return confirm('Are you sure you want to delete?')\">Delete</a></td>";
              echo "</tr>";
              }
         } 
         else
         {
          echo "<tr>";
          echo "<td colspan=5'>No record found.</td>";
          echo "</tr>";
         }
      ?> 

</table>

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
</body>

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
