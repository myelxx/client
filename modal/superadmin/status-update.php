<?php
include('../../db/connection.php');

$id = $_GET['id'];

$sql=mysqli_query($conn,"select * from admin where ID='".$id."'");
$erow=mysqli_fetch_array($sql);
$status = $erow['status'];
$name = $erow['first_name'];
                    
if($status == 1){ $change_status = "activate"; } 
if($status == 0){ $change_status = "deactivate"; }

// echo "<script language=\"JavaScript\">\n";
// echo "if (confirm('Are you sure you want to ".$change_status." ".$name."?')) { \n";
// echo "\n";
// echo "} else {}\n";
// echo "</script>";

if($status == 1)
{
 	mysqli_query($conn,"update admin set status=0 where ID=$id");
 	header('location:../../superadmin.php');
 }

if($status == 0){
 	mysqli_query($conn,"update admin set status=1 where ID=$id");
 	header('location:../../superadmin.php');
 }
?>