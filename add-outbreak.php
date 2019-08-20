<?php
	include('db/connection.php');

	$total_case=$_POST['total_cases'];
	$disease_name=$_POST['disease_name'];


	mysqli_query($conn,"INSERT INTO `outbreak` (`outbreak_id`, `total_cases`, `disease_name`) VALUES (NULL, '$total_case', '$disease_name');");
	
	// if(!empty( $_SESSION['admin'] )) { 
	// 	header('location:outbreak.php');
	// } 
	// else { 
	// 	header('location:superadmin-outbreak.php');
	// } 
	
	header('location:superadmin-outbreak.php');

?>