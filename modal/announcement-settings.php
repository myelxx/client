<?php
// $id = $_GET['id'];

// if(isset($id)){

//     if($id == 1){
//         mysqli_query($conn,"update announcements set a_what='$what', a_when='$when', a_where='$where', a_who='$who', image='$image', date_created=CURRENT_TIMESTAMP where ID=$ID");
// 	    //header('location:anouncementview.php');
//     } 

//     if($id == 2){
//     }
// }

//for announcement settings
if(isset($_GET['sid'])){
  unset($_SESSION['sid']);
  $_SESSION['sid'] = $_GET['sid'];
}

echo $_SESSION['sid'];
//header('location: ../anouncementview.php');
?>