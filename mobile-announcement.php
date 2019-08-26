<?php
include('db/connection.php');

$id = $_GET['id'];
$sql = "SELECT * FROM announcements WHERE id=" . $id;
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
  $announcement_title = $row['a_what'];
  $announcement_when =  date("F d,Y (D)", strtotime($row['a_when'])); 
  $announcement_who = $row['a_who'];
  $announcement_where = $row['a_where'];
  $announcement_created = date("D F d,Y h:s A", strtotime($row['date_created'])); 
  $announcement_img = $row['image'];
}

//changes language set up of announcement
// $sid = $_SESSION['sid'];
$sid = 1;
$sql = "SELECT * FROM announcement_details WHERE id=$sid";
$d_result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($d_result)){
  $greetings = $row['greetings'];
  $first = $row['first'];
  $second = $row['second'];
  $third = $row['third'];
  $fourth = $row['fourth'];
  $fifth = $row['fifth'];
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
  margin: 2%;
  background-color: #fff;
  border-style: outset;
}

.title {
  padding: 0.5%;
  background-color: #35a7db;
  color: white;
}

.img, .article {
    display: inline-block;
  }

.img {
  width: 30%;
  padding: 2%;
}

.article
{
  margin: 3%;
  width: 90%;
  font-size: 1.1em;
  /* word-wrap: break-word; */
}

.article_footer{
  height: 10px;
  background-color: #35a7db;
  color: white;
}

#announcement_img {
  margin: 1%;
  float:left;
  width: 30%;
  max-width: 200px;
  max-height: 500px;
}

p {
  margin-top: 3%;
}
</style>
<div id="content-wrapper">
      <div class="container-fluid">
      <h2>  <i class="fa fa-bullhorn"></i> Announcement</h2>

</div>

<div class="newspaper">

<!-- title -->
<div class="title"><center>
      <h3><b> <?= $announcement_title ?> </b></h3>
      <small> Posted: <?= $announcement_created ?>  </small>
</center></div>
<div class="body">
<div class="article"> 
<img id="announcement_img" src="<?= $announcement_img ?>" alt="embedded_image">
<p>
<!-- Good day! We would like to announce that there will be a <?= $announcement_title ?> happening on <?= $announcement_when ?> at <?= $announcement_where ?> 
held by <?= $announcement_who ?>. -->
<?php echo $greetings . $first . $announcement_title . $second . $announcement_when . $third .  $announcement_where  . $fourth . $announcement_who . "."  . $fifth . "."?>
</p>
</div>
</div>

<div class="article_footer"></div>
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