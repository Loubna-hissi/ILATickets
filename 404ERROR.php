<?php
$smtp_port = '25' ;Valeur par défaut
$SMTP = smtp.monfai.fr
$destinataire = "loubnahissi03@gmail.com"; // adresse mail du destinataire
$sujet = "Sujet"; // sujet du mail
$message = "Ton destinataire a bien lu ton mail"; // message qui dira que le destinataire a bien lu votre mail
// maintenant, on crée l'en-tête du mail
$header = "From: mon@adressemail.com\r\n"; 
$header .= "Disposition-Notification-To:mon@adressemail.com"; // c'est ici que l'on ajoute la directive
mail ($destinataire, $sujet, $message, $header); // on envois le mail
?>