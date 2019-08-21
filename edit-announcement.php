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
	
	$what=$_POST['what'];
	$where=$_POST['where'];
	$when = date("Y-m-d", strtotime($_POST['when']));
	$who=$_POST['who'];
	$date = date('Y-m-d');

	mysqli_query($conn,"update announcement_details set a_what='$what', a_when='$when', a_where='$where', a_who='$who', image='$image', date_created=CURRENT_TIMESTAMP where ID=$ID");
	

	session_start();
	if(!empty( $_SESSION['admin'] )) { 
		header('location:anouncementview.php');
	} 
	else { 
		header('location:superadmin-anouncementview.php');
	} 

?>