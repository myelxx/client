
<?php 
	
	class map{
		private $id;
		private $address;
		private $disease_name;
		private $lat;
		private $lng;
		private $conn;
		private $tableName = "patient";

		

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setDisease($disease) { $this->disease = $disease; }
		function getDisease() { return $this->disease; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }

			// Table disease
			function setDiseaseId($disease_id){$this->disease_id = $disease_id;}
			function getDiseaseId(){return $this->disease_id;}
			function setDiseaseName($disease_name){$this->disease_name = $disease_name;}
			function getDiseaseName(){return $this->disease_name;}

		public function __construct() {
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		public function getAddressBlankLatLng() {
			$sql = "SELECT * FROM $this->tableName WHERE latitude IS NULL AND longitude IS NULL";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllMarker($fromDate,$endDate) {
			$sql = "SELECT p.address, p.predicted_disease as disease_name , p.latitude as lat ,p.longitude as lng, COUNT(p.predicted_disease) as total, s.symptoms_name, count(s.symptoms_name) as count FROM disease_symptoms ds 
			INNER JOIN disease d ON d.disease_id = ds.disease_id 
			INNER JOIN symptoms s ON s.symptoms_id = ds.symptoms_id 
			INNER JOIN patient p ON p.predicted_disease = d.disease_name";
		  if(!empty($fromDate) && !empty($endDate)){ $sql .= " AND date_created  between '".$fromDate."' and '".$endDate."' ";}
		  $sql .= " GROUP BY p.address, s.symptoms_name HAVING COUNT(predicted_disease) > 0";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}


		public function getAllAddress($get_address,$fromDate,$endDate) {
			$sql = "SELECT address, predicted_disease as disease_name , latitude as lat ,longitude as lng, COUNT(predicted_disease) as total FROM patient WHERE status=1 AND address = '$get_address'";
		  if(!empty($fromDate) && !empty($endDate)){ $sql .= " AND date_created  between '".$fromDate."' and '".$endDate."' ";}
		  $sql .= "GROUP BY address, predicted_disease HAVING COUNT(predicted_disease) > 0";
    
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}


		public function updateAddressWithLatLng() {
			$sql = "UPDATE $this->tableName SET latitude = :lat, longitude = :lng WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':id', $this->id);

			if($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}

?>