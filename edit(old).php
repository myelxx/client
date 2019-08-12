<?php

$servername = "localhost";
$dbusername = "root";
$password = "";
$dbname = "health";

$con=mysqli_connect($servername, $dbusername, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    # code...
if(isset($_POST['btnsubmit']))
{

    $ID = mysqli_real_escape_string($con, $_GET['id']);


    $qusername =  mysqli_real_escape_string($con, $_POST['username']);
    $qfirstname =  mysqli_real_escape_string($con, $_POST['firstname']);
    $qlastname =  mysqli_real_escape_string($con, $_POST['lastname']);
    $qbirthdate =  mysqli_real_escape_string($con, $_POST['birthdate']);
    $qaddress =  mysqli_real_escape_string($con, $_POST['address']);
    $qbarangay =  mysqli_real_escape_string($con, $_POST['brgy']);
    $qcontact =  mysqli_real_escape_string($con, $_POST['contact']);
 
 

     $sql = "UPDATE admin SET username = '$qusername', first_name = '$qfirstname', last_name = '$qlastname', birth_date = '$qbirthdate', address = '$qaddress', brgy = '$qbarangay', contact_no = '$qcontact' WHERE id = $ID ";

      if ($con->query($sql) === TRUE) {
 $message ="Update Successfully!";
 echo "<script type='text/javascript'>alert('$message');</script>";
  header("Refresh:0; url=admin.index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>

<?php
$ID = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM admin WHERE ID=$ID");
while ($row = mysqli_fetch_array($result)){
$username = $row['username'];
$password = $row['password'];
$firstname = $row['first_name'];
$lastname = $row['last_name'];
$birthdate  = $row['birth_date'];
$address = $row['address'];
$barangay = $row['brgy'];
$contact = $row['contact_no'];
}

?>

<html>
<head>
    <title></title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<style>
  #update, #update {
  border-collapse: collapse;
      width:100%; 
    margin-left:50%; 
    margin-right:50%;
}
</style>
<body>

  <nav class="navbar navbar-expand navbar-dark  static-top" style="background-color:#4385C7">

    <a class="navbar-brand mr-1" href="admin.index.php">Admin - Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <div class="input-group-append">
          </button>
        </div>
      </div>

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
       
      </li>
      <h5 style="padding-top:2px; color: #fff; ">Logout</h5></h6>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>


  </nav>

<div id="content-wrapper">
      <div class="container-fluid">
      <div class="container">
      <div class="col-md-6">
      <div class="panel panel-default">
      <div class="panel-heading">
        <div align="center">
    
        <form id="update" action="" method="post">
         
             
              <div class="form-group">
                <div class="col-md-12">
                <label for="exampleInputEmail">Username</label>
                <input type="username" class="form-control" value="<?php echo $username?>" placeholder="username" id="exampleInputEmail"  name="username" required="required">
            </div>  
            </div>

                
               <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">First Name</label>
                <input type="text" class="form-control" name= "firstname"placeholder="Firt name" value="<?php echo $firstname?>"name="announcement_when" required="required">
              </div>
              </div>

               <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">Last Name</label>
                <input type="username" class="form-control" name="lastname" id="telephone"  value="<?php echo $lastname?>" placeholder="Last name" name="announcement_where" required="required">
              </div>
               </div>
              <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">Birth date</label>
                <input type="date" class="form-control" name="birthdate"id="telephone" value="<?php echo $birthdate?>" placeholder="Birthdate" name="announcement_who" required="required">
              </div>
               </div>
              <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">Address</label>
                <input type="text" class="form-control" name="address" id="telephone" value="<?php echo $address?>" placeholder="Birthdate" name="announcement_who" required="required">
              </div>
               </div>
              <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">Barangay</label>
                <input type="username" class="form-control" name="brgy" id="telephone" value="<?php echo $barangay?>" placeholder="Barangay" name="announcement_who" required="required">
              </div>
               </div>
              <div class="form-group">
                <div class="col-md-12">
                <label for="telephone">Contact number</label>
                <input type="username" class="form-control" name="contact" id="telephone" value="<?php echo $contact?>" placeholder="Contact number" name="announcement_who" required="required">
              </div>
              
            </div>
              <center><button class="btn-lg btn-primary" type="submit" name="btnsubmit">Submit</button></center></form>
            </div>
            </div>
          </div>
          </div>
</div>
</div>
      </div>
  </body>
      </html>
