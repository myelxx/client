<?php
include('db/connection.php');

/*
try{
  $dbcon = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOexception $ex){
  die($ex->getMessage());
}
// $result = mysqli_query($con,"SELECT * FROM admin");
/* $stmt=$dbcon->prepare "select Gender, count(Gender) as count from admin by Gender";
$stmt->execute();
$json=[];
$json=[];
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $json[]= $Gender;
  # code...
}
echo json_encode($json);
*/
$query = "select Gender,count(Gender) as count from admin group by Gender";
 $output = array();

if ($result = mysqli_query($con, $query)) {
    # code...
    foreach ($result as $row) {
        # code...
        $output[] = $row;
    }
}
      
    echo json_encode($output);
    mysqli_close($con);
 ?>
