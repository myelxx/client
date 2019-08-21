<?php
require_once 'inc/dbconnection.php';
    if(isset($_POST["forget-password"])){
        if(!empty($_POST["user-email"])){
            $email = trim($_POST["user-email"]);
        } else {
            $error_message = "<li>Email is required</li>";
        }

        if(empty($error_message)){
            $query = $db->prepare("SELECT username, email_address FROM admin WHERE email_address =?");
            $query->execute(array($email));
            $user = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        if(!empty($user)){
            require_once ("forget-password-mail.php");
        } else {
            $error_message = 'No Email Found';
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
  <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />
  <!-- Bootstrap core CSS-->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../static/css/login1.css" /> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script data-require="jquery@2.2.4" data-semver="2.2.4" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="../static/js/capslockPass.js"></script>
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
  <!-- forgotpassword-->
  <link href="forgotPassword.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-body">
          <div class="form-group">
          <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          	<p style="color:gray;"><i>Enter your email address and we will send you instructions on how to reset your password.</i></p></center>
			 <!-- <?php include('errors.php'); ?> -->
			  <div class="form-group">
			<div id="wrapper">
			  <div id="loginContainer">
							<form id="frmForget" name="frmForget" method="post">
								<?php if(!empty($success_message)) { ?>
								<div class="success_message"><?php echo $success_message ?>
								<?php } ?>
								<?php if(isset($error_message)) { ?> 
								<div class="error_message"><?php echo $error_message; ?></div>
								<?php } ?>
								<br>
								<input type="email" name="user-email" placeholder="Enter a valid email" class="form-control" required>
								<br>
								<input type="submit" value="submit" name="forget-password" id="forget-password" class="btn btn-primary btn-block" >
							</form>
						</div>
					</div>
			  </div>
          
          <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="Create.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
