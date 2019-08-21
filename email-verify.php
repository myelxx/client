<?php
ob_start();

include('db/connection.php');

$activation_code = $_GET['id'];
$email = $_GET['email'];
$messageSucess = "";
$sql = "UPDATE email_verification SET `status`=1 WHERE activation_code='$activation_code' ";
if (mysqli_query($con, $sql)) {
    $sql2 = "UPDATE admin SET `status_credential`=1 WHERE email_address='$email'";
    if (mysqli_query($con, $sql2)) {
	    $messageSucess ="Your email has been verified! You can now login your account!";
	    header("Refresh:3; url=Create.php");
    }
} else {
	$errorSucess = "A problem occur during the verification.";
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
  <link rel="icon" href="../favicon.ico">
  <!-- Bootstrap core CSS-->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../static/css/login1.css" /> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script data-require="jquery@2.2.4" data-semver="2.2.4" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- show capslock is on-->
  <script src="../static/js/capslockPass.js"></script>
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container" style="padding:5%;">
          <?php if(!empty($messageSucess)): ?>
			<div class="alert alert-success">
			  <?= $messageSucess; ?>
			</div>
          <?php endif; ?>
          <?php if(!empty($errorSucess)): ?>
			<div class="alert alert-success">
			  <?= $errorSucess; ?>
			</div>
          <?php endif; ?>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>