<?php
session_start();

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

   if (isset($_POST['username']))
   {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($con,"SELECT *  from admin where username = '$username'");
    $row = mysqli_fetch_array($result);

    if($row['password'] == $password)
    {
             $_SESSION['admin']= $username;
      $_SESSION['location'] = $row['location'];
      $admin = $_SESSION['admin'];
      $location = $_SESSION['location'];

    $result2 =mysqli_query($con,"SELECT *  from admin where admin = '$admin' AND location = '$location'");
 
      header('location: index.php');
      exit;
    }

    else
    {
      $message ="Invalid Credentials. Please try again";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("Refresh:0; url=login.php");
    }


   }



?>
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header bg-success">Login</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" class="form-control" placeholder="Enter your Username" required autofocus="autofocus">
              <label for="inputEmail">Enter your Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="Password" class="form-control" placeholder="Password" required>
              <label for="inputPassword"> Enter your Password</label>
            </div>
          </div>
        
          <input type="submit"  class="form-control" name="btn_login" value="Login">
          
        </form>
    
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
