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
   if (isset($_POST['username'])){
      $username = $_POST['username'];
      $email   = $_POST['email'];
      $pass = $_POST['password'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $birthdate = $_POST['birthdate'];
      $address = $_POST['address'];
      // $barangay = $_POST['Barangay'];
      $contact = $_POST['contact'];
      // $landline = $_POST['landline'];
      $Gender   = $_POST['Gender'];
    


      $sql = "INSERT INTO `admin` (`ID`, `username`, `email_address`, `password`, `first_name`, `last_name`, `birth_date`, `address`, `contact_no`, `Gender`) VALUES (NULL, '$username', '$email', '$pass', '$firstname','$lastname','$birthdate','$address','$contact', '$Gender')";

  if ($con->query($sql) === TRUE) {
 $message ="Register Successfully Post!";
 echo "<script type='text/javascript'>alert('$message');</script>";
  header("Refresh:0; url=Create.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
?>

<html>
<head></head>
<style>
body{
  background:#c7c7c7;
}

.loginbox{
  box-sizing: border-box;  
  width: 1000px;
  height: 550px;
  background: rgba(0,0,0,0.4);
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  padding: 30px 30px;
  border-radius: 25px;
}
.avatar{
  width: 60px;
  height: 60px;
  border-radius: 50%;  
  position: absolute;
  top:-20px;
  left:calc(50% - 50px);

}
h1{
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
  margin-bottom: 12px;
  border-radius: 25px;
}
.loginbox input[type ="text"], input[type="password"]
{
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 30px;
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
  margin-top: 10px;

}
.loginbox input[type="submit"]:hover
{
cursor: pointer;
background: #ffc107;
color: #000;
}
.loginbox a{
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}
.loginbox a:hover
{
  color:#ffc107;
}
header{
  height: 80px;
  position: fixed;
  background:#4385C7;
  width: 100%;
 color: #fff;

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
  position: fixed;
  width: 100%;
  height: 60px;
  background:#4385C7;
  bottom:0;
  color: #fff;
  text-align: center;
}
.copy p{
margin:0;
padding:0;
line-height: 60px;
color: #fff;
}


</style>
<title>Admin Login form</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
<body> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <header>
      <h4  style="font-color:#000000">Communicable Diseases, Reduction and Awareness</h4>
      <div class="menu">
      <nav>
        <ul>
          <li><a href="Create.php">Log in </a></li>
          <li><a href="register.php">Register </a></li>
        </ul>
      </nav>
    </div>
  </header>
    <div class="container">
    </div>
    <div class="loginbox">
    <img src="pic2.png" class="avatar">
    <h1>Admin Registration</h1>
       <div class="form-group">
       <form method="POST" action="">
        <div class="row">

        <div class="col-sm-6">
        <p>Username</p>
        <input type="text" maxlength="20" name="username" class="form-control"placeholder="Enter username" required>
       </div>

        <div class="col-sm-6">
        <p>Password</p>
        <input type="password" name="password" class="form-control" class="form-control"placeholder="Enter password" required>
        </div>

       <div class="col-sm-6">
        <p>First Name</p>
       <input type="text" pattern="^\D*$" name="firstname" class="form-control"placeholder="Enter Firstname" required>
       
       </div>
        <div class="col-sm-6">
        <p>Last Name</p>
        <input type="text" pattern="^\D*$" name="lastname" class="form-control"placeholder="Enter lastname" required>
       
       </div>
       <div class="col-sm-6">
        <p>Birthdate</p>
        <input type="date" name="birthdate" class="form-control"  placeholder="Enter birthdate" required>
       </div>

       <div class="col-sm-6">
       <p>Gender</p>
        <label class="radio-inline">
          <input type="radio" name="Gender" checked value="male"> Male<br>
        </label>

        <label class="radio-inline">
          <input type="radio" name="Gender" value="female"> Female<br>
        </label>
       </div>
       
       <div class="col-sm-6">
        <p>Contact number</p>
        <input type="text" pattern="\d*" maxlength="13" name="contact" class="form-control"placeholder="Enter contact number XXXX-XXXX-XXX" required>
       </div>

       <div class="col-sm-6">
        <p>Email Address</p>
        <input type="text" name="email" class="form-control"placeholder="Enter Email address" required>
       </div>

       <div class="col-sm-6">
        <p>Address</p>
        <input type="text" name="address" class="form-control"placeholder="Enter address" required>
       </div>

       <!-- <div class="col-sm-6">
        <p>land-line number</p>
        <input type="text" pattern="[0-9]{3}-[0-9]{4}" name="landline" class="form-control"placeholder="Enter Land-line number XXX-XXXX" required>
        
       </div> -->
       <!-- <div class="col-sm-6">
        <p>barangay</p>
       <select name="Barangay" style="width: 100%;border-radius: 25px;" required>
          <option value=""></option>
          <option value="ADDITION HILLS">ADDITION HILLS</option>
          <option value="BAGONG SILANG">BAGONG SILANG</option>
          <option value="BARANGKA DRIVE">BARANGKA DRIVE</option>
          <option value="BARANGKA IBABA">BARANGKA IBABA</option>
          <option value="BARANGKA ILAYA">BARANGKA ILAYA</option>
          <option value="BARANGKA ITAAS">BARANGKA ITAAS</option>
          <option value="BUAYANG BATO"> BUAYANG BATO</option>
          <option value="BUROL"> BUROL</option>
          <option value="DAANG BAKAL">DAANG BAKAL</option>
          <option value="HAGDANG BATO ITAAS">HAGDANG BATO ITAAS</option>
          <option value="HAGDANG BATO LIBIS"> HAGDANG BATO LIBIS</option>
          <option value="HARAPIN ANG BUKAS"> HARAPIN ANG BUKAS</option>
          <option value="HIGHWAY HILLS">HIGHWAY HILLS</option>
          <option value="HULO">HULO</option>
          <option value="MABINI-J. RIZAL"> MABINI-J. RIZAL</option>
          <option value="MALAMIG"> MALAMIG</option>
          <option value="MAUWAY"> MAUWAY</option>
          <option value="NAMAYAN">NAMAYAN</option>
          <option value="NEW ZANIGA"> NEW ZANIGA</option>
          <option value="OLD ZANIGA"> OLD ZANIGA</option>
          <option value="PAG-ASA">PAG-ASA</option>
          <option value="PLAINVIEW"> PLAINVIEW</option>
          <option value="PLEASANT HILLS"> PLEASANT HILLS</option>
          <option value="POBLACION">POBLACION</option>
          <option value="SAN JOSE">   SAN JOSE</option>
          <option value="VERGARA">   VERGARA</option>
          <option value="WACK-WACK-GREENHILLS EAST">WACK-WACK-GREENHILLS EAST</option>
      </select>
       </div> -->

      
        <br>
        <br>
       <input type="submit" name="btn_login" value="Sign up">
       <br>
    </div>
    </div>
    </div>
    </form>
    <footer>
     <div class="copyright">
      <h4 style="font-size: 40px">Mandaluyong City</h4>
    </div>
    </footer>
</body>
</head>
</html>
