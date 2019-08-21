<?php
	include('db/connection.php');
	if(isset($_POST['btnSubmitPossibleDisease']))
	{
		$id = $_POST['id'];
		$selected_possible_disease = $_POST['select_possible_disease'];
		mysqli_query($conn,"update patient set status=1, predicted_disease='$selected_possible_disease' where patient_id = $id");
	}
	
	if(isset($_POST['btnValidate']))
	{
		$status=$_POST['status'];
		$id=$_GET['id'];
		mysqli_query($conn,"update patient set status=$status  where patient_id = $id");
	}

	if(isset($_GET['vid']))
	{
		$status=$_POST['status'];
		$id=$_GET['vid'];
		mysqli_query($conn,"update patient set status=$status  where patient_id = $id");
	}

	session_start();
	if(!empty( $_SESSION['admin'] )) { 
		header('location:admincrowd.php');
	} 
	else { 
		header('location:superadmincrowd.php');
	} 

?>