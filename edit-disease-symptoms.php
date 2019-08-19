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
		
		//this function loops the checkbox selected then store in a string variable th
		//which is inserted in disease table
		$symptoms_name = "";
		foreach($_POST['symptoms'] as $check) {
			$query = "SELECT * FROM symptoms WHERE symptoms_id=" . $check;
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$symptoms_name .= $row['symptoms_name'] . ", ";
			}
			}
		}
		

		//update disease table
		mysqli_query($conn,"update disease set disease_name='$disease_name', symptoms='$symptoms_name'  where disease_id = $id");

		//since may isa pang table na maapektuhan which is 'disease_symptoms'
		//to update that, logic is -> delete lahat ng may same id, then insert a new one.
		mysqli_query($con, "DELETE FROM disease_symptoms WHERE disease_id=$id");
		//ADD TO THE COMMON TABLE OF DISEASE AND SYMPTOMS
		foreach($_POST['symptoms'] as $check) {
			mysqli_query($conn,"INSERT INTO `disease_symptoms` (`disease_id`, `symptoms_id`) VALUES ($id, $check)");
		}

		header('location:admindisease.php');
	}

?>