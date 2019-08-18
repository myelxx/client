<?php
include('db/connection.php');
include('db/auth.php');

$symptom_result = "dengue, mallaria, stete";
$symptom_id_result = "1, 2, 7";
$symptoms_id_array = explode(',', $symptom_id_result);
$predicted_disease = array();

foreach($symptoms_id_array as $id):
    $sql = "SELECT * FROM disease_symptoms ds INNER JOIN disease d on d.disease_id = ds.disease_id INNER JOIN symptoms s on s.symptoms_id = ds.symptoms_id WHERE ds.symptoms_id = ". $id;
    $query = mysqli_query($con, $sql);
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
        {
            array_push($predicted_disease, array($row['disease_name'], $row['symptoms_name']));
        }
    }
endforeach;

$disease = array();
foreach ($predicted_disease as $a){
	$disease[] = $a[0];
}

$disease = array_count_values($disease);
arsort($disease); //sort descending maintain keys
$predicted_disease = array_keys($disease)[0];
$possible_disease = implode (", ", array_keys($disease));

//print_r($disease);
//array_keys($disease)[0] 
mysqli_query($conn,"INSERT INTO `patient` (`patient_id`, `firstname`, `lastname`, `contact_no`, `address`, `latitude`, `longitude`, `date_created`, `status`, `disease_id`, `predicted_disease`, `possible_disease`, `symptoms`) VALUES (NULL, 'mej', 'mej', '9128312', 'doghak', '14.5777', '121.0337', '2019-08-18', '0', '1', '$predicted_disease', '$possible_disease', '$symptom_result');");


//$patient_id = $_GET['patient_id'];
$patient_id = 1;
$sql = "SELECT * FROM patient WHERE patient_id=". $patient_id;
$query = mysqli_query($con, $sql);
$result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
        {
            $possible_disease = $row['possible_disease'];
        }
    }
    $possible_disease_array = explode(',', $possible_disease);

if(isset($_POST['Submit']))
{
    $predicted_disease = $_POST['possible_disease'];
    echo $predicted_disease;
    //update predicted disease and disease_id and status
}

?>
<form method="post" action="sample.php">
<label>Select the valid disease:</label>
<select name="possible_disease">
<option value="">-----------------</option>
<?php
foreach($possible_disease_array as $key => $value):
echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
endforeach;
?>
</select>
<input type="submit" name="Submit"/>
</form>
