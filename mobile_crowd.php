
<?php
header("Content-type:application/json");
//IMPORTANT ALWAYS COPY THIS
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
//IMPORTANT ALWAYS COPY THIS
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "health";

$conn=mysqli_connect($servername, $username, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	   $f_name = $_POST['f_name'];
	   $l_name = $_POST['l_name'];
	 	$spin1 = $_POST['spin1'];
	   $mBarangay = $_POST['mBarangay'];
	   $tv_date = $_POST['tv_date'];
	   $chk_Chills = $_POST['chk_Chills']; //symptoms
	   $chk_Diarrhea = $_POST['chk_Diarrhea'];
	   $chk_Dry_cough = $_POST['chk_Dry_cough'];
	   $chk_Fever = $_POST['chk_Fever'];
	   $chk_Jaundice = $_POST['chk_Jaundice'];
	   $chk_Muscle_pain = $_POST['chk_Muscle_pain'];
	   $chk_Nausea = $_POST['chk_Nausea'];
	   $chk_Seizures = $_POST['chk_Seizures'];
	   $chk_Rushes = $_POST['chk_Rushes'];
	   $chk_Vomiting = $_POST['chk_Vomiting'];
	   $chk_Swollen_glands = $_POST['chk_Swollen_glands'];
	    $chk_Dehydration = $_POST['chk_Dehydration'];
 	   $sid = "Symptoms-" . rand(000,999) . rand(000, 999);

$data = array();
if($chk_Rushes == "1"){
array_push($data,"Rushes");
}

if($chk_Vomiting == "1"){
array_push($data,"Vomiting");
}

if($chk_Swollen_glands == "1"){
array_push($data,"Swollen glands");
}

if($chk_Seizures == "1"){
array_push($data,"Seizures");
}

if($chk_Nausea == "1"){
array_push($data,"Nausea");
}

if($chk_Muscle_pain == "1"){
array_push($data,"Muscle pain");
}

if($chk_Jaundice == "1"){
array_push($data,"Jaundice");
}

if($chk_Fever == "1"){
array_push($data,"Fever");
}

if($chk_Dry_cough == "1"){
array_push($data,"cough");
}

if($chk_Diarrhea == "1"){
array_push($data,"Diarrhea");
}

if($chk_Chills == "1"){
array_push($data,"Chills");
}
if($chk_Dehydration == "1"){
array_push($data,"Dehydration");
}
 $str = implode(' , ',$data);

$sql1 ="INSERT INTO crowd_patient(symptoms_id,first_name, last_name, address, barangay, date_input, Symptoms) VALUES('$sid','$f_name','$l_name','$spin1','$mBarangay','$tv_date','$str')";

$sql2 = "INSERT INTO symptoms(symptoms_id,rushes, Vomiting, Swollen_glands, Seizures, Nausea, Muscle_pain, Jaundice, Fever, Dry_cough, Diarrhea, Chills, Dehydration) VALUES('$sid','$chk_Rushes','$chk_Vomiting','$chk_Swollen_glands','$chk_Seizures','$chk_Nausea','$chk_Muscle_pain','$chk_Jaundice','$chk_Fever','$chk_Dry_cough','$chk_Diarrhea','$chk_Chills','$chk_Dehydration')";



$query = mysqli_query($conn, $sql2);

 	   if (mysqli_query($conn, $sql1)) 
	   {
	   		$result["success"] ="1";
			$result["message"] ="success";
			echo json_encode($result);
			
	   }
	   else
	   {
	   		$result["success"] ="0";
			$result["message"] = "error";

			echo json_encode($result);
	   }

	    mysqli_error($conn);
		mysqli_close($conn);	


}
?>
