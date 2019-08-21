<?php
	include('db/connection.php');

	$ID=$_GET['id'];

	if($_FILES['image']['name'] == "") {
		$image = $_POST['old_img'];
	} else {
		$target =basename("images/". $_FILES['image']['name']);
		$image = "images/". $_FILES['image']['name'];

		if (move_uploaded_file("images/". $_FILES['image']['tmp_name'],$target)) {
			echo "success";
		}	
	}
	
	$title=$_POST['title'];
	$source=$_POST['source'];
	$tips=$_POST['tips'];

	if (move_uploaded_file("images/". $_FILES['image']['tmp_name'],$target)) {
		echo "success";
	}
	
	mysqli_query($conn,"update health_tips set health_tips='$tips', Title='$title', source='$source', images='$image', date_created=CURRENT_TIMESTAMP where ID=$ID");
	

	session_start();
		if(!empty( $_SESSION['admin'] )) { 
			header('location:viewtips.php');
		} 
		else { 
			header('location:superadmin-viewtips.php');
		} 

?>