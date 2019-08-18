<?php
	include('db/connection.php');

	if(isset($_GET['id']))
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


	header('location:admincrowd.php');

?>