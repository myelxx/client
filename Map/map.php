
<?php 
	
	class map{
		private $id;
		private $address;
		private $disease_name;
		private $lat;
		private $lng;
		private $conn;
		private $tableName = "heatmap";

		

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

		public function getAllAddress($get_address,$fromDate,$endDate) {
			$sql = "SELECT address, disease as disease_name , latitude as lat ,longitude as lng, COUNT(disease) as total 
			FROM heatmap
			WHERE address = '$get_address'
		
		   ";
		  if(!empty($fromDate) && !empty($endDate)){ $sql .= " AND date  between '".$fromDate."' and '".$endDate."' ";}
		  $sql .= "GROUP BY  address, disease
		  HAVING COUNT(disease) > 0";
    
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