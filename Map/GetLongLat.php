<?php
include 'connection.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
	$fromDate = $_POST['fDate'];
	$endDate = $_POST['tDate'];
	$selectedDisease = $_POST['sDisease'];

	if($action == 'getData')
	{
		$sql = "SELECT * FROM patient p INNER JOIN disease d ON p.disease_id = d.disease_id WHERE status=1 AND d.disease_name LIKE '%$selectedDisease%' ";
		if($fromDate != "" && $endDate != "") {
			$sql .= " AND (DATE(date_created) BETWEEN '". $fromDate ."' and '".$endDate. "')";
		} else 
		{
			$sql .= ""  ;
		}

		$result = $con->query($sql);

		if ($result != null && $result->num_rows > 0) {
			// output data of each row
			$ctr = 0;
			$results = [];
			while($row = $result->fetch_assoc()) {
				$results[] = (object) array('lat' => $row["latitude"], 'long' => $row["longitude"]);
			}
			
			header('Content-type: application/json');
			echo json_encode( $results );
		} else {
			echo "0 results";
		}
		$con->close();
	}
	
}

?>