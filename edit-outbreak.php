<?php
	include('db/connection.php');

	$total_case=$_POST['total_cases'];
	$disease_name=$_POST['disease_name'];
	$id = $_POST['outbreak_id'];

	mysqli_query($conn,"UPDATE outbreak SET total_cases=$total_case, disease_name='$disease_name' WHERE outbreak_id=".$id);
	header('location:superadmin-outbreak.php');

	

?>