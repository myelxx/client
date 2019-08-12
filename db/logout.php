<?php
if(isset($_GET['id'])){
    logout();
}

//functions
function logout() {
	session_start();
	if(session_destroy())
	{
		header("Location:  ../create.php");
	}
}
?>

