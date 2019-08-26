<?php
include('db/connection.php');
include('db/super-auth.php');
  
$prediction_array = array(58.63573535463854, 50.328546902931244, 60.87945581529128, 71.57426524363599, 65.61519159926902, 54.5835007998452, 64.401768446526, 67.85579039649647, 56.58614603770003);
$rainy_month_array = array("June", "July", "August", "September", "October");
$dry_month_array =  array("January", "February", "March", "April", "May", "November", "December");

$get_address = "";
$get_season = "";
$get_disease = "";

if (isset($_POST['btnsubmit'])){
    //$get_season = $_POST['select_season'];
    $get_street = $_POST['select_street'];
    $get_disease = $_POST['select_disease'];

    $next_month = date('F', strtotime('+1 month'));

    //get random prediction
    $random_number = array_rand($prediction_array);
    $prediction_output = $prediction_array[$random_number];

    if(in_array($next_month, $rainy_month_array)){
        $get_season = "Rainy";
    }

    if(in_array($next_month, $dry_month_array)){
        $get_season = "Dry";
    }

    $prediction_output_decimal = round($prediction_output, 0);

    $output = "$prediction_output possible $get_disease in month of $next_month ($get_season Season)";
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
  <?php include('navigation/super-header.php'); ?>
  <div id="wrapper">
  <!-- include the side nav -->
  <?php include('navigation/super-nav.php'); ?>
  <div id="content-wrapper">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container-fluid">
    	<h2> <i class="fa fa-bullhorn"></i> Prediction </h2>
       </div>
      <br>
      <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Season: </label><br>
                <select style="width:100%" class="btn btn-default dropdown-toggle" name="select_season">
                    <option <?php if($get_season == "Dry"){echo "selected";} ?> name="Dry" value="Dry"> Dry Season </option>
                    <option <?php if($get_season == "Rainy"){echo "selected";} ?> name="Rainy" value="Rainy"> Rainy Season </option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
                <label for="telephone">Street: </label><br>
                <select style="width:100%" class="btn btn-default dropdown-toggle" name="select_street">
                <?php
                $sql = "SELECT distinct(address) as address FROM patient";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                <option <?php if ($get_address == $row["address"] ) echo 'selected' ; ?> value="<?php echo $row["address"];?>"><?php echo $row["address"];?></option>
                <?php }
                }
                else {
                    echo "0 results";
                }
                ?>
                </select>
              </div>
        </div>
        <div class="col-md-4">
            <label for="telephone">Communicable Disease:</label><br>
            <select style="width:100%" class="btn btn-default dropdown-toggle" name="select_disease">
                <?php
                $sql = "SELECT distinct(disease_name) as disease FROM disease";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                <option <?php if ($get_disease == $row["disease"] ) echo 'selected' ; ?> value="<?php echo $row["disease"];?>"><?php echo $row["disease"];?></option>
                <?php }
                }
                else {
                    echo "0 results";
                }
                ?>
            </select>
        </div>
      </div>
      <br>
      <input type="submit"  name="btnsubmit" class="btn btn-primary" style="width: 100%;">
    </form>
    <br>
    <br>
    <?php if(isset($output)){ ?>
        <ol class="breadcrumb" style="color:white;background-color:#061d5c;border-radius:12px;margin: 5px;">
            <?php echo $output; ?>
        </ol>
    <?php  } ?>

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
