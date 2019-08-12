<?php
//IMPORTANT ALWAYS COPY THIS
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
//IMPORTANT ALWAYS COPY THIS

//Just call this to access database
require_once 'connection.php';

header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $email = $_POST['emailJson'];
  $password = $_POST['passwordJson'];

  $sql = "SELECT * FROM admin WHERE email_address='$email'";

  $response = mysqli_query($conn, $sql);

  $result = array();
  $result['login'] = array();

  if (mysqli_num_rows($response) === 1) 
  {

      $row = mysqli_fetch_assoc($response);

      if (password_verify($password, $row['password'])) 
      {
        $index['username'] = $row['username'];
        $index['email'] = $row['email_address']; //$row[columnName]

        $result['success'] = "1";
        $result['message'] = "success";

        array_push($result['login'], $index);
      }
      else
      {
        $result['success'] = "0";
        $result['message'] = "Wrong Password!";

        array_push($result['login'], $index);
      }
  }
  else
  {
    $result['success'] = "0";
    $result['message'] = "error: email = '$email' and pass = '$password'";
  }

  mysqli_error($conn);
  echo json_encode($result);
  mysqli_close($conn);
}

?>