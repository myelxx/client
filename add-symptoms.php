<?php
	include('db/connection.php');
	
	$name = $_POST['name'];
	mysqli_query($conn,"INSERT INTO `symptoms` (`symptoms_id`, `symptoms_name`) VALUES (NULL, '$name')");
	header('location:admindisease.php');

?>