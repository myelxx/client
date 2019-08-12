<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";
$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM announcements";

$result = $con->query($sql);

if ($result->num_rows >0) {

 while($row[] = $result->fetch_assoc()) {
 
 $tem= $row;
 
 $json = json_encode(array("announcements"=>$tem));
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
 mysqli_close($con);
?>