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
$msg ="";
if (isset($_POST['upload'])){
    
     $target ="images/".basename($_FILES['image']['name']);

$con = mysqli_connect("localhost","root","","health");
      $images = $_FILES['image']['name'];
      $text = $_POST['text'];
      
       $sql = "INSERT INTO test (image, text) VALUES ('$images','$text')";
     	$result = mysqli_query($con,$sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
	$msg = "success";
}
else{
	$msg = "Error";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<titlle>upload</titlle>
</head>
<body>
<div id ="content">
	<form method="post" action="test.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
	</div>
		<input type="file" name="image">
	</div>
		<textarea name="text" cols="40" rows="4" placeholder="say something"></textarea>

	</div>
	<div>
		<input type="submit" name="upload" value="Upload Image">
	</div>
</form>
</div>
</body>
</html>
