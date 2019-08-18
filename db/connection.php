<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","health");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//MySQLi Procedural
$con = mysqli_connect("localhost","root","","health");
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
 
//if PDO
$dsn = 'mysql:host=localhost;dbname=health';
$un = 'root';
$password = '';
$options = [];
try {	$conPDO = new PDO($dsn, $un, $password, $options);
} 	catch(PDOException $e) { }  
?>