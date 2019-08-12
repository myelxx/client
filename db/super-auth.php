<?php
session_start();
if(!isset($_SESSION["super_id"])){
header("Location: create.php");
exit(); }
?>