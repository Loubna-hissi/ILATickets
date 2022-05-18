<?php
require 'base.php';
$date=date('Y-m-d');
$active=0;
$hash=(md5(rand(0,1000)));
$sql = "INSERT INTO `compte` (CNE	,DATE_DE_CREATION_DU_COMPTE,MOT_DE_PASSE,	ACTIVE,	HASHCOMPTE) VALUES (?,?,?,?,?)";
$stmt= $connexion->prepare($sql);
$stmt->execute(array($cne,$date,$password1,$active,$hash));
$id=$connexion->prepare("SELECT * FROM compte WHERE cne=?");
$id->execute([$cne]);
$id=$id->fetchAll(PDO::FETCH_ASSOC);
$id=$id[0]['ID_COMPTE'];
$req = $connexion->exec("UPDATE `etudiant` SET `ID_COMPTE` = '$id' where cne='$cne'");
//gerer le compte
//selectionner id responsable
$responsables=$connexion->prepare("SELECT * FROM responsable");
$responsables->execute();
$responsables=$responsables->fetchAll(PDO::FETCH_ASSOC);
foreach ($responsables as $key) {
  $IdResponsable=$key['CIN_RESPONSABLE'];
  $gerer = $connexion->prepare("INSERT INTO `gerer` (CIN_RESPONSABLE,ID_COMPTE) VALUES (?,?)");
  $gerer->execute(array($IdResponsable,$id));
}
?>