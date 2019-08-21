<?php
	include('db/connection.php');

	$ID=$_GET['id'];

	$email=$_POST['email'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$land_line=$_POST['land_line'];
	$contact_no=$_POST['contact_no'];
	$brgy=$_POST['brgy'];

	mysqli_query($conn,"update crowd_patient set email_address='$email', brgy='$brgy', contact_no='$contact_no', land_line='$land_line', address='$address', username='$username'  where ID=$ID");
	

	session_start();
	if(!empty( $_SESSION['admin'] )) { 
		header('location:admin.index.php');
	} 
	else { 
		header('location:superadmin.php');
	} 

?>