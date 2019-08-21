<?php
	include('db/connection.php');
	$name = $_POST['name'];
	
	mysqli_query($conn,"INSERT INTO `symptoms` (`symptoms_id`, `symptoms_name`) VALUES (NULL, '$name')");
	session_start();
	if(!empty( $_SESSION['admin'] )) { 
		header('location:adminsymptoms.php');
	} 
	else { 
		header('location:superadminsymptoms.php');
	} 
	
	

?>