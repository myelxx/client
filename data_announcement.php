<?php 

$result = mysql_query("SELECT * FROM listinfo");

$json = array();
$total_records = mysql_num_rows($result);

if($total_records > 0){
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $json[] = $row;
  }
}

echo json_encode($json);

?>