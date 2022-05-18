<?php
   $to_email = "elboukiliaicha1060@gmail.com";
   $subject = "XAMPP Test";
   $body = "XAMPP Test";
   $headers = "From: sender";
 
   if ( mail($to_email, $subject, $body, $headers)) {
      echo("Email successfully sent to $to_email...");
   } else {
      echo("Email sending failed...");
   }
?>