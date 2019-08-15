<?php


session_start();
//for announcement settings
if(isset($_GET['sid'])){
  //unset($_SESSION['sid']);
  $_SESSION['sid'] = $_GET['sid'];
}

header('location: ../anouncementview.php');
?>