<?php
include('db/connection.php');

$sql = "SELECT * FROM health_tips";

$result = $con->query($sql);

if ($result->num_rows >0) {

 while($row[] = $result->fetch_assoc()) {
 
 $tem= $row;
 
 $json = json_encode(array("health_tips"=>$tem));
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
 mysqli_close($con);
?>