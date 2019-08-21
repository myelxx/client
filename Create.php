
<?php
include('db/connection.php');
$message_success="";
$message_error="";

session_start();

   if (isset($_POST['username']) && isset($_POST['password']) )
   {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT *  from admin where username = '$username' and status_credential=1");
     
    if( mysqli_num_rows($result) > 0 )
    {
      $row = mysqli_fetch_array($result);
      //created status in admin table -> 3 as superadmin; 
      if($row['username'] == $username && $row['password'] == $password && $row['status'] == 2 )
      {
        $_SESSION['username'] = $username;
        $_SESSION['super_id'] = 0;
        if($row['status'] == 2){
          $_SESSION['role'] = "Super Admin";
        }
        
        $message_success ="Successfully login!";
        header("Refresh:3; url=superadmin.php");
        //header('location:superadmin.php');
      }

      if($row['username'] == $username && $row['password'] == $password && $row['status'] == 1 )
      {
        //added session for id, for authentication
        $_SESSION['id']= $row['ID'];
        $_SESSION['sid'] = 1;
        $_SESSION['admin']= $username;
        $admin = $_SESSION['admin'];

        
        if($row['status'] == 1){
          $_SESSION['role'] = "Admin";
        }
      

        $result2 =mysqli_query($conn,"SELECT *  from admin where admin = '$admin'");
        
        $message_success ="Successfully login!";
        header("Refresh:3; url=admin.index.php");
        //header('location: admin.index.php');
      }
   }
   else
    {
          $message_error ="Invalid Credentials. Please try again";
          //$message ="Invalid Credentials. Please try again";
          //echo "<script type='text/javascript'>alert('$message');</script>";
    }


}

?>
<html>
<style>
.loginbox{
  width: 50%;
  height: 65%;
  background: rgba(0,0,0,0.4);
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
  width: 60px;
  height:60px;
  border-radius: 50%;
  position: absolute;
  top:-20px;
  left:calc(50% - 50px);

}
h3{
  margin: 0;
  padding: 0 0 20px;
  text-align: center;
  font-size: 22px;
}
.loginbox p{
  margin: 0;6
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
  background: #4385C7;
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
header{
  height: 80px;
  position: fixed;
  background:#4385C7;
  width: 100%;
  color: #fff;
}
.logo {
  float: left;
}

.menu{
  float: right;
  margin-right: 10%;
}
.menu ul{
  margin: 0px;
  padding: 0px;
  list-style: none;
}
.menu ul li{
  float: left;
}
.menu ul li a{
  color: #fff;
  text-decoration: none;
  margin-left: 10px;
  margin-right: 10px;
}
footer{
  position:fixed;
  width: 100%;
  color: #fff;
  height: 60px;
  bottom: 0;
  display:block;
  margin-bottom: :30px;
  background:#4385C7;
  text-align: center;
}
.copy p{
margin:0;
padding:0;
line-height: 60px;
color: #fff;
}
</style>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" conntent="IE=edge">
  <meta name="viewport" conntent="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" conntent="">
  <meta name="author" conntent="">
<title>Admin Login form</title>
 <link rel="stylesheet" type="text/css" href="style.css">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   <script src="sweetalert2/sweetalert2.all.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
<body> 
   <header>
      <h4 style="font-color:#000000">Communicable Diseases, Reduction and Awareness</h4>
      <div class="menu">
      <nav>
        <ul>
          <li><a href="Create.php">Log in </a></li>
          <li><a href="register.php">Register </a></li>
        </ul>
      </nav>
    </div>
  </header>
    <div class="loginbox">
    <img src="pic2.png" class="avatar">
    <h3>Admin Login</h3>
      <?php if(!empty($message_success)){  ?>
      <ol class="breadcrumb" style="color:white;background-color:#277546;border-radius:12px;">
        <?php echo $message_success;  ?>
      </ol>
      <?php } ?>
      <?php if(!empty($message_error)){  ?>
      <ol class="breadcrumb" style="color:white;background-color:#db2a35;border-radius:12px;">
        <?php echo $message_error;  ?>
      </ol>
      <?php } ?>
       <p>Username</p>
       <form method="POST"  action="">
       <input type="text"  name="username" placeholder="Enter Username" required> 
       <p>Password</p>
       <input type="Password" name="password" placeholder="Enter Password" required>
       <input type="submit" name="btn_login" value="Login">
       <div class="sign">
       Don't have an account? <a href="register.php" style="font-size: 16px;color:yellow">Click here</a><br>
       Forgot Password? <a href="forgetPassword.php" style="font-size: 16px;color:yellow">Click here</a>
     </div>
     <br>
     <br>
      </form>
    </div>
    <footer>
     <div class="copyright">
      <h4 style="font-size: 40px">Mandaluyong City</h4>
    </div>
    </footer>
</body>
</head>
</html>