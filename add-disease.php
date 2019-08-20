<?php
	include('db/connection.php');
	
	$name = $_POST['name'];

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

	//ADD TO THE DISEASE TABLE
	$sql = "INSERT INTO `disease` (`disease_id`, `disease_name`, `symptoms`) VALUES (NULL, '$name', '$symptoms_name')";
	if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//ADD TO THE COMMON TABLE OF DISEASE AND SYMPTOMS
	foreach($_POST['symptoms'] as $check) {
		mysqli_query($conn,"INSERT INTO `disease_symptoms` (`disease_id`, `symptoms_id`) VALUES ($last_id, $check)");
	}

	if(!empty( $_SESSION['admin'] )) { 
		header('location:admindisease.php');
	} 
	else { 
		header('location:superadmin-admindisease.php');
	} 

?>