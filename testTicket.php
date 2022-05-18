<?php

require 'main.php';
$cne=$_SESSION['cne'];
//Selectionner des informations de l'utilsateur de la base de données
$responce=$connexion->prepare("SELECT *FROM etudiant WHERE CNE='$cne'");
$responce->execute();
$resultat=$responce->fetchAll(PDO::FETCH_ASSOC);
print_r($resultat);
//fonction recuperation
$cne=$resultat[0]['CNE'];
$nom=$resultat[0]['NOM_ETUDIANT'];
$prenom=$resultat[0]['PRENOM_ETUDIANT'];
$email=$resultat[0]['EMAIL_ETUDIANT'];
$dateReserve=$_SESSION['DATE_DE_RESEVATION'];
echo 'GGGG';
echo $dateReserve;
//selectionner des informations de tickets de l utilisateur
$tick= $connexion->prepare("SELECT * FROM ticket where CNE='$cne' and DATE_DE_RESEVATION='$dateReserve'");
$tick->execute();
$produit = $tick->fetchAll(PDO::FETCH_ASSOC); 
print_r($produit);
?>