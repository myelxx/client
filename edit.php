<?php
	include('db/connection.php');

	$ID=$_GET['id'];

	$email=$_POST['email'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$contact_no=$_POST['contact_no'];

	mysqli_query($conn,"update admin set email_address='$email', contact_no='$contact_no', address='$address', username='$username'  where ID=$ID");
	

	session_start();
		if(!empty( $_SESSION['admin'] )) { 
			header('location:admin.index.php');
		} 
		else { 
			header('location:superadmin.php');
		} 

?>