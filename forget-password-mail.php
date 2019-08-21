<?php
require_once 'vendor/autoload.php';

define("PROJECT_NAME", "moveslikedoms.info/mmrl/");
$mail = new PHPMailer\PHPMailer\PHPMailer;
//Enable SMTP debug mode
$mail->SMTPDebug = 0;
//set PHPMailer to use SMTP
$mail->isSMTP();
//set host name

$mail->Host = "moveslikedoms.info";
// set this true if SMTP host requires authentication to send mail
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true;   
$mail->Mailer = “smtp”; // don't change the quotes!
//Provide username & password
$mail->Username = "barangaysanmiguel@pasigsanmiguel.site";
$mail->Password = "P@ssw1word";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->From = "barangaysanmiguel@pasigsanmiguel.site";
$mail->FromName = "MMRL";
$mail->addAddress($_POST["user-email"]);
$mail->isHTML(true);

$mail->Subject = "Forget Password Recovery";
$mail->Body="<br><br><p>Click here to recover your password<br>
    <a href='".PROJECT_NAME."resetPassword.php?name=".$user[0]["username"]."'> ".PROJECT_NAME.
        "resetPassword.php?name=".$user[0]["username"]."</a><br><br></p>Regards<br> Admin.</div>";

        if(!$mail->send()) {
            $error_message = "Mailer Error : ". $mail->ErrorInfo;
        } else {
            $success_message = "Message has been sent successfully";
        }
        