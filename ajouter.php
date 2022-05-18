<?php
$connexion = new PDO("mysql:host=localhost;dbname=prj", "root", "root");
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('2', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('3', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('4', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('5', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('6', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('7', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
$sql ="INSERT INTO `etudiant` (`CNE`, `ID_COMPTE`, `CIN_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ECOLE`, `EMAIL_ETUDIANT`, `SEXE_ETUDIANT`) 
VALUES ('8', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$stmt= $connexion->prepare($sql);
$stmt->execute();
?>
