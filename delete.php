<?php
include('db/connection.php');


$ID = $_GET['id'];
//separate ids differently
$tips_ID = $_GET['tips_ID'];
if(isset($tips_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM health_tips WHERE id=$tips_ID");
    header("Location:viewtips.php");
}

$patient_ID = $_GET['p_id'];
if(isset($patient_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM patient WHERE patient_id=$patient_ID");
    header("Location:admincrowd.php");
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
