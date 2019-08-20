<?php
include('db/connection.php');


$ID = $_GET['id'];
//separate ids differently
$tips_ID = $_GET['tips_ID'];
if(isset($tips_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM health_tips WHERE id=$tips_ID");
    
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:viewtips.php");
    } 
    else {
        header('location:superadmin-viewtips.php');
    } 
}

$patient_ID = $_GET['p_id'];
if(isset($patient_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM patient WHERE patient_id=$patient_ID");
    
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:admincrowd.php");
    } 
    else {
        header('location:superadmin-admincrowd.php');
    } 
}

$announcement_id = $_GET['a_id'];
if(isset($announcement_id)){
    $resuslt1 = mysqli_query($con, "DELETE FROM announcements WHERE id=$announcement_id");
    
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:anouncementview.php");
    } 
    else {
        header('location:superadmin-anouncementview.php');
    } 
}


$user_ID = $_GET['id'];
if(isset($user_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM admin WHERE id=$ID");
    
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:admin.index.php");   
    } 
    else {
        header('location:superadmin.php');
    } 
}


$outbreak_id = $_GET['o_id'];
if(isset($outbreak_id)){
    $resuslt1 = mysqli_query($con, "DELETE FROM outbreak WHERE outbreak_id=$outbreak_id");
    
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:admin-outbreak.php");
    } 
    else {
        header("Location:superadmin-outbreak.php");
    } 
}

?>
