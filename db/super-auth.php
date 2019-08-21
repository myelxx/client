<?php
session_start();
if(!isset($_SESSION["super_id"])){
header("Location: Create.php");
exit(); }
?>