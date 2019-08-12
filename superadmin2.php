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

    $result = mysqli_query($con,"SELECT *  from super_admin where username = '$username'");
    $row = mysqli_fetch_array($result);

    if($row['password'] == $password)
    {
      $_SESSION['super_admin']= $username;
      $_SESSION['location'] = $row['location'];
      $admin = $_SESSION['super_admin'];
      $location = $_SESSION['location'];

    $result2 =mysqli_query($con,"SELECT *  from super_admin where super_admin = '$super_admin' AND location = '$location'");
 
      header('location: superadmin.php');
      exit;
    }

    else
    {
      $message ="Invalid Credentials. Please try again";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("Refresh:0; url=Create.php");
    }


   }



?>
<html>
<head></head>
<style>

body{
  margin:0;
  padding:0;
  background:url(pic.jpg);
  background-size: cover;
  background-position: center;
  font-family:sans-serif;
}

.loginbox{
  width: 50%;
  height: 60%;
  background: #000;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
  border-radius: 25px;
}
.avatar{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top:-50px;
  left:calc(50% - 50px);

}
h3{
  margin: 0;
  padding: 0 0 20px;
  text-align: center;
  font-size: 22px;
}
.loginbox p{
  margin: 0;
  padding: 0; 
  font-weight: bold;

}
.loginbox input{
  width: 100%;
  margin-bottom: 20px;
  border-radius: 25px;
}
.loginbox input[type ="text"], input[type="Password"]
{
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;

}
.loginbox input[type="submit"]
{
  border: none;
  outline: none;
  height: 40px;
  background: #fb2525;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;

}
.loginbox input[type="submit"]:hover
{

background: #ffc107;
color: #000;
}
.loginbox a{
  text-decoration: none;
  font-size: 12px;
  line-height: 20px
  color: darkgrey;
}
.loginbox a:hover
{
  color:#ffc107;
}
.sign{
text-align: center; 
}
.sign a{
  font-size: 150%;
  
}
</style>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<title>Admin Login form</title>
 <link rel="stylesheet" type="text/css" href="style.css">
  
    <link href="css/bootstrap.min.css" rel="stylesheet">
<body> 

    <div class="loginbox">
    <img src="pic2.png" class="avatar">
    <h3>Adminastrator login</h3>
       <p>Username</p>
       <form method="POST" action="">
       <input type="text" name="username" placeholder="Enter Username" required> 
       <p>Password</p>
       <input type="Password" name="password" placeholder="Enter Password" required>
       <input type="submit" name="btn_login" value="Login">
       <div class="sign">
       Don't have an account? <a href="register.php">Sign up?</a>
     </div>
      </form>
    
    </div>
</body>
</head>
</html>