<?php
require_once 'inc/dbconnection.php';
    if(isset($_POST["reset-password"])){
        $name = $_GET["name"];
        $password = trim($_POST["password"]);
        $confirmPassword = trim($_POST["confirmPassword"]);
        if($password == $confirmPassword) {
           $stmt = $db->prepare("UPDATE admin SET password= ? WHERE username = ?");
           $stmt->execute(array($password,$name));
           $affected_rows = $stmt->rowCount();
           if($affected_rows) {
               $success_message = "Password is rest successfully.<br>Now you are redirecting to the login please wait..";
               header("Refresh:3; url=Create.php");
           } else {
               $error_message = "Password not updated";
           }
        } else {
            $error_message = "Password not matched";
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
    <!-- password strength-->
  <link rel="stylesheet" href="../static/css/ps-check.css" />
  <script src="../static/js/reset-ps-check.js"></script>
  
</head>

<body class="bg-light">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-body">
          <div class="form-group">
          <div class="text-center mt-4 mb-5">
          <form id="reserPassword" name="reserPassword" method="post">
                <h4>Reset Password</h4>
                <p style="color:gray;"><i></i></p></center>
                <?php if(!empty($success_message)) { ?>
                <div class="success_message"><?php echo $success_message ?></div>
                <?php } ?>
                <?php if(!empty($error_message)) { ?>
                <div class="error_message"><?php echo $error_message ?></div>
                <?php } ?>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter a New Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or 10 characters" required>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or 10 characters" required>
                <input type="submit" value="Reset Password" name="reset-password" id="reset-password"  class="btn btn-primary btn-block">
                	<span id="result"></span>
            </form>
            
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
