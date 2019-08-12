
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
	   $name = $_POST['name'];
	   $email = $_POST['email'];
	   $password = $_POST['password'];
	   $f_name = $_POST['f_name'];
	   $l_name = $_POST['l_name'];
	   $tv_date = $_POST['tv_date'];
	   $f_address = $_POST['f_address'];
	   $f_barangay = $_POST['f_barangay'];
	   $landline = $_POST['landline'];
	   $contact_no = $_POST['contact_no'];
	   $spin1 = $_POST['spin1'];
	
	   $password =  password_hash($password, PASSWORD_DEFAULT);

	   $sql = "INSERT into admin(username, email_address, password, first_name, last_name, birth_date, address, brgy, land_line, contact_no, Gender) VALUES ('$name','$email','$password','$f_name','$l_name','$tv_date','$f_address','$f_barangay','$landline','$contact_no','$spin1')";

 	   if (mysqli_query($conn, $sql)) 
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
