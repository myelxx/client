<?php
	include('db/connection.php');

	$target =basename("images/". $_FILES['image']['name']);

	$image = "images/". $_FILES['image']['name'];
	$what=$_POST['what'];
	$where=$_POST['where'];
	$when = date("Y-m-d", strtotime($_POST['when']));
	$who=$_POST['who'];
	$date = date('Y-m-d');

	if (move_uploaded_file("images/". $_FILES['image']['tmp_name'],$target)) {
		//echo "success";
	}
	
	mysqli_query($conn,"INSERT INTO `announcements` (`ID`, `a_what`, `a_when`, `a_where`, `a_who`, `image` , `date_created`) VALUES (NULL, '$what', '$when', '$where', '$who', '$image', CURRENT_TIMESTAMP);");
	header('location:anouncementview.php');

?>