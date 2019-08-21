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
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);

$mail->Subject = "Email Verification";
$mail->Body="<br><br><p>Thank you registering. To verify your account click the link below: </p><br>
		<a href='".PROJECT_NAME."email-verify.php?email=".$email."&id=".$activation_code."'> ".PROJECT_NAME.
			"email-verify.php?email=".$email."&id=".$activation_code."</a><br><br></p>Regards<br> Admin.</div>";

        if(!$mail->send()) {
            $error_message = "Mailer Error : ". $mail->ErrorInfo;
        } else {
            $success_message = "Message has been sent successfully";
        }
        