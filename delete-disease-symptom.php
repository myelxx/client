

<?php
include('db/connection.php');

//separate ids differently
$disease_ID = $_GET['d_id'];
if(isset($disease_ID)){
    //delete in disease table
    $resuslt1 = mysqli_query($con, "DELETE FROM disease WHERE disease_id=$disease_ID");
    $resuslt2 = mysqli_query($con, "DELETE FROM disease_symptoms WHERE disease_id=$disease_ID");
    //delete in disease_symptoms table
    if(!empty( $_SESSION['admin'] )) { 
		header("Location:admindisease.php");
	} 
	else {
		header('location:superadmindisease.php');
	} 
}

$symptoms_ID = $_GET['s_id'];
if(isset($symptoms_ID)){
    $resuslt1 = mysqli_query($con, "DELETE FROM symptoms WHERE symptoms_id=$symptoms_ID");
    //delete in disease_symptoms table
    if(!empty( $_SESSION['admin'] )) { 
        header("Location:adminsymptoms.php");
    } 
    else {
        header('location:superadminsymptoms.php');
    } 
}


?>
