<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
/*use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';  */
function send($aMail , $bID){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "108021076@gm.asia.edu.tw";
    $mail->Password   = "lu3849205";
    $mail->IsHTML(true);
    $mail->AddAddress("2653319@gmail.com", "2653319");
    $mail->SetFrom("108021076@gm.asia.edu.tw", "Nashi");
    //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
    //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "This is register Mail";
    $content = "<b>The E-mail -> .'$aMail'.  id -> .'$bID'.</b>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
        return false;
        var_dump($mail);
    } else {
        return true;
    }
}
