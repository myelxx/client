

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

$ID = $_GET['id'];
//separate ids differently
$tips_ID = $_GET['tips_ID'];
if(isset($tips_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM health_tips WHERE id=$tips_ID");
    header("Location:viewtips.php");
}

$patient_ID = $_GET['patient_ID'];
if(isset($patient_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM patients WHERE id=$patient_ID");
    header("Location:patientslist.php");
}

$announcement_id = $_GET['a_id'];
if(isset($announcement_id)){
    $resuslt1 = mysqli_query($con, "DELETE FROM announcements WHERE id=$announcement_id");
    header("Location:anouncementview.php");
}

$user_ID = $_GET['id'];
if(isset($user_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM admin WHERE id=$ID");
    header("Location:admin.index.php");   
}

?>
