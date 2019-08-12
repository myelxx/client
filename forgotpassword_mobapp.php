<?php


    require_once 'update_user_info.php';
    $db = new update_user_info();
    
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "health";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // json response array
    $response = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['email'])) {

            $password = $_POST['password'];
            $email = $_POST['email'];
            $answer = $_POST['answer'];
            
            $checkQuery = mysqli_query($conn, "SELECT * FROM users_crowd WHERE email = '$email' AND secret_question = '$answer'");
            $rowcount=mysqli_num_rows($checkQuery);
            
            if($rowcount == 1) {
                $hash = $db->hashFunction($password);
                $encrypted_password = $hash["encrypted"]; // encrypted password
                $salt = $hash["salt"]; // salt
                $sqlinsert= "UPDATE users_crowd SET encrypted_password=('$encrypted_password'), salt=('$salt')  where email = '$email'";
                $result= mysqli_query($conn, $sqlinsert);
                
                if($result) {
                    $subj = "[BACOOD HEALTH CENTER]New password for your account.";
                    $msg = "You've recently changed your password in this e-mail: $email. Your new password is: $password.";
                    $response["error"] = false;
                    $response["res"]["stat"] = "Success! Password changed. Please check your e-mail for your reference.";
                    mail($email, $subj, $msg);
                    
                } else {
                    $response["error"] = true;
                    $response["res"]["stat"] = "An internal error has occurred. Please contact the administrator.";
                }
            } else {
                $response["error"] = true;
                $response["res"]["stat"] = "E-mail not found in the system or the Answer is wrong. Please try again or contact the administrator.";
            }
        }
        else {
            $response["error"] = true;
            $response["res"]["stat"] = "Please enter your e-mail.";
        }

    }

    echo json_encode($response);


?>  