<?php
	include('db/connection.php');

	$target =basename("images/". $_FILES['image']['name']);

	$image = "images/". $_FILES['image']['name'];
	$title=$_POST['title'];
	$source=$_POST['source'];
	$tips=$_POST['tips'];

	if (move_uploaded_file("images/". $_FILES['image']['tmp_name'],$target)) {
		//echo "success";
	}
	

	mysqli_query($conn,"INSERT INTO `health_tips` (`ID`, `Title`, `health_tips`, `source`, `images`) VALUES (NULL, '$title', '$tips', '$source', '$image');");
	header('location:viewtips.php');

?>