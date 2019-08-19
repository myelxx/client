<?php
	include('db/connection.php');

	if(isset($_POST['btnSubmitSymptoms']))
	{
		$symptoms_name=$_POST['symptoms_name'];
		$id=$_POST['id'];
		foreach($_POST['symptoms'] as $check) {
			$query = "SELECT * FROM symptoms WHERE symptoms_id=" . $check;
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$symptoms_name .= $row['symptoms_name'] . ", ";
			}
			}
		}
		mysqli_query($conn,"update symptoms set symptoms_name='$symptoms_name'  where symptoms_id = $id");
		header('location:adminsymptoms.php');
	}

	if(isset($_POST['btnSubmitDisease']))
	{
		$disease_name=$_POST['disease_name'];
		$id=$_POST['id'];
		//insertion of update in disease the , , , 
		mysqli_query($conn,"update disease set disease_name='$disease_name'  where disease_id = $id");

		
		header('location:admindisease.php');
	}

?>