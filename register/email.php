<?php
$to="anujmaharjan32@gmail.com";
$subject="Request for trader membership";
$msg="Hello OK";
$headers = "From: ufg333@gmail.com"."\r\n"."Cc: acharyasrijan360@gmail.com"."\r\n"."Bcc: ufg333@example.com";
$mail_sent=mail($to,$subject,$msg,$headers);       
if ( $mail_sent==true) 
{
       echo "Your account confirmation email has been sent to the admin!";
} 
else 
{
       echo "Failed to send email, try again!";
   }




?>